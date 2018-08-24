<?php
  $database = include('config.php');
  $title = $_POST["title"];
  $expire_date = $_POST["expire_date"];
  $create_user_id = $_POST["create_user_id"];
  $has_max_vote = isset($_POST["max_vote"]) && !empty($_POST["max_vote"]);
  
  $conn = mysql_connect($database['host'], $database['username'], $database['password']) or die('Error with MySQL connection');
  mysql_query("SET NAMES 'utf8'");
  mysql_select_db($database['database']);
  $sql = "INSERT INTO vote (TITLE, ";
  if($has_max_vote) {
    $sql .= "MAX_VOTE, ";
  }
  $sql .= "EXPIRE_DATE, CREATE_USER_ID) VALUES ('" . $title . ", ";
  if($has_max_vote) {
    $sql .= $_POST["max_vote"] . ", ";
  }
  $sql .= "'" . $expire_date . "', " . $create_user_id . ")";
  
  $result = mysql_query($sql) or die('MySQL query error');
  if($result) {
    echo "success";
  } else {
    echo "Something error";
  }
?>
