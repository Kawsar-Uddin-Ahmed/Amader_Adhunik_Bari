<?php include 'inc/header.php';

include "../class/user_admin.php";

$fetch = new useradmin();
?>

<!-------For deleting the owner account those sold the flat--->


<!------Connected to owner_admin.php----------->
<?php
if(isset($_GET['owdelid']))
{
	$delid =  preg_replace('/[^-a-zA-Z0-9_]/','.',$_GET['owdelid']);
	$del = $fetch->userlistdelete($delid);

}

?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Pending List</h2>
              <!-------For showing the deleting message--------->

              <?php
                  if(isset($del))
                  {
                  	echo $del;
                  }
              ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial</th>
							<th>Zone</th>
							<th>Name</th>
							<th>Gender</th>
							<th>VID</th>
							<th>Proff</th>
							<th>Company</th>
							<th>phone</th>
							<th>Email</th>
							<th>Building name</th>
							<th>Flat_name</th>
							<th>title</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

<!-------For bringing and showing the data of the database owner table--->
<?php
 $s = $fetch->pend();
if($s)
{
	$i = 0;
	while($result = $s->fetch_assoc())
	{

		$i++;
?>


						<tr class="odd gradeX">
							<td><?php echo $i;//echo $result['user_id'];?></td>
							<td><?php echo $result['zone_name'];?></td>
							<td><?php echo $result['name'];?></td>
							<!---<td><?php //echo $result['gender_name'];?></td>--->
							<td><?php echo $result['gender'];?></td>
							<td><?php echo $result['voterid'];?></td>
							<td><?php echo $result['proff'];?></td>
							<td><?php echo $result['company'];?></td>
							<td><?php echo $result['number'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $result['bname'];?></td>
							<td><?php echo $result['flat_no'];?></td>
							<!----<td><?php ///echo $result['title_name'];?></td>---->
							<td><?php echo $result['title'];?></td>
							<!--<td><img src="<?php //echo $result['image'];?>" height="40px" width="40px"/></td>--->

							<td><a onclick="return confirm('Are your sure to delete');" href="?owdelid=<?php echo $result['flat_code'];?>">Delete</a>||<a href="userlist.php?ppidg=<?php echo $result['owner_id'];?>">Permit</a></td>
						</tr>
						<?php
                         }
                     }
                         
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

