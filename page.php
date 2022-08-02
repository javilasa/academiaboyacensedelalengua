<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
     require_once("head.html");
    ?>
  </head>

<body>
  <header>
    <?php
     require_once("menu.html");
    ?>
  </header>

  <section>
    <article>
      <div>
        <?php
         $bg_img = "assets/images/header1.jpg";
         $bg_title = "ACADEMIA BOYACENSE DE LA LENGUA";
         $bg_header = "assets/images/Logo_preview_rev_1.png";
         require_once("templates/header.tpl.php");
        ?>   
      </div>
    </article>
    
  </section>
</body>
<footer id="myFooter" class="bg-light pt-4">
    <?php
     require_once("footer.html");
    ?>
</footer>

<?php
 require_once("scripts.html");
?>

</html> 