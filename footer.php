<footer class="main-footer">
		<?php if( is_page('contact')) {}
			 else { ?>
		<div class="top-footer container">
			<p class="h2-like top-footer-title">Interested in doing a project together?</p>
			<hr class="top-footer-separator">
			<a href="<?php get_stylesheet_directory_uri();?>/ECF/contact" class="btn-secondary">Contact me</a>
		</div> <?php } ?>
		<div class="bottom-footer">
			<div class="container">
				<a href="<?php echo home_url( '/' ); ?>" class="logo">
					<svg xmlns="http://www.w3.org/2000/svg" width="61" height="32" aria-hidden="true">
						<path fill="#FFFFFF" fill-rule="evenodd" stroke="#FFFFFF" d="M60.082 5.878L44.408 32 28.735 5.878h31.347zM15.673 0l15.674 26.122H0L15.673 0z"/>
					</svg>
					<span class="screen-reader-text">Alex Spencer's Website</span>
				</a>
				<nav class="footer-nav">
				<?php wp_nav_menu( array( 
            	'theme_location' => 'footer', 
            	'container' => 'ul', // afin d'éviter d'avoir une div autour 
				'items_wrap' => '<ul id="menu" class="menu" hidden>%3$s</ul>',
        		)  ); ?>
				</nav>
				<nav class="social-nav">
				<?php wp_nav_menu( array( 
            	'theme_location' => 'social', 
            	'container' => 'ul', // afin d'éviter d'avoir une div autour 
				'items_wrap' => '<ul id="menu" class="menu" hidden>%3$s</ul>',
        		)  ); ?>
				</nav>
			</div>
		</div>
	</footer>
<?php wp_footer(); ?>
</body>
</html>