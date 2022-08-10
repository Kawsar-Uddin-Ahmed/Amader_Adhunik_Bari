
<?php
/*--------This is for registrationing the user-----*/
include "lib/database.php";
include "format/format.php";
include "lib/Session.php";
Session::init();
?>

<?php

class userdata

{
  private $db;
  private $fm;

  public function __construct()
  {
		$this->db = new database();
		$this->fm = new format();
 }

  public function userlogiin($data,$file)
  {

		$nn = $this->fm->validation($data['name']);
    $n = mysqli_real_escape_string($this->db->link,$nn);
  	/*----For gender-------------------*/
   /*if(isset($data['gender']))
   {
   	$g = mysqli_real_escape_string($this->db->link,$data['gender']);
   }
   else
   {
   	echo "<span class='error>Field must be field....</span>";
   }*/
   $gg = $this->fm->validation($data['gender']);
   $g = mysqli_real_escape_string($this->db->link,$gg);
   if($g == "Select gender")
   {
     $mg = "<span style='color:red'>Please select the gender..</span>";
       return $mg;
   }
  /*---------------------------------------------------------------*/

  /*--------------------For voterid verification-------------------*/
    $vi = $this->fm->validation($data['voterid']);
    if(strlen($vi)>10)
    {
       $mg = "<span style='color:red'>Please put the correct voterid..</span>";
       return $mg;
    }
    elseif(strlen($vi)<10)
    {
       $mg = "<span style='color:red'>Please put the correct voterid..</span>";
       return $mg;
    }
    else
    {
      if(preg_match('/^[0-9]*$/',$vi)){
      $vii = mysqli_real_escape_string($this->db->link,$vi);
    }
    else
    {
       $mg = "<span style='color:red'>Only numbers in voterid..</span>";
       return $mg;
     }
    }
    /*---------------------------------------------------------------*/

    $pp = $this->fm->validation($data['proff']);
  	$pr = mysqli_real_escape_string($this->db->link,$pp);
    $ss = $this->fm->validation($data['company']);
  	$ser = mysqli_real_escape_string($this->db->link,$ss);

   /*--------------------For voterid verification-------------------*/
    $pm = $this->fm->validation($data['number']);
    if(strlen($pm)>11)
    {
       $mg = "<span style='color:red'>Please put the correct mobile number..</span>";
       return $mg;
    }
    elseif(strlen($pm)<11)
    {
       $mg = "<span style='color:red'>Please put the correct mobile number..</span>";
       return $mg;
    }
    elseif(preg_match('/^[0-9]*$/',$pm))
    {
      $ph = mysqli_real_escape_string($this->db->link,$pm);
    }
    else
    {
       $mg = "<span style='color:red'>Only numbers in mobile numbers..</span>";
       return $mg;
     }
     /*---------------------------------------------------------------*/
    $emi = $this->fm->validation($data['email']);
  	$em = mysqli_real_escape_string($this->db->link,$emi);

  	/*-------For filtering the email-----*/
    $M = filter_var($em,FILTER_SANITIZE_EMAIL);
  	if(filter_var($M,FILTER_VALIDATE_EMAIL))
  	{
  		$Email = mysqli_real_escape_string($this->db->link,$M);

  	}
    else
    {
       $mg = "<span style='color:red'>This email address is invalid...</span>";
       return $mg;
      
    }
    /*----------------------------------------*/
    
    $ttit = $this->fm->validation($data['title']);
    $tit = mysqli_real_escape_string($this->db->link,$ttit);
    if($tit == "Select title")
    {
       $mg = "<span style='color:red'>Please select the title...</span>";
       return $mg;
    }
    
  	$pass = mysqli_real_escape_string($this->db->link,md5($data['pass']));
     if($pass < 8)
    {
      $msg = "<span style='color:red'>Password should be 8 character.</span>";
       return $msg;
    }

    $bn = $this->fm->validation($data['bname']);
    $bnn = mysqli_real_escape_string($this->db->link,$bn); 

    $ff = $this->fm->validation($data['flat_no']);
  	$fl = mysqli_real_escape_string($this->db->link,$ff); 
    $ffc = $this->fm->validation($data['flat_code']);
    $fcode = mysqli_real_escape_string($this->db->link,$ffc);
    $sst = $this->fm->validation($data['state']);
    $stat = mysqli_real_escape_string($this->db->link,$sst);

    $zz = $this->fm->validation($data['zone_name']);
    $zznm = mysqli_real_escape_string($this->db->link,$zz);

    $rr = $this->fm->validation($data['rent']);
    $rentee = mysqli_real_escape_string($this->db->link,$rr);

    $agg = $this->fm->validation($data['agreement']);
    $ag = mysqli_real_escape_string($this->db->link,$agg);
   /*---------For only image inserting in the database-----*/

    $permitted = array('jpg','png','jpeg','gif');

    //Catching through files//

    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_way = $file['image']['tmp_name'];

    ///For exploding the name of the file and take its extension only//

    $div = explode('.',$file_name);

    ///If file extension is capital letter it will be smaller here//

     $file_extensions = strtolower(end($div));

     //Creating a unique name//

     $unique_name = substr(md5(time()),0,5).'.'.$file_extensions;

     $uploaded_image = "image/".$unique_name;
   /*----------------------------------------------------------*/
  
   if(empty($n) || empty($ph) || empty($g) || empty($Email) || empty($pr) || empty($ser) || empty($vii) || empty($tit) || empty($fl) || empty($fcode) ||empty($bnn) || empty($zznm) || empty($rentee) || empty($ag) || empty($pass) || empty($file_name))
   {
   	$msg = "<span style='color:red'>Field must be filled....</span>";
    return $msg;
   }
   $mailquery = "SELECT * FROM tbl_renter WHERE email='$Email' LIMIT 1";
   $mailquer = $this->db->select($mailquery);
   $voterquery = "SELECT * FROM tbl_renter WHERE voterid='$vi' LIMIT 1";
   $voterquer = $this->db->select($voterquery);

   $flatquery = "SELECT * FROM tbl_renter WHERE flat_no='$fl' and flat_code='$fcode' and (title ='Renter' and status=0) LIMIT 1";/*status=0 is used if the owner send the renter in history*/
   $flatquer = $this->db->select($flatquery);

    $numberquery = "SELECT * FROM tbl_renter WHERE number='$ph' LIMIT 1";
   $numeberquer = $this->db->select($numberquery);

   /*$flatqueryt = "SELECT * FROM tbl_user WHERE flat_no='$fl' and title ='1' LIMIT 1";
   $flatquert = $this->db->select($flatquery);*/


   if($mailquer != false)
   {
   	$msg = "<span style='color:red'>This email already remains..</span>";
    return $msg;
   }
   elseif($voterquer != false)
   {
   	$msg = "<span style='color:red'>This voter id already remains..</span>";
    return $msg;
   }
   elseif($flatquer != false)
   {
    $msg = "<span style='color:red'>This flat is already rented..</span>";
    return $msg;
   }
   elseif($numeberquer != false)//this for owner not repeat two code
   {
    $msg = "<span style='color:red'>No repeatation of mobile number..</span>";
    return $msg;
   }
   /*elseif($flatquert != false)
   {
    $msg = "<span style='color:red'>This flat is already owned..</span>";
    return $msg;
   }*/
   elseif(!empty($file_name))
   {
    /* if Code is not working*/
    /*if($file_size>1048567)
     {
      echo "<span style='color:red'>File must be bellow than 1 MB</span>";
     }*/
    if(in_array($file_extensions,$permitted) === false)
     {
      $msg = "<span style='color:red'>File must be</span>".implode(',',$permitted);
      return $msg;
     }
     else{
   	      move_uploaded_file($file_way, $uploaded_image);
   

           $inserting = "INSERT INTO tbl_renter(name,gender,voterid,proff,company,number,email,title,pass,bname,flat_no,flat_code,zone_name,state,image,rent,agreement) VALUES('$n','$g','$vii','$pr','$ser','$ph','$Email','$tit','$pass','$bnn','$fl','$fcode','$zznm','$stat','$uploaded_image','$rentee','$ag')";
            $inserted_row=$this->db->insert($inserting);
            if ($inserted_row) 
             {
                $msg= "<span style='color:white'>Renter Registration completed succesfully </span>";
                return $msg;
            }
            else 
            {
                $msg= "<span style='color:red'>User Registration Inserted Failed</span>";
                return $msg;
            }          
   }
 }
	}
  /*--------For flat number ----------------?*/
  /*public function flatnumber()
  {
    $query = "SELECT * FROM flat_no";
    $que = $this->db->select($query);
    return $que;
  }*/
  /*--------Showing the gender--For userregistration.php---------*/

  /*public function gender()
  {
    $query = "SELECT * FROM gender";
    $quer = $this->db->select($query);
    return $quer;
  }*/

  /*-------Showing the title of the user---for userregistration.php----*/

  /*public function title()
  {
    $query = "SELECT * FROM title WHERE title_id=2";
    $quer = $this->db->select($query);
    return $quer;
  }*/
    /*---------This is used for bringing the zone name from tbl_search and show it in the upload of the owner account-----*/
 public function zoning()
 {
   $query = "SELECT * FROM zone_name";
    $q = $this->db->select($query);
    return $q;
 }

 public function showselected($data)
 {
  $query = "SELECT * FROM tbl_upload where supid='$data'";
  $quer = $this->db->select($query);
  return $quer;
 }
}

?>