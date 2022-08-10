<?php
include "inc/header.php";
include "lib/database.php";
include "format/format.php";
if(Session::get(state) == '0')
{
$db = new database();
$fm = new format();
//$sar = Session::get('user_id');
?>
<br><br><br><br>

<br>
	<div class="container pl-5">   
        <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 PersonsDetails custom text-uppercase font-weight-bold">Renewing old renter</div>
        <div class="col-sm-3"></div>
    </div>
     <?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
        {
        	if(isset($_GET['updiid'])  || $_GET['updiid'])
           {
             $sa = preg_replace('/[^a-zA-Z0-9_]/','.',$_GET['updiid']);
            }
        	$Flat_no = mysqli_real_escape_string($db->link,$_POST['flat_no']);
        	$Agreement = mysqli_real_escape_string($db->link,$_POST['agreement']);
        	$R = mysqli_real_escape_string($db->link,$_POST['rent']);
        	if(empty($Flat_no) || empty($Agreement) || empty($R))
        	{
        		echo "<span class='error'>Field must be field....</span>";
        	}
        	/*elseif (date(strtotime($Agreement)) == "Y-m") {
        		echo "<span class='error'>Please put Year Month and Day....</span>";
        	}*/
        	else
        	{
        		$query="UPDATE tbl_renter
                            SET
                            flat_no='$Flat_no',
                            agreement='$Agreement',
                            rent='$R'
                            WHERE renter_id='$sa'";
                $updated_row=$db->update($query);
                if ($updated_row) 
                {
                  echo "<span style='color:green'>User updated succesfully </span>";
               }
               else 
               {
                 echo "<span  style='color:red'>User updated Failed</span>";
              }    
        	}


        }

     ?>
     <form action="" method="post" enctype="multipart/form-data">
<div class="form-group">        
    <table>

    	<?php
    	  if(isset($_GET['updiid'])  || $_GET['updiid'])
         {
             $sa = preg_replace('/[^a-zA-Z0-9_]/','.',$_GET['updiid']);
          }
          $q = "SELECT * FROM tbl_renter WHERE renter_id='$sa' AND state=1";
          $s = $db->select($q);
          if($s)
          {
          	while($result=$s->fetch_assoc())
          	{
    	?>
        <tbody>
            <tr>
                <td>Email</td>
                <td><input class="form-control" readonly type="text" name="email" value=<?php echo $result['email'];?>></td>
            </tr>
             <tr>
                <td>Flat</td>
                <td><input class="form-control" readonly type="text" name="flat_no" value=<?php echo $result['flat_no'];?>></td>
            </tr>
            <!---<tr>
                <td>Previous date</td>
                <td><input class="form-control" type="text" name="agreement" value=<?php ///echo date("Y-m-d",strtotime($result['date']));?>></td>
            </tr>--->
             <tr>
                <td>Agreement</td>
                <td><input class="form-control" type="text" name="agreement" value=<?php echo date("Y/m/d",strtotime($result['agreement']));?>></td>
            </tr>
            <tr>
                <td>Rent</td>
                <td><input class="form-control" type="text" name="rent" value=<?php echo $result['rent'];?>></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn btn-primary" type="submit" name="submit" value="Update"></td>
            </tr>
        </tbody>
        <?php }  }?>
    </table>
    </div> 
</form>

</div>
<br><br><br>


<!-- ____________________________________ X ______________________________________ -->


<?php

 include "inc/footer.php";
}
?>
