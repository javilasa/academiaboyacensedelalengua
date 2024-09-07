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

// Ruta al archivo de documentos
$dataFile = './data/documentos.json';

// Verificar si el archivo existe, si no, crear uno vacío
if (!file_exists($dataFile)) {
    $initialData = []; // Puedes personalizarlo según lo que necesites
    file_put_contents($dataFile, json_encode($initialData, JSON_PRETTY_PRINT));
}

// Leer y decodificar el archivo JSON
$documentos = json_decode(file_get_contents($dataFile), true);
?>
      </div>
    </article>

    <article class="py-4 text-dark">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-10 col-md-8">
            <h2 class="text-dark">Documentos</h2>
            <ul class="list-group">
                <?php if (!empty($documentos)): ?>
                    <?php foreach ($documentos as $documento): ?>
                        <li class="list-group-item">
                            <i class="far fa-file"></i>
                            <a href="<?php echo htmlspecialchars($documento['archivo']); ?>" target="_blank">
                                <?php echo htmlspecialchars($documento['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li class="list-group-item">No hay documentos disponibles.</li>
                <?php endif; ?>
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