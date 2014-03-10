<?php
include 'mobiledetector.php';
$detect = new Mobile_Detect;

if ($detect->isMobile() && !$detect->isTablet()){

	get_template_part('mobile/page');

}else{?>

<?php get_header()?>


<div class="separator"></div>

<div class="main">
	<div class="container">
		<div class="row">
			
			<div id="content" class="column column-2-3">
				
				<div class="post"><img src="http://placehold.it/630x450" alt="" /></div>
			
				<div class="column column-1-3 post"><img src="http://placehold.it/300x450" alt="" /></div>
				<div class="column column-1-3 column-last post"><img src="http://placehold.it/300x450" alt="" /></div>
				
				<div class="column column-1-3 post"><img src="http://placehold.it/300x450" alt="" /></div>
				<div class="column column-1-3 column-last post"><img src="http://placehold.it/300x450" alt="" /></div>
				
				<div class="column column-1-3 post"><img src="http://placehold.it/300x450" alt="" /></div>
				<div class="column column-1-3 column-last post"><img src="http://placehold.it/300x450" alt="" /></div>
				
				<div class="column column-1-3 post"><img src="http://placehold.it/300x450" alt="" /></div>
				<div class="column column-1-3 column-last post"><img src="http://placehold.it/300x450" alt="" /></div>
				
				<div class="column column-1-3 post"><img src="http://placehold.it/300x450" alt="" /></div>
				<div class="column column-1-3 column-last post"><img src="http://placehold.it/300x450" alt="" /></div>
			</div>
			
			<div id="sidebar" class="column column-1-3 column-last">
				<img src="http://placehold.it/300x250" alt="" />
				<div class="separator"></div>
				<img src="http://placehold.it/300x250" alt="" />
				<div class="separator"></div>
				<img src="http://placehold.it/300x650" alt="" />
				<div class="separator"></div>
				<img src="http://placehold.it/300x550" alt="" />
				<div class="separator"></div>
				<img src="http://placehold.it/300x550" alt="" />
				<div class="separator"></div>
				<img src="http://placehold.it/300x250" alt="" />
			</div>
			
		</div>
	</div>
</div>




<?php get_footer();?>

<?php }?>