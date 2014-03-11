<?php
include 'mobiledetector.php';
$detect = new Mobile_Detect;

if ($detect->isMobile() && !$detect->isTablet()){

	get_template_part('mobile/index');

}else{?>

<?php get_header()?>

<?php if(get_field('custom_background' , 'options')){?>
<style type="text/css">
	body{ background-image:url(<?php echo get_field('custom_background' , 'options')?>); background-position:top center; background-repeat:no-repeat}
	#header{ background-image:none;}
</style>
<?php }?>

<div id="slider">
	<div class="container">
		<div class="row">
			<div class="column column-2-3">
				
				<ul class="noticiasslider">
				
				<?php
				
				query_posts(array('showposts' => '4' , 'tipo' => array('en-vivo','minuto-a-minuto','noticias','reportajes', 'breves' , 'entrevistas') , 'post_type' => 'post' , 'orderby'   => 'menu_order', 'order'     => 'ASC'));
				while (have_posts()) : the_post();
					//$ids[] = get_the_ID();
					$post_thumbnail_id = get_post_thumbnail_id($post->ID);
					$post_thumbnail_url = wp_get_attachment_image_src( $post_thumbnail_id , 'noticias_destacada');
					?>					
					<li><a href="<?php the_permalink()?>"><img src="<?php echo $post_thumbnail_url[0]?>" alt="" title="<h3><?php the_title()?></h3><?php the_excerpt()?>" /></a></li>
				<?php endwhile;?>
				  
				</ul>
				
				<div id="bx-pager">
				
				<?php
				
				query_posts(array('showposts' => '4', 'tipo' => array('en-vivo','minuto-a-minuto','noticias','reportajes', 'breves' , 'entrevistas') , 'post_type' => 'post', 'orderby'   => 'menu_order', 'order'     => 'ASC'));
				$ids = array();
				$count = -1;
				while (have_posts()) : the_post();
					$count++;
					$ids[] = get_the_ID();
					$post_thumbnail_id = get_post_thumbnail_id($post->ID);
					$post_thumbnail_url = wp_get_attachment_image_src( $post_thumbnail_id , 'noticias_destacada');
					
					?>
					<a data-slide-index="<?php echo $count?>" href=""><img src="<?php echo $post_thumbnail_url[0]?>" height="100" width="154" alt="" /></a>				
					
				<?php endwhile;?>
				  
				</div>
				
				
				<style type="text/css">
				#slider .bx-wrapper{ width:628px}
				</style>
				
			</div>
			
			<div class="column column-1-3 column-last">
				<?php $banners = get_posts(array('post_type' => 'banners' , 'posiciones' => 'slider' , 'posts_per_page' => '2'));
				if($banners){
					$count = 0;
					foreach($banners as $banner):
						$count++;
						$tipo = wp_get_post_terms( $banner->ID, 'tipoBanner');
						if($tipo[0]->slug == 'banner-rectangulo-mediano-300x250'){
							if(get_field('script' , $banner->ID)){;
									echo get_field('script' , $banner->ID);
									if ($count==1){echo '<div class="separator" style="height: 46px;"></div>';};
							}else{
								echo get_the_post_thumbnail($banner->ID);	
							}
						}
					endforeach;
				}
				?>
			</div>
		</div>
	</div>
</div>



<div class="separator"></div>

<div id="banner-middle">
	<div class="container">
		<div class="row">
			<?php $banners = get_posts(array('post_type' => 'banners' , 'posiciones' => 'middle' , 'posts_per_page' => '1'));
			if($banners){
				foreach($banners as $banner):
					
					
					$tipo = wp_get_post_terms( $banner->ID, 'tipoBanner');
					if($tipo[0]->slug == 'skyscraper-horizontal-grande'){
						if(get_field('script' , $banner->ID)){
							echo get_field('script' , $banner->ID);
						}else{
							echo get_the_post_thumbnail($banner->ID);	
						}
					}elseif( $tipo[0]->slug == 'push-down-expandible-970x90'){
						if(get_field('script' , $banner->ID)){
							echo get_field('script' , $banner->ID);
						}else{
							echo get_the_post_thumbnail($banner->ID);	
						}
					}elseif( $tipo[0]->slug == 'banner-bilboard-970x250'){
						if(get_field('script' , $banner->ID)){
							echo get_field('script' , $banner->ID);
						}else{
							echo get_the_post_thumbnail($banner->ID);	
						}
					}
					
					
				endforeach;
			}
			?>
		</div>
	</div>
</div>

<div class="separator"></div>

<div class="main">
	<div class="container">
		<div class="row">
			
			<div id="content" class="column column-2-3">
			
				
				<?php
				$countposts = 0;
				wp_reset_query();
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				query_posts(array('posts_per_page' => 12 , 'post__not_in' => $ids , 'paged' => $paged , 'tipo' => array('en-vivo','minuto-a-minuto','noticias','reportajes', 'breves' , 'entrevistas'), 'post_type' => 'post' , 'orderby'   => 'menu_order', 'order'     => 'ASC'));
				while (have_posts()) : the_post();
					$countposts++;
				
					$lastcolumn = '';
					if($countposts %2 == 0){ $lastcolumn = 'column-last';};
					
					echo '<div class="column column-1-3 post '.$lastcolumn.'">'; ?>
					
					<?php $tipoPost = wp_get_post_terms( $post->ID, 'tipo');
					if($tipoPost[0]->slug == 'noticias'){
						$equipo = wp_get_post_terms( $post->ID, 'equipo');
						$link = get_term_link( $equipo[0]->slug, 'equipo' );
						echo '<a href="'.$link.'" class="categoriapost">'.$equipo[0]->name.'</a>';
					}else{
						$link = get_term_link( $tipoPost[0]->slug, 'tipo' );
						echo '<a href="'.$link.'" class="categoriapost">'.$tipoPost[0]->name.'</a>';
					};
					?>
					
					<a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_post_thumbnail($post->ID, 'noticias')?></a>
					<h3><a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_title($post->ID)?></a></h3>
					<span class="fecha"><?php echo get_the_time('l d F, Y', $post->ID)?></span>
					<p><?php echo get_the_excerpt($post->ID)?><?php if($tipoPost[0]->slug == 'en-vivo' | $tipoPost[0]->slug == 'minuto-a-minuto'){ echo '<img src="'.get_bloginfo('template_directory').'/images/balon.gif" style="display:inline; margin-top:-5px" alt="" />';}?></p>
					<div class="morelink"><a href="<?php echo get_permalink($post->ID)?>">Ver más</a></div>
					<?php echo '</div>';
				
				
				endwhile;
				
				echo '<div class="clear separator"></div>';
				if(function_exists('wp_paginate')) {
					wp_paginate();
				}
				
				?>
			
				<?php //if($posts){
					//$countposts = 0;
					/*foreach($posts as $post):
						$countposts++;
						
						$lastcolumn = '';
						if($countposts %2 == 0){ $lastcolumn = 'column-last';};
						
						echo '<div class="column column-1-3 post '.$lastcolumn.'">'; ?>
						
						<?php $tipoPost = wp_get_post_terms( $post->ID, 'tipo');
						if($tipoPost[0]->slug == 'noticias'){
							$equipo = wp_get_post_terms( $post->ID, 'equipo');
							$link = get_term_link( $equipo[0]->slug, 'equipo' );
							echo '<a href="'.$link.'">'.$equipo[0]->name.'</a>';
						}else{
							$link = get_term_link( $tipoPost[0]->slug, 'tipo' );
							echo '<a href="'.$link.'">'.$tipoPost[0]->name.'</a>';
						};
						?>
						
						<a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_post_thumbnail($post->ID, 'noticias')?></a>
						<h3><a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_title($post->ID)?></a></h3>
						<span class="fecha"><?php echo get_the_time('l d F, Y', $post->ID)?></span>
						<p><?php echo get_the_excerpt($post->ID)?></p>
						<div class="morelink"><a href="<?php echo get_permalink($post->ID)?>">Ver más</a></div>
						<?php echo '</div>';
						
						
					endforeach;	*/
					/* echo '<div class="clear separator"></div>';
					if(function_exists('wp_paginate')) {
						wp_paginate();
					} 
					
				} */?>
			
				
				
			</div>
			
			<div id="sidebar" class="column column-1-3 column-last">
				
				
				<?php $banners = get_posts(array('post_type' => 'banners' , 'posiciones' => 'side-noticias' , 'posts_per_page' => '1'));
				if($banners){
					foreach($banners as $banner):
						$tipo = wp_get_post_terms( $banner->ID, 'tipoBanner');
						if($tipo[0]->slug == 'banner-rectangulo-mediano-300x250'){
							if(get_field('script' , $banner->ID)){;
									get_template_part('galeria');
									echo '<div class="separator"></div>';
									echo get_field('script' , $banner->ID);
									
									
							}else{
								echo get_the_post_thumbnail($banner->ID);
									
							}
						}elseif($tipo[0]->slug == 'skyscraper-grande-300x600'){
							if(get_field('script' , $banner->ID)){;
									echo get_field('script' , $banner->ID);
							}else{
								echo get_the_post_thumbnail($banner->ID);	
							}
						}
					endforeach;
				}
				?>
				
				<div class="separator"></div>
				
				<?php get_template_part('torneos');?>
				
				<div class="separator"></div>
				
				<?php get_template_part('pftv');?>
				
				<div class="separator"></div>
				
				<?php get_template_part('visto');?>
				
				<div class="separator"></div>
				<div class="widget">
					<div class="fb-like-box" data-href="http://www.facebook.com/prensafutbol.cl" data-height="370" data-width="298" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
				</div>
			</div>
			
		</div>
	</div>
</div>




<?php get_footer()?>

<?php }?>