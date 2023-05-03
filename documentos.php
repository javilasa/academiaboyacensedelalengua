<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
require_once "head.html";
?>
  </head>

<body>
  <header>
    <?php
require_once "menu.html";
?>
  </header>

  <section>
      <section>
    <article>
      <div>
        <?php
$bg_img = "assets/images/header1.jpg";
$bg_title = "ACADEMIA BOYACENSE DE LA LENGUA";
$bg_header = "assets/images/escudoABL.png";
require_once "templates/header.tpl.php";
?>
      </div>
    </article>

    <article class="py-4 text-dark">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-8">
                <h2 class="text-dark">Documentos</h2>
                <ul class="list-group">
                  <!--
                  <li class="list-group-item"><i class="far fa-file"></i><a href="/assets/files/docs/ESTADOS_FINANCIEROS_ACADEMIA_2021.pdf">  Estados Financieros 2022</a></li>
                  <li class="list-group-item"><i class="far fa-file"></i><a href="/assets/files/docs/INFORME_DE_GESTION_ACADEMIA_2021.pdf">  Informe Gestión 2022</a></li>
                  <li class="list-group-item"><i class="far fa-file"></i><a href="/assets/files/docs/CERTIFICADO_DE_ANTECEDENTES_MIEMBROS_DIRECTIVOS_Y_FUNADADORES_ACADEMIA_2021.pdf">  Certificado Antecedentes Miembros Directivos</a></li>
                  <li class="list-group-item"><i class="far fa-file"></i><a href="/assets/files/docs/CERTIFICADO_DE_CUMPLIMIENTO_DE_REQUISITOS_2021.pdf">  Certificado de Cumplimiento de Requisitos 2021</a></li>
                  <li class="list-group-item"><i class="far fa-file"></i><a href="/assets/files/docs/1116602405352-PRESENTACION_RENTA_AÑO_2020_ACADEMIA.pdf">  Presentación Renta - Academia 2020</a></a></li>
                  -->
                  <li class="list-group-item"><i class="far fa-file"></i><a href="/assets/files/docs/ESTADOS_FINANCIEROS_ACADEMIA_2022.pdf">  Estados Financieros 2022</a></li>
                  <li class="list-group-item"><i class="far fa-file"></i><a href="/assets/files/docs/INFORME_DE_GESTION_2022.pdf">  Informe Gestión 2022</a></li>
                  <li class="list-group-item"><i class="far fa-file"></i><a href="/assets/files/docs/CERTIFICADO_ANTECEDENTES_2022.pdf">  Certificado Antecedentes Miembros Directivos</a></li>
                  <li class="list-group-item"><i class="far fa-file"></i><a href="/assets/files/docs/DECLARACION_DE_RENTA_2022.pdf">  Presentación Renta - Academia 2022</a></a></li>
                  <li class="list-group-item"><i class="far fa-file"></i><a href="/assets/files/docs/INFORME_DE_TESORERIA_2022.pdf">  Informe Tesorería 2022</a></a></li>
                  <li class="list-group-item"><i class="far fa-file"></i><a href="/assets/files/docs/INFORME_DE_GESTION_2022.pdf">  Informe Gestión 2022</a></a></li>
                  <li class="list-group-item"><i class="far fa-file"></i><a href="/assets/files/docs/RENOVACION_CAMARA_DE_COMERCIO_ABL_2023.pdf">  Cámara de Comercio 2023</a></a></li>
                  <li class="list-group-item"><i class="far fa-file"></i><a href="/assets/files/docs/RUES_ABL_2023.pdf">  RUES 2023</a></li>
                </ul>
            </div>

        </div>

    </article>

  </section>
</body>
<footer id="myFooter" class="bg-light pt-4">
    <?php
require_once "footer.html";
?>
</footer>

<?php
require_once "scripts.html";
?>

</html>