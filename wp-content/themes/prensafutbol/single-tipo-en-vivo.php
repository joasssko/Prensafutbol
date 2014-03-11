<?php get_header()?>



<div class="separator"></div>

<div class="main">
	<div class="container">
		<div class="row">
			
			<div id="content" class="column column-2-3">
				
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php setPostViews(get_the_ID());?>
				<div class="post">
					<div class="column column-1-3">
						<span class="fecha"><?php echo get_the_time('l d F, Y', $post->ID)?></span>
					</div>
					
					<div class="column column-1-3 column-last">
						<ul class="fontSize">
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
					</div>
					<div class="clear border"></div>
					<h1><?php the_title()?></h1>

					<p class="excerpt">
						<?php echo get_the_excerpt()?>
					</p>
					
					<?php //the_content()?>
					
					
					<?php echo get_field('url')?>
					
					<div class="clear border"></div>
					<h3 id="galerias">Galería de imágenes</h3>
					<div class="galerias">
					<?php $galeria = get_posts(array( 'post_type'=>'attachment' , 'post_parent' => get_the_ID()));
					if($galeria){
						foreach($galeria as $imagen):
							
							
							$full = wp_get_attachment_image_src($imagen->ID, 'full');
							echo '<a href="'.$full[0].'" rel="shadowbox[Lugares]" title="'.get_the_title($imagen->ID).'">';
							echo wp_get_attachment_image( $imagen->ID, 'thumbnail' );
							echo '</a>';
						endforeach;
					}
					?>
					</div>
					<div class="clear"></div>
									
				</div>
				
				<div class="posted-on">
				<?php if(get_field('fuente' , $post->ID)){?>
					Fuente: <?php echo get_field('fuente' , $post->ID)?>
				<?php }?>
				</div>
													
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
				
				<div class="comentarios">
					<div class="fb-comments" data-href="<?php the_permalink()?>" data-numposts="5" data-width="630" data-colorscheme="light"></div>
				</div>
			<?php endwhile; else: ?>
			Sorry, no posts matched your criteria.
			<?php endif; ?>
				<div class="posted-on backhome">
					<a href="<?php bloginfo('url')?>">Volver al Inicio</a>
				</div>	
			</div>
			
			<div id="sidebar" class="column column-1-3 column-last" style="margin-top:40px">
				<?php get_template_part('sidebar-single')?>
				<div class="clear"></div>
			</div>
			
			<div class="clear separator"></div>
			
		</div>
	</div>
</div>




<?php get_footer()?>
