<?php
 include "inc/header.php";

 include "class/usermessageinbox.php";

 $objmsg = new usermessageinbox();
?>



<!--*********--------- Main Content **********---------->
<div class="container" style="margin-top:10%">
<div class="row">
    <div class="col-sm-3"></div>
        <div class="col-sm-6 PersonsDetails custom text-uppercase font-weight-bold">Seen Mail</div>
    <div class="col-sm-3"></div>
</div>

<!----------This is for showing the message given to the owner or renter page--->


<!-- ___________________ X ______________________ -->     

    <div class="table-responsive mt-3">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Message</th>
                    <th>Action</th>
                    <th><a href="inbox.php">Back</a></th>
                </tr>
            </thead>
<!---------For deleting the message------------>
<?php
 if(isset($_GET['delmsg']))
 {
    $delid = preg_replace('/[^a-zA-Z0-9_]/','.',$_GET['delmsg']);
    $dd = $objmsg->deletemsg($delid);
 }
?>
<?php
 if (isset($dd))
 {
    echo $dd;
 }
?>
<!---------For showing the message------------>
<?php
 $ff = Session::get('email');
 $r = $objmsg->sawseenmail($ff);
 if($r)
 {
    $i = 0;
    while($g = $r->fetch_assoc())
    {
      $i++;
?>
            <tbody id="myTable">
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $g['message'];?></td>
          <td><a href="showmail.php?showmailid=<?php echo $g['tcon_id'];?>"><button class="btn btn-primary">Show</button></a>  <a onclick="return confirm('Are your sure to delete');" href="?delmsg=<?php echo $g['tcon_id'] ?>"><button class="btn btn-danger">Delete</button></a></td>
                </tr>
                    
            </tbody>
            <?php 
              } 
          }
      
            ?>
        </table>
    </div>
     
</div>
<br><br>



<!--*********--------- Main Content End **********---------->


<!--*********--------- Script for serach  **********---------->

<script >
 $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<!--*********--------- Script for serach  End **********---------->


<?php

 include "inc/footer.php";
?>


