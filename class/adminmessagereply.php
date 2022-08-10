<!----It is not admin panel it is used for owner renter messsage reply -->
<?php
 include "lib/database.php";
 include"format/format.php";

 class adminmessagereply

 {
 	private $db;
    private $fm;
  
  public function __construct()
  {
  	$this->db = new database();
  	$this->fm = new format();
  }

  /*public function replyanswer($data,$fil)
  {
  	  $em = $this->fm->validation($data['email']);
      $Mail = mysqli_real_escape_string($this->db->link,$em);
      $msg = $this->fm->validation($data['message']);
      $Msg = mysqli_real_escape_string($this->db->link,$msg);
      //$ID = mysqli_real_escape_string($db->link,$_POST['user_id']);
      
      $permitted = array('pdf','docx','txt','png');

      $file_name = $fil['file']['name'];
      $file_size = $fil['file']['size'];
      $file_way  = $fil['file']['tmp_name'];

      $div = explode('.',$file_name);
      $file_extension = strtolower(end($div));
      $unique_name = substr(md5(time()),0,5).'.'.$file_extension;
      $File = "important/".$unique_name;

      if(empty($Mail) || empty($Msg) || empty($File))
      {
        echo "<span style='color:red'>Mail,Message or file option is not fill.</span>";
      }
      /*if($file_size>1048567)
        {
            echo "<span style='color:red'>File Should be less than 1MB</span>","<br>";
        }*/
      /*elseif(empty($file_name))
        {
           $query = "INSERT INTO msg_table(email,message) VALUES('$Mail','$Msg')";
            $result = $this->db->insert($query);
            if($result)
            {
               echo "<span style='color:green'>Message sent successfully with out file.</span>";
             }
            else
             {
                 echo "<span style='color:red'>Message is not sent with out file</span>";
              }
        }*/
       /*elseif(!empty($file_name))
        {

           /*if($file_size>1048567)
            {
               echo "<span style='color:red'>File Should be less than 1MB</span>","<br>";
            }*/
          /*if(in_array($file_extension,$permitted) === false)
             {
              echo "<span class = 'error'>You can only include.".implode(',',$permitted)."</span>";
            }

        else 
        {

            move_uploaded_file($file_way,$File);
            $query = "INSERT INTO msg_table(email,message,file) VALUES('$Mail','$Msg','$File')";
            $result = $this->db->insert($query);
            if($result)
            {
               echo "<span style='color:green'>Message sent successfully.</span>";
             }
            else
             {
                 echo "<span style='color:red'>Message is not sent</span>";
              }
}
   }
  }*/

  public function contactanswer($data,$fil)
  {
      $em = $this->fm->validation($data['email']);
      $Mail = mysqli_real_escape_string($this->db->link,$em);
      $M = filter_var($Mail,FILTER_SANITIZE_EMAIL);
    if(filter_var($M,FILTER_VALIDATE_EMAIL))
    {
      $Email = mysqli_real_escape_string($this->db->link,$M);

    }
    else
    {
       $mg = "<span style='color:red'>This email address is invalid...</span>";
       return $mg;
      
    }
      $rem = $this->fm->validation($data['renemail']);
      $rMail = mysqli_real_escape_string($this->db->link,$rem);
      $Mm = filter_var($rMail,FILTER_SANITIZE_EMAIL);
    if(filter_var($Mm,FILTER_VALIDATE_EMAIL))
    {
      $Email = mysqli_real_escape_string($this->db->link,$Mm);

    }
    else
    {
       $mg = "<span style='color:red'>This email address is invalid...</span>";
       return $mg;
      
    }
      $msg = $this->fm->validation($data['message']);
      $Msg = mysqli_real_escape_string($this->db->link,$msg);
      //$stateid = mysqli_real_escape_string($this->db->link,$_POST['state']);
      
      $permitted = array('pdf','docx','txt','png');

      $file_name = $fil['file']['name'];
      $file_size = $fil['file']['size'];
      $file_way  = $fil['file']['tmp_name'];

      $div = explode('.',$file_name);
      $file_extension = strtolower(end($div));
      $unique_name = substr(md5(time()),0,5).'.'.$file_extension;
      $File = "important/".$unique_name;

      if(empty($Mail) || empty($Msg) || empty($rMail))
      {
        echo "<span style='color:red'>Field is not filled....</span>";
      }
      /*if($file_size>1048567)
        {
            echo "<span style='color:red'>File Should be less than 1MB</span>","<br>";
        }*/
      elseif(empty($file_name))
        {
           $query = "INSERT INTO tbl_contact(email,renemail,message) VALUES('$Mail','$rMail','$Msg')";
            $result = $this->db->insert($query);
            if($result)
            {
               echo "<span style='color:green'>Message sent successfully</span>";
             }
            else
             {
                 echo "<span style='color:red'>Message is not sent</span>";
              }
        }
       elseif(!empty($file_name))
        {

           /*if($file_size>1048567)
            {
               echo "<span style='color:red'>File Should be less than 1MB</span>","<br>";
            }*/
          if(in_array($file_extension,$permitted) === false)
             {
              echo "<span class = 'error'>You can only include.".implode(',',$permitted)."</span>";
            }

        else 
        {

            move_uploaded_file($file_way,$File);
            $query = "INSERT INTO tbl_contact(email,renemail,message,file) VALUES('$Mail','$rMail','$Msg','$File')";
            $result = $this->db->insert($query);
            if($result)
            {
               echo "<span style='color:green'>Message sent successfully.</span>";
             }
            else
             {
                 echo "<span style='color:red'>Message is not sent</span>";
              }
}
   }
  }

  public function showing($id)
  {
    $query = "SELECT state FROM tbl_owner WHERE owner_id='$id'";
    $q = $this->db->select($query);
    return $q;
  }
 }

?>
