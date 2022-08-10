
<!------This file is connected to the ownerdetails.php and renterdetails.php------->

<?php

include "lib/database.php";
include "format/format.php";

?>

<?php

class ownerrenterdetails

{
    private $db;

	private $fm;
 public function __construct()
 {
 	$this->db = new database();
 	$this->dm = new format();
 }
/*-------------------This for detecting the owner in client side------*/

public function owner($id)
{
	/*/$fa = mysqli_real_escape_string($this->db->link,$flat['flat_no'])
	/$query = "SELECT * FROM tbl_user WHERE title=1 AND flat_no = 1";
	$qq = $this->db->select($query);
	return $qq;*/
	/*$query = "SELECT tbl_user.*,flat_no.Flat_name FROM tbl_user
            INNER JOIN flat_no 
            ON tbl_user.flat_no = flat_no.Flat_id WHERE title = 1 AND flat_code = '$id'";*/
     /*$query =  "SELECT tbl_user.*,gender.gender_name,title.title_name FROM tbl_user
            INNER JOIN gender
            ON tbl_user.gender = gender.gid
            INNER JOIN title
            ON tbl_user.title = title.title_id WHERE title = 1 AND flat_code = '$id'";*/
  $query = "SELECT * FROM tbl_owner WHERE title= 'Owner' AND flat_code = '$id'";
  $result = $this->db->select($query);

  return $result;
    
}
/*---------------------------------------------------------------*/
/*---------This for showing the renter details in client side----*/
public function renter($id)
{
	/*$q = "SELECT tbl_user.*,gender.gender_name,title.title_name FROM tbl_user
            INNER JOIN gender
            ON tbl_user.gender = gender.gid
            INNER JOIN title
            ON tbl_user.title = title.title_id WHERE title = 2 AND flat_code = '$id' and status = 0";*/
    $q = "SELECT * FROM tbl_renter WHERE title='Renter' AND flat_code='$id' AND status = 0";
  $result = $this->db->select($q);

  return $result;
}

/*---For deleting the renter means it will be in history---*/

 public function transferhistory($id)
 {
  $query = "UPDATE tbl_renter SET status='1' WHERE renter_id='$id' and title = 'Renter'";
  $q = $this->db->update($query);
 }
/*------------------------------------------------------------*/
/*------For showing in the history------------*/
 public function rentertwo($id)
 {
   /*$q = "SELECT tbl_user.*,gender.gender_name,title.title_name FROM tbl_user
            INNER JOIN gender
            ON tbl_user.gender = gender.gid
            INNER JOIN title
            ON tbl_user.title = title.title_id WHERE title = 2 AND flat_code = '$id' and status = 1";*/
   $q = "SELECT * FROM tbl_renter WHERE title='Renter' AND flat_code='$id' AND status = 1";
  $result = $this->db->select($q);

  return $result;
 }
 /*----------------------------------------------*/
 /*------For deleting in the history------------*/

public function renterdelete($id)
{
  $sq = "DELETE FROM tbl_renter WHERE renter_id = '$id' and title = 'Renter'";
  $sqll = $this->db->delete($sq);
  if($sqll)
    {
      $msg = "<span class='success'>History deleted Successfully.</span>";
      return $msg;
   }
   else
   {
    "<span class='error'>History not deleted.</span>";
   }
}
/*-----------------------------------------------------------*/
}
?>