<div id="visto" class="widget">
	<h4>Noticias más vistas</h4>
	<div class="inner">
		<ul>
			
			
			
			
			<?php
				wp_reset_query();
				$vistos = get_posts(array ('meta_key'=>'post_views_count', 'orderby' => 'meta_value_num' , 'order'=>'DESC' , 'numberposts' => '5'));
				if ($vistos){ 
					foreach($vistos as $visto):
				?>					
				<li class="clearfix mini-news">
					<a href="<?php echo get_permalink($visto->ID)?>"><?php echo get_the_post_thumbnail($visto->ID, 'mininoticias' , array('class'=>'alignleft'))?></a>
					<h6><a href="<?php echo get_permalink($visto->ID)?>"><?php echo get_the_title($visto->ID)?></a></h6>
					<p>Vista <?php $cant = get_post_meta($visto->ID, 'post_views_count'); echo $cant[0];?> veces</p>
				</li>
				
				<?php
				endforeach;};
				wp_reset_query();
			?>
			
		</ul>
	</div>
</div>