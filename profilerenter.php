
<!---------This connected to userprofile.php---method--showprofile()-->
<?php
 
 include "inc/header.php";
if(Session::get("state") == '1')
   {
?>



<!--*********--------- Main Content **********---------->

<div class="container" style="margin-top:10%">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 PersonsDetails custom text-uppercase font-weight-bold">User Profile</div>
        <div class="col-sm-3"></div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
<!-- --------------  for Profile ----connected to userlogin.php---------->
<?php
include"class/userprofile.php";
$ID = Session::get('renter_id');
$userprof = new userprofile();
$get = $userprof->showprofilerenter($ID);
if($get)
{
    while($result = $get->fetch_assoc())
    {
?>
        <div class="col col-sm-md-3">
            <img src="<?php echo $result['image'];?>" width="250px" height="300px"  alt="">
        </div>
       
        <div class="col col-sm-9 ">        
            <h4 font-weight-bold>Full Name:<small><?php echo $result['name'];?></small></h4>
            <!---<h4 font-weight-bold>Address:<small>Bd</small></h4>-->
          <!---  <tr>
                
                <td>-->
                    <!---<input type="radio" name="gender" value="checked">Male
                    <input  type="radio" name="gender" value="Female">Female---->
                   <!----<h4 font-weight-bold>Gender:<small>Male</small></h4> 
                </td>
            </tr>----><h4 font-weight-bold>Gender:<small>
                               <?php echo $result['gender']; ?></small></h4>
           
            <h4 font-weight-bold>Voter ID :<small><?php echo $result['voterid']; ?></small></h4>
            <h4 font-weight-bold>Proffession :<small><?php echo $result['proff']; ?></small></h4>
			<h4 font-weight-bold>Service :<small><?php echo $result['company']; ?></small></h4>

    <!---------This is for showing the title-------------------->
                                <h4 font-weight-bold>Title:<small>
                               <?php echo $result['title']; ?></small>
                        </h4>
     

    <!---------------------------------------------------------------->
			 <h4 font-weight-bold>phone :<small><?php echo $result['number']; ?></small></h4>
      <!--- <h4 font-weight-bold>Code :<small><?php //echo $result['flat_code']; ?></small></h4>--->
			 <h4 font-weight-bold>Email:<small><?php echo $result['email']; ?></small></h4>
       <h4 font-weight-bold>Building :<small><?php echo $result['bname']; ?></small></h4>
			<!-- <h4 font-weight-bold>Pass:<small><?php //echo md5($result['pass']); ?></small></h4>--->
       <!-- <h4 font-weight-bold>Flat_no:<small><?php //echo $result['Flat_no']; ?></small></h4>-->

        <h4 font-weight-bold>Flat name :<small><?php echo $result['flat_no']; ?></small></h4>
        <?php
           if($result['state'] == 1)
           {?>

         <h4  font-weight-bold>Rent:<small><?php echo $result['rent']; ?></small></h4><?php } //else {?>
         <?php
           if($result['state'] == 0)
           {?>

         <h4  font-weight-bold>Flat Code:<small><?php echo $result['flat_code']; ?></small></h4><?php } //else {?>
          <?php
           if($result['state'] == 1)
           {?>

         <h4  font-weight-bold>Agreement:<small><?php echo date("Y-m-d",strtotime($result['agreement'])); ?></small></h4><?php } //else {?>
         <!-- <h4 hidden font-weight-bold>Flat Code:<small hidden> <?php //echo $result['flat_code']; ?></small></h4>------------>
        <?php //} ?>
          <h4 font-weight-bold>Zone :<small><?php echo $result['zone_name']; ?></small></h4>
             
            <a class="btn btn-primary" href="editprofilerenter.php?userid=<?php echo $result['renter_id'];?>">Update information</a>
        </div>
    <?php } } ?>
        <!-- <input type="submit"  name="submit" Value="Update"> -->
 
        
<!-- ___________________ X  ________________________ -->
    </div>
</div>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>

<script >
 
</script>
<!--*********--------- Script for serach  End **********---------->


<?php

 include "inc/footer.php";
}
?>




