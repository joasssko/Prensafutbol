<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php if(is_home()){?>
	<title><?php bloginfo('name')?></title>
<?php }else{?>
	<title><?php wp_title();?></title>
<?php }?>

<link rel="shortcut icon" href="<?php bloginfo('template_directory')?>/favicon.ico"/>
<link rel="icon" type="image/png" href="<?php bloginfo('template_directory')?>/favicon.png" />

<meta name="viewport" content="width=device-width, initial-scale=0.75;minimum-scale=1.0; maximum-scale=1.0">

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--stylesheets -->
<link rel="stylesheet" href="<?php bloginfo('template_directory')?>/bootstrap/bootstrap.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>" />

<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>

<!--Otros -->
<?php wp_head()?>

<!-- scripts -->
<?php call_scripts()?>
<script type="text/javascript" src="<?php bloginfo('template_directory')?>/bootstrap/bootstrap.min.js"></script>

<?php if(is_home()){?>
<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/bxslider.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.noticiasslider').bxSlider({
	  pagerCustom: '#bx-pager',
	  captions: true,
	  auto:true,
	  pause:6000,
	  mode:'fade'
	});

	jQuery('#galeriaslider').bxSlider({
		auto: true,
		pager: false,
		mode: 'fade',
		pause:6000,
		captions:true
	});
});
</script>
<?php }?>


<?php if(is_single()){?>
<script type="text/javascript" src="https://apis.google.com/js/platform.js">
  {lang: 'es-419'}
</script>
<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/shadowbox.js"></script>
<link rel="stylesheet" href="<?php bloginfo('template_directory')?>/js/shadowbox.css" />
<script type="text/javascript">
	Shadowbox.init();
</script>
<?php }?>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1&appId=1443699349174785";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<meta property="fb:app_id" content="1443699349174785" />

</head>
<body <?php body_class();?>>

<?php if(is_home()){?>
<div id="banner-top">
	<div class="container">
		<div class="row">
			<?php $banners = get_posts(array('post_type' => 'banners' , 'posiciones' => 'top' , 'posts_per_page' => '1'));
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
<?php }elseif(is_tax()){?>
<div id="banner-top">
	<div class="container">
		<div class="row">

	<?php
	$var = get_queried_object();
	$tipo = $var->taxonomy;
	$modu = $var->taxonomy;
	$type = $var->slug;
	$typeID = $var->term_id;
	wp_reset_query();
	
	
	
	if(get_field('top_banner' , $tipo.'_'.$typeID)){
		echo get_field('top_banner' , $tipo.'_'.$typeID);
	}else{
	
	$banners = get_posts(array('post_type' => 'banners' , 'posiciones' => 'top' , 'posts_per_page' => '1'));
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
}
	?>
		</div>
	</div>
</div>	
<?php }?>

<div id="header">
	<div class="container">
	<div class="row">
		
		<a href="<?php bloginfo('url')?>" class="izq"><img src="http://joasssko.cl/pf/logo.png" alt="" /></a>
		
		<div class="search der">
			<form method="get" id="searchform" action="<?php bloginfo('url')?>">
				<label class="hidden" for="s"></label>
				<span class="glyphicon glyphicon-search"></span>
				<input type="text" placeholder="Buscar..." value="" name="s" id="s">
				<!--<input type="submit" id="searchsubmit" value=""> -->
			</form>
		</div>
		<div class="clear"></div>
		
		<div class="nav">
			
			<?php get_template_part('menu-equipos')?>
			
			<div class="clear"></div>
			
			<?php wp_nav_menu( array( 'container' => 'none', 'menu_class' => 'clearfix nav' , 'theme_location' => 'primary' ) );?>
		</div>
	</div>	
	</div>
</div>