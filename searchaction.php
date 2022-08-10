<!-----It is used to bring the js drop down in the starting search bar--->
<?php
  require_once "lib/database.php";
  require_once "format/format.php";
  $db = new database();
  $fm = new format();
  if (isset($_POST['query'])) {
    $inpText = $fm->validation($_POST['query']);
    $sql = "SELECT zonename FROM zone_name WHERE zonename LIKE '%".$inpText."%'";
    $stmt = $db->select($sql);

    if ($stmt) {
      while($result = $stmt->fetch_assoc()){
        echo '<a href="#" class="list-group-item list-group-item-action border-1">'.$result['zonename'].'</a>';
      }
    }
      else {
      echo '<p class="list-group-item border-1">No Record......</p>';
    }
  }
?>