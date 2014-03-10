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

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--stylesheets -->
<link rel="stylesheet" href="<?php bloginfo('template_directory')?>/bootstrap/bootstrap.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>" />

<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.min.css">
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
	  pager:false,
	  captions: true,
	  auto:true,
	  pause:6000,
	  mode:'fade'
	});
});
</script>
<?php }?>


<?php if(is_single()){?>
<script type="text/javascript" src="https://apis.google.com/js/platform.js">
  {lang: 'es-419'}
</script>



<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1&appId=1443699349174785";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<meta property="fb:app_id" content="1443699349174785" />
<?php }?>
</head>
<body <?php body_class();?> id="mobile">

<?php if(is_home()){?>
<div id="banner-top">
	<div class="container">
		<div class="row">
			
            <?php $banners = get_posts(array('post_type' => 'banners' , 'posiciones' => 'mobile-top' , 'posts_per_page' => '1'));
				if($banners){
					foreach($banners as $banner):
						$tipo = wp_get_post_terms( $banner->ID, 'tipoBanner');
						
						if($tipo[0]->slug == 'mobile-top-plus-320x370'){?>
							
							<?php if (!isset($_COOKIE['galletitaBanner'])){?>
								<?php //setcookie('galletitaBanner', true,  time()+120);?>
								<?php setcookie('galletitaBanner', true,  time()+86400);?>
								<style type="text/css">
									#bannerSmall{ display:none}
									.bannerMobile{ width:100%; text-align:center}
									.bannerMobile img{ }
									@media screen and (orientation:landscape) {
										#bannerLarge img{ height:320px; width:auto}
									}
								</style>
								<script type="text/javascript">
									jQuery(document).ready(function() {
										jQuery('#bannerLarge').delay(3000).slideUp('slow', function() {
											jQuery('#bannerSmall').slideDown('fast')
										});
										
									});
								</script>
								<div id="bannerLarge" class="bannerMobile"><?php echo get_field('script_large' , $banner->ID)?></div>
								<div id="bannerSmall" class="bannerMobile"><?php echo get_field('script' , $banner->ID)?></div>
							<?php }else{?>
								<style type="text/css">
									.bannerMobile{ width:100%; text-align:center}
									.bannerMobile img{}
								</style>
								<div id="bannerSmall" class="bannerMobile"><?php echo get_field('script' , $banner->ID)?></div>
							<?php } ?>
							
						<?php }elseif($tipo[0]->slug == 'mobile-top-mini-320x70'){?>
							<style type="text/css">
								.bannerMobile{ width:100%; text-align:center}
								.bannerMobile img{}
							</style>
							<div id="bannerSmall" class="bannerMobile"><?php echo get_field('script' , $banner->ID)?></div>
						<?php }			
					endforeach;
				}
				?>
            
            
			<div class="clear"></div>
		</div>
	</div>
</div>
<?php }?>

<div id="header">
	<div class="container">
	<div class="row">
    	<div class="inside">
        <div class="navbar-header">
          <button class="navbar-toggle collapsed btn-lg" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
            <span class="sr-only">Menú</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="<?php bloginfo('url')?>" class="izq"><img src="<?php bloginfo('template_directory')?>/images/logo.png" height="50" alt="" /> </a><h3>&nbsp;&nbsp;PRENSAFUTBOL</h3>
        </div>
        <nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation" style="height: 1px;">
            <?php wp_nav_menu( array( 'container' => 'none', 'menu_class' => 'clearfix nav navbar-nav' , 'theme_location' => 'third' ) );?>
        </nav>
        </div>
	</div>	
	</div>
</div>
<?php  ?>