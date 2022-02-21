<?php
class Database {
  protected $host = 'localhost',
    $user = 'root',
    $pass = '',
    $db = 'banksampah',
    $conn,
    $stmt;

  public function __construct() {
    $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
    if (mysqli_connect_errno()) {
      echo "Error : " . mysqli_connect_error();
      exit();
    }
  }

  public function execute(string $sql) {
    return $this->stmt = mysqli_query($this->conn, $sql);
  }

  public function hitungJumlah(string $sqlHitung) {
    $queryHitung = $this->execute($sqlHitung);
    if (!$queryHitung) {
      echo "Error : " . mysqli_error($this->conn);
      exit();
    }

    return $this->stmt = mysqli_num_rows($queryHitung);
  }

  public function fetchAll(string $sqlFetch) {
    $queryFetch = $this->execute($sqlFetch);
    if (!$queryFetch) {
      echo "Error : " . mysqli_error($this->conn);
      exit();
    }

    for ($i = 0; $result[$i] = mysqli_fetch_assoc($queryFetch); $i++);
    array_pop($result);

    return $result;
  }

  public function fetchSingle(string $sqlFetch) {
    $queryFetch = mysqli_query($this->conn, $sqlFetch);
    if (!$queryFetch) {
      echo "Error : " . mysqli_error($this->conn);
      exit();
    }

    return $this->stmt = mysqli_fetch_assoc($queryFetch);
  }
}

// $db = new Database();
// $sql = "SELECT * FROM workplace";
// echo $db->hitungJumlah($sql);
// var_dump($db->fetchData("SELECT nm_lengkap FROM users"));
