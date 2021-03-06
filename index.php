<?php get_header(); ?>

<!-- Início BANNER -->
<div class="banner pai">
	<div class="filho">
		<img class="img-fluid d-block w-custom" src="<?php bloginfo('template_directory');?>/assets/images/logo.png" alt="Logo da Empresa">
	</div>
</div>
<!-- Fim BANNER -->

<!-- Início SOBRE -->
<div class="sobre" id="sobre">
	<div class="container">
		<div class="row">
			<?php 
				$args = array('post_type'=>'page', 'pagename'=>'sobre');
				$meu_sobre = get_posts( $args );
				if($meu_sobre) : foreach($meu_sobre as $post) : setup_postdata( $post );
			?>
				<div class="col-md-6 col-lg-6 pai">
					<div class="filho">
						<h2 class="title-sobre"><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>
				</div>
				
				<div class="col-md-6 col-lg-6 pai">
					<div class="filho">
						<?php the_post_thumbnail(false, array('class'=>'img-fluid')); ?>
					</div>
				</div>
			<?php
		    	endforeach;
		    	endif;
	     	?>
		</div>
	</div>
</div>
<!-- Fim SOBRE -->

<!-- Início PRODUTOS -->
<div class="produtos" id="produtos">
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
						<div class="col-4 image pai-produto">
							<div class="filho-produto">
							<?php the_post_thumbnail(false, array('class'=>'img-fluid rounded-circle')); ?>
							</div>
						</div>
						<div class="col-8 info pai-produto">
							<div class="filho-produto">
						    <h3><?php the_title(); ?></h3>
						    <?php the_excerpt(); ?>
						    </div>
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
<!-- Fim PRODUTOS -->

<!-- Início CLIENTES -->
<div class="clientes" id="clientes">
	<div class="container">
		<h2 class="title-clientes">CLIENTES</h2>
		<div class="row">
			<?php 
				$args = array('post_type'=>'clientes', 'showposts'=>-1);
				$meus_clientes = get_posts( $args );
				if($meus_clientes) : foreach($meus_clientes as $post) : setup_postdata( $post );
			?>
				<div class="col-lg-4 col-sm-6 pai">
					<div class="filho">
						<?php the_post_thumbnail(false, array('class'=>'img-fluid')); ?>
					</div>
				</div>
			<?php
		    	endforeach;
		    	endif;
	     	?>
		</div>
	</div>
</div>
<!-- Fim CLIENTES -->

<!-- Início LIVRO DE RECEITAS/BLOG -->
<div class="receitas" id="receitas">
	<div class="container">
		<h2 class="title-receitas">LIVRO DE RECEITAS</h2>
		<div class="row">
			<?php 
				$args = array('post_type'=>'post', 'showposts'=>3);
				$minhas_receitas = get_posts( $args );
				if($minhas_receitas) : foreach($minhas_receitas as $post) : setup_postdata( $post );
			?>
				<div class="col-lg-4 col-md-4 receita">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(false, array('class'=>'img-fluid')); ?>
					<h3><?php the_title(); ?></h3></a>
					<?php the_excerpt(); ?>
				</div>
			<?php
		    	endforeach;
		    	endif;
	     	?>
	     	<div class="col-12 pai">
	     		<div class="filho">
	     			<a class="todas-receitas" href="">TODAS AS RECEITAS</a>
	     		</div>
	     	</div>
		</div>
	</div>
</div>
<!-- Fim LIVRO DE RECEITAS/BLOG -->

<!-- Início CONTATO -->
<div class="contato" id="contato">
	<div class="container">
		<h2 class="title-contato">CONTATO</h2>
		<div class="row">
			<?php
				if ( $_SERVER['REQUEST_METHOD'] == "POST" ) {
					if (enviaEmail()) { ?>
						<div class="col-12">
							<h4 class="alerta sucesso">Mensagem Enviada!</h4>
						</div>
					<?php
					} else { ?>
						<div class="col-12">
							<h4 class="alerta falha">Não foi possivel enviar sua mensagem. Por favor, tente novamente.</h4>
						</div>
					<?php
					}
				} ?>
				<div class="col-12">
					<form class="form-horizontal" method="post" action=".#contato">
		            	<fieldset>
		                	<label class="control-label label-text" for="inputNome">Nome</label>
		                    <input type="text" class="form-control input-custom" name="nome" id="inputNome" placeholder="" required>

			                <label class="control-label label-text" for="inputEmail">E-mail</label>
			                <input type="text" class="form-control input-custom" name="email" id="inputEmail" placeholder="" required>

			                <label class="control-label label-text" for="inputMensagem">Mensagem</label>
			                <textarea type="text" class="form-control input-custom" name="mensagem" rows="8" id="inputMensagem" placeholder="" required></textarea>
			                
			                <input class="enviar form-control input-custom" type="submit" name="submit"/>
			            </fieldset>
		            </form>
	        	</div>
		</div>
	</div>
</div>
<!-- Fim CONTATO -->

<?php get_footer(); ?>