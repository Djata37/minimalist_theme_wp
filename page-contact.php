<?php get_header(); ?>
<main id="main-content">
		<div class="container">
			<h1 class="screen-reader-text">Contact</h1>
			<section class="get-in-touch">
				<h2>Get in Touch</h2>
				<div class="get-in-touch-content">
					<p>I’d love to hear about what you’re working on and how I could help. I’m currently looking for a new role and am open to a wide range of opportunities. My preference would be to find a position in a company in London. But I’m also happy to hear about opportunites that don’t fit that description. I’m a hard-working and positive person who will always approach each task with a sense of purpose and attention to detail. Please do feel free to check out my online profiles below and get in touch using the form.</p>
					<nav class="social-nav">
                    <?php wp_nav_menu( array( 
            	        'theme_location' => 'social', 
            	        'container' => 'ul', 
				        'items_wrap' => '<ul id="menu" class="menu" hidden>%3$s</ul>',
        		        )  ); ?>
					</nav>
				</div>
			</section>
			<div class="contact-form">
				<h2>Contact Me</h2>
				<?php the_content(); ?>
			</form>
		</div>
	</main>
<?php get_footer(); ?>