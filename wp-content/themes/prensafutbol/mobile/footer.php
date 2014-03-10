
<div id="footermenu">
	<div class="container">
		<div class="row">   
        	
			
			<?php 
			$banners = get_posts(array('post_type' => 'banners' , 'posiciones' => 'mobile-bottom' , 'posts_per_page' => '1'));
			if($banners){
				foreach($banners as $banner):
					
					$tipo = wp_get_post_terms( $banner->ID, 'tipoBanner');
					if($tipo[0]->slug == 'mobile-footer-320x70'){
						if(get_field('script' , $banner->ID)){
							echo '<div class="bannerMobile">';
							echo get_field('script' , $banner->ID);	
							echo '</div>';
						}
					}
														
				endforeach;
			}?>
			
         
			<div class="inside">
            	
                <div class="divider"></div>
                <div class="separator"></div>
                <div class="column column-1-2">Escribenos: <a href="mailto:contacto@prensafutbol.cl">contacto@prensafutbol.cl</a> <a href="mailto:direccion@prensafutbol.cl">direccion@prensafutbol.cl</a></div>
            	<div class="column column-1-2 column-last"><a href="<?php bloginfo('url')?>"><img src="<?php bloginfo('template_directory')?>/images/logo.png" class="alignright" alt="" width="50" /></a></div>
  				<div class="clear separator"></div>

                
            </div>
		</div>
	</div>
</div>

<div id="footer">
	<div class="container">
		<div class="row">
			
		</div>
	</div>
</div>

<?php wp_footer()?>