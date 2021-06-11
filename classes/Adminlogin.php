<?php 
//************************************************************************
//File name: Adminlogin.php
//Description: Implement login function in accessing database to compare user
// information and username and password and also perform validation it
//************************************************************************
include_once('lib/Session.php');
include_once ('lib/Database.php');
  Session::checkLogin();
include_once ('helpers/Format.php');


/**
 * Adminlogin class
 */
class Adminlogin
{
	private $db;
	private $fm;
    public function __construct()
    {
    	$this->db = new Database();
    	$this->fm = new Format();
        
    }
    public function adminlogin($adminUser, $adminPass)
    {
    	$adminUser = $this->fm->validation($adminUser);
    	$adminPass = $this->fm->validation($adminPass);
    	$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
    	$adminPass = mysqli_real_escape_string($this->db->link, $adminPass);
    	if(empty($adminUser)||empty($adminPass))
    	{
    		$loginmsg = "Username or Password is empty";
    		return $loginmsg;
    	}
    	else
    	{
    	    $this->db = new Database();
    		$query = "select * from tlb_admin where  adminUser='$adminUser' and adminPass='$adminPass'";
            //echo $query;
    		$result = $this->db->select($query);
    		if($result != false)
    		{
    			$value = $result->fetch_assoc();
    			Session::set("adminlogin", true);
    			Session::set("adminId", $value['adminId']);
    			Session::set("adminUser", $value['adminUser']);
    			Session::set("adminName", $value['adminName']);
    			header("Location:dashboard.php");
    		}
    		else
    		{
    			$loginmsg = "Password is not match.";
    			return $loginmsg ;
    		}
    	}

    }
}
?>