<?php if(is_home()){?>
<div class="separator"></div>

<div id="banner-footer">
	<div class="container">
		<div class="row" style="text-align:center">
			<?php wp_reset_query()?>
			<?php $banners = get_posts(array('post_type' => 'banners' , 'posiciones' => 'footer' , 'posts_per_page' => '1'));
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
					}elseif( $tipo[0]->slug == 'skyscraper-horizontal-728x90'){
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


<div id="pre-footer">
	<div class="container">
		<div class="row">
			<div class="column column-1-3">
				<h4>Entrevistas</h4>
				<ul class="footerposts">
				<?php 
				wp_reset_query();
				$entrevistas = get_posts(array('tipo' => 'entrevistas' , 'numberposts' => 3,'orderby'   => 'menu_order', 'order'     => 'ASC' ));
				if($entrevistas){
					foreach( $entrevistas as $entrevista ):
					echo '<li class="clearfix">';
						echo '<h5><a href="'.get_permalink($entrevista->ID).'">'.get_the_title($entrevista->ID).'</a></h5>';		
						echo '<a href="'.get_permalink($entrevista->ID).'">'.get_the_post_thumbnail($entrevista->ID , 'mininoticias' , array('class'=>'alignleft')).'</a>';
						echo '<p>'.substr($entrevista->post_excerpt , 0 , 159).'...</p>';
						echo '<div class="morelink"><a href="'. get_permalink($entrevista->ID).'">Ver más</a></div>';
					echo '</li>';	
					endforeach;
				}
				?>
				</ul>
			</div>
			
			<div class="column column-1-3">
				<h4>Reportajes</h4>
				<ul class="footerposts">
				<?php 
				wp_reset_query();
				$entrevistas = get_posts(array('tipo' => 'reportajes' , 'numberposts' => 3, 'orderby'   => 'menu_order', 'order'     => 'ASC'));
				if($entrevistas){
					foreach( $entrevistas as $entrevista ):
					echo '<li class="clearfix">';
						echo '<h5><a href="'.get_permalink($entrevista->ID).'">'.get_the_title($entrevista->ID).'</a></h5>';		
						echo '<a href="'.get_permalink($entrevista->ID).'">'.get_the_post_thumbnail($entrevista->ID , 'mininoticias' , array('class'=>'alignleft')).'</a>';
						echo '<p>'.substr($entrevista->post_excerpt , 0 , 159).'...</p>';
						echo '<div class="morelink"><a href="'. get_permalink($entrevista->ID).'">Ver más</a></div>';
					echo '</li>';	
					endforeach;
				}
				?>
				</ul>
			</div>
			
			<div class="column column-1-3 column-last">
				<h4>Breves</h4>
				<ul class="footerposts">
				<?php 
				wp_reset_query();
				$entrevistas = get_posts(array('tipo' => 'breves' , 'numberposts' => 3, 'orderby'   => 'menu_order', 'order'     => 'ASC'));
				if($entrevistas){
					foreach( $entrevistas as $entrevista ):
					echo '<li class="clearfix">';
						echo '<h5><a href="'.get_permalink($entrevista->ID).'">'.get_the_title($entrevista->ID).'</a></h5>';		
						echo '<a href="'.get_permalink($entrevista->ID).'">'.get_the_post_thumbnail($entrevista->ID , 'mininoticias' , array('class'=>'alignleft')).'</a>';
						echo '<p>'.substr($entrevista->post_excerpt , 0 , 159).'...</p>';
						echo '<div class="morelink"><a href="'. get_permalink($entrevista->ID).'">Ver más</a></div>';
					echo '</li>';	
					endforeach;
				}
				?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php }?>



<?php get_template_part('footermenu')?>

<div class="separator"></div>

<div id="footer">
	<div class="container">
		<div class="row">
			<div class="column column-2-3">Escribenos: <a href="mailto:contacto@prensafutbol.cl">contacto@prensafutbol.cl</a> <a href="mailto:direccion@prensafutbol.cl">direccion@prensafutbol.cl</a></div>
			<div class="column column-1-3 column-last"><a href="<?php bloginfo('url')?>"><img src="<?php bloginfo('template_directory')?>/images/logo.png" class="alignright" alt="" /></a></div>
		</div>
	</div>
</div>

<div class="separator"></div>



</body>
<?php wp_footer()?>
<?php wp_reset_query()?>
<?php if(is_home()){?>
<!--Floating Banners -->
<div class="footer-banners">

<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/fixed.js"></script>

	
	
	
	
	
<?php  $banners = get_posts(array('post_type' => 'banners' , 'posiciones' => 'flotante-derecha' , 'posts_per_page' => '1'));
		if($banners){
			foreach($banners as $banner):
				$tipo = wp_get_post_terms( $banner->ID, 'tipoBanner');
				if($tipo[0]->slug == 'skyscraper-ancho-160x600'){
					if(get_field('script' , $banner->ID)){;?>
						<div id="divAdRight" style="position: absolute; top: 0px; width:160px; height:600px; overflow:hidden;"><?php echo get_field('script' , $banner->ID);?></div>
					<?php }else{
						echo get_the_post_thumbnail($banner->ID);	
					}
				}elseif( $tipo[0]->slug == 'skyscraper-120x600'){
					if(get_field('script' , $banner->ID)){?>
						<div id="divAdRight" style="position: absolute; top: 0px; width:120px; height:600px; overflow:hidden;"><?php echo get_field('script' , $banner->ID);?></div>
					<?php }else{
						echo get_the_post_thumbnail($banner->ID);	
					}
				}
			endforeach;
		}
		?>
		
		
		<?php $banners = get_posts(array('post_type' => 'banners' , 'posiciones' => 'flotante-izquierda' , 'posts_per_page' => '1'));
		if($banners){
			foreach($banners as $banner):
				$tipo = wp_get_post_terms( $banner->ID, 'tipoBanner');
				if($tipo[0]->slug == 'skyscraper-ancho-160x600'){
					if(get_field('script' , $banner->ID)){;?>
						<div id="divAdLeft" style="position: absolute; top: 120px; width:160px; height:600px; overflow:hidden;"><?php echo get_field('script' , $banner->ID);?></div>
					<?php }else{
						echo get_the_post_thumbnail($banner->ID);	
					}
				}elseif( $tipo[0]->slug == 'skyscraper-120x600'){
					if(get_field('script' , $banner->ID)){?>
						<div id="divAdLeft" style="position: absolute; top: 120px; width:120px; height:600px; overflow:hidden;"><?php echo get_field('script' , $banner->ID);?></div>
					<?php }else{
						echo get_the_post_thumbnail($banner->ID);	
					}
				}
			endforeach;
		} 
		?>


<script type="text/javascript">
            
	var clientWidth	=	window.screen.width;
	if(clientWidth >= 1280){
		
		//document.write('<div id="divAdLeft" style="position: absolute; top: 0px; width:160px; height:600px; overflow:hidden;"><img src="http://placehold.it/160x600&text=Sk+ancho+i" alt="" /></div>');
		
		//document.write('<div id="divAdRight" style="position: absolute; top: 0px; width:160px; height:600px; overflow:hidden;"><img src="http://placehold.it/160x600&text=Sk+ancho+D" alt="" /></div>');			
		var MainContentW = 1000;
		var LeftBannerW = 160;
		var RightBannerW = 160;
		var LeftAdjust = 10;
		var RightAdjust = 10;
		var TopAdjust = 180;
		ShowAdDiv();
		window.onresize=ShowAdDiv; 
	}
</script>


</div>
	
<?php }?>

</html>