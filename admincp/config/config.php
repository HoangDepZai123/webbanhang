<?php
$mysqli = new mysqli("localhost","root","","webbanhang");

// Check connection
if ($mysqli->connect_errno) {
  echo "Ket noi loi " . $mysqli -> connect_error;
  exit();
}

?>