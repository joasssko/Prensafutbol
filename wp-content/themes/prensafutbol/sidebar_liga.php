<?php

wp_reset_query();
if(get_field('banners_liga' , 'options')){
	$bannersb = get_field('banners_liga' , 'options');
	if($bannersb){
		$count = 0;
		foreach($bannersb as $bannerb):
		$count++;
			if(get_field('script' , $bannerb->ID)){;
						echo get_field('script' , $bannerb->ID);
						if ($count==1){echo '<div class="separator"></div>';};
				}else{
					echo get_the_post_thumbnail($bannerb->ID);	
				}
		endforeach;
	}
}		

echo '<div class="separator"></div>';
	
?>

<?php 
	$modulos = get_field('modulos_liga' , 'options');
	if($modulos){
		foreach($modulos as $modulo):
			echo '<div class="widget"><div class="inner">';
			echo $modulo['modulo'];
			echo '</div></div>';
			echo '<div class="separator"></div>';
		endforeach;
	}
?>

<?php get_template_part('torneos')?>

<div class="separator"></div>

<?php get_template_part('visto')?>

<div class="separator"></div>
<div class="widget">
	<div class="fb-like-box" data-href="http://www.facebook.com/prensafutbol.cl" data-height="370" data-width="298" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
	
</div>