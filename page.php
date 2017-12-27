<?php get_header(); ?>

<!-- Início banner -->
<div class="banner-internas">
	<div class="banner-internas-sobreposicao">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-6 filho">
					<h2><?php the_title(); ?></h2>
				</div>
				<div class="col-md-6 col-lg-6 filho">
					<?php wp_custom_breadcrumbs(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Fim banner -->

<!-- Início conteúdo -->
<div class="conteudo">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php
				if (have_posts()) : while (have_posts()) : the_post();
						the_content();
					endwhile;
				endif;
				?>
			</div>
		</div>
	</div>
</div>
<!-- Fim conteúdo -->

<?php get_footer(); ?>