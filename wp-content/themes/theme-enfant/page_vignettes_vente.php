<?php
/**
* Template Name: Affichage Vignettes Vente
*/

get_header(); ?>

	<div id="content-wrap" class="container clr">

		<div id="primary" class="content-area clr">

			<div id="content" class="site-content clr">
				<h2 name="TitrePage" >Chalets en vente :</h2>
				<?php $args = array(
					'numberposts'	=> 10,
					'category'		=> 1
				);
				$my_posts = get_posts( $args );
				if( ! empty( $my_posts ) ){
					$output = '<ul>';
					foreach ( $my_posts as $p ){
						$output .= '<li class="card"><a class="card-titre" href="' . get_permalink( $p->ID ) . '">' 
						. $p->post_name . '</a><div class="card-body">'. get_the_post_thumbnail( $p->ID, 'medium' ).'</div><div class="card-footer">'. $p->post_content .'</div></li>';
					}
					$output .= '<ul>';
				}
				echo $output ;?>

			</div><!-- #content -->

		</div><!-- #primary -->


	</div><!-- #content-wrap -->


<?php get_footer(); ?>