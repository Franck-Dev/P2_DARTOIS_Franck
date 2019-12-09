<?php
/**
* Template Name: Creation Articles
*/

get_header(); ?>
	<div id="content-wrap" class="container clr">
		<div id="primary" class="content-area clr">
			<div id="content" class="site-content clr">
			<?php
				if(isset($_POST['Envoyer'])){
					
					/**
					* Création des variables récupérants les données du formulaire
					*/
					$titre= wp_strip_all_tags($_POST['Titre']);
					$nom= htmlspecialchars($_POST['Nom']);
					$description= wp_kses_post($_POST['Description']);
					$image=$_POST['Image'];
					$categorie=array($_POST['ListCate'],"");
					if($_POST['ListCate']=="3"){
						$statutcomment="open";
					}
					else{
						$statutcomment="closed";
					}

					/**
					* Création du post avec les données du formulaire
					*/
					$chalet_post=array(
						'post_title' => $titre,
						'post_name' => $nom,
						'post_content' => $description,
						'post_category' => $categorie,
						'post_status' => 'publish',
						'post_type' => 'post'
					);
					
					$post_id=wp_insert_post($chalet_post);
					if($post_id)echo 'Votre article a bien été enregistré';
					else echo 'Problème d\'enregistrement de l\'article.';
					
					/**
					* Création du de la thumbnail
					*/
					  require_once(ABSPATH . "wp-admin" . '/includes/image.php');
					  require_once(ABSPATH . "wp-admin" . '/includes/file.php');
					  require_once(ABSPATH . "wp-admin" . '/includes/media.php');

					$attachment_id = media_handle_upload('image', $post_id);

					if (!is_wp_error($attachment_id)) { 
							set_post_thumbnail($post_id, $attachment_id);
							header("Location: " . $_SERVER['HTTP_REFERER'] . "/?files=uploaded");
						}
				}
				else{ ?>
					<form action="" method="POST" enctype="multipart/form-data">
						<label for="name"><strong>Titre de l'article :</strong></label></br>
						<input type="text" name="Titre" id="Titre" placeholder="Donner un titre à votre article du style Chalet XX"/>
						</hr>
						<label for="namechalet"><strong>Nom du chalet :</strong></label>
						<input type="text" name="Nom" id="Nom" placeholder="Donner un nom évocateur du type de Chalet "/>
						</hr>
						<label for="catechalet"><strong>Choix de la catégorie :</strong></label>
						<select name="ListCate">
						<?php $cats = get_categories();
							foreach ($cats as $cat) {?>
								
								<option value="<?php echo $cat->term_id?>"><?php echo $cat->name?>
								</option></br><?php
							}
						?>
						</select>
						</hr>
						<label for="image"><strong>Sélectionner une photo de présentation :</strong></label>
						<input type="file" id="Image" name="image" accept="image/png, image/jpeg"/>
						</br>
						<label for="name"><strong>Description du chalet :</strong></label>
						<textarea cols="50" rows="10" name="Description" id="Description" placeholder="Décrire les atouts du Chalet "></textarea>
						</hr>
						<input class="button" type="submit" name="Envoyer" value="Enregistrer Article"/>
						</br>
					</form>
				<?php } ?>
			</div><!-- #content -->
		</div><!-- #primary -->
	</div><!-- #content-wrap -->
<?php get_footer(); ?>