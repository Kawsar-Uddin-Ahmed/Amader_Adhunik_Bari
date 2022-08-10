
<!-----------This is for admin panel------------->
<?php 
include 'inc/header.php';
include "../lib/database.php";
include "../format/format.php";

$db = new database();
$fm = new format();
?>

<!---------This is for updating the permission and showing it in search engine-->
 <?php
 if(isset($_GET['upid']))
{
  $ppid = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['upid']);
  $qq = "UPDATE tbl_upload SET permission ='1' WHERE supid='$ppid'";
  $a = $db->update($qq);
}
 ?>

 <!---To delete the owner request---------------->
<!---<?php
/*if(isset($_GET['delid']))
{
  $delid =  preg_replace('/[^-a-zA-Z0-9_]/','.',$_GET['delid']);
   $sql = "DELETE FROM tbl_upload WHERE supid='$id'";

    $delete_row = $this->db->delete($sql);

}*/?>---->

 <!---------------------------------------------->
<!----------------------------------------------------------------------------->
<!---------This for getting the search engine upload and upload it------->
     <div class="grid_10">
            <div class="box round first grid">
                <h2>Pending post</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
          <thead>
            <tr>
              <th>Serial No.</th>
              <th>Building</th>
              <th>Owner</th>
              <th>Flat</th>
              <th>Room</th>
              <th>Address</th>
              <th>Contact</th>
              <!--<th>Code</th>-->
              <th>Zone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <!----This is for showing the pending post----->
          <?php
           $query = "SELECT * FROM tbl_upload WHERE permission=0";
             $q = $db->select($query);
             if($q)
             {
              $i = 0;
              while($r = $q->fetch_assoc())
              {
                $i++
          ?>
            <tr class="odd gradeX">
              <td><?php echo $i?></td>
              <td><?php echo $r['bname'];?></td>
              <td><?php echo $r['ownername']?></td>
              <td><?php echo $r['flat_no']?></td>
              <td><?php echo $r['room']?></td>
              <td><?php echo $r['address']?></td>
              <td><?php echo $r['contact']?></td>
              <!--<td><?php //echo $r['flat_code']?></td>-->
              <td><?php echo $r['zone_name']?></td>
              <td><a href="?upid=<?php echo $r['supid'];?>">Permit</a><!--||<a href="?delid=<?php //echo $r['supid'];?>">Delete</a>--->
            </tr>
          <?php } } ?>
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
