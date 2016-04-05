
<!DOCTYPE html>
<!---
/**
 * Cytonn Technologies.
 *
 * @author Ndirangu Wilson <wndirangu@Cytonn.com>
 */

-->

<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/main.css">
    <title></title>
  </head>
  <body>
<table class="currencytable">

<?php
require './data/Yahoo.php';
require './db/DBconnect.php';

class Display
{
    public function output_data()
    {
        $api_data = new Get_Yahoo_Data();
        $db_connection = new DBconnect();
        $price = ($api_data->get_price());
        $symbol = ($api_data->get_name());
        $time = ($api_data->get_time());
        for ($i = 0; $i < count($price); ++$i) {
            //$db_connection->InsertCurrencies($symbol[$i], $price[$i], $time[$i]);
        }

      $db_connection->getCurrencies();
    }
}
$output_data = new Display();
$output_data->output_data();

?>
</body>
</html>
