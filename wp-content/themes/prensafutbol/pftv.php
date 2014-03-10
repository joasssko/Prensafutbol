<div id="pfTF" class="widget">
	<h4>Prensa Futbol TV</h4>
	<div class="inner">
		<ul>
			
			<?php 
			wp_reset_query();
			$pftv = get_posts(array('number_posts'=>5 , 'post_type'=>'prensa-futbol-tv' , 'orderby' => 'menu_order' , 'order' => 'ASC'));
			
			if($pftv){
				foreach($pftv as $tv):
					echo '<li class="clearfix mini-news">';
					echo '<a href="'.get_permalink($tv->ID).'">'.get_the_post_thumbnail($tv->ID , 'mininoticias' , array('class'=>'alignleft')).'</a>';
					echo '<h6><a href="'.get_permalink($tv->ID).'">'.get_the_title($tv->ID).'</a></h6>';
					echo '<p><a href="'.get_permalink($tv->ID).'">Ver</a></p>';
					echo '</li>';
				endforeach;	
			}?>
		</ul>
	</div>
</div>