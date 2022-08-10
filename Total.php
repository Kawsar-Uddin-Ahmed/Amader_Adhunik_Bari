<?php
 include "inc/header.php";
 include "lib/database.php";
 include "format/format.php";
 if(Session::get('state') == '0')
 {
 
 $db = new database();

 $fm = new format();
?>

<!--*********--------- Main Content **********---------->
<div class="container" style="margin-top:10%">
<div class="row">
    <div class="col-sm-3"></div>
        <div class="col-sm-6 PersonsDetails custom text-uppercase font-weight-bold">Payment</div>
    <div class="col-sm-3"></div>
</div>

<!----------This is for showing the payment renter send to the admin to the owner to collect the money-------->

<!-- ___________________ X ______________________ -->     

    <div class="table-responsive mt-3">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Renter</th>
                    <th>Month</th>
                    <th>Rent</th>
                    <th>Water</th>
                    <th>Electric</th>
                    <th>Gas</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Action</th>
                    <th><a href="Totalown.php">Prove</a></th>
                </tr>
            </thead>
          <tbody id="myTable">
<?php
//$pp = new payment();
$mail = Session::get('email');
?>
<?php
if(isset($_GET['mshifid']))
{
  $id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['mshifid']);

  $query = "UPDATE tbl_payment SET status ='1' WHERE pid='$id'";
  $a = $db->update($query);
}
?>
<!-------------for showing the payment renter send to the admin to the owner to collect the money---------->
<?php
$query = "SELECT * FROM tbl_payment WHERE status = 0";
        $gg = $db->select($query);
if($gg)
{
     $i = 0;
    while($result = $gg->fetch_assoc())
    {
        $i++;
?>
               <?php if(Session::get('email') == $result['email']){ ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $result['remail'];?></td>
                    <td><?php echo $result['month']."(".$result['year'].")";?></td>
                    <td><?php echo $result['rentbill'];?></td>
                    <td><?php echo $result['waterbill'];?></td>
                    <td><?php echo $result['gasbill'];?></td>
                    <td><?php echo $result['electricbill'];?></td>
                    <td><?php echo $result['total'];?></td>
                    <td><?php echo $result['date'];?></td>
					<!---<td><?php //if((Session::get('state') == 0)){ ?>
                    Please Collect the money
                    <?php //}?></td>---->
                    <td><a href="?mshifid=<?php echo $result['pid'];?>"><button class="btn btn-success">Accept</button> <!---<a href="?decid=<?php echo $result['pid'];?>"><button class="btn btn-danger">Decline</button>----></td>
                    <td></td>
                </tr>
                   <?php  } } } else{ echo "No payment....";}  ?>
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


