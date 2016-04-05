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
    private $TBNAME = 'Currencies';
    private $conn;

    public function __construct()
    {
        // Create connection
       $this->conn = new mysqli($this->SERVER, $this->USERNAME, $this->PASSWORD, $this->DBNAME);

       // Check connection
       if ($this->conn->connect_error) {
           die('Connection failed: '.$this->conn->connect_error);
       }
    }

    public function InsertCurrencies($symbol, $price, $time)
    {
        $sql = "INSERT INTO $this->TBNAME (Symbol,price,time_stamp) VALUES ('$symbol','$price','$time')";
        if ($this->conn->query($sql) === true) {
        } else {
            echo 'Error: '.$sql.'<br>'.$this->conn->error;
        }
    }
    public function getCurrencies()
    {
        $sql = "SELECT * FROM $this->TBNAME";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<tr><th>Symbol</th> <th>Time</th><th> Price</th></tr>';
      // output data of each row
      while ($row = $result->fetch_assoc()) {
          echo '<tr><td>'.$row['Symbol'].'</td><td>'.$row['time_stamp'].'</td><td> '.$row['price'].'</td></tr>';
      }
            echo '</table>';
        } else {
            echo '0 results';
        }
    }
}
