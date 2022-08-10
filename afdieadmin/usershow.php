<!------This page is created to view the post this is little bit connected to the renterlist.php-------->
<?php

include "inc/header.php"
?>

<?php

include "../class/user_admin.php";

$own = new useradmin();
?>
<!--------For showing the options---------->

<?php
 if(isset($_GET['osid']) || $_GET['osid'])
 {
   $reid = preg_replace('/[^a-zA-Z0-9_]/','.',$_GET['osid']);
 }

?>
        <div class="grid_10">
    <!--<?php
       //if($_SERVER['REQUEST_METHOD'] == 'POST')
       {
  
        }


        ?>---->
            <div class="box round first grid">
                <h2>View user</h2>
                <div class="block"> 
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
                                <label>Zone</label>
                            </td>
                            <td>
                                <input type="text" readonly name ="name" value = "<?php echo $result['zone_name'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly name ="name" value = "<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                      <td>Gender</td>
                      <td><input class="form-control" type="text" readonly name="gender" value ="<?php echo $result['gender'];?>"></td></tr>
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
                            <td>Title</td>
                <td><input class="form-control" type="text" readonly name="title" value ="<?php echo $result['title'];?>"></td>
                        </tr>

                        <tr>
                            <td>
                                <label>Building name</label>
                            </td>
                            <td>
                                <input type="text" readonly name ="proff" value = "<?php echo $result['bname'];?>" class="medium" />
                            </td>
                          
                        </tr>

                       <tr>
                            <td>
                                <label>Flat_name</label>
                            </td>
                            <td>
                                <input type="text" readonly name ="email" value = "<?php echo $result['flat_no'];?>" class="medium" />
                            </td>
                          
                        </tr>
                        <tr>
                            <td>
                                <label>Image</label>
                            </td>
                            <td>
                              <img src = "../<?php echo $result['image'];?>" height = "150px" width ="200px"/><br/>
                       <!---
                            </td>
                        </tr>--------->
                       <!-- <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Commitment</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>---->
                        <!-----This code will not be given to user or owner only admin will add it after the registration of the owner and the renter.Both renter and owner of the same flat will have same code------>
                         <!---<tr>
                            <td>
                                <label>Flat_Code</label>
                            </td>--->
                         
                        <!---for bringing the image file and show---->
                            <!-- <td>
                                <input type="text" name ="flat_code" value = "<?php //echo $result['flat_code'];?>" class="medium" />
                            </td><br/>---->
                        <!---------------->
                        </tr>
                        <td></td>
                            <td>
                                <a href="userlist.php">
                               <div type="button" class="btn btn-primary" data-toggle="dropdown" >Back</div></a>
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