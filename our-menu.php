<?php 
/*
Template Name: Menu Page
*/

get_header(); ?>

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
            <?php the_content(); ?>
        </div>
    </div>

<?php endwhile; ?>


<div class="our-specialties container">

    <div class="primary-text">
        <h3>Pizzas</h3>
    </div>
    <div class="container-grid">
        <?php 
        $args = array(
            'post_type'         => 'menu',
            'posts_per_page'    => 12,
            'orderby'           => 'title',
            'order'             => 'ASC',
            'menu_category'     => 'pizzas',
        );
        $pizzas = new WP_Query($args);

        while($pizzas->have_posts() ) : $pizzas->the_post(); ?>
        
        <div class="my_columns2-4">
            <a class="link-wrapper" href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
                <div class="specialties-content">
                    <h4><?php the_title(); ?> <span>$<?php the_field('price'); ?></span></h4>
                    <?php the_content(); ?>
                </div>
            </a>
        </div>

        <?php endwhile; wp_reset_postdata(); ?>
    </div>


    <div class="primary-text">
        <h3>Other</h3>
    </div>
    <div class="container-grid">
        <?php 
        $args = array(
            'post_type'         => 'menu',
            'posts_per_page'    => 12,
            'orderby'           => 'title',
            'order'             => 'ASC',
            'menu_category'     => 'others',
        );
        $pizzas = new WP_Query($args);

        while($pizzas->have_posts() ) : $pizzas->the_post(); ?>
        
        <div class="my_columns2-4">
            <a class="link-wrapper" href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
                <div class="specialties-content">
                    <h4><?php the_title(); ?> <span>$<?php the_field('price'); ?></span></h4>
                    <?php the_content(); ?>
                </div>
            </a>
        </div>

        <?php endwhile; wp_reset_postdata(); ?>
    </div>

</div>



<?php get_footer(); ?>