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
            $miembros = [];
            $miembros[] = [
                "name" => "Gilberto Avila Monguí",
                "img_path" => "assets/images/miembros/GilbertoAvila.png",
                "description1" => "Presidente",
                "description2" => "Junta Directiva",
            ];
            $miembros[] = [
                "name" => "Miguel Angel Avila",
                "img_path" => "assets/images/miembros/MiguelAvila.png",
                "description1" => "Subdirector",
                "description2" => "Junta Directiva",                
            ];            
            $miembros[] = [
                "name" => "Gilberto Abril",
                "img_path" => "assets/images/miembros/GilbertoAbril.png",
                "description1" => "Secretario",
                "description2" => "Junta Directiva",                
            ];
            $miembros[] = [
                "name" => "Beatriz Pinzón",
                "img_path" => "assets/images/miembros/BeatrizPinzon.png",
                "description1" => "Tesorera",
                "description2" => "Junta Directiva",                
            ];            
            $miembros[] = [
                "name" => "Gustavo Torres",
                "img_path" => "assets/images/miembros/GustavoTorres.png",
                "description1" => "Veedor",
                "description2" => "Junta Directiva",                
            ];
            
            
            foreach($miembros as $miembro){
                
                $position = $position == "right"? "left":"right";
                $card_img = $miembro["img_path"];
                $card_title = $miembro["name"];
                $card_description1 = $miembro["description1"];
                $card_description2 = $miembro["description2"];
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