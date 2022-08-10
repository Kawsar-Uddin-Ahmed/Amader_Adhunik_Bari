<?php
 include "inc/header.php";
 if(Session::get("state") == '1')
   {
?>



<!--*********--------- Main Content **********---------->
<div class="container" style="margin-top:10%">
<div class="row">
    <div class="col-sm-3"></div>
        <div class="col-sm-6 PersonsDetails custom text-uppercase font-weight-bold">Owner Details</div>
    <div class="col-sm-3"></div>
</div>

<!----------This is for owner showing in the owner page--->


<!-- ___________________ X ______________________ -->     

    <div class="table-responsive mt-3">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Profession</th>
					<th>num</th>
                    <th>Email</th>
                    <th>Building</th>
                    <th>Flat</th>
                </tr>
            </thead>
<?php
include "class/ownerrenterdetails.php";
$s = Session::get("flat_code");
$owrendetails = new ownerrenterdetails();
 $details = $owrendetails->owner($s);
 if($details)
 {
    $i = 0;
    while($de = $details->fetch_assoc())
    {
       $i++;
?>

            <tbody id="myTable">
                <tr>
                    <td><?php echo $i;?></td>
                    <td><img src="<?php echo $de['image'];?>" alt="" height="50px" width="50px"></td>
                    <td><?php echo $de['name']?></td>
                    <td><?php echo $de['proff']?></td>
					<td><?php echo $de['number']?></td>
                    <td><?php echo $de['email']?></td>
                    <td><?php echo $de['bname']?></td>
                    <td><?php echo $de['flat_no']?></td>
                    
                </tr>
                    
            </tbody>
<?php
} }
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


