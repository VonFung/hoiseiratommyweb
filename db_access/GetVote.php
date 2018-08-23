<?php
  $database = include('config.php');

  $conn = mysql_connect($database['host'], $database['username'], $database['password'], $database['database']) or die('Error with MySQL connection');
  mysql_query("SET NAMES 'utf8'");
  $sql = "SELECT * FROM musiclist WHERE CODE LIKE '%OR%'";
  $result = mysql_query($sql) or die('MySQL query error');
  $rows = array();
  while($r = mysqli_fetch_assoc($result)) {
      $rows[] = $r;
  }
  echo json_encode($rows);
?>
