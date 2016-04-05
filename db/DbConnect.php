<?php
/**
 * Cytonn Technologies.
 *
 * @author Ndirangu Wilson <wndirangu@cytonn.com>
 */
class DBconnect
{
    private $SERVER = 'localhost';
    private $USERNAME = 'root';
    private $PASSWORD = 'password';
    private $DBNAME = 'Currency';
    private $TBNAME = 'Currencies'

    public function __construct()
    {
            // Create connection
       $conn = new mysqli($this->SERVER, $this->USERNAME, $this->PASSWORD, $this->DBNAME);

       // Check connection
       if ($conn->connect_error) {
           die('Connection failed: '.$conn->connect_error);
       }

        }
     public function InsertCurrencies($symbol,$price,$time)
     {
       $sql=  "INSERT INTO $this->TBNAME (Symbol,price,time_stamp)
       VALUES ($symbol, $price, $time)";
     }
}

$conn = new DBconnect();
