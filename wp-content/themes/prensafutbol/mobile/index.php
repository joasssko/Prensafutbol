<?php /* include '../mobiledetector.php';
$dotect = new Mobile_Detect;

if ($dotect->isiPhone()){
	echo 'hola!';	
}elseif($dotect->isAndroidOS()){
	echo 'Adios!';
} */?>

	

<?php get_template_part('mobile/header')?>

<div class="inside">

<ul class="noticiasslider">
	
	<?php
	
	query_posts(array('showposts' => '4' , 'tipo' => 'en-vivo,minuto-a-minuto,noticias,reportajes,breves' , 'post_type' => 'post' , 'orderby'   => 'menu_order', 'order'     => 'ASC'));
	while (have_posts()) : the_post();
		$ids[] = get_the_ID();
		$post_thumbnail_id = get_post_thumbnail_id($post->ID);
		$post_thumbnail_url = wp_get_attachment_image_src( $post_thumbnail_id , 'noticias_destacada');
		?>					
		<li><a href="<?php the_permalink()?>"><img src="<?php echo $post_thumbnail_url[0]?>" alt="" title="<h4><?php the_title()?></h4>" /></a></li>
	<?php endwhile;?>
	  
</ul>




<?php
				$countposts = 0;
				wp_reset_query();
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				query_posts(array('posts_per_page' => 8 , 'post__not_in' => $ids , 'paged' => $paged , 'tipo' => array('en-vivo','minuto-a-minuto','noticias','reportajes', 'breves' , 'entrevistas'), 'post_type' => 'post' , 'orderby'   => 'menu_order', 'order'     => 'ASC'));
				while (have_posts()) : the_post();
					$countposts++;
					
					if($countposts == 4){
						$banners = get_posts(array('post_type' => 'banners' , 'posiciones' => 'mobile-middle' , 'posts_per_page' => '1'));
						if($banners){
							foreach($banners as $banner):
								
								$tipo = wp_get_post_terms( $banner->ID, 'tipoBanner');
								if($tipo[0]->slug == 'mobile-banner-rectangulo-mediano-300x250'){
									if(get_field('script' , $banner->ID)){
										echo '<div class="bannerMiddleMobile">';
										echo get_field('script' , $banner->ID);	
										echo '</div>';
									}
								}
																	
							endforeach;
						}
					}
					
					
					echo '<div class="post clear">'; ?>
					
					<?php $tipoPost = wp_get_post_terms( $post->ID, 'tipo');
					if($tipoPost[0]->slug == 'noticias'){
						$equipo = wp_get_post_terms( $post->ID, 'equipo');
						$link = get_term_link( $equipo[0]->slug, 'equipo' );
						if($countposts < 4){
						echo '<a href="'.$link.'" class="categoriapost">'.$equipo[0]->name.'</a>';
						}
					}else{
						$link = get_term_link( $tipoPost[0]->slug, 'tipo' );
						if($countposts < 4){
						echo '<a href="'.$link.'" class="categoriapost">'.$tipoPost[0]->name.'</a>';
						}
					};
					
					
					if($countposts < 4){
					?>
					<a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_post_thumbnail($post->ID, 'thumbnail' , array('class'=>'alignleft' , 'style' => 'width:95px; height:auto'))?></a>
                    <?php }?>
                    <?php if($countposts < 4){?>
					<h3><a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_title($post->ID)?></a><?php if($tipoPost[0]->slug == 'en-vivo' | $tipoPost[0]->slug == 'minuto-a-minuto'){ echo '<img src="'.get_bloginfo('template_directory').'/images/balon.gif" style="display:inline; margin-top:-5px" alt="" />';}?></h3>
                    <?php }else{?>
                    <h4><a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_title($post->ID)?></a><?php if($tipoPost[0]->slug == 'en-vivo' | $tipoPost[0]->slug == 'minuto-a-minuto'){ echo '<img src="'.get_bloginfo('template_directory').'/images/balon.gif" style="display:inline; margin-top:-5px" alt="" />';}?></h4>
                    <?php }?>
					<span class="fecha"><?php echo get_the_time('l d F, Y', $post->ID)?> 
                    
                    <?php if($tipoPost[0]->slug == 'noticias'){
						$equipo = wp_get_post_terms( $post->ID, 'equipo');
						$link = get_term_link( $equipo[0]->slug, 'equipo' );
						if($countposts > 3){
						echo ' | <a href="'.$link.'" >'.$equipo[0]->name.'</a>';
						}
					}else{
						$link = get_term_link( $tipoPost[0]->slug, 'tipo' );
						if($countposts > 3){
						echo ' | <a href="'.$link.'" >'.$tipoPost[0]->name.'</a>';
						}
					};?>
                    
                    </span>
                    
                    
                    
                   <!-- <p><?php echo get_the_excerpt($post->ID)?></p> -->
				   
				   
				   
					<div class="morelink"><a href="<?php echo get_permalink($post->ID)?>">Ver más</a></div>
					<?php echo '</div>';
				
				
				endwhile;
				
				echo '<div class="clear separator"></div>';
				if(function_exists('wp_paginate')) {
					wp_paginate();
				}
				
				?>
			
			</div>
            

			<div class="clear separator"></div>
            
            <div class="inside">            
            	<div class="divider"></div>
            	<h4>Breves</h4>
            </div>
				<ul class="footerposts">
				<?php 
				wp_reset_query();
				$entrevistas = get_posts(array('tipo' => 'breves' , 'numberposts' => 3, ));
				if($entrevistas){
					foreach( $entrevistas as $entrevista ):
					echo '<li class="clearfix"><div class="inside">';
						echo '<h5><a href="'.get_permalink($entrevista->ID).'">'.get_the_title($entrevista->ID).'</a></h5>';		
						echo '<a href="'.get_permalink($entrevista->ID).'">'.get_the_post_thumbnail($entrevista->ID , 'mininoticias' , array('class'=>'alignleft')).'</a>';
						echo '<p>'.substr($entrevista->post_excerpt , 0 , 159).'...</p>';
						echo '<div class="morelink"><a href="'. get_permalink($entrevista->ID).'">Ver más</a></div>';
					echo '</div></li>';	
					endforeach;
				}
				?>
				</ul>
			

</div>

<?php get_template_part('mobile/footer')?>