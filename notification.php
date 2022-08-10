<?php
 include "inc/header.php";
 include "lib/database.php";
 include "format/format.php";
 $db = new database();
 $fm = new format();

 /*----------For showing the notice to renter----------*/

 if(Session::get("state") == '1')
   {
?>
<!--*********--------- Main Content **********---------->
<div class="container" style="margin-top:10%">
<div class="row">
    <div class="col-sm-3"></div>
        <div class="col-sm-6 PersonsDetails custom text-uppercase font-weight-bold">Notice</div>
    <div class="col-sm-3"></div>
</div>

<!-- ___________________ X ______________________ -->     

    <div class="table-responsive mt-3">
    <table class="table table-dark table-hover">

            <thead>
                <tr>
                    <!----<th>Serial</th>--------->
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
 <!---------For showing the message------------>
<?php
 $SS = Session::get('flat_code');
 $SM = Session::get('flat_no');
 //$DATE = Session::get('year');
 //$D = date("Y-m-d",strtotime($['date']));
 //$ag = $
 $query = "SELECT tbl_renter.*,TIMESTAMPDIFF(MONTH,NOW(),agreement) FROM tbl_renter WHERE flat_code='$SS' AND flat_no ='$SM' AND status=0 AND TIMESTAMPDIFF(MONTH,NOW(),agreement) =2"; /*---Remember NOW() will catch your pc time---*/
 $sql = $db->select($query);
 if($sql)
 {
    $i = 0;
    while($result = $sql->fetch_assoc())
    {
        $i++;

?> 
<!---------For showing the message------------>
            <tbody id="myTable">
                <tr>
                    <!---<td><?php //echo $i;?></td>--->
                    <td><?php echo"You have only "." ".$result['TIMESTAMPDIFF(MONTH,NOW(),agreement)']." "." months due aggrement "." ".$result['name'];?></td>
					<td><a href="contact.php"><button class="btn btn-primary">Contact</button></a></td>
                </tr>   
            </tbody>
       <?php } }
       date_default_timezone_set('Asia/Dhaka');
       $d = date("d");
       $date = date("Y");
       $dd = date("m");
       
//-------If you have already given the payment than the message will not show you---//
      $qq = "SELECT tbl_payment.*,tbl_payment.flat_code FROM tbl_payment WHERE month = '$dd' AND year='$date' AND status = 1 AND flat_code = '$SS' LIMIT 1";
      $sql2 = $db->select($qq);
       if(($sql2 != true) && ($d >= '1' && $d <= '13'))
       //if($d >= '1' && $d <= '11')
        {
     ?>
     <!---<td><?php //echo $i;?></td>-->
     <td><?php echo "Your payment date of ".date('F')." is already expired ? Contact with the owner";//return $msg;?></td>
    <td><a href="contact.php"><button class="btn btn-primary">Contact</button></a></td>
     <?php
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

/*----------For showing the notice to owner----------*/

elseif(Session::get('state') == 0)
{
?>
<div class="container" style="margin-top:10%">
<div class="row">
    <div class="col-sm-3"></div>
        <div class="col-sm-6 PersonsDetails custom text-uppercase font-weight-bold">Notice</div>
    <div class="col-sm-3"></div>
</div>

<!-- ___________________ X ______________________ -->     

    <div class="table-responsive mt-3">
    <table class="table table-dark table-hover">

            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Message</th>
                    <!---<th>Action</th>--->
                </tr>
            </thead>
 <!---------For showing the message------------>
<?php
 $SS = Session::get('flat_code');
 ///$SM = Session::get('flat_no');
 //$D = date("Y-m-d",strtotime($['date']));
 //$ag = $
 $query = "SELECT tbl_owner.*,tbl_renter.agreement,tbl_renter.flat_no FROM tbl_owner INNER JOIN tbl_renter ON tbl_owner.status = tbl_renter.status AND tbl_owner.flat_code = tbl_renter.flat_code WHERE tbl_owner.flat_code='$SS'AND tbl_owner.status=0 AND TIMESTAMPDIFF(MONTH,NOW(),agreement) =2"; /*---Remember NOW() will catch your pc time---*/
 $sql = $db->select($query);
 if($sql)
 {
    $i = 0;
    while($result = $sql->fetch_assoc())
    {
        $i++;

?> 
<!---------For showing the message------------>
            <tbody id="myTable">
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo"Your renter of flat"." ".$result['flat_no']." "."have 2"."months";?></td>
                    <!---<td><a href="contact.php"><button class="btn btn-primary">Contact</button></a></td>--->
                </tr>   
            </tbody>
       <?php } } else { echo "<span  style='color:white'><strong>Still no notification....</strong></span>";}?>
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