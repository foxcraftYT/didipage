<?php 
session_start();
if ($_SESSION) {
  header("location: ../home");
}else {
  session_destroy();
}
?>