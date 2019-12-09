<?php
/**
* Template Name: Suppression Article
*/

get_header(); ?>
	<div id="content-wrap" class="container clr">
		<div id="primary" class="content-area clr">
			<div id="content" class="site-content clr">
			<?php
				if(isset($_POST['Supprimer'])){
					
					/**
					* Création des variables récupérants les données du formulaire
					*/
					$Id_Chalet=$_POST['ListChalets'];
					
					$post_id=wp_delete_post($Id_Chalet);
					if($post_id)echo 'Votre article a bien été supprimé';
					else echo 'Problème d\'enregistrement de l\'article.';
				}
				else{ ?>
					<form action="" method="POST" enctype="multipart/form-data">
						<label for="numchalet"><strong>Choisir le chalet à supprimer :</strong></label>
						<select name="ListChalets">
						<?php $args = array(
							  'numberposts' => 10
								); 
						$chalets = get_posts($args);
							foreach ($chalets as $chat) {
								var_dump($chat);?>
								
								<option value="<?php echo $chat->ID?>"><?php echo $chat->post_title?>
								</option></br><?php
							}
						?>
						</hr>
						<input class="button" type="submit" name="Supprimer" value="Supprimer Article"/>
						</br>
						</select>
					</form>
				<?php } ?>
			</div><!-- #content -->
		</div><!-- #primary -->
	</div><!-- #content-wrap -->
<?php get_footer(); ?>