<div class="row">
  <?php
  foreach ($cards as $card) {
  ?>
  <div class="col-6 col-sm-4 mb-4">
    <div class="card">
      <img class="card-img-top" src="<?php print $card["img"]; ?>" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title"><?php print $card["titulo"]?></h5>
        <p class="card-text"><?php print $card["desc"]?></p>
        <a target="_blank" href="<?php print $card["archivo"]?>" class="btn btn-primary">Descargar</a>
      </div>
    </div>
  </div>
  <?php
  }
  ?>
</div>