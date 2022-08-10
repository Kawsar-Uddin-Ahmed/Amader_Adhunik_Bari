<?php

include "inc/header.php";
include "class/ownerrenterdetails.php";
//include "lib/Session.php";
//Session::checkSession();
if(Session::get('state') == '0')
{

$sa = Session::get('flat_code');
$rendetail = new ownerrenterdetails();
?>



<!--*********--------- Main Content **********---------->
<div class="container" style="margin-top:10%">
<div class="row">
    <div class="col-sm-3"></div>
        <div class="col-sm-6 PersonsDetails custom text-uppercase font-weight-bold">Renter Details</div>
    <div class="col-sm-3"></div>
</div>

<!-- ----------------- For Select  Option ----------------- -->
<!---------------This is for deleting the renter id----------->

<!--<?php
/*if(isset($_GET['delid']))
{ 
   $i = preg_replace('/[^a-zA-Z0-9_]/','.',$_GET['delid']);
   $del = $rendetail->renterdelete($i);
}
?>
<?php
 if (isset($del))
 {
    echo $del;
 }
*/
?>--->
<!-------For deleting the renter means it will be in history--->
<?php
if(isset($_GET['delffid']))
{
    $maid = preg_replace('/[^a-zA-Z0-9_]/','.',$_GET['delffid']);
    $b = $rendetail->transferhistory($maid);
}
?>
<!----------------------------------------------------------->
<!-- ___________________ X ______________________ -->     

    <div class="table-responsive mt-3"  style='width:1225px'>
        <table class="table table-dark table-hover center">
            <thead>
                <tr>
                    <!---<th>Serial</th>--->
                    <th>Image</th>
                    <th>Name</th>
                    <!---<th>gender</th>----->
                    <th>VoterId</th>
                    <th>Proff</th>
					<th>Company</th>
					<th>number</th>
                    <th>email</th>
                    <th>Flat</th>
                    <th>Agreement</th>
                    <th>Rent</th>
                    <th>Action</th>
                    <!---<th><a href="history.php">history</a></th>--->
				 
                </tr>
            </thead>
<?php
$detail = $rendetail->renter($sa);
if($detail)
{
    $i=0;
    while($res = $detail->fetch_assoc())
    {
      $i++;

?>

            <tbody id="myTable">
                <tr>
                    <!---<td><?php ///echo $i; ?></td>--->
                    <td><img src="<?php echo $res['image'];?>" alt="" height="50px" width="50px"></td>
                    <td><?php echo $res['name'];?></td>
                    <!---<td><?php //echo $res['gender_name'];?></td>---->
                    <td><?php echo $res['voterid'];?></td>
					<td><?php echo $res['proff'];?></td>
					<td><?php echo $res['company'];?></td>
					<td><?php echo $res['number'];?></td>
                    <td><?php echo $res['email'];?></td>
                    <td><?php echo $res['flat_no'];?></td>
                    <td><?php echo date("Y-m-d",strtotime($res['agreement']));?></td>
                    <td><?php echo $res['rent'];?></td>
					<!--<td>/*Not working---*/
                        <?php
                          //if($res['title_name'] == 'OWNER')
                          {
                        ?>
                    <a href="?delid=<?php//echo $res['user_id'];?>"><button class="btn btn-danger">Delete</button></a>
                    <?php
                }
                ?>
                    </td>--->
                     <td><a href="?delffid=<?php echo $res['renter_id'];?>"><button class="btn btn-danger btn-sm">SDelete</button></a><a href="Renewrenter.php?updiid=<?php echo $res['renter_id'];?>"><button class="btn btn-primary btn-sm">Renew</button></a></td>
                </tr>
                    
            </tbody>
<?php
     
    }
}
else
{
    echo "Still no renter!!!";
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
}
?>


