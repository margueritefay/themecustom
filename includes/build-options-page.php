<?php

function tc_build_options_page(){
  $theme_options = get_option('tc_options');
  ?>

<div class="wrap">
  <div class="container">
    <?php if(isset($_GET['status']) && $_GET['status'] == 1){
      echo '<div class="alert alert-success">Mise à jour effectuée avec succès</div>';
    } ?>
    <div class="jumbotron">
      <h1 class="h2">Paramètres du site</h1>

      <form id="form-tc-options" class="form-horizontal" action="admin-post.php" method="post">
        <input type="hidden" name="action" value="themecustom_save_options">
        <?php
          //attribut value = "fonction utilisée pour sauvegarder les options"
          //add_action('admin_post_themecustom_save_options', 'my-function');

          //verifie que la personne qui a rempli le formulaire était autorisée
          wp_nonce_field('tc_options_verify');
         ?>
           <div class="col-xs-12">
             <div class="form-group">
               <label for="tc_legend_01" class="col-sm-2 control-label">Légende</label>
               <div class="col-sm-10">
                 <input type="text" id="tc_legend_01" name="tc_legend_01"
                        value="<?php echo $theme_options['legend_01']; ?>" style="width:100%;">

               </div>
             </div>
           </div>
          <div>
          <button id="validation" type="submit" class="btn btn-success btn-lg">Mettre à jour</button>
        </div>
      </form>
    </div>
  </div> <!-- end container-->

</div>
  <?php
}//fin de la fonction tc_build_options_page
 ?>
