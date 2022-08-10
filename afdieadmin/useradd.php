<!------This page is created to add the code from admin panel to database this is little bit connected to the userlist.php-------->
<?php

include "inc/header.php"
?>

<?php

include "../class/user_admin.php";

$own = new useradmin();
?>
<!--------For showing the options---------->

<?php
 if(isset($_GET['owaddid']) || $_GET['owaddid'])
 {
   $reid = preg_replace('/[^a-zA-Z0-9_]/','.',$_GET['owaddid']);
 }

?>
        <div class="grid_10">
    <?php
      if($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit']))
       {
           $updateuser = $own->addcode($_POST,$_FILES,$reid);
        }


        ?>
            <div class="box round first grid">
                <h2>Add user code</h2>
                <div class="block"> 
<?php
if(isset($updateuser))
{
    echo $updateuser;
}
?>
           <?php
               
               $get = $own->usershowlistid($reid);
               if($get)

               {
                //$i = 0;

                while($result = $get->fetch_assoc())
                {
                    //$i++;

           ?>
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                       <!------- <tr>
                            <td>
                                <label>Serial No</label>
                            </td>
                            <td>
                                <input type="text" readonly name ="owner_id" value = "<?php// echo $result['owner_id'];?>" class="medium" />
                            </td>
                        </tr>---------->
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly name ="name" value = "<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>
                       <tr>
                            <td>
                                <label>Gender</label>
                            </td>
                            <td>
                                <select id="select" name ="gender">
                                <option>Select Gender.</option>
                                
                                <?php
                                  $gender = $own->usershowgender();
                                   if($gender)
                                   {
                                    
                                  
                                    while($gres = $gender->fetch_assoc())
                                    {
                                        

                                ?>
                                    <option 
                                      <?php
                                       if($result['gender'] == $gres['gid'])
                                        {
                                           echo "selected";
                                        }
         
                                      ?>
                                    value="<?php echo $gres['gid']; //$i;//Showing the category by id from tbl_category.Do not use this when you will use $result['id'];  ?>"><?php echo $gres['gender_name']; ?></option>
                                   <?php } } ?>
                            
                                </select>
                            </td>
                          
                        </tr>
                        <tr>
                            <td>
                                <label>Voter_Id</label>
                            </td>
                            <td>
                                <input type="text" readonly name ="voterid" value = "<?php echo $result['voterid'];?>" class="medium" />
                            </td>
                          
                        </tr>
                        <tr>
                            <td>
                                <label>Proffession</label>
                            </td>
                            <td>
                                <input type="text" readonly name ="proff" value = "<?php echo $result['proff'];?>" class="medium" />
                            </td>
                          
                        </tr>
                        <tr>
                            <td>
                                <label>Company</label>
                            </td>
                            <td>
                                <input type="text" readonly name ="company" value = "<?php echo $result['company'];?>" class="medium" />
                            </td>
                          
                        </tr>
                        <tr>
                            <td>
                                <label>Number</label>
                            </td>
                            <td>
                                <input type="text" readonly name ="number" value = "<?php echo $result['number'];?>" class="medium" />
                            </td>
                          
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly name ="email" value = "<?php echo $result['email'];?>" class="medium" />
                            </td>
                          
                        </tr>

                         <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <select id="select" name ="title">
                                <option>Select title.</option>
                                
                                <?php
                                  $title = $own->usershowtitle();
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
                                   <?php } } ?>
                            
                                </select>
                            </td>
                          
                        </tr>

                       <tr>
                            <td>
                                <label>Flat</label>
                            </td>
                            <td>
                                <select id="select" name ="flat_no" readonly>
                                <option>Select Flat.</option>
                                
                                <?php
                                  $flat_no = $own->usershowflat();
                                   if($flat_no)
                                   {
                                    
                                  
                                    while($gres = $flat_no->fetch_assoc())
                                    {
                                        

                                ?>
                                    <option 
                                      <?php
                                       if($result['flat_no'] == $gres['Flat_id'])
                                        {
                                           echo "selected";
                                        }
         
                                      ?>
                                    value="<?php echo $gres['Flat_id']; //$i;//Showing the category by id from tbl_category.Do not use this when you will use $result['id'];  ?>"><?php echo $gres['Flat_name']; ?></option>
                                   <?php } } ?>
                            
                                </select>
                            </td>
                          
                        </tr>
                       <!---- <tr>
                            <td>
                                <label>Image</label>
                            </td>
                            <td>-->
                        <!---for bringing the image file and show---->
                              <!---<img src = "<?php //echo $result['image'];?>" height = "150px" width ="200px"/><br/>
                              <input class="form-control" type="file" name="image"><br/>
                              </td>
                              </tr>---->
                        <!---------------->
                           
                       <!-- <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Commitment</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>---->
                         <!-----This code will not be given to user or owner only admin will add it after the registration of the owner and the renter.Both renter and owner of the same flat will have same code------>
                        <tr>
                            <td>
                                <label>Flat_Code</label>
                            </td>
                         
                        <!---for bringing the image file and show---->
                             <td>
                                <input type="text" name ="flat_code" value = "<?php echo $result['flat_code'];?>" class="medium" />
                            </td><br/>
                        <!---------------->
                        </tr>
                        <td></td>
                            <td>
                               
                               <div type="button" class="btn btn-primary" data-toggle="dropdown" ><input class="btn btn-primary" type="submit" name="submit" value="Update">
                               </div>
                                <a href="userlist.php">back</a>
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                       }
                   }
                    ?>
                </div>
           <!--------------------------------------------------->
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });

    </script>
     <!---->
    <?php
         include "inc/footer.php";
     ?>


    <!-- /TinyMCE -->
    <!------<style type="text/css">
        #tinymce{font-size:15px !important;}
    </style>--------->