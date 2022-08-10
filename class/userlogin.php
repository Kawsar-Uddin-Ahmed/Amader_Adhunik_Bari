<?php
/*----------This connected to login.php of user only----*/
include "lib/database.php";

include "lib/Session.php";
Session::checkLogin();
include "format/format.php";

?>

<?php

class userlogin
{
	private $db;
	private $fm;
public function __construct()
{
	$this->db= new database();
	$this->fm = new format();
}

/*----------------For userslogin in login.php-------------------*/

public function userloged($em,$pass)

{
	$emai = $this->fm->validation($em);
    $email = mysqli_real_escape_string($this->db->link,$emai);
	$password = mysqli_real_escape_string($this->db->link,$pass);

    /*-----For not approved users----*/

    if(empty($email) || empty($password))
    {
    	echo "<span class='error>Field must be filled....</span>";
    }
    else
    {
    $query1 = "SELECT * FROM tbl_owner WHERE email='$email' AND pass='$password' AND permit=0 AND status = 0 AND pending = 1";
     $result1 = $this->db->select($query1);
     if($result1 !=false)
     {
            $msg= "<span style='color:red'>Still not approved !</span>";
            return $msg;  
     }
     }
     /*---------------------------------------------------*/
     if(empty($email) || empty($password))
    {
        echo "<span class='error>Field must be filled....</span>";
    }
    else{
     $query = "SELECT * FROM tbl_owner WHERE email='$email' AND pass='$password' AND permit=0 AND status = 0 AND pending = 0";

     $result = $this->db->select($query);

     if($result !=false)
     {
     	$value = $result->fetch_assoc();
     	Session::set('login',true);
     	Session::set('owner_id',$value['owner_id']);
     	Session::set('voterid',$value['voterid']);
     	Session::set('name',$value['name']);
     	Session::set('pass',$value['pass']);
        Session::set('image',$value['image']);
        Session::set('email',$value['email']);
        Session::set('flat_code',$value['flat_code']);
        Session::set('state',$value['state']);
        Session::set('flat_no',$value['flat_no']);
        //Session::set('title',$value['title']);
     	header("Location:index.php");
     }
     else
     {
        $msg= "<span style='color:red'> Email or Password not matched !</span>";
            return $msg;
     }
      
}
}

}

?>