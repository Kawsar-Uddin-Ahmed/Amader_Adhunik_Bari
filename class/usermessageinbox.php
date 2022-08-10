<?php
include "lib/database.php";
include "format/format.php";

?>

<?php

class usermessageinbox
{
	private $db;

	private $fm;

	public function __construct()
	{
		$this->db = new database();
		$this->fm = new format();
	}

	public function showspecificmsg($email)
	{
		$query = "SELECT * FROM tbl_contact WHERE email='$email' AND status = 0";
		$result = $this->db->select($query);
		if($result == false)
		{
			echo "No message..";
		}
		return $result;
	}
	public function deletemsg($id)
	{
		$q = "DELETE FROM tbl_contact WHERE tcon_id='$id'";
		$re = $this->db->delete($q);
		if($re)
		{
			echo "Deleted successfully";
		}
		else
		{
			echo "Not deleted....";
		}
	}

 /*-----This is for showing the message in details....showmail.php----*/
    
    public function showthemail($id)
    {
    	$query = "SELECT * from tbl_contact WHERE tcon_id='$id'";
    	$q = $this->db->select($query);
    	return $q;
    }

  /*---------This for showing the file if it is there---*/
    /*public function showfile($id)
    {
    	$query = "SELECT file from msg_table WHERE mid='$id'";
    	$q = $this->db->select($query);
    	return $q;
    }*/
  
  /*------This is for the message that are already seen--*/
  public function sawmail($id)
  {
  	$query = "UPDATE tbl_contact SET status ='1' WHERE tcon_id='$id'";
  	$qq = $this->db->update($query);
  }
  public function sawseenmail($id)
  {
  	$query = "SELECT * FROM tbl_contact WHERE email='$id' AND status ='1'";
  	$qq = $this->db->select($query);
  	return $qq;
  }
 /*-------------------------------------------------------------*/
}

?>