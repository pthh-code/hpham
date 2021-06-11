<?php
//**************************************************
// File name: delete.php
//Description: Function for delete record of a customer
//
//**************************************************
  include_once ('inc/header.php');
  include 'classes/Customer.php';
  $cust = new Customer();
  if($_GET['custId'])
  {
  	$id = $_GET['custId'];
  	$cust->delCustById($id);

  header("Refresh:0; url=dashboard.php"); 
  }


?>
