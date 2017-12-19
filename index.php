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
		<h2 class="title-produtos">PRODUTOS</h2>
		<div class="row">
			<?php 
				$args = array('post_type'=>'produtos', 'showposts'=>-1);
				$meus_produtos = get_posts( $args );
				if($meus_produtos) : foreach($meus_produtos as $post) : setup_postdata( $post );
			?>
				<div class="col-lg-3 col-md-4 col-sm-6 produto">
					<div class="row">
					<div class="col-4">
						<?php the_post_thumbnail(false, array('class'=>'img-fluid rounded-circle')); ?>
					</div>
					<div class="col-8 info">
					    <h3><?php the_title(); ?></h3>
					    <?php the_excerpt(); ?>
					</div>
					</div>
				</div>
			<?php
		    	endforeach;
		    	endif;
	     	?>
		</div>
	</div>
</div>


<?php get_footer(); ?>