<?php
class Database {
  protected $host,
    $user,
    $pass,
    $db,
    $conn;

  public function __construct($host = "localhost", $user = "root", $pass = "", $db = "banksampah") {
    $this->conn = mysqli_connect($host, $user, $pass, $db);
    if (mysqli_connect_errno()) {
      echo "Error : " . mysqli_connect_error();
      exit();
    }
    return $this->conn;
  }

  public function runQuery(string $sql) {
    $query = mysqli_query($this->conn, $sql);
    return $query;
  }

  public function hitungJumlah(string $sqlHitung) {
    $queryHitung = mysqli_query($this->conn, $sqlHitung);
    if (!$queryHitung) {
      echo "Error : " . mysqli_error($this->conn);
      exit();
    }

    return mysqli_num_rows($queryHitung);
  }

  public function fetchData(string $sqlFetch) {
    $queryFetch = mysqli_query($this->conn, $sqlFetch);
    if (!$queryFetch) {
      echo "Error : " . mysqli_error($this->conn);
      exit();
    }

    for ($i = 0; $result[$i] = mysqli_fetch_assoc($queryFetch); $i++);
    array_pop($result);

    return $result;
  }
}

// $db = new Database();
// $sql = "SELECT * FROM workplace";
// echo $db->hitungJumlah($sql);
// var_dump($db->fetchData("SELECT nm_lengkap FROM users"));
