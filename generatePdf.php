<?php
require_once('tcpdf/tcpdf.php');
require_once('connection.php'); 

$employee_name = $_POST['empName'];
$period_id = $_POST['monthSelect'];
$currentYear = date('Y');
$monthYear = $period_id . '-' . $currentYear;

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Payroll');
$pdf->SetTitle('Payslip for '.$employee_name);
$pdf->SetSubject('Payslip');
$pdf->SetKeywords('Payslip, PDF');

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->AddPage();

$pdf->SetFont('helvetica', '', 12);
$html = '<h1>Payslip for '.$employee_name.'</h1>';
$sql = "SELECT * FROM employee INNER JOIN departement ON employee.dep_id = departement.dep_id INNER JOIN family_status ON employee.status_id = family_status.status_id WHERE concat_fname_lname like :employee_name";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':employee_name', $employee_name);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$html .= '<div><label>NSSF No:</label><span>' . $result['emp_nssf'] . '</span><br/> 
        <label>Starting date:</label><span>' . $result['emp_firstDate'] . '</span> <br/>
        <label>Department:</label><span>' . $result['dep_id'] . '       ' . $result['dep_name'] . '</span> <br/>          
        <label>Date:</label><span>' . $monthYear . '</span> <br/>   
        <label>Family Status:</label><span>' . $result['status_name'] . '</span> <br/>       
        </div><br/>';

$html .= '<table>';
$html .= '<tr><th>Earnings</th><th>Amount</th><th>Deductions</th><th>Amount</th></tr>';

try {
    if ($result) {
        $employee_id = $result['emp_id'];

        $sql = "SELECT 
                    sc.salCat_name AS salary_category_name, 
                    s.amount AS salary_amount
                FROM 
                    `salary_history` s 
                INNER JOIN 
                    `salary category` sc ON s.salCat_id = sc.salCat_id
                WHERE 
                    s.emp_id = :employee_id
                AND (
                        (
                          MONTH(changeDate) = :month
                          AND YEAR(changeDate) = YEAR(NOW())
                          AND changeDate = (
                            SELECT MAX(changeDate)
                            FROM salary_history
                            WHERE MONTH(changeDate) = :month
                              AND YEAR(changeDate) = YEAR(NOW())
                          )
                        )
                        OR (
                          :month NOT IN (SELECT DISTINCT MONTH(changeDate) FROM salary_history WHERE YEAR(changeDate) = YEAR(NOW()))
                          AND changeDate = (
                            SELECT MAX(changeDate)
                            FROM salary_history
                            WHERE MONTH(changeDate) < :month
                              AND YEAR(changeDate) = YEAR(NOW())
                          )
                        )
                      )
                    ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':employee_id', $employee_id);
        $stmt->bindParam(':month', $period_id);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT 
                    sc.salCat_name AS salary_category_name, 
                    d.deduction_amountPerMonth AS deduction_amount
                FROM 
                    `deduction` d 
                INNER JOIN 
                    `salary category` sc ON d.salCat_id = sc.salCat_id
                WHERE 
                    d.emp_id = :employee_id AND d.deduction_month != d.deduction_paidMonth";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':employee_id', $employee_id);
        $stmt->execute();
        $rowDed = $stmt->fetchAll(PDO::FETCH_ASSOC);

        try {
            for ($i = 0; $i < count($rows); $i++) {
                if ($i == 0) {
                    $sql = "SELECT 
                                nssf AS total_nssf,
                                taxToPay AS total_taxToPay,
                                famAllowance AS allowance
                            FROM 
                                remuneration 
                            WHERE 
                                emp_id = :employee_id AND YEAR(period) = YEAR(CURRENT_DATE()) AND MONTH(period) = :selectedMonth";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':employee_id', $employee_id);
                    $stmt->bindParam(':selectedMonth', $period_id);
                    $stmt->execute();
                    $totalDeductions = $stmt->fetch(PDO::FETCH_ASSOC);

                    $totalDeductionsAmount = $totalDeductions['total_nssf'] + $totalDeductions['total_taxToPay'];
                    $html .= '<tr>';
                    $html .= '<td>Family Allowance</td>';
                    $html .= '<td>' . $totalDeductions['allowance'] . '</td>';
                    $html .= '<td>Nssf</td>';
                    $html .= '<td>' . $totalDeductionsAmount . '</td>';
                    $html .= '</tr>';
                }
                $row = $rows[$i];
                if (isset($rowDed[$i])) {
                    $info = $rowDed[$i];
                } else {
                    $info = array('salary_category_name' => '', 'deduction_amount' => '');
                }
                $html .= '<tr>';
                $html .= '<td>' . $row['salary_category_name'] . '</td>';
                $html .= '<td>' . $row['salary_amount'] . '</td>';
                $html .= '<td>' . $info['salary_category_name'] . '</td>';
                $html .= '<td>' . $info['deduction_amount'] . '</td>';
                $html .= '</tr>';
            }

            $sql = "SELECT 
                                amount AS total_amount,
                                nonTaxable AS total_nonTax,
                                famAllowance AS allowance,
                                taxToPay AS taxes,
                                nssf AS nssfPay,
                                deduction AS deductionPay
                            FROM 
                                remuneration 
                            WHERE 
                                emp_id = :employee_id AND YEAR(period) = YEAR(CURRENT_DATE()) AND MONTH(period) = :selectedMonth";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':employee_id', $employee_id);
                    $stmt->bindParam(':selectedMonth', $period_id);
                    $stmt->execute();
                    $totalSal = $stmt->fetch(PDO::FETCH_ASSOC);

                    $total = $totalSal['total_amount'] + $totalSal['total_nonTax'] + $totalSal['allowance'];
                    $totalDed = $totalSal['taxes'] + $totalSal['nssfPay'] + $totalSal['deductionPay'];
                    $netToPay = $total - $totalDed;
                    $html .= '<tr><td colspan="4">&nbsp;</td></tr>'; 
                    $html .= '<tr><td colspan="4">&nbsp;</td></tr>';
                    $html .= '<tr><td colspan="4">&nbsp;</td></tr>'; 

                    $html .= '<tr>';
                    $html .= '<td>Total Amount</td>';
                    $html .= '<td>' . $total . '</td>';
                    $html .= '<td>Total Deductions</td>';
                    $html .= '<td>' . $totalDed . '</td>';
                    $html .= '</tr>';
                    $html .= '<tr><td colspan="4">&nbsp;</td></tr>';
                    $html .= '<tr>';
                    $html .= '<td>Net To Pay</td>'; 
                    $html .= '<td>' . $netToPay . '</td>'; 
                    $html .= '</tr>';


        } catch (PDOException $e) {
            $html .= '<tr><td colspan="3">PDO Error in loop: ' . $e->getMessage() . '</td></tr>';
        }
    } else {
        $html .= '<tr><td colspan="3">No employee found with the provided name.</td></tr>';
    }
} catch (PDOException $e) {
    $html .= '<tr><td colspan="3">PDO Error: ' . $e->getMessage() . '</td></tr>';
}


$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('payslip_'.$employee_name.'.pdf', 'I');
?>
