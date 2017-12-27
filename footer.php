<!-- Início FOOTER -->
<div class="footer">
	<div class="footer-sobreposicao">
	<div class="container">
		<div class="row">
			<?php
			if ( !function_exists('dynamic_sidebar')
			    || !dynamic_sidebar('Descrição Footer')):
			endif;
			if ( !function_exists('dynamic_sidebar')
			    || !dynamic_sidebar('Endereço Footer')):
			endif;
			if ( !function_exists('dynamic_sidebar')
			    || !dynamic_sidebar('Logo footer')):
			endif; ?>
		</div>
	</div>
	</div>
</div>
<!-- Fim FOOTER -->

<?php wp_footer(); ?>
</body>
</html>