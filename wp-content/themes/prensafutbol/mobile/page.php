<?php get_template_part('mobile/header')?>

<div class="separator"></div>

<div class="main">
	<div class="container">
		<div class="row">
        <div class="inside">
			
			
				
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php setPostViews(get_the_ID());?>
				<div class="post">
					
						<span class="fecha izq">&nbsp;</span>
						<ul class="fontSize der">
							<script language="javascript">
								function emailCurrentPage(){
									window.location.href="mailto:?subject="+document.title+"&body="+escape(window.location.href);
								}
							</script>
							<li><a href="javascript:emailCurrentPage()" class="glyphicon glyphicon-envelope"></a></li>
							<li><a href="javascript:window.print()" class="glyphicon glyphicon-print"></a></li>
							<li><a href="#galerias" class="glyphicon glyphicon-picture"></a></li>
                        	<li class="fontSizeSmall">A</li>
                        	<li class="fontSizeMedium">A</li>
                        	<li class="fontSizeLarge">A</li>
                        </ul>
					
					<div class="clear border"></div>
					<h1><?php the_title()?></h1>
					
					
					
					
					
					<?php if($tipo[0]->slug == 'en-vivo'){?>
					<?php 
					$banners = get_posts(array('post_type' => 'banners' , 'posiciones' => 'mobile-mxm' , 'posts_per_page' => '1'));
					if($banners){
						foreach($banners as $banner):
							
							$tipobanner = wp_get_post_terms( $banner->ID, 'tipoBanner');
							if($tipobanner[0]->slug == 'mobile-320x50'){
								if(get_field('script' , $banner->ID)){
									echo '<div class="bannerMiddleMobile">';
									echo get_field('script' , $banner->ID);	
									echo '</div>';
								}
							}															
						endforeach;
					}
					?>
					<?php }?>
					
					<?php the_content()?>
					
					<div class="clear border"></div>
										
					<div class="clear"></div>
									
				</div>
				
				<?php if($tipo[0]->slug != 'en-vivo'){?>
				<?php 
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
				?>
				<?php }?>

				<div class="clear separator"></div>
					
				<div class="sharebox">
					<div class="column-1-3 column facebook">
						<div class="fb-like" data-href="<?php the_permalink()?>" data-width="300" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
					</div>
					<div class="column-1-3 column column-last twitter">
						<a href="https://twitter.com/intent/tweet?button_hashtag=PrensaFutbol&text=<?php echo get_the_title()?>"  class="twitter-hashtag-button" data-via="PrensaFutbol" data-url="<?php the_permalink()?>" data-lang="es" data-related="jasoncosta">Tweet #PrensaFutbol</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

						<div class="g-plusone" data-size="medium" data-href="<?php the_permalink()?>"></div>						
					</div>
				</div>								
				
				<div class="separator"></div>
				
			<?php endwhile; else: ?>
			Sorry, no posts matched your criteria.
			<?php endif; ?>
				<div class="posted-on backhome">
					<a href="<?php bloginfo('url')?>">Volver al Inicio</a>
				</div>	
			</div>
			
			</div>
		</div>
	</div>
</div>




<?php get_template_part('mobile/footer')?>