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
    <article class="py-4 text-dark">
      
      <div class="row justify-content-center">
        <div class="col-11 col-sm-10 col-md-8">
          <h2 class="text-dark">Miembros</h2> 
          <?php           
            $membersFile = './data/miembros.json';
            $miembros = json_decode(file_get_contents($membersFile), true);
            $position = "";
            foreach($miembros as $miembro){
                $position = $position == "right" ? "left":"right";
                $card_img = $miembro["img"];
                $card_title = $miembro["nom"];
                $card_description1 = $miembro["cargo"];
                $card_description2 = $miembro["desc"];
                include("templates/card_left_right.tpl.php");
            }
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