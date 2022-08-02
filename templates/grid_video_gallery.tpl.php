
<div class="row">
    <?php
    $cont = 0;
    foreach ($videos as $video) {
        $modal_id = "modal".$cont;
    ?>
    <div class="col-lg-4 col-md-6 mb-4">
        <!--Modal: Name-->
        <div class="modal fade" id="<?php print $modal_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
    
            <!--Content-->
            <div class="modal-content">
    
              <!--Body-->
              <div class="modal-body mb-0 p-0">
    
                <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                  <iframe class="embed-responsive-item" src="<?php print $video["src"]; ?>"
                    allowfullscreen></iframe>
                </div>
    
              </div>
    
              <!--Footer-->
              <div class="modal-footer d-block d-md-flex justify-content-center">
                <span class="mr-4"><?php print $video["title"]; ?></span>
                <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Cerrar</button>
              </div>
    
            </div>
            <!--/.Content-->
    
          </div>
        </div>
        <!--Modal: Name-->
    
        <a><img class="img-fluid z-depth-1 border border-secondary" src="<?php print $video["img"]; ?>" alt="video"
            data-toggle="modal" data-target="#<?php print $modal_id; ?>"></a>

    </div>
    <?php
        $cont++;
    }
    ?>
</div>
  