<?php
 if($position == "left"){
?>
<div class="card mb-4 photo-left bg-light">
  <div class="row no-gutters">
    <div class="col-sm-2">
      <img src="<?php echo $card_img ?>" class="card-img" alt="...">
    </div>
    <div class="col-sm-10">
      <div class="card-body text-right">
        <h5 class="card-title"><?php echo $card_title ?></h5>
        <p class="card-text"><?php echo $card_description1 ?></p>
        <p class="card-text"><small class="text-muted"><?php echo $card_description2 ?></small></p>
      </div>
    </div>
  </div>
</div>
<?php 
 }
 
 if($position == "right"){
?>
    <div class="card mb-4 photo-right bg-secondary text-white">
      <div class="row no-gutters">
        <div class="col-sm-10 d-none d-sm-block">
          <div class="card-body">
            <h5 class="card-title"><?php echo $card_title ?></h5>
            <p class="card-text"><?php echo $card_description1 ?></p>
            <p class="card-text"><small class=""><?php echo $card_description2 ?></small></p>
          </div>
        </div>
        <div class="col-sm-2">
          <img src="<?php echo $card_img ?>" class="card-img" alt="...">
        </div>
        <div class="col-sm-8 d-block d-sm-none">
          <div class="card-body">
            <h5 class="card-title"><?php echo $card_title ?></h5>
            <p class="card-text"><?php echo $card_description1 ?></p>
            <p class="card-text"><small class="text-muted"><?php echo $card_description2 ?></small></p>
          </div>
        </div>        
      </div>
    </div>
<?php
 }
?>