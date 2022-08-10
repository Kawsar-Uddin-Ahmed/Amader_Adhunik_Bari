<?php

include "config.php";

?>

<?php

class database
{
  public $host = DB_HOST;
  public $user = DB_USER;
  public $pass = DB_PASS;
  public $name = DB_NAME;
  public $link;
  public $error;

  public function __construct()
  {
    $this->connectDB();
  }

  private function connectDB()
  {
  	$this->link = new mysqli($this->host,$this->user,$this->pass,$this->name);
  	if(!($this->link))
  	{
  		$this->error = "Connection failed......".$this->link->connect_error;
  		return false;
  	}
  }

  /*---------For selection of database------*/
  public function select($search)
  {
  	$result = $this->link->query($search) or die($this->link->error.__LINE__);
  	if($result->num_rows>0) /*Here nums_rows>0 means the row is not empty.It is used to check where the data row is empty or not*/
  	{
  		return $result;
  	}
  	else
  	{
  		return false;
  	}
  }

/*------------------------------------------------------*/

/*------------For inserting in database-----------*/
 
 public function insert($inserting)
 {
 	$insert_row = $this->link->query($inserting) or die($this->link->error.__LINE__);
 	if($insert_row)
 	{
        return $insert_row;
 	}
 	else
 	{
 		return false;
 	}
 }

 /*----------------------------------------------------*/

/*---------------Updating row----------------------*/
 public function update($updating)
 {
 	$update_row = $this->link->query($updating) or die($this->link->error.__LINE__);
 	if($update_row)
 	{
 		return $update_row;
 	}
 	else
 	{
 		return false;
 	}
 }

 /*-------------------------------------*/

 /*------------Deleting row------------*/

 public function delete($deleting)
 {
 	$delete_row = $this->link->query($deleting) or die($this->link->error.__LINE__);
 	if($delete_row)
 	{
 		return $delete_row;
 	}
 	else
 	{
 		return false;
 	}
 }
}

?>