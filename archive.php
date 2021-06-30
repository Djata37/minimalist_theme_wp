<?php get_header(); ?>
<main id="main-content">
		<div class="container">
            <h1 class="screen-reader-text"><?php the_title(); ?></h1>
            <?php if( is_post_type_archive('portfolio') ) { ?>
            <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <!-- Loop --> 
            <article class="portfolio-item">
				<picture class="portfolio-item-illustration">
                <?php  $image = get_field('front-img');
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)
                    if( $image ) {
                        echo wp_get_attachment_image( $image, $size );
                    }
                ?>
				</picture>
				<div class="portfolio-item-content">
					<h2><?php the_title(); ?></h2>
					<p><?php the_field('text-hero-projet'); ?></p>
					<a href="<?php the_permalink(); ?>" class="btn-secondary">View project</a>
				</div>
			</article>
            <?php endwhile; endif; } ?>
            <nav class="pagination" aria-label="Projects">
                <div class="container">
                    <div class="archive-pagination-list">
                     <?php the_posts_pagination(); ?>
                </div>
                </div>
            </nav>
        </div>
</main>

<?php get_footer(); ?>