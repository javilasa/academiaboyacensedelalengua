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
         $bg_header = "assets/images/escudoABL.png";
         require_once("templates/header.tpl.php");
        ?>   
      </div>
    </article>
    
    <article>
        <div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-8 mt-4">
                <h2 class="text-dark">Revistas</h2> 
        <?php
        $label = "Descargar";
        
        $data = file_get_contents("data/revistas.json");
        $cards = array_reverse(json_decode($data, true));
    
         require_once("templates/cards_four_two_columns.tpl.php");
        ?>
            </div>
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