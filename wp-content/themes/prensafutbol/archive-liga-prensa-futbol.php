<?php get_header()?>
<?php 
$var = get_queried_object();
$tipo = $var->taxonomy;
$type = $var->slug;
$typoID = $var->term_id;
?>
<?php /*if(get_field('custom_background' , $tipo.'_'.$typoID)){?>
<style type="text/css">
	body{ background-image:url(<?php echo get_field('custom_background' , $tipo.'_'.$typoID)?>); background-position:top center; background-repeat:no-repeat}
	#header{ background-image:none;}
</style>
<?php }*/?>
<div class="separator"></div>

<div class="main">
	<div class="container">
		<div class="row">
			
			<div id="content" class="column column-2-3">
				
				
				<?php 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$posts = get_posts(array('post_type'=>'liga-prensa-futbol', 'orderby'   => 'menu_order', 'order' => 'ASC' , 'posts_per_page' => 11 , 'paged'=> $paged));
				if($posts){
					
					$countposts = 0;
					foreach($posts as $post):
					$countposts++;	
					$lastcolumn = '';	
						if($countposts == 1){
							echo '<div class="post">';
								echo '<a href="" class="categoriapost">Liga Prensa Futbol</a>';?>
							
								<a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_post_thumbnail($post->ID, 'noticias_destacada')?></a>
							<h3><a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_title($post->ID)?></a></h3>
							<span class="fecha"><?php echo get_the_time('l d F, Y', $post->ID)?></span>
							<p><?php echo get_the_excerpt($post->ID)?></p>
							<div class="morelink"><a href="<?php echo get_permalink($post->ID)?>">Ver más</a></div>
								
							<?php echo '</div>';
						}else{
					
						
						if($countposts %2 == 1){ $lastcolumn = 'column-last';};
						echo '<div class="column column-1-3 post '.$lastcolumn.'">'; ?>
						
						<?php
							echo '<a href="" class="categoriapost">Liga Prensa Futbol</a>';
						?>
						
						<a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_post_thumbnail($post->ID, 'noticias')?></a>
						<h3><a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_title($post->ID)?></a></h3>
						<span class="fecha"><?php echo get_the_time('l d F, Y', $post->ID)?></span>
						<p><?php echo get_the_excerpt($post->ID)?></p>
						<div class="morelink"><a href="<?php echo get_permalink($post->ID)?>">Ver más</a></div>
						<?php echo '</div>';
						
						}
					endforeach;	
					echo '<div class="clear separator"></div>';
					if(function_exists('wp_paginate')) {
						wp_paginate();
					} 
					echo '<div class="clear separator"></div>';
				}else{?>
					<div class="post 404">
						<img src="<?php bloginfo('template_directory')?>/images/404.jpg" alt="" width="630" />
						<h1>Lo sentímos</h1>
						<p>Si Caszely se perdió un penal, que a nosotros se nos pierda una noticia es nada</p>
						<p>Puedes intentar buscando nuevamente lo que necesitas desde acá:</p>
						
						<div class="search">
							<form method="get" id="searchform" action="<?php bloginfo('url')?>">
								<label class="hidden" for="s"></label>
								<span class="glyphicon glyphicon-search"></span>
								<input type="text" placeholder="Buscar..." value="" name="s" id="s">
								<!--<input type="submit" id="searchsubmit" value=""> -->
							</form>
						</div>
					</div>
				<?php }?>
				
				
			</div>
			
			<div id="sidebar" class="column column-1-3 column-last">
				
				<?php get_template_part('sidebar_liga')?>
				
			</div>
			
		</div>
	</div>
</div>




<?php get_footer()?>