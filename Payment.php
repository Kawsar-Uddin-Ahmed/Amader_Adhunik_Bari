<?php
include "inc/header.php";
///include "lib/Session.php";
if(Session::get("state") == '1')
   {
?>
<br><br><br><br>

<br>
<!--*********--------- Main Content **********---------->
<?php
include "class/payment.php";
$pp = new payment();
$ID = Session::get('renter_id');


if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['submit']))
{
	$insertpay = $pp->pay($_POST);
}
?>
<div class="container pl-5">   
        <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 PersonsDetails custom text-uppercase font-weight-bold">Payment</div>
        <div class="col-sm-3"></div>
    </div>
			<form action="" method="post" enctype="multipart/form-data">
<div class="form-group"> 
<?php
 if(isset($insertpay))
 {
 	echo $insertpay;
 }
?>

				<table>
        <tbody>
            <tr>
                <td>Owner Email:</td>
                <td>
                    <input class="form-control" type="text" name="email" placeholder="Enter Owner Email"></td>
            </tr>
            <tr>
                <td>Month</td>
                <td>
                    <select name="month">
                    <option>Select month</option>
                    <option>January</option>
                    <option>February</option>
                    <option>March</option>
                    <option>April</option>
                    <option>May</option>
                    <option>June</option>
                    <option>July</option>
                    <option>August</option>
                    <option>September</option>
                    <option>October</option>
                    <option>November</option>
                    <option>December</option>
                    <!---<?php
                     /*$M = $pp->monthe();
                     if($M)
                     {
                        while($result = $M->fetch_assoc())
                        {


                    ?>
                    <option value="<?php echo $result['monthid'];?>"><?php echo $result['mon'];?>
                        
                    </option><?php }  } */?>------->

                    </select>    
             </td>
        </tr>
            <tr>
                <td>Year:</td>
                <td>
                    <input class="form-control" type="text" name="year" placeholder="Enter the year"></td>
            </tr>

            
             <tr>
                <td>Renter Email:</td>
                <td>
                    <input class="form-control" type="text" name="remail" placeholder="Enter renter Email"></td>
            </tr>

            <tr>
                <td>Rent:</td>
                <td>
                	<input class="form-control" type="number" name="rentbill" placeholder="Enter house rent"></td>
            </tr>
            <tr>
                <td>Water:</td>
                <td>
                	<input class="form-control" type="number" name="waterbill" placeholder="Enter water bills"></td>
            </tr>
            <tr>
                <td>Electric:</td>
                <td>
                	<input class="form-control" type="number" name="electricbill" placeholder="Enter electric bills"></td>
            </tr>
            <tr>
                <td>Gas:</td>
                <td>
                	<input class="form-control" type="number" name="gasbill" placeholder="Enter gas bills"></td>
            </tr>

            <tr>
                <td>Flat:</td>
                <td>
                    <?php
                      $get = $pp->showprofile($ID);
                      if($get)
                       {
                        while($result = $get->fetch_assoc())
                         {
?>
                    <input class="form-control" type="text" readonly="" name="flat_no" value="<?php echo $result
                    ['flat_no'];?>"><?php } } ?></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <?php
                      $get = $pp->showflatcode($ID);
                      if($get)
                       {
                        while($result = $get->fetch_assoc())
                         {
?>
                    <input hidden class="form-control" type="text" readonly="" name="flat_code" value="<?php echo $result
                    ['flat_code'];?>"><?php } } ?></td>
            </tr>

					<td></td>
					<td><input type="submit" name="submit" value="OK" class="btn btn-primary" onclick = "return confirm('Please Check Before Pressing OK Button. No update acceptable.');"><!-----
                    <a class="btn btn-success" href="Total.php">List</a>--->
					</td>
				</tr>
             </tbody>
    </table>
	</form>				
 </div>

<?php
include "inc/footer.php";
}

?>