
<!----------This is connected to profile.php---------->

<?php

include "lib/database.php";

include "format/format.php";
?>

<?php
class userprofile
{
	private $db;

	private $fm;
 public function __construct()
 {
 	$this->db = new database();
 	$this->dm = new format();
 }
/*----------For showing the user profile---Connected to profile.php-----*/
public function showprofile($id)

{
  //$query = "SELECT tbl_user.*,gender.gender_name FROM tbl_user
            //INNER JOIN gender 
            //ON tbl_user.gender = gender.gid WHERE user_id = $id";
  $query = "SELECT * FROM tbl_owner WHERE owner_id = '$id'";
  $result = $this->db->select($query);

  return $result;
}

public function showprofilerenter($id)

{
  //$query = "SELECT tbl_user.*,gender.gender_name FROM tbl_user
            //INNER JOIN gender 
            //ON tbl_user.gender = gender.gid WHERE user_id = $id";
  $query = "SELECT * FROM tbl_renter WHERE renter_id = '$id'";
  $result = $this->db->select($query);

  return $result;
}

public function usergender()
  {
    $query = "SELECT * FROM gender";
    $quer = $this->db->select($query);
    return $quer;
  }
public function usertitle()
  {
    $query = "SELECT * FROM title";
    $quer = $this->db->select($query);
    return $quer;
  }
/*------------------------------------------------------------------*/

/*-------For updating editprofile.php---------*/

public function updateprofile($data,$files,$id)
{
  $Name = mysqli_real_escape_string($this->db->link,$data['name']);
  $Gender = mysqli_real_escape_string($this->db->link,$data['gender']);
  //$VoterID = mysqli_real_escape_string($this->db->link,$data['voterid']);
  $Proffesion = mysqli_real_escape_string($this->db->link,$data['proff']);
  $Company = mysqli_real_escape_string($this->db->link,$data['company']);
  $Number = mysqli_real_escape_string($this->db->link,$data['number']);
  //$Title =  mysqli_real_escape_string($this->db->link,$data['title']);
    if(strlen($Number)>11)
    {
       $mg = "<span style='color:red'>Please put the correct mobile number..</span>";
       return $mg;
    }
    elseif(strlen($Number)<11)
    {
       $mg = "<span style='color:red'>Please put the correct mobile number..</span>";
       return $mg;
    }
    elseif(preg_match('/^[0-9]*$/',$Number))
    {
      $ph = mysqli_real_escape_string($this->db->link,$Number);
    }
    else
    {
       $mg = "<span style='color:red'>Only numbers in mobile numbers..</span>";
       return $mg;
     }
  $Email = mysqli_real_escape_string($this->db->link,$data['email']);
  $E = filter_var($Email,FILTER_VALIDATE_EMAIL);
  if(filter_var($E,FILTER_SANITIZE_EMAIL))
  {
    $email = mysqli_real_escape_string($this->db->link,$E);
  }
  else
    {
       $mg = "This email address is invalid.";
       return $mg;
      
    }
  $Flat_no = mysqli_real_escape_string($this->db->link,$data['flat_no']);
  $Flat_code = mysqli_real_escape_string($this->db->link,$data['flat_code']);
  //$Password = mysqli_real_escape_string($this->db->link,md5($data['pass']));
  $State =  mysqli_real_escape_string($this->db->link,$data['state']);
  $permitted = array('jpg','png','jpeg','gif');

  $file_name = $files['image']['name'];
  $file_size = $files['image']['size'];
  $file_tmp = $files['image']['tmp_name'];
  
  $div = explode('.',$file_name);

  $file_extensions = strtolower(end($div));

     //Creating a unique name//

     $unique_name = substr(md5(time()),0,5).'.'.$file_extensions;

     $uploaded_image = "image/".$unique_name;
   /*----------------------------------------------------------*/
  
   if(empty($Name) || empty($Gender)|| empty($Proffesion) || empty($Company) || empty($Number) || empty($email) || empty($Flat_no)|| empty($Flat_code) || empty($uploaded_image))
   {
      $msg = "<span  style='color:red'>Field must be filled....</span>";
      return $msg;
   }
   else
   {
     if (!empty($file_name)) 
            {            
                /*if ($file_size >1048567) 
                {
                     echo "<span style='color:red'>Image Size should be less then 5MB!</span>";
                     //return $msg;
                } */
                if (in_array($file_extensions, $permitted) === false) 
                {
                     $msg = "<span style='color:red'>You can upload only:-".implode(', ', $permitted)."</span>";
                     return $msg;
                }
              else{
                /*$mailquery = "SELECT * FROM tbl_user WHERE email='$email' LIMIT 1";
               $mailquer = $this->db->select($mailquery);
               $voterquery = "SELECT * FROM tbl_user WHERE voterid='$VoterID' LIMIT 1";
               $voterquer = $this->db->select($voterquery);

                 if($mailquer != false)
                   {
                      echo "<span class='error'>This email already remains..</span>";
                   }
                  elseif($voterquer != false)
                      {
                      echo "<span class='error'>This voter id already remains..</span>";
                      }*/
                 /*else
                 {*/
                  move_uploaded_file($file_tmp, $uploaded_image);
                  /*$updating = "UPDATE tbl_user
                 SET
                 name='$Name',
                 gender='$Gender',
                 voterid='$VoterID',
                 proff='$Proffesion',
                 company='$Company',
                 number='$Number',
                 email='$email',
                 title='$Title',
                 Flat_no='$Flat_no',
                 image='$uploaded_image'
                 WHERE user_id='$id";*/
                $query="UPDATE tbl_owner
                            SET
                            name='$Name', 
                            gender='$Gender',  
                            proff='$Proffesion', 
                            company='$Company', 
                            number='$Number',
                            email='$email',
                            flat_no='$Flat_no',
                            flat_code='$Flat_code',
                            state='$State',
                            image='$uploaded_image'
                            WHERE owner_id='$id' "; 
               $updated_row=$this->db->update($query);
               if ($updated_row) 
               {
                  $msg= "<span style='color:green'>User updated succesfully </span>";
                return $msg;
               }
               else 
               {
                  $msg= "<span  style='color:green'>User updated Failed</span>";
                  return $msg;
              }          
   //}
           }
         }
      else/*Without updating image*/
      {
            $updating="UPDATE tbl_owner
                        SET
                        name='$Name', 
                        gender='$Gender',  
                        proff='$Proffesion', 
                        company='$Company', 
                        number='$Number',
                        email='$email',
                        flat_no='$Flat_no',
                        flat_code='$Flat_code',
                        state='$State'
                        WHERE owner_id='$id'";
    $updated_row=$this->db->update($updating);
            if ($updated_row) 
            {
                $msg= "<span style='color:green'>User updated succesfully </span>";
                return $msg;
            }
            else 
            {
                $msg= "<span style='color:red'>User updated Failed</span>";
                return $msg;
            }          
}

}
}

public function updateprofilerenter($data,$files,$id)
{
  $Name = mysqli_real_escape_string($this->db->link,$data['name']);
  $Gender = mysqli_real_escape_string($this->db->link,$data['gender']);
  //$VoterID = mysqli_real_escape_string($this->db->link,$data['voterid']);
  $Proffesion = mysqli_real_escape_string($this->db->link,$data['proff']);
  $Company = mysqli_real_escape_string($this->db->link,$data['company']);
  $Number = mysqli_real_escape_string($this->db->link,$data['number']);
  //$Title =  mysqli_real_escape_string($this->db->link,$data['title']);
  if(strlen($Number)>11)
    {
       $mg = "<span style='color:red'>Please put the correct mobile number..</span>";
       return $mg;
    }
    elseif(strlen($Number)<11)
    {
       $mg = "<span style='color:red'>Please put the correct mobile number..</span>";
       return $mg;
    }
    elseif(preg_match('/^[0-9]*$/',$Number))
    {
      $ph = mysqli_real_escape_string($this->db->link,$Number);
    }
    else
    {
       $mg = "<span style='color:red'>Only numbers in mobile numbers..</span>";
       return $mg;
     }
  $Email = mysqli_real_escape_string($this->db->link,$data['email']);
  $E = filter_var($Email,FILTER_VALIDATE_EMAIL);
  if(filter_var($E,FILTER_SANITIZE_EMAIL))
  {
    $email = mysqli_real_escape_string($this->db->link,$E);
  }
  else
    {
       $mg = "This email address is invalid.";
       return $mg;
      
    }
  $Flat_no = mysqli_real_escape_string($this->db->link,$data['flat_no']);
  $Flat_code = mysqli_real_escape_string($this->db->link,$data['flat_code']);
  //$Password = mysqli_real_escape_string($this->db->link,md5($data['pass']));
  $State =  mysqli_real_escape_string($this->db->link,$data['state']);
  $permitted = array('jpg','png','jpeg','gif');

  $file_name = $files['image']['name'];
  $file_size = $files['image']['size'];
  $file_tmp = $files['image']['tmp_name'];
  
  $div = explode('.',$file_name);

  $file_extensions = strtolower(end($div));

     //Creating a unique name//

     $unique_name = substr(md5(time()),0,5).'.'.$file_extensions;

     $uploaded_image = "image/".$unique_name;
   /*----------------------------------------------------------*/
  
   if(empty($Name) || empty($Gender)|| empty($Proffesion) || empty($Company) || empty($Number) || empty($email) || empty($Flat_no)|| empty($Flat_code) || empty($uploaded_image))
   {
      $msg = "<span  style='color:red'>Field must be filled....</span>";
      return $msg;
   }
   else
   {
     if (!empty($file_name)) 
            {            
                /*if ($file_size >1048567) 
                {
                     echo "<span style='color:red'>Image Size should be less then 5MB!</span>";
                     //return $msg;
                } */
                if (in_array($file_extensions, $permitted) === false) 
                {
                     $msg = "<span style='color:red'>You can upload only:-".implode(', ', $permitted)."</span>";
                     return $msg;
                }
              else{
                /*$mailquery = "SELECT * FROM tbl_user WHERE email='$email' LIMIT 1";
               $mailquer = $this->db->select($mailquery);
               $voterquery = "SELECT * FROM tbl_user WHERE voterid='$VoterID' LIMIT 1";
               $voterquer = $this->db->select($voterquery);

                 if($mailquer != false)
                   {
                      echo "<span class='error'>This email already remains..</span>";
                   }
                  elseif($voterquer != false)
                      {
                      echo "<span class='error'>This voter id already remains..</span>";
                      }*/
                 /*else
                 {*/
                  move_uploaded_file($file_tmp, $uploaded_image);
                  /*$updating = "UPDATE tbl_user
                 SET
                 name='$Name',
                 gender='$Gender',
                 voterid='$VoterID',
                 proff='$Proffesion',
                 company='$Company',
                 number='$Number',
                 email='$email',
                 title='$Title',
                 Flat_no='$Flat_no',
                 image='$uploaded_image'
                 WHERE user_id='$id";*/
                $query="UPDATE tbl_renter
                            SET
                            name='$Name', 
                            gender='$Gender',  
                            proff='$Proffesion', 
                            company='$Company', 
                            number='$Number',
                            email='$email',
                            flat_no='$Flat_no',
                            flat_code='$Flat_code',
                            state='$State',
                            image='$uploaded_image'
                            WHERE renter_id='$id' "; 
               $updated_row=$this->db->update($query);
               if ($updated_row) 
               {
                  $msg= "<span style='color:green'>User updated succesfully </span>";
                return $msg;
               }
               else 
               {
                  $msg= "<span  style='color:green'>User updated Failed</span>";
                  return $msg;
              }          
   //}
           }
         }
      else/*Without updating image*/
      {
            $updating="UPDATE tbl_renter
                        SET
                        name='$Name', 
                        gender='$Gender',  
                        proff='$Proffesion', 
                        company='$Company', 
                        number='$Number',
                        email='$email',
                        flat_no='$Flat_no',
                        flat_code='$Flat_code',
                        state='$State'
                        WHERE renter_id='$id'";
    $updated_row=$this->db->update($updating);
            if ($updated_row) 
            {
                $msg= "<span style='color:green'>User updated succesfully </span>";
                return $msg;
            }
            else 
            {
                $msg= "<span style='color:red'>User updated Failed</span>";
                return $msg;
            }          
}

}
}
}
?>