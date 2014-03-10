<?php get_template_part('mobile/header')?>


<div class="separator"></div>

<div class="main">
	<div class="container">
		<div class="row">
			<div class="inside">
			<div class="post 404">
				<img src="<?php bloginfo('template_directory')?>/images/404.jpg" alt="" width="100%" />
				<h1>Lo sentímos</h1>
				<p>Si Caszely se perdió un penal, que a nosotros se nos pierda una noticia es nada</p>
				<p>Puedes intentar buscando nuevamente lo que necesitas desde acá:</p>
				
				<div class="search">
					<form method="get" id="searchform" action="<?php bloginfo('url')?>">
						<label class="hidden" for="s"></label>
						<span class="glyphicon glyphicon-search"></span>
						<input type="text" placeholder="Buscar..." value="" name="s" id="s">
						<!--<input type="submit" id="searchsubmit" value=""> -->
					</form>
				</div>
			</div>
			</div>			
		</div>
	</div>
</div>




<?php get_template_part('mobile/footer')?>