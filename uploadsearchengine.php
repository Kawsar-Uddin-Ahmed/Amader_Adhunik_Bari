<?php
 include "inc/header.php";
 include "class/searchuploadowner.php";
 if(Session::get('state') == '0')
 {
 $sk = Session::get('owner_id');
 $suo = new searchuploadowner();
?>
<br><br><br><br>

<br>
<div class="container pl-5">   
        <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 PersonsDetails custom text-uppercase font-weight-bold">Upload in search engine</div>
        <div class="col-sm-3"></div>
    </div>
    <!-------This is used for inserting data in the database of search engine--->

    <?php
       if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['submit']))
       {
          $ind = $suo->inserting($_POST,$_FILES);
       }

    ?>

    <?php
     if(isset($ind))
     {
       echo $ind;
     }
    ?>

			<form action="" method="post" enctype="multipart/form-data">
<div class="form-group"> 

				<table>
        <tbody>
            <tr>
                <td>Building name:</td>
                <td>
                    <input class="form-control" type="text" name="bname" placeholder="Enter building name"></td>
            </tr>
            <tr>
                <td>Owner name:</td>
                <td>
                    <input class="form-control" type="text" name="ownername" placeholder="Enter your name"></td>
            </tr>
             <tr>
                <td>Flat name:</td>
                <td>
                    <input class="form-control" type="text" name="flat_no" placeholder="Enter flat number"></td>
            </tr>

            <tr>
                <td>Room :</td>
                <td>
                	<input class="form-control" type="text" name="room" placeholder="Numbers of rooms"></td>
            </tr>
            <tr>
                <td>Address :</td>
                <td>
                	<!--<input class="form-control" type="text" name="address" placeholder="Where is your apartment ?"></td>--->
                	<textarea name='address'></textarea>
            </tr>
            <tr>
                <td>Contact :</td>
                <td>
                	<input class="form-control" type="text" name="contact" placeholder="Your phone number"></td>
            </tr>
            <tr>
                <td>Code :</td>
                <td>
                	<input class="form-control" type="text" name="flat_code" placeholder="Your code number"></td>
            </tr>
            <tr>
                <td>Zone:</td>
                <td>
                  <?php
                   $g = $suo->zoning($sk);
                   if($g)
                   {
                    while($result=$g->fetch_assoc())
                    {
                  ?>
                  <input class="form-control" type="text" readonly name="zone_name" value="<?php echo $result['zone_name']; ?>"><?php }  } ?></td>
                  </tr> 
                  <tr>
                    <tr>
                <td>Agreement:</td>
                <td>
                  <input class="form-control" type="number" name="agreement" placeholder="Agreement year" "></td>
                  </tr> 
                  <tr>

                    <tr>
                <td>Rent:</td>
                <td>
                  <input class="form-control" type="text" name="rent" placeholder="Rent of your flat" "></td>
                  </tr> 
                  <tr>
                    <td></td>
                  <!--<td> 
                    <select name="zone_name">
					<option>Select zone</option>
					<?php
                                  /*$zone = $suo->zoning();
                                 if($zone)
                                 {
                                    
                                  
                                while($r = $zone->fetch_assoc())
                                    {
                                        

                                ?>
                                    <option value="<?php echo $r['zoid'];?>"><?php echo $r['zonename']; ?></option>
                                   <?php } } */?>
				</select>
            </td></tr>---->
				      <tr>
                       <td>Image :</td>
                        <td>
                            <input type="file" name="img"></td>
                             </tr>
                             <!---<tr>
                             <td>
                	           <input hidden="" class="form-control" type="text" name="permission" value="0" ></td>
                                </tr>-------->
                                </td>
                        </tr>
					<td></td>
					<td><input type="submit" name="submit" value="Upload" class="btn btn-primary" onclick = "return confirm('Please Check Before Pressing OK Button. No update acceptable.');">
                    <a class="btn btn-success" href="uploadedsearch.php">List</a>
					</td>
				</tr>
             </tbody>
    </table>
	</form>				
 </div><br><br><br>

<?php

 include "inc/footer.php";
}

?>