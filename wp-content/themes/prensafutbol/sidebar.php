<?php
$var = get_queried_object();
$tipo = $var->taxonomy;
$modu = $var->taxonomy;
$type = $var->slug;
$typeID = $var->term_id;
wp_reset_query();



if(get_field('bannersb' , $tipo.'_'.$typeID)){
	$bannersb = get_field('bannersb' , $tipo.'_'.$typeID);
		$count = 0;
		foreach($bannersb as $bannerb):
		$count++;
			if(get_field('script' , $bannerb->ID)){;
						echo get_field('script' , $bannerb->ID);
						echo '<div class="separator"></div>';
				}else{
					echo get_the_post_thumbnail($bannerb->ID);	
				}
		endforeach;
}else{
	$banners = get_posts(array('post_type' => 'banners' , 'posiciones' => 'interior' , 'posts_per_page' => '2'));
		$count = 0;
		foreach($banners as $banner):
			$count++;
			$tipo = wp_get_post_terms( $banner->ID, 'tipoBanner');
			if($tipo[0]->slug == 'banner-rectangulo-mediano-300x250'){
				if(get_field('script' , $banner->ID)){;
						echo get_field('script' , $banner->ID);
						echo '<div class="separator"></div>';
				}else{
					echo get_the_post_thumbnail($banner->ID);	
				}
			}
		endforeach;
		echo '<div class="separator"></div>';
}

wp_reset_query();

if(get_field('modulos' , $modu.'_'.$typeID)){
	$modulos = get_field('modulos' , $modu.'_'.$typeID);	
		foreach($modulos as $modulo):
			//echo '<div class="widget"><div class="inner">';
			echo $modulo['modulo'];
			//echo '</div></div>';
			echo '<div class="separator"></div>';
		endforeach;
}
?>


<?php //get_template_part('torneos')?>

<div class="separator"></div>

<?php get_template_part('visto')?>

<div class="separator"></div>
<div class="widget">
	<div class="fb-like-box" data-href="http://www.facebook.com/prensafutbol.cl" data-height="370" data-width="298" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
	
</div>