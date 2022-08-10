<?php
  require_once "lib/database.php";
  require_once "format/format.php";
  $db = new database();
  $fm = new format();
?>
<?php
 include "inc/searchheader.php";
?>
<!---This is done for showing the page number like buttons--->
<?php
$per_page =2;//per page can hold only two posts
if(isset($_GET["page"]) || isset($_GET['place']))
{
	$page = $_GET["page"];
	$place = $_GET['place'];
	//$renti = $_GET['rentam'];
}
else
{
	$page = 1;
}
$start = ($page-1)*$per_page
?>
	<div class="contentsection contemplete clear">
			 <?php
                    if (isset($_POST['submit'])) { //$_GET['submit']
                    	//$place = $_POST['search'];
                      //$countryName = $fm->validation($_POST['search']);
                      $SearchID=mysqli_real_escape_string($db->link,$_POST['search']);
                      //$SearchID = mysqli_real_escape_string($db->link,$_GET['search']);
                       if(!(isset($SearchID) || $SearchID === NULL))///Here $_POST is used because in header folder the method of search paragraph is post.//--\\\
                       {
                       	     echo " <p><span style='color:red;font-size:100px;line-height:130px;text-align: center;display:block;font-size: 80px;'>Sorry!No rent house in this zone</p>";
	                        //header("Location:404.php");
	                       //echo "<script>window.location='404.php';</script>";
                        }
                        else
                          {
	                           $search = $SearchID;
                          }
                      //$place = $_GET['search'];
                      $place = $_POST['search'];
                      //$renti = $_POST['search'];
                      //$sql = "SELECT * FROM tbl_upload WHERE zone_name LIKE '%".$search."%' and permission = 1 limit $start,$per_page "; //Do not use this
                      $sql = "SELECT * FROM tbl_upload WHERE zone_name = '$search' and permission = 1 limit $start,$per_page ";
                     $row = $db->select($sql);
                      if($row)
                      { 
                       while($result = $row->fetch_assoc())
                        {

 				  ?>
 				 <div class="maincontent clear">
			    <div class="samepost clear">
 				  <h2><?= $result['bname']?></h2>
				<h4><?= $fm->Date($result['time']);?> <p><b><?= $result['ownername']?></b></p></h4>
				<img src="<?= $result['img'];?>" alt="post" alt="" height="100px" width="100px"/>
				<p>
					<table>
				 <tbody>
			      <tr>
			      <td><b>1.Flat_no :</b><?= $result['flat_no'];?></td>
			      </tr>
			      <tr>
			      <td><b>2.Room :</b><?= $fm->validation($result['room']);?></td>
			      </tr>
			      <tr>
			      <td hidden><b>3.Code : </b> <?= $result['flat_code'];?></td>
			      </tr>
			      <tr>
			      <td><b>3.Address : </b><?= $fm->validation($result['address']) ;?>,<?=$result['zone_name'] ;?></td>
			      </tr>
			      <tr>
			      <td><b>4.Contact : </b><?= $result['contact']?></td>
			      </tr>
			      <tr>
			      <td><b>5.Rent : </b><?= $result['rent']?></td>
			      </tr>
			      <tr>
			      <td><b>6.Agreement : </b> <?= $result['agreement'];?></td>
			      </tr>
			  </tbody>
			</table>
				</p>
				<div class="readmore clear">
					<a href="userregistration.php?uploadid=<?php echo $result['supid'];?>">Registration</a>
				</div>
			</div>
			</div>
			<?php 

		      } 
		       //$query = "SELECT * FROM tbl_upload WHERE permission = 1 and zone_name='$place'";
		       $query = "SELECT * FROM tbl_upload WHERE permission=1 and zone_name='$place'";
		       $r = $db->select($query);
               $total_rows = mysqli_num_rows($r);
               $total_pages = ceil($total_rows/$per_page);
//--\\\
              echo "<span class = 'pagination'><a href ='insidebuttonsearch.php?page=1&place=".$place."'>".'Start Page'."</a>";
              for($i=2;$i<=$total_pages;$i++)
              {
	              echo "<a href ='insidebuttonsearch.php?place=".$place."&page=".$i."'>".$i."</a>";
              }
              //echo "<a href ='insidebuttonsearch.php?page=$total_pages&place=".$place."'>".'Last Page'."</a></span>" ;
          }
              
		         else
               { 
                  echo " <p><span style='color:red;font-size:100px;line-height:130px;text-align: center;display:block;font-size: 80px;'>Sorry!No rent house in this zone</p>";
                  ///header("Location:404.php");
               }
           }
            
              ?>
	</div>
	<?php
 include "inc/searchfooter.php";
?>
