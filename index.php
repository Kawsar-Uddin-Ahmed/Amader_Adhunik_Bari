<?php
 include "inc/header.php";
?>

<!--*********--------- Main Content **********---------->

<div class="container" style="margin-top:10%">
 <div class="jumbotron">
  <!---For renter----->
  <?php if(Session::get('state') == 1){?>
     <a href="Totalrent.php"><button class="btn btn-success btn-lg">List</button></a>
    <!-------------->
    <!---For owner----->
   <?php }elseif(Session::get('state') == 0) { ?>
       <a href="Totalown.php"><button class="btn btn-success btn-lg">Prove</button></a><?php } ?>
        <?php if(Session::get('state') == 0){?>
     <a href="history.php"><button class="btn btn-primary btn-lg">History</button></a><?php } ?>
     <?php if(Session::get('state') == 0){?>
     <a href="uploadsearchengine.php"><button class="btn btn-primary btn-lg">Upload Flat</button></a><?php } ?>
        <!-------------->
      <h1 class="display-1 font-weight-bold text-uppercase ml9" >Welcome To</h1>
      <h1 class="display-3 text-info font-weight-bold text-uppercase ml9"><span class="text-wrapper">
    <span class="letters">Amader Adhunik Bari</span>
  </span></h1>
 </div>
</div>

<!--*********--------- Main Content End **********---------->



<!--*********--------- Script for Text Animate **********---------->

<script >
    
    // Wrap every letter in a span
$('.ml9 .letters').each(function(){
  $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
});

anime.timeline({loop: true})
  .add({
    targets: '.ml9 .letter',
    scale: [0, 1],
    duration: 1500,
    elasticity: 600,
    delay: function(el, i) {
      return 45 * (i+1)
    }
  }).add({
    targets: '.ml9',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });
</script>
<!--*********--------- Script for Text Animate End **********---------->


 <div class="footer bg-dark" > <!-- style="background-color:darkslategrey" -->
  <p class="mt-2">Copyright &copy; 2019, Devloped By <a style="color: burlywood">Kawsar</a></p>
</div>
</body>
</html>

<?php

 include "inc/footer.php";

?>