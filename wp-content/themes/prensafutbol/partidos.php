<div id="partidos">
	<div class="container">
		<div class="row">
		<div class="separator border"></div>
			<?php $partidos = get_posts(array('post_type'=>'partidos' , 'numberposts' => 5,'orderby'   => 'menu_order', 'order'     => 'ASC'));
				//var_dump($partidos);
				$p_count = 0;
				$partido_last = '';
				foreach ($partidos as $partido):
					$link = get_field('noticia_asociada', $partido->ID);
					$p_count ++;
					if($p_count == 5){$partido_last = 'column-last';};	
					echo '<div class="column column-1-5 '.$partido_last.' partidos">';
					echo '<a href="'.get_permalink($link[0]->ID).'">';
					echo get_field('codigo', $partido->ID);
					echo '</a>';
					//var_dump($link);
					//echo $link[0]->ID;
					echo '</div>';
					
				endforeach;
			?>
			
			<div class="clear"></div>
			<div class="separator border"></div>
			
		</div>
	</div>
</div>