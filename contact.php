<?php
include "inc/header.php";
include "class/adminmessagereply.php";
?>
<br><br><br><br>

<br>
<!------This is for sending the message in the database--->
  <?php
   $amr = new adminmessagereply();
   if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['submit']))
   {
      $ff = $amr->contactanswer($_POST,$_FILES);
}
  ?>

<div class="container pl-5">   
        <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 PersonsDetails custom text-uppercase font-weight-bold">Contact</div>
        <div class="col-sm-3"></div>
    </div>
   <!----The message showing--------------->
   <?php
if(isset($ff))
{
  echo $ff;
}

?>
  <!----------------------------------------------------------->
			<form action="" method="post" enctype="multipart/form-data">
<div class="form-group"> 

				<table>
        <tbody>
            
            <tr>
                <td>From:</td>
                <td>
                	<input class="form-control" type="text" name="renemail" placeholder="Enter the email"></td>
            </tr>
             <tr>
                <td>To:</td>
                <td>
                  <input class="form-control" type="text" name="email" placeholder="Enter the email"></td>
            </tr>
            <!--<tr>
                <td>
                  <?php 
                    /*$id = Session::get('owner_id');
                    $g = $amr->showing($id);
                    if($g)
                    {
                      while($result = $g->fetch_assoc())
                      {*/
                  ?>
                  <input class="form-control" hidden type="text" name="state"
                  value="<?php// echo $result['state'];?>"><?php //} } ?></td>
            </tr>--->

            <tr>
					<td>Your Message:</td>
					<td>
					<textarea name='message'></textarea>
					</td>
				</tr>
        <tr>
                            <td>
                                <label>File</label>
                            </td>
                            <td>
                                <input type="file" name ="file" class="medium" />
                            </td>
                          
                        </tr>  
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Send"/>
					</td>
				</tr>
             </tbody>
    </table>
	</form>				
 </div>




<?php

include "inc/footer.php";

?>