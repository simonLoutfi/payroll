<?php
    $url = 'https://api.yamli.com/transliterate.ashx?' . http_build_query($_GET);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if ($response === false) {
        echo json_encode(['error' => 'Curl error: ' . curl_error($ch)]);
    } else {
        echo $response;
    }

    curl_close($ch);
?>
