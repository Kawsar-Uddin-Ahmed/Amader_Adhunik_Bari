<?php
 include "../lib/Session.php";
 Session::checkLogin();
 include "../lib/database.php";
 include"../format/format.php";
  //Session::init();//Starting the session here.*/
  //Session::CheckLogin();/*for login also you can use this with out using init() from Session class.and when you are logged in you cannot go to the admin login page with out logout*/
class adminlogin
{
  private $db;
  private $fm;
  
  public function __construct()
  {
  	$this->db = new database();
  	$this->fm = new format();
  }
  public function logadmin($adminuser,$adminpass)//For login.php
  {
    $name = $this->fm->validation($adminuser);
    //$name = mysqli_real_escape_string($this->db->link,$name);

    $pass = $this->fm->validation($adminpass);
    //$pass = mysqli_real_escape_string($this->db->link,$pass);

    if(empty($name) || empty($pass))
    {
    	$msg = "Please enter the name and password.";
    	return $msg; 
    }
    else
    {
       $query = "SELECT * FROM tbl_admin WHERE name = '$name'AND password = '$pass'";
    	$result = $this->db->select($query);

    	if($result != false)
    	{
    		$value = $result->fetch_assoc();
          Session::set("login",true);/*From checkLogin()*/
          /*Form set().If you do not set() here value than you cannot get() means catch the value any where*/
          Session::set("admin_id",$value['admin_id']);
          Session::set("name",$value['name']);
          //Session::set("adminName",$value['adminName']);
          header("Location:adminindex.php");   
     }
     else
     {
      $msg= "<span style='color:red'> Name or Password not matched !</span>";
            return $msg;
     }
    }

  }
 
 
}


?>