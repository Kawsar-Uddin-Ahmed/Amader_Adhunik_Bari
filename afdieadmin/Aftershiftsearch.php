
<!-----------This is for admin panel------------->
<?php 
include 'inc/header.php';
include "../lib/database.php";
include "../format/format.php";

$db = new database();
$fm = new format();
?>

<!---------This is for updating the permission and showing it in search engine-->

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
                <h2>Approved flat</h2>
                 <?php
 if(isset($_GET['delid']))
{
    $deid =preg_replace('/[^a-zA-Z0-9_]/','.',$_GET['delid']);
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
           $query = "SELECT * FROM tbl_upload WHERE permission=1";
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
              <td><a href="?delid=<?php echo $r['supid'];?>">Delete</a><!--||<a href="?delid=<?php //echo $r['supid'];?>">Delete</a>--->
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
