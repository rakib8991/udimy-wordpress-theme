<?php get_header(); ?>

<?php while(have_posts()) : the_post(); ?>
    <div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>) ;">
        <div class="heor-content">
            <div class="hero-text">
                <h2><?php the_title(); ?></h2>
            </div>
        </div>
    </div>

    <div class="main-content container">
        <div class="text-center content-text">
            <p class="ingredient">ingredient: </p>
            <?php the_content(); ?>
            <p class="price">Price: $<?php the_field('price'); ?></p>
        </div>
    </div>

<?php endwhile; ?>

<?php get_footer(); ?>