<!---------------This page is used for uploadsearchengine.php.So that owner can upload the flat add in search engine----------->
<?php

include "lib/database.php";
include "format/format.php";
?>

<?php

class searchuploadowner
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new database();
		$this->fm = new format();
	}

  public function inserting($data,$file)
  {
  	$a = $this->fm->validation($data['bname']);
  	$ab = mysqli_real_escape_string($this->db->link,$a);

  	$b = $this->fm->validation($data['ownername']);
  	$bb = mysqli_real_escape_string($this->db->link,$b);

  	$c = $this->fm->validation($data['flat_no']);
  	$C = mysqli_real_escape_string($this->db->link,$c);

  	$r = $this->fm->validation($data['room']);
  	$ar = mysqli_real_escape_string($this->db->link,$r);

  	$s = $this->fm->validation($data['address']);
  	$sa = mysqli_real_escape_string($this->db->link,$s);

  	$con = $this->fm->validation($data['contact']);
  	$cont = mysqli_real_escape_string($this->db->link,$con);

    $cod = $this->fm->validation($data['flat_code']);
    $codde = mysqli_real_escape_string($this->db->link,$cod);

  	$za = $this->fm->validation($data['zone_name']);
  	$zb = mysqli_real_escape_string($this->db->link,$za);
    
    $agg = $this->fm->validation($data['agreement']);
    $ag =  mysqli_real_escape_string($this->db->link,$agg);

    $rr = $this->fm->validation($data['rent']);
    $renr = mysqli_real_escape_string($this->db->link,$rr);

     $permitted = array('jpg','png','jpeg','gif');

    //Catching through files//

    $file_name = $file['img']['name'];
    $file_size = $file['img']['size'];
    $file_way = $file['img']['tmp_name'];

    ///For exploding the name of the file and take its extension only//

    $div = explode('.',$file_name);

    ///If file extension is capital letter it will be smaller here//

     $file_extensions = strtolower(end($div));

     //Creating a unique name//

     $unique_name = substr(md5(time()),0,5).'.'.$file_extensions;

     $uploaded_image = "images/".$unique_name;

  	if(empty($ab)||empty($bb)||empty($C)||empty($ar)||empty($sa)||empty($cont)||empty($codde)||empty($zb)||empty($ag)||empty($renr)||empty($file_name))
  	{
  		 $msg = "<span style='color:red'>Please!Fill up every data wanted</span>";
       return $msg;
  	}
  /*----Not to upload in search engine same flat two times----------*/
    $codequery = "SELECT * FROM tbl_upload WHERE flat_code='$codde' LIMIT 1";
    $cquer = $this->db->select($codequery);
    $fn = "SELECT * FROM tbl_upload WHERE flat_no='$C' LIMIT 1";
    $fquer = $this->db->select($fn);

    if(($cquer && $fquer)!=false)
    {
      $msg = "<span style='color:red'>This is already uploaded..</span>";
    return $msg;
    }
  /*-------------------------------------------------------------------------*/
  	else
  	{
      move_uploaded_file($file_way, $uploaded_image);
  		$query = "INSERT INTO tbl_upload(bname,ownername,flat_no,room,address,contact,flat_code,zone_name,agreement,img,rent) VALUES('$ab','$bb','$C','$ar','$sa','$cont','$codde','$zb','$ag','$uploaded_image','$renr')";
  		$sql = $this->db->insert($query);
  		if($sql)
  		{
  			$msg =  "<span style='color:green'>Send to admin successfully...</span>";
  			return $msg;
  		}
  		else
  		{
  			$msg =  "<span style='color:red'>Not sended to admin...</span>";
  			return $msg;
  		}
  	}

  }

 /*---------This is used for bringing the zone name from zone_name and show it in the upload of the owner account-----*/
 public function zoning($id)
 {
 	 $query = "SELECT zone_name FROM tbl_owner WHERE owner_id='$id'";
    $q = $this->db->select($query);
    return $q;
 }

 

}