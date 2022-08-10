<?php

include "../lib/database.php";
include "../format/format.php";

?>

<?php

class useradmin

{
	private $db;

	private $fm;

	public function __construct()
	{
		$this->db = new database();
		$this->fm = new format();
	}
 
 /*----For showing the owner list in the owner admin panel---------*/
	public function userlistshow()
	{
       /*$show = "SELECT tbl_user.*,gender.gender_name FROM tbl_user
                             INNER JOIN gender
                             ON gender.gid = tbl_user.gender ORDER BY tbl_user.user_id ASC";*/
        /*$show =  "SELECT tbl_user.*,gender.gender_name,title.title_name FROM tbl_user
            INNER JOIN gender
            ON tbl_user.gender = gender.gid
            INNER JOIN title
            ON tbl_user.title = title.title_id WHERE title=1 AND permit=0 ORDER BY tbl_user.user_id ASC";*/

          $show = "SELECT * FROM tbl_owner WHERE title='Owner' AND permit=0 And pending = 0";

          $showing = $this->db->select($show);

         return $showing;
	}
  
 /*-----------For deleting the owner id from the admin panel---------*/

 public function userlistdelete($id)
 {
   /* $query = "SELECT * FROM tbl_user WHERE user_id='$id'";
    $getdata = $this->db->select($query);
    if($getdata)
    {
    	while($delimage=$getdata->fetch_assoc())
    	{
    		$imagelink = $delimage['image'];
    		unlink($imagelink);/*This code will delete the image from the folder*//*
    	}	
    }*/

    $sql = "DELETE tbl_owner,tbl_renter,tbl_upload,tbl_payment FROM tbl_owner
           LEFT OUTER JOIN tbl_renter ON tbl_owner.flat_code = tbl_renter.flat_code
           LEFT OUTER JOIN tbl_upload ON tbl_owner.flat_code = tbl_upload.flat_code
           LEFT OUTER JOIN tbl_payment ON tbl_owner.flat_code = tbl_payment.flat_code
          WHERE tbl_owner.flat_code='$id';";

    $delete_row = $this->db->delete($sql);
    if($delete_row)
    {
    	$msg = "<span class='success'>Data deleted Successfully.</span>";
      return $msg;
   }
   else
   {
   	"<span class='error'>Data not deleted.</span>";
   }
    }

  /*-----------For usershow.php--------------------*/

  public function usershowlistid($id)
  {
    $query = "SELECT * FROM tbl_owner WHERE owner_id='$id'";
    $quer = $this->db->select($query);

    return $quer;
  }

  public function usershowgender()
  {
    $query = "SELECT * FROM gender";

    $quer = $this->db->select($query);

    return $quer;
  }

  public function usershowtitle()
  {
    $query = "SELECT * FROM title";

    $quer = $this->db->select($query);

    return $quer;
  }

  public function usershowflat()
  {
    $query = "SELECT * FROM flat_no";
    $qq = $this->db->select($query);
    return $qq;
  }
/*-----------------------------------------------------------------*/

/*------------------For adding the code of the flat----*/

/*public function addcode($data,$files,$id)
{
  $Name = mysqli_real_escape_string($this->db->link,$data['name']);
  $Gender = mysqli_real_escape_string($this->db->link,$data['gender']);
  $VoterID = mysqli_real_escape_string($this->db->link,$data['voterid']);
  $Proffesion = mysqli_real_escape_string($this->db->link,$data['proff']);
  $Company = mysqli_real_escape_string($this->db->link,$data['company']);
  $Number = mysqli_real_escape_string($this->db->link,$data['number']);
  $Title =  mysqli_real_escape_string($this->db->link,$data['title']);
  $Email = mysqli_real_escape_string($this->db->link,$data['email']);
  if(filter_var($Email,FILTER_SANITIZE_EMAIL))
  {
    $email = mysqli_real_escape_string($this->db->link,$Email);
  }
  $Flat_no = mysqli_real_escape_string($this->db->link,$data['flat_no']);
  $Flat_co = mysqli_real_escape_string($this->db->link,$data['flat_code']);
  //$Password = mysqli_real_escape_string($this->db->link,md5($data['pass']));
  /*$permitted = array('jpg','png','jpeg','gif');

  $file_name = $files['image']['name'];
  $file_size = $files['image']['size'];
  $file_tmp = $files['image']['tmp_name'];
  
  $div = explode('.',$file_name);

  $file_extensions = strtolower(end($div));

     //Creating a unique name//

     $unique_name = substr(md5(time()),0,5).'.'.$file_extensions;

     $uploaded_image = "image/".$unique_name;*/
   /*----------------------------------------------------------*/
  
   /*if(empty($Name) || empty($Gender)|| empty($Proffesion) || empty($Company) || empty($Number) || empty($Title) || empty($email) || empty($Flat_no)|| empty($Flat_co))
   {
    echo "<span  style='color:red'>Field must be field....</span>";
   }
   else
   {
     /*if (!empty($file_name)) 
            {            
                if ($file_size >5048567) 
                {
                    echo "<span style='color:red'>Image Size should be less then 5MB!</span>";
                } 
                elseif (in_array($file_extensions, $permitted) === false) 
                {
                    echo "<span style='color:red'>You can upload only:-".implode(', ', $permitted)."</span>";
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
                 // move_uploaded_file($file_tmp, $uploaded_image);*/
                  /*
                $query="UPDATE tbl_user
                            SET
                            name='$Name', 
                            gender='$Gender', 
                            voterid='$VoterID', 
                            proff='$Proffesion', 
                            company='$Company', 
                            number='$Number',
                            email='$email',
                            title='$Title',
                            flat_no='$Flat_no',
                            flat_code='$Flat_co'
                            WHERE user_id='$id' "; 
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
     /* else/*Without updating image*//*
      {
            $updating="UPDATE tbl_user
                        SET
                        name='$Name', 
                        gender='$Gender',  
                        proff='$Proffesion', 
                        company='$Company', 
                        number='$Number',
                        title='$Title',
                        email='$email',
                        flat_no='$Flat_no',
                        flat_code='$Flat_co'
                        WHERE user_id='$id'";
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
}*/

/*----------This are for zones---*/
public function zonelist()
{
  $query = "SELECT * FROM zone_name";
  $qq = $this->db->select($query);
  return $qq;
}

/*---This is used to enter the new zone name is zone_name table---*/

public function newzonename($id)
{
  $add = $this->fm->validation($id['zonename']);
  $ddo = mysqli_real_escape_string($this->db->link,$add);
  if(empty($ddo))
  {
     $msg= "<span style='color:red'>Please fill it.</span>";
     return $msg;
  }
  $zquery = "SELECT * FROM zone_name WHERE zonename='$ddo' LIMIT 1";
  $zoquer = $this->db->select($zquery);
  if($zoquer != false)
  {
   $msg= "<span style='color:red'>This zone already inserted</span>";
   return $msg;
  }
  else 
  {
  $inserting = "INSERT INTO zone_name(zonename) VALUES('$ddo')";
  $inserted_row=$this->db->insert($inserting);
  if ($inserted_row) 
   {
        $msg= "<span style='color:green'>Zone inserted succesfully </span>";
         return $msg;
     }
     else 
    {
      $msg= "<span style='color:red'>Zone insertion Failed</span>";
                return $msg;
      }   
      }       
}

public function zonedel($id)
 {

    $sql = "DELETE FROM zone_name WHERE zoid='$id'";

    $delete_row = $this->db->delete($sql);
    if($delete_row)
    {
      $msg = "<span class='success'>Data deleted Successfully.</span>";
      return $msg;
   }
   else
   {
    "<span class='error'>Data not deleted.</span>";
   }
    }


  public function userblock($id)
  {
    $query = "UPDATE tbl_owner,tbl_renter SET tbl_owner.permit = '1',tbl_renter.permit = '1' WHERE tbl_owner.flat_code = tbl_renter.flat_code AND tbl_owner.flat_code='$id'";
    $quer = $this->db->update($query);

    return $quer;
  }
  public function userblockshow()
  {
       /*$show = "SELECT tbl_user.*,gender.gender_name FROM tbl_user
                             INNER JOIN gender
                             ON gender.gid = tbl_user.gender ORDER BY tbl_user.user_id ASC";
        $show =  "SELECT tbl_user.*,gender.gender_name,title.title_name FROM tbl_user
            INNER JOIN gender
            ON tbl_user.gender = gender.gid
            INNER JOIN title
            ON tbl_user.title = title.title_id WHERE title=1 AND permit=1 ORDER BY tbl_user.user_id ASC";*/
          $show = "SELECT * FROM tbl_owner WHERE title='Owner' AND permit=1";

        $showing = $this->db->select($show);

        return $showing;
  }

  public function userunblock($id)
  {
    $query = "UPDATE tbl_owner,tbl_renter SET tbl_owner.permit = '0',tbl_renter.permit = '0' WHERE tbl_owner.flat_code = tbl_renter.flat_code AND tbl_owner.flat_code='$id'";
    $quer = $this->db->update($query);

    return $quer;
  }
  public function pend()
  {
       /*$show = "SELECT tbl_user.*,gender.gender_name FROM tbl_user
                             INNER JOIN gender
                             ON gender.gid = tbl_user.gender ORDER BY tbl_user.user_id ASC";
        $show =  "SELECT tbl_user.*,gender.gender_name,title.title_name FROM tbl_user
            INNER JOIN gender
            ON tbl_user.gender = gender.gid
            INNER JOIN title
            ON tbl_user.title = title.title_id WHERE title=1 AND permit=1 ORDER BY tbl_user.user_id ASC";*/
          $show = "SELECT * FROM tbl_owner WHERE title='Owner' AND pending=1";

        $showing = $this->db->select($show);

       return $showing;
  }
  public function pendingaccount($id)
  {
    $query = "UPDATE tbl_owner SET pending = 0 WHERE owner_id='$id'";
    $quer = $this->db->update($query);

    return $quer;
  }
 }


?>