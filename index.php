<?php get_header(); ?>

<main id="main-content">
    <section class="hero">
        <div class="container">
            <picture class="hero-illustration">
            <?php  $image = get_field('hero-background');
                    $size = 'full';
                    if( $image ) {
                        echo wp_get_attachment_image( $image, $size );
                    }
                ?>
            </picture>
            <div class="hero-content">
                <h1 class="hero-title"><? the_field('hero-title'); ?></h1>
                <a href="#about" class="btn-primary">About me</a>
            </div>
        </div>
    </section>

    <section class="about" id="about">
        <div class="container">
            <picture class="about-illustration">
                <?php the_post_thumbnail(); ?>
            </picture>
            <div class="about-content">
                <?php the_content(); ?>
                <a href="<?php get_stylesheet_directory_uri();?>/ECF/portfolio" class="btn-secondary">Go to portfolio</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>