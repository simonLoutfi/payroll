-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 03:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_name`) VALUES
(1, 'byblos'),
(2, 'beirut'),
(3, 'da7ye'),
(4, 'by');

-- --------------------------------------------------------

--
-- Table structure for table `bank branch`
--

CREATE TABLE `bank branch` (
  `bankBranch_id` int(11) NOT NULL,
  `bankBranch_location` varchar(50) NOT NULL,
  `bank_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank branch`
--

INSERT INTO `bank branch` (`bankBranch_id`, `bankBranch_location`, `bank_id`) VALUES
(1, 'mastita', 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `comp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `comp_id`) VALUES
(1, 'beirut', 1),
(2, 'byblos', 1),
(3, 'batroun', 1),
(4, 'chouf', 0),
(5, 'bwar', 0),
(6, 'adma', 0);

-- --------------------------------------------------------

--
-- Table structure for table `casa`
--

CREATE TABLE `casa` (
  `casa_id` int(11) NOT NULL,
  `casa_name` varchar(50) NOT NULL,
  `mohafaza_id` int(11) NOT NULL,
  `casa_arb` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `casa`
--

INSERT INTO `casa` (`casa_id`, `casa_name`, `mohafaza_id`, `casa_arb`) VALUES
(1, 'jbeil', 1, '0'),
(2, 'batroun', 2, '0'),
(3, 'texas', 3, '0'),
(4, 'chouf', 1, '0'),
(5, 'keserwen', 1, '0'),
(6, 'paris', 4, '0'),
(7, '', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `casa_id` int(11) NOT NULL,
  `city_arb` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `casa_id`, `city_arb`) VALUES
(1, 'Byblos-Jbeil', 1, '0'),
(2, 'batroun', 2, '0'),
(3, 'aanaya', 1, '0'),
(4, 'dallas', 3, '0'),
(5, 'maverik', 3, '0'),
(6, 'bourjein', 4, '0'),
(7, 'jounieh', 5, '0'),
(8, 'paris', 6, '0'),
(9, '', 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `comp_id` int(11) NOT NULL,
  `comp_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(50) NOT NULL,
  `country_arb` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `country_arb`) VALUES
(1, 'Lebanon', '0'),
(2, 'usa', '0'),
(3, 'France', '0'),
(4, 'honk kong', '');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `cur_id` int(11) NOT NULL,
  `cur_name` varchar(50) NOT NULL,
  `cur_reference` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`cur_id`, `cur_name`, `cur_reference`) VALUES
(1, 'lbp', 'lbp'),
(2, 'dollars', 'lbp');

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

CREATE TABLE `deduction` (
  `deduction_id` int(11) NOT NULL,
  `deduction_amount` int(11) NOT NULL,
  `deduction_paidAmount` float NOT NULL,
  `deduction_month` int(11) NOT NULL,
  `deduction_paidMonth` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `salCat_id` int(11) NOT NULL,
  `deduction_amountPerMonth` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(50) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`dep_id`, `dep_name`, `branch_id`) VALUES
(1, 'cs', 2),
(2, 'accounting', 1),
(3, 'audit', 4);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `emp_lastName` varchar(50) NOT NULL,
  `emp_nssf` int(11) NOT NULL,
  `emp_firstDate` date NOT NULL,
  `emp_nssfDate` date NOT NULL,
  `emp_eosStartDate` date NOT NULL,
  `emp_jobTitle` varchar(50) NOT NULL,
  `emp_father` varchar(50) NOT NULL,
  `emp_mother` varchar(50) NOT NULL,
  `emp_dateOfBirth` date NOT NULL,
  `emp_placeOfBirth` varchar(50) NOT NULL,
  `emp_phone` varchar(20) NOT NULL,
  `emp_email1` varchar(50) NOT NULL,
  `emp_email2` varchar(50) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `freq_id` int(11) NOT NULL,
  `mode_id` int(11) NOT NULL,
  `cur_id` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `emp_famAllowanceSub` int(11) NOT NULL,
  `emp_famAllowance` int(11) NOT NULL,
  `emp_eosSub` int(11) NOT NULL,
  `emp_motherhood` int(11) NOT NULL,
  `concat_fname_lname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_lastName`, `emp_nssf`, `emp_firstDate`, `emp_nssfDate`, `emp_eosStartDate`, `emp_jobTitle`, `emp_father`, `emp_mother`, `emp_dateOfBirth`, `emp_placeOfBirth`, `emp_phone`, `emp_email1`, `emp_email2`, `dep_id`, `freq_id`, `mode_id`, `cur_id`, `status_id`, `gender_id`, `region_id`, `branch_name`, `emp_famAllowanceSub`, `emp_famAllowance`, `emp_eosSub`, `emp_motherhood`, `concat_fname_lname`) VALUES
(3, 'toni', 'lahoud', 87643, '2024-01-01', '2024-01-01', '0000-00-00', '', 'georges', '', '0000-00-00', '', '', '', '', 0, 1, 1, 1, 2, 1, 0, '', 0, 0, 0, 0, 'toni georges lahoud');

-- --------------------------------------------------------

--
-- Table structure for table `employee_arabic_info`
--

CREATE TABLE `employee_arabic_info` (
  `id_arb` int(11) NOT NULL,
  `fname_arb` varchar(50) NOT NULL,
  `lname_arb` varchar(50) NOT NULL,
  `father_arb` varchar(50) NOT NULL,
  `nssf_arb` int(11) NOT NULL,
  `job_desc_arb` varchar(50) NOT NULL,
  `status_arb` varchar(50) NOT NULL,
  `child_num_arb` int(11) NOT NULL,
  `work_type_arb` varchar(50) NOT NULL,
  `work_hour_arb` int(11) NOT NULL,
  `payment_type_arb` varchar(50) NOT NULL,
  `leaving_arb` varchar(50) NOT NULL,
  `district_arb` varchar(50) NOT NULL,
  `street_arb` varchar(50) NOT NULL,
  `building_arb` varchar(50) NOT NULL,
  `floor_arb` varchar(50) NOT NULL,
  `phone_arb` int(11) NOT NULL,
  `email_arb` varchar(50) NOT NULL,
  `mohafaza_arb_id` int(11) NOT NULL,
  `casa_arb_id` int(11) NOT NULL,
  `region_arb_id` int(11) NOT NULL,
  `city_arb_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eos_subscription`
--

CREATE TABLE `eos_subscription` (
  `eosSubs_id` int(11) NOT NULL,
  `eosSubs_compContr` float NOT NULL,
  `eosSubs_compSur` float NOT NULL,
  `changeDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eos_subscription`
--

INSERT INTO `eos_subscription` (`eosSubs_id`, `eosSubs_compContr`, `eosSubs_compSur`, `changeDate`) VALUES
(1, 8, 0.5, '2024-03-03 20:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `exemptions_tax`
--

CREATE TABLE `exemptions_tax` (
  `id_exemption` int(11) NOT NULL,
  `statuss` varchar(50) NOT NULL,
  `monthly` varchar(50) NOT NULL,
  `yearly` varchar(50) NOT NULL,
  `changeDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exemptions_tax`
--

INSERT INTO `exemptions_tax` (`id_exemption`, `statuss`, `monthly`, `yearly`, `changeDate`) VALUES
(1, 'single', '37500000', '450000000', '2024-01-01'),
(2, 'maried+0', '56250000', '675000000', '2024-01-01'),
(3, 'maried+1', '60000000', '720000000', '2024-01-01'),
(4, 'maried+2', '63750000', '765000000', '2024-01-01'),
(5, 'maried+3', '67500000', '810000000', '2024-01-01'),
(6, 'maried+4', '71250000', '855000000', '2024-01-01'),
(7, 'maried+5', '75000000', '900000000', '2024-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `family_allowances`
--

CREATE TABLE `family_allowances` (
  `allowance_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `memberType_id` int(11) NOT NULL,
  `changeDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `family_allowances`
--

INSERT INTO `family_allowances` (`allowance_id`, `amount`, `memberType_id`, `changeDate`) VALUES
(1, 600000, 1, '2024-03-03 00:00:00'),
(2, 330000, 2, '2024-03-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `family_member`
--

CREATE TABLE `family_member` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `member_age` int(11) NOT NULL,
  `f_secured` tinyint(1) NOT NULL,
  `memberType_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `family_member`
--

INSERT INTO `family_member` (`member_id`, `member_name`, `member_age`, `f_secured`, `memberType_id`, `emp_id`, `gender_id`) VALUES
(3, 'collete', 35, 1, 1, 3, 1),
(4, 'simon', 6, 0, 2, 3, 1),
(5, 'joe', 11, 0, 2, 3, 1),
(6, 'joseph', 27, 0, 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `family_status`
--

CREATE TABLE `family_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `family_status`
--

INSERT INTO `family_status` (`status_id`, `status_name`) VALUES
(1, 'single'),
(2, 'married'),
(3, 'widowed'),
(4, 'divorced');

-- --------------------------------------------------------

--
-- Table structure for table `fam_allowance_subs`
--

CREATE TABLE `fam_allowance_subs` (
  `famAllSubs_id` int(11) NOT NULL,
  `famAllSubs_perc` float NOT NULL,
  `famAllSubs_basis` int(11) NOT NULL,
  `changeDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fam_allowance_subs`
--

INSERT INTO `fam_allowance_subs` (`famAllSubs_id`, `famAllSubs_perc`, `famAllSubs_basis`, `changeDate`) VALUES
(1, 12000000, 6, '2024-03-03 15:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `frequency of payment`
--

CREATE TABLE `frequency of payment` (
  `freq_id` int(11) NOT NULL,
  `freqPay_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `frequency of payment`
--

INSERT INTO `frequency of payment` (`freq_id`, `freqPay_desc`) VALUES
(1, 'Monthly'),
(2, 'Daily'),
(3, 'hourly');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `gender_id` int(11) NOT NULL,
  `gender_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_id`, `gender_name`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `income_contractual`
--

CREATE TABLE `income_contractual` (
  `incomeCont_id` int(11) NOT NULL,
  `incomeCont_perc` float NOT NULL,
  `incomeLabor_perc` float NOT NULL,
  `changeDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `income_contractual`
--

INSERT INTO `income_contractual` (`incomeCont_id`, `incomeCont_perc`, `incomeLabor_perc`, `changeDate`) VALUES
(1, 7.5, 3, '2024-03-04 20:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `member type`
--

CREATE TABLE `member type` (
  `memberType_id` int(11) NOT NULL,
  `memberType_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member type`
--

INSERT INTO `member type` (`memberType_id`, `memberType_desc`) VALUES
(1, 'Partner'),
(2, 'Child');

-- --------------------------------------------------------

--
-- Table structure for table `mode of payment`
--

CREATE TABLE `mode of payment` (
  `mode_id` int(11) NOT NULL,
  `modePay_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mode of payment`
--

INSERT INTO `mode of payment` (`mode_id`, `modePay_desc`) VALUES
(1, 'cash'),
(2, 'check'),
(3, 'bank letter');

-- --------------------------------------------------------

--
-- Table structure for table `mohafaza`
--

CREATE TABLE `mohafaza` (
  `mohafaza_id` int(11) NOT NULL,
  `mohafaza_name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  `mohafaza_arb` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mohafaza`
--

INSERT INTO `mohafaza` (`mohafaza_id`, `mohafaza_name`, `country_id`, `mohafaza_arb`) VALUES
(1, 'mount lebanon', 1, ''),
(2, 'North', 1, ''),
(3, 'texas', 2, ''),
(4, 'sud', 3, ''),
(5, '', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `motherhood`
--

CREATE TABLE `motherhood` (
  `motherhood_id` int(11) NOT NULL,
  `motherhood_basis` int(11) NOT NULL,
  `motherhood_company` float NOT NULL,
  `motherhood_staff` float NOT NULL,
  `changeDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `motherhood`
--

INSERT INTO `motherhood` (`motherhood_id`, `motherhood_basis`, `motherhood_company`, `motherhood_staff`, `changeDate`) VALUES
(1, 18000000, 8, 3, '2024-03-03 20:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `period`
--

CREATE TABLE `period` (
  `period_id` int(11) NOT NULL,
  `period_name` varchar(50) NOT NULL,
  `f_closed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`period_id`, `period_name`, `f_closed`) VALUES
(1, 'january', 0),
(2, 'february', 0),
(3, 'march', 0),
(4, 'april', 0),
(5, 'may', 0),
(6, 'june', 0),
(7, 'july', 0),
(8, 'august', 0),
(9, 'september', 0),
(10, 'october', 0),
(11, 'november', 0),
(12, 'december', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `cur_id` int(11) DEFAULT NULL,
  `rate` decimal(10,5) DEFAULT NULL,
  `rate_date` datetime DEFAULT current_timestamp(),
  `rate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`cur_id`, `rate`, `rate_date`, `rate_id`) VALUES
(1, 1.00000, '2024-04-20 14:41:20', 1),
(2, 90000.00000, '2024-04-20 14:41:31', 2),
(2, 89000.00000, '2024-05-07 20:44:15', 3);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(50) NOT NULL,
  `city_id` int(11) NOT NULL,
  `region_arb` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `remuneration`
--

CREATE TABLE `remuneration` (
  `remuneration_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `taxToPay` int(11) NOT NULL,
  `famAllowance` int(11) NOT NULL,
  `nonTaxable` int(11) DEFAULT NULL,
  `deduction` int(11) DEFAULT NULL,
  `nssf` int(11) NOT NULL,
  `period` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `remuneration`
--

INSERT INTO `remuneration` (`remuneration_id`, `emp_id`, `emp_name`, `amount`, `taxToPay`, `famAllowance`, `nonTaxable`, `deduction`, `nssf`, `period`) VALUES
(1, 3, 'toni georges lahoud', 84900000, 1071000, 0, 0, NULL, 0, '2024-01-01'),
(2, 3, 'toni georges lahoud', 409900000, 26169500, 0, 0, NULL, 0, '2024-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `sal_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `salCat_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`sal_id`, `emp_id`, `salCat_id`, `amount`) VALUES
(9, 3, 1, 75000000),
(10, 3, 4, 9900000),
(11, 3, 5, 325000000),
(12, 3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary category`
--

CREATE TABLE `salary category` (
  `salCat_id` int(11) NOT NULL,
  `salCat_name` varchar(50) NOT NULL,
  `salCatType_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary category`
--

INSERT INTO `salary category` (`salCat_id`, `salCat_name`, `salCatType_id`) VALUES
(1, 'basic salary', 1),
(2, 'loan', 3),
(3, 'schooling', 2),
(4, 'transportation', 1),
(5, 'Car Allowances', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salary category type`
--

CREATE TABLE `salary category type` (
  `salCatType_id` int(11) NOT NULL,
  `salCatType_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary category type`
--

INSERT INTO `salary category type` (`salCatType_id`, `salCatType_desc`) VALUES
(1, 'taxable'),
(2, 'non taxable'),
(3, 'deduction');

-- --------------------------------------------------------

--
-- Table structure for table `salary_history`
--

CREATE TABLE `salary_history` (
  `salHist_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `salCat_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `changeDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary_history`
--

INSERT INTO `salary_history` (`salHist_id`, `emp_id`, `salCat_id`, `amount`, `changeDate`) VALUES
(1, 1, 1, 70000000, '2024-04-20 15:02:39'),
(2, 1, 4, 10000000, '2024-04-20 15:02:39'),
(3, 1, 5, 0, '2024-04-20 15:02:39'),
(4, 1, 3, 0, '2024-04-20 15:02:39'),
(5, 2, 1, 400, '2024-05-05 11:11:59'),
(6, 2, 4, 100, '2024-05-05 11:11:59'),
(7, 2, 5, 50, '2024-05-05 11:11:59'),
(8, 2, 3, 0, '2024-05-05 11:11:59'),
(9, 3, 1, 75000000, '2024-06-04 15:11:38'),
(10, 3, 4, 9900000, '2024-06-04 15:11:38'),
(11, 3, 5, 0, '2024-06-04 15:11:38'),
(12, 3, 3, 0, '2024-06-04 15:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `taxonearning`
--

CREATE TABLE `taxonearning` (
  `tax_earning_id` int(11) NOT NULL,
  `monthly` int(11) NOT NULL,
  `tax_earning_perc` float NOT NULL,
  `monthly_taxable_amount` float NOT NULL,
  `monthly_tax_amount` float NOT NULL,
  `yearly_taxable_amount` float NOT NULL,
  `yearly_tax_amount` float NOT NULL,
  `cumulative_taxable_amount` float NOT NULL,
  `changeDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taxonearning`
--

INSERT INTO `taxonearning` (`tax_earning_id`, `monthly`, `tax_earning_perc`, `monthly_taxable_amount`, `monthly_tax_amount`, `yearly_taxable_amount`, `yearly_tax_amount`, `cumulative_taxable_amount`, `changeDate`) VALUES
(1, 1, 2, 30000000, 600000, 360000000, 7200000, 360000000, '2024-01-01'),
(2, 2, 4, 45000000, 1800000, 540000000, 21600000, 900000000, '2024-01-01'),
(3, 3, 7, 75000000, 5250000, 900000000, 63000000, 1800000000, '2024-01-01'),
(4, 4, 11, 150000000, 16500000, 1800000000, 198000000, 3600000000, '2024-01-01'),
(5, 5, 15, 300000000, 45000000, 3600000000, 540000000, 7200000000, '2024-01-01'),
(6, 6, 20, 525000000, 105000000, 6300000000, 1260000000, 13500000000, '2024-01-01'),
(7, 7, 25, 83333300000, 20833300000, 1000000000000, 250000000000, 0, '2024-01-01'),
(8, 8, 0, 0, 0, 0, 0, 0, '2024-01-01'),
(9, 9, 0, 0, 0, 0, 0, 0, '2024-01-01'),
(10, 10, 0, 0, 0, 0, 0, 0, '2024-01-01'),
(11, 11, 0, 0, 0, 0, 0, 0, '2024-01-01'),
(12, 12, 0, 0, 0, 0, 0, 0, '2024-01-01'),
(13, 13, 0, 0, 0, 0, 0, 0, '2024-01-01'),
(26, 13, 0, 0, 0, 0, 0, 0, '2024-04-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `bank branch`
--
ALTER TABLE `bank branch`
  ADD PRIMARY KEY (`bankBranch_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `casa`
--
ALTER TABLE `casa`
  ADD PRIMARY KEY (`casa_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`cur_id`);

--
-- Indexes for table `deduction`
--
ALTER TABLE `deduction`
  ADD PRIMARY KEY (`deduction_id`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employee_arabic_info`
--
ALTER TABLE `employee_arabic_info`
  ADD PRIMARY KEY (`id_arb`);

--
-- Indexes for table `eos_subscription`
--
ALTER TABLE `eos_subscription`
  ADD PRIMARY KEY (`eosSubs_id`);

--
-- Indexes for table `exemptions_tax`
--
ALTER TABLE `exemptions_tax`
  ADD PRIMARY KEY (`id_exemption`);

--
-- Indexes for table `family_allowances`
--
ALTER TABLE `family_allowances`
  ADD PRIMARY KEY (`allowance_id`);

--
-- Indexes for table `family_member`
--
ALTER TABLE `family_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `family_status`
--
ALTER TABLE `family_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `fam_allowance_subs`
--
ALTER TABLE `fam_allowance_subs`
  ADD PRIMARY KEY (`famAllSubs_id`);

--
-- Indexes for table `frequency of payment`
--
ALTER TABLE `frequency of payment`
  ADD PRIMARY KEY (`freq_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `income_contractual`
--
ALTER TABLE `income_contractual`
  ADD PRIMARY KEY (`incomeCont_id`);

--
-- Indexes for table `member type`
--
ALTER TABLE `member type`
  ADD PRIMARY KEY (`memberType_id`);

--
-- Indexes for table `mode of payment`
--
ALTER TABLE `mode of payment`
  ADD PRIMARY KEY (`mode_id`);

--
-- Indexes for table `mohafaza`
--
ALTER TABLE `mohafaza`
  ADD PRIMARY KEY (`mohafaza_id`);

--
-- Indexes for table `motherhood`
--
ALTER TABLE `motherhood`
  ADD PRIMARY KEY (`motherhood_id`);

--
-- Indexes for table `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`period_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rate_id`),
  ADD KEY `rate_ibfk_1` (`cur_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `remuneration`
--
ALTER TABLE `remuneration`
  ADD PRIMARY KEY (`remuneration_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`sal_id`);

--
-- Indexes for table `salary category`
--
ALTER TABLE `salary category`
  ADD PRIMARY KEY (`salCat_id`);

--
-- Indexes for table `salary category type`
--
ALTER TABLE `salary category type`
  ADD PRIMARY KEY (`salCatType_id`);

--
-- Indexes for table `salary_history`
--
ALTER TABLE `salary_history`
  ADD PRIMARY KEY (`salHist_id`);

--
-- Indexes for table `taxonearning`
--
ALTER TABLE `taxonearning`
  ADD PRIMARY KEY (`tax_earning_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bank branch`
--
ALTER TABLE `bank branch`
  MODIFY `bankBranch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `casa`
--
ALTER TABLE `casa`
  MODIFY `casa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `cur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `deduction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_arabic_info`
--
ALTER TABLE `employee_arabic_info`
  MODIFY `id_arb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eos_subscription`
--
ALTER TABLE `eos_subscription`
  MODIFY `eosSubs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exemptions_tax`
--
ALTER TABLE `exemptions_tax`
  MODIFY `id_exemption` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `family_allowances`
--
ALTER TABLE `family_allowances`
  MODIFY `allowance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `family_member`
--
ALTER TABLE `family_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `family_status`
--
ALTER TABLE `family_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fam_allowance_subs`
--
ALTER TABLE `fam_allowance_subs`
  MODIFY `famAllSubs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `frequency of payment`
--
ALTER TABLE `frequency of payment`
  MODIFY `freq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `income_contractual`
--
ALTER TABLE `income_contractual`
  MODIFY `incomeCont_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member type`
--
ALTER TABLE `member type`
  MODIFY `memberType_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mode of payment`
--
ALTER TABLE `mode of payment`
  MODIFY `mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mohafaza`
--
ALTER TABLE `mohafaza`
  MODIFY `mohafaza_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `motherhood`
--
ALTER TABLE `motherhood`
  MODIFY `motherhood_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `period`
--
ALTER TABLE `period`
  MODIFY `period_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `remuneration`
--
ALTER TABLE `remuneration`
  MODIFY `remuneration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `sal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `salary category`
--
ALTER TABLE `salary category`
  MODIFY `salCat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salary category type`
--
ALTER TABLE `salary category type`
  MODIFY `salCatType_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salary_history`
--
ALTER TABLE `salary_history`
  MODIFY `salHist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `taxonearning`
--
ALTER TABLE `taxonearning`
  MODIFY `tax_earning_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
