<?php

 include "inc/header.php";
 if(Session::get("state") == '1')
   {
?>
<!--------To update the profile.php---connected to userprofile.php--------->
<?php
include "class/userprofile.php";

$ID = Session::get('renter_id');
$userprof = new userprofile();

if(isset($_GET['userid'])  || $_GET['userid'])
{
    $editid = preg_replace('/[^a-zA-Z0-9_]/','.',$_GET['userid']);
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
{
  $gettingupdate = $userprof->updateprofilerenter($_POST,$_FILES,$editid);
}
?>
<br><br><br><br>

<br>
	<div class="container pl-5">   
        <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 PersonsDetails custom text-uppercase font-weight-bold">User Update Profile</div>
        <div class="col-sm-3"></div>
    </div>
<?php
if(isset($gettingupdate))
{
    echo $gettingupdate;
}
?>
<?php
$get = $userprof->showprofilerenter($ID);
if($get)
{
    while($result = $get->fetch_assoc())
    {
?>
       <form action="" method="post" enctype="multipart/form-data">
<div class="form-group">        
    <table>
        <tbody>
            <tr>
                <td>Image</td>
                <img src="<?php echo $result['image'];?>" alt="" height="150px" width="150px">
                <td><input class="form-control" type="file" name="image"></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input class="form-control" type="text" name="name" value ="<?php echo $result['name'];?>"></td>
            </tr>
            
          <td>Gender</td>
                <td><input class="form-control" type="text" readonly name="gender" value ="<?php echo $result['gender'];?>"></td>
            <tr>
           
                <td>Voter ID</td>
                <td><input class="form-control" type="text" readonly name="voterid" value="<?php echo $result['voterid'];?>"></td>
            </tr>
            
            <tr>
           
                <td>Proffession</td>
                <td><input class="form-control" type="text" name="proff" value ="<?php echo $result['proff'];?>"></td>
            </tr>
            
            <tr>
           
                <td>Company</td>
                <td><input class="form-control" type="text" name="company" value ="<?php echo $result['company'];?>"></td>
            </tr>
            
            <tr>
           
                <td>Number</td>
                <td><input class="form-control" type="phone" name="number" value="<?php echo $result['number'];?>"></td>
            </tr>
            
                <!--<tr>
                <td>Title</td>
                <td>
                     <select id="select" name ="title">
                                <option>Select title.</option>
                                
                                <?php
                                  /*$title = $userprof->usertitle();
                                   if($title)
                                   {
                                    
                                  
                                    while($gres = $title->fetch_assoc())
                                    {
                                        

                                ?>
                                    <option 
                                      <?php
                                       if($result['title'] == $gres['title_id'])
                                        {
                                           echo "selected";
                                        }
         
                                      ?>
                                    value="<?php echo $gres['title_id']; //$i;//Showing the category by id from tbl_category.Do not use this when you will use $result['id'];  ?>"><?php echo $gres['title_name']; ?></option>
                                   <?php } } */?>
                                </select>
                </td>
            </tr>---->

            <tr>
           
                <td>Email</td>
                <td><input class="form-control" type="text" readonly name="email" value="<?php echo $result['email'];?>"></td>
            </tr>
            <tr>
           
        
            
            <!--<tr>
                <td>Password</td>
                <td><input class="form-control" type="text" name="pass" value ="<?php //echo md5($result['pass']);?>"></td>
            </tr>--->
            <!---<tr>
           
                <td>Flat_no</td>
                <td><input class="form-control" type="text" name="Flat_no" value="<?php //echo $result['Flat_no'];?>"></td>
            </tr>--------->
           <tr>
           
                <td>Flat Name </td>
                <td><input class="form-control" type="text" readonly name="flat_no" value="<?php echo $result['flat_no'];?>"></td>
            </tr>

             <!--<tr>
           
                <td>Pass</td>
                <td><input class="form-control" type="text" readonly name="pass" value="<?php //echo $result['pass'];?>"></td>
            </tr>--->
              <?php
                if($result['state'] == 0)
                  {  

              ?>
             <tr>
           
                <td>Flat Code</td>
                <td><input class="form-control" type="text" readonly name="flat_code" value="<?php echo $result['flat_code'];?>"></td>
            </tr>
             <tr>
             <?php }else { ?>
              <tr>
           
                <td hidden>Flat Code</td>
                <td><input class="form-control" type="text" hidden readonly name="flat_code" value="<?php echo $result['flat_code'];?>"></td>
            </tr><?php } ?>
           
                <td hidden>State</td>
                <td><input class="form-control" hidden type="text" readonly name="state" value="<?php echo $result['state'];?>"></td>
            </tr>
            <tr>

            <tr>
                <td></td>
                <td><input class="btn btn-primary" type="submit" name="submit" value="Update"></td>
            </tr>
        </tbody>
    </table>
    </div> 
</form>
<?php
} }
?>
</div>
<br><br><br>


<!-- ____________________________________ X ______________________________________ -->


<?php

 include "inc/footer.php";
}
?>
