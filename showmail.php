<?php
include "inc/header.php";

include "class/usermessageinbox.php";

$objmsg = new usermessageinbox();
if(Session::get("state") == '1')
   {
?>
<br><br><br><br>

<br>
<!--------This page is connected to the user inbox.php ---->
<div class="container pl-5">   
        <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 PersonsDetails custom text-uppercase font-weight-bold">Message show</div>
        <div class="col-sm-3"></div>
    </div>

    <?php
     if(isset($_GET['showmailid']) || $_GET['showmailid'])
     {
      $maid = preg_replace('/[^a-zA-Z0-9_]/','.',$_GET['showmailid']);
     }


    ?>
			<form action="" method="post" enctype="multipart/form-data">
<div class="form-group"> 
				<table>
    <?php
      $ab = $objmsg->showthemail($maid);
      if($ab)
      {
        while($result = $ab->fetch_assoc())
        {

    ?>
        <tbody>
            
            <tr>
           
                <td>Email:</td>
                <td>
                	<input class="form-control" type="text" name="renemail" value="<?php echo $result['renemail'] ;?>"></td>
            </tr>
             <tr>
					<td>Your Message:</td>
					<td>
					<textarea name="message"><?php echo $result['message'];?>     
          </textarea>
					</td>
				</tr>
        <td>Your file:</td>
         <td>
          <!--<?php
           /*if(isset($_GET['showmsgid']))
           {
             $ff = $_GET['showmsgid'];
            $q = "SELECT msg_table.file FROM msg_table WHERE mid='$ff'";
            if($q)
            {
              while($r = $q->fetch_assoc())
              {*/
            
          ?>--->
          <?php
            if($result['file'] !=Null)
            {
          ?>
        <!---<a href="afdieadmin/<?php //echo $result['file'];?>">Download</a>--->
          <a href="<?php echo $result['file'];?>">Download</a>
        <?php } else { echo "No file....";} ?>
        <!--<?php// } } } //else { echo "No file...";}?>--->
        </td>
				<tr>
					<td></td>
					<td>
					<a href="inbox.php">
          <div type="button" class="btn btn-primary">Back</div></a> <a href="contact.php"class="btn btn-success">Reply</a>
					</td>
				</tr>
      </tbody>
    </table>
    <?php
      }
    }
    ?>
	</form>				
 </div>




<?php

include "inc/footer.php";
}
elseif(Session::get("state") == '0')
   {
?>
<br><br><br><br>

<br>
<!--------This page is connected to the user inbox.php ---->
<div class="container pl-5">   
        <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 PersonsDetails custom text-uppercase font-weight-bold">Message show</div>
        <div class="col-sm-3"></div>
    </div>

    <?php
     if(isset($_GET['showmailid']) || $_GET['showmailid'])
     {
      $maid = preg_replace('/[^a-zA-Z0-9_]/','.',$_GET['showmailid']);
     }


    ?>
      <form action="" method="post" enctype="multipart/form-data">
<div class="form-group"> 
        <table>
    <?php
      $ab = $objmsg->showthemail($maid);
      if($ab)
      {
        while($result = $ab->fetch_assoc())
        {

    ?>
        <tbody>
            
            <tr>
           
                <td>Sender :</td>
                <td>
                  <input class="form-control" type="text" name="renemail" value="<?php echo $result['renemail'] ;?>"></td>
            </tr>
             <tr>
          <td>Your Message:</td>
          <td>
          <textarea name="message"><?php echo $result['message'];?>     
          </textarea>
          </td>
        </tr>
        <td>Your file:</td>
         <td>
          <!--<?php
           /*if(isset($_GET['showmsgid']))
           {
             $ff = $_GET['showmsgid'];
            $q = "SELECT msg_table.file FROM msg_table WHERE mid='$ff'";
            if($q)
            {
              while($r = $q->fetch_assoc())
              {*/
            
          ?>--->
          <?php
            if($result['file'] !=Null)
            {
          ?>
        <!---<a href="afdieadmin/<?php //echo $result['file'];?>">Download</a>--->
          <a href="<?php echo $result['file'];?>">Download</a>
        <?php } else { echo "No file....";} ?>
        <!--<?php// } } } //else { echo "No file...";}?>--->
        </td>
        <tr>
          <td></td>
          <td>
          <a href="inbox.php">
          <div type="button" class="btn btn-primary">Back</div></a> <a href="contact.php"class="btn btn-success">Reply</a>
          </td>
        </tr>
      </tbody>
    </table>
    <?php
      }
    }
    ?>
  </form>       
 </div>




<?php

include "inc/footer.php";
}
?>