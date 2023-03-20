<?php

$from = "EUR";
$to = "USD";

$link = "https://www.xe.com/currencyconverter/convert/?Amount=1&From=".$from."&To=".$to;

$html_content = file_get_contents($link);
sleep(1);

$substr_html_content = strstr($html_content, '<p class="result__BigRate-sc-1bsijpp-1 iGrAod">');
$substr_html_content = strstr($substr_html_content, '>');
$end_position = strpos($substr_html_content, '<span class="faded-digits">');

if($end_position){
    $exchange_rate = substr($substr_html_content, 1, $end_position-1);
    var_dump("1 ".$from." = ".$exchange_rate." ".$to);
}
else{
    var_dump("ERROR");
}

exit;
?>
