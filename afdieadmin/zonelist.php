
<!-------Connected to flat_code table in database----->

<?php
include "inc/header.php";
include "../class/user_admin.php";
$obj = new useradmin();
?>

<?php
if(isset($_GET['zdelid']))
{
	$delid =  preg_replace('/[^-a-zA-Z0-9_]/','.',$_GET['zdelid']);
	$del = $obj->zonedel($delid);

}

?>
<div class="grid_10">
            <div class="box round first grid">
                <h2>Zone list</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Zone Name</th>
							<th>Action</th>
                       </tr>
					</thead>
					<tbody>

<!-------For bringing and showing the data of the database owner table--->
<?php
 $s = $obj->zonelist();
if($s)
{
	$i = 0;
	while($result = $s->fetch_assoc())
	{

		$i++;
?>


						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['zonename'];?></td>
							<td><a onclick="return confirm('Are your sure to delete');" href="?zdelid=<?php echo $result['zoid'];?>">Delete</a></td>
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

