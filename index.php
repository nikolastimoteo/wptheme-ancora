<?php get_header(); ?>

<div class="slider">
	<div id="carouselExampleSlidesOnly" class="carousel carousel-custom">
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img class="d-block w-100" src="<?php bloginfo('template_directory');?>/assets/images/slider-01.jpg" alt="Backgroud Docas">
		  <div class="carousel-caption d-md-block-custom">
		    <img class="d-block w-custom" src="<?php bloginfo('template_directory');?>/assets/images/logo.png" alt="Logo da Empresa">
		  </div>
	    </div>
	  </div>
	</div>
</div>

<div class="produtos">
	<div class="container">
		<div class="row">
			
			<div class="col-lg-4 col-sm-6">
				<div class="row">
				<div class="col-4 produto-imagem">
				    <img class="top img-fluid" src="<?php bloginfo('template_directory');?>/assets/images/slider-01.jpg" alt=""/>
				</div>
				<div class="col-8 produto-info">
				    <h2 class="descricao">Marlin Azul</h2>
				    <p class="preco">R$ 100,00/kg</p>
				</div>
				</div>
			</div>
			
		</div>
	</div>
</div>


<?php get_footer(); ?>