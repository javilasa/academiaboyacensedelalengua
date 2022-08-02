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
      <!--Section: Contact v.2-->
      <section class="mb-4">
         <div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-8">
               <!--Section heading-->
               <h2 class="h1-responsive font-weight-bold text-center my-4">Contáctenos</h2>
               <!--Section description-->
               <div class="row">
                  <!--Grid column-->
                  <div class="col-md-9 mb-md-0 mb-5">
                     <form id="contact-form" name="contact-form" action="contactenos.php" method="POST">
                        <!--Grid row-->
                        <div class="row">
                           <!--Grid column-->
                           <div class="col-md-6">
                              <div class="md-form mb-0">
                                 <input type="text" id="name" name="name" class="form-control">
                                 <label for="name" class="">Nombre</label>
                              </div>
                           </div>
                           <!--Grid column-->
                           <!--Grid column-->
                           <div class="col-md-6">
                              <div class="md-form mb-0">
                                 <input type="text" id="email" name="email" class="form-control">
                                 <label for="email" class="">Email</label>
                              </div>
                           </div>
                           <!--Grid column-->
                        </div>
                        <!--Grid row-->
                        <!--Grid row-->
                        <div class="row">
                           <div class="col-md-12">
                              <div class="md-form mb-0">
                                 <input type="text" id="subject" name="subject" class="form-control">
                                 <label for="subject" class="">Asunto</label>
                              </div>
                           </div>
                        </div>
                        <!--Grid row-->
                        <!--Grid row-->
                        <div class="row">
                           <!--Grid column-->
                           <div class="col-md-12">
                              <div class="md-form">
                                 <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                 <label for="message">Mensaje</label>
                              </div>
                           </div>
                        </div>
                        <!--Grid row-->
                        <div class="g-recaptcha" data-sitekey="6LfEEeEZAAAAAKeOXjS2MsCCFsNy-kA0lPuMD8Es"></div>
                        <div class="text-center text-md-left">
                            <input type='submit' class="btn btn-primary text-white" value="Enviar">
                        </div>
                     </form>

                     <div class="status"></div>
                  </div>
                  <!--Grid column-->
                  <!--Grid column-->
                  <div class="col-md-3 text-center">
                     <ul class="list-unstyled mb-0">
                        <li>
                           <i class="fas fa-map-marker-alt fa-2x"></i>
                           <p>Tunja Boyacá Colombia</p>
                        </li>
                        <!--
                        <li>
                           <i class="fas fa-phone mt-4 fa-2x"></i>
                           <p>+ 01 234 567 89</p>
                        </li>
                        -->
                        <li>
                           <i class="fas fa-envelope mt-4 fa-2x"></i>
                           <p>contact@academiaboyacensedelalengua.com</p>
                        </li>
                     </ul>
                  </div>
                  <!--Grid column-->
               </div>
            </div>
         </div>
      </section>
      <!--Section: Contact v.2-->
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
