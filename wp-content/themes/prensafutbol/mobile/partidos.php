<div id="partidos">
	<div class="container">
		<div class="row">
		
		<h3>Resultado últimos partidos</h3>
		
		<div class="partidots">
			<?php $partidos = get_posts(array('post_type'=>'partidos' , 'numberposts' => 6,'orderby'   => 'menu_order', 'order'     => 'ASC'));
				//var_dump($partidos);
				$p_count = 0;
				$partido_last = '';
				foreach ($partidos as $partido):
					$link = get_field('noticia_asociada', $partido->ID);
					$p_count ++;
					$partido_last = '';
					if($p_count % 2 == 0){$partido_last = 'column-last';};	
					echo '<div class="partidos">';
					echo '<a href="'.get_permalink($link[0]->ID).'">';
					echo get_field('codigo', $partido->ID);
					echo '</a>';
					//var_dump($link);
					//echo $link[0]->ID;
					echo '</div>';
					
				endforeach;
			?>
			
			<div class="clear"></div>
		</div>	
		</div>
	</div>
</div>