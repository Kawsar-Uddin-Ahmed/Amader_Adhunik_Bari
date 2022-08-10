<?php

include "inc/header.php";
include "lib/database.php";
include "format/format.php";
 if(Session::get('state') == '0')
 {

$ffid = Session::get('flat_code');
$db = new database();
$fm = new format();

?>


<!---------He deleted can the post what he gaven-------->
<!--*********--------- Main Content **********---------->
<div class="container" style="margin-top:10%">
<div class="row">
    <div class="col-sm-3"></div>
        <div class="col-sm-6 PersonsDetails custom text-uppercase font-weight-bold">Display flat</div>
    <div class="col-sm-3"></div>
</div>
<!---------He deleted can the post what he gaven-------->
<?php
if(isset($_GET['delffid'])){
    $deid =preg_replace('/[^a-zA-Z0-9_]/','.',$_GET['delffid']);
    $delq = "DELETE FROM tbl_upload WHERE supid='$deid'";
    $sql = $db->delete($delq);

      if($sql)
        {
            echo "<span class='success'>Deleted successfully</span>";
        }
        else
        {
            echo "<span class='success'>Not deleted....</span>";
        }
    }
        ?>
    <div class="table-responsive mt-3">
        <table class="table table-dark table-hover">
            <thead>
            <tr>
              <th>Building</th>
              <th>Owner</th>
              <th>Flat</th>
              <th>Room</th>
              <th>Rent</th>
              <th>Address</th>
              <th>Contact</th>
              <th>Code</th>
              <th>Zone</th>
              <th>Agreement</th>
              <th>Action</th>
            </tr>
            </thead>

            <tbody id="myTable">
                <!---For showing the uploaded flat history--->
                <?php
                 $q = "SELECT * FROM tbl_upload WHERE permission=1 AND flat_code='$ffid'";
                  $ssq = $db->select($q);
                  if($ssq)
                  {
                    //$i = 0;
                    while($res = $ssq->fetch_assoc())
                    {
                      //$i++;
                ?>
                <tr>
                    <!--<td><?php //echo $i; ?></td>--->
                   <!--<td><img src="" alt="" height="50px" width="50px"></td>--->
                    <td><?php echo $res['bname'];?></td>
                    <!---<td><?php //echo $res['gender_name'];?></td>---->
                    <td><?php echo $res['ownername'];?></td>
					         <td><?php echo $res['flat_no'];?></td>
					         <td><?php echo $fm->readmore($res['room'],10);?></td>
                   <td><?php echo $res['rent'];?></td>
					         <td><?php echo $res['address'];?></td>
                    <td><?php echo $res['contact'];?></td>
                    <td><?php echo $res['flat_code'];?></td>
                    <td><?php echo $res['zone_name'];?></td>
                    <td><?php echo $res['agreement'];echo " ";echo "years";?></td>
                     <td><a href="?delffid=<?php echo $res['supid'];?>"onclick = "return confirm('Please think before deleting.Cannot undo it');"><button class="btn btn-danger">Delete</button>
                </tr>
            <?php } } ?>
                    
            </tbody>

      
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
}
?>


