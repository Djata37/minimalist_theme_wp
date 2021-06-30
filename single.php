<?php get_header(); ?>
<main id="main-content">
		<article class="container project">
        <picture class="project-featured">
            <?php  $image = get_field('img-hero-projet');
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)
                    if( $image ) {
                        echo wp_get_attachment_image( $image, $size );
                    }
            ?>
			</picture>
			<div class="project-summary">
				<h1 class="h2-like"><?php the_title(); ?></h1>
				<div class="project-summary-content">
					<p><?php the_field('text-hero-projet'); ?></p>
				</div>
				<div class="project-summary-metadata">
                    <?php if( have_rows('list-cat') ): ?>
					<ul class="category-list">
                    <?php while( have_rows('list-cat') ) : the_row(); ?>
                            <li class="category-item"><a href="#"><?php the_sub_field('item-cat'); ?></a></li>
                        <?php endwhile; ?>
                        </ul>
                    <?php endif; 
                    if( have_rows('list-lan') ): ?>
					<ul class="language-list">
                    <?php while( have_rows('list-lan') ) : the_row(); ?>
						<li class="language-item"><a href="#"><?php the_sub_field('item-lan'); ?></a></li>
                        <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
				</div>
				<a href="#" class="btn-secondary">View website</a>
			</div>
			<div class="project-content">
				<h2 class="h3-like"><?php the_field('title-detail'); ?></h2>
				<p><?php the_field('text-detail'); ?></p>
				<h2 class="h3-like"><?php the_field('img-title'); ?></h2>
                <?php 
                    $images = get_field('img-detail');
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)
                    if( $images ): ?>
                        <picture class="project-featured">
                            <?php foreach( $images as $image_id ): ?>
                                <?php echo wp_get_attachment_image( $image_id, $size ); ?>
                            <?php endforeach; ?>
                        </picture>
                    <?php endif; ?>
			</div>
		</article>


    <!-- Pagination -->
    <nav class="pagination" aria-label="Projects">
        <div class="container">
            <h2 class="screen-reader-text">Projects navigation</h2>
            <ul class="pagination-list">
                <li><?php previous_post_link( '%link<span>Previous Project</span>' ); ?></li>
                <li><?php next_post_link( '%link<span>Next Project</span>' ); ?></li>
            </ul>
        </div>
    </nav>
</div>
</main>

<?php get_footer(); ?>