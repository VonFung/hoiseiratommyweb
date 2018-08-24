<?php
  $database = include('config.php');
  $expire = $_POST["expire"];

  $conn = mysql_connect($database['host'], $database['username'], $database['password']) or die('Error with MySQL connection');
  mysql_query("SET NAMES 'utf8'");
  mysql_select_db($database['database']);
  $sql = "SELECT id, TITLE, DESCRIPTION FROM vote WHERE HIDED = FALSE";
  if(!$expire) {
    $sql += " AND EXPIRE_DATE >= DATE(CURDATE())";
  }
  $sql += " ORDER BY ID DESC";
  $result = mysql_query($sql) or die('MySQL query error');
  $rows = array();
  while($r = mysql_fetch_assoc($result)) {
      $rows[] = $r;
  }
  echo json_encode($rows);
?>
