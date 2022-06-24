<?php get_header(); ?>

<?php while(have_posts()) : the_post(); ?>
    <div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>) ;">
        <div class="heor-content">
            <div class="hero-text">
                <h2><?php echo esc_html(get_option('blogdescription')); ?></h2>
                <?php the_content(); ?>
                <?php
                    $url = get_page_by_title('About Us');
                ?>
                <a href="<?php echo get_permalink($url); ?>" class="button secendory">more info</a>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <div class="main-content container">
        <div class="text-center content-text clear">
            <h2 class="primary-text-color">oure specialties!</h2>
            <?php 
            
            $args = array(
                'posts_per_page'        => 4,
                'orderby'               => 'rand',
                'post_type'             => 'menu',
                'menu_category'         => 'pizzas'
            );
            $specialties = new WP_Query($args);

            while($specialties->have_posts()) : $specialties->the_post(); ?>

                <div class="my_columns2-4 specialties">
                   <div class="specialties-content">
                        <?php the_post_thumbnail(); ?>
                        <div class="information">
                            <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                            <p class="price">$<?php the_field('price'); ?></p>
                            <a href="<?php the_permalink(); ?>" class="button primary">read more</a>
                        </div>
                   </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>

    <!-- Fresh Ingredients -->
    <section class="ingredients">
        <div class="container section-padding">
            <div class="container-grid">
                <?php while(have_posts()) : the_post(); ?>

                <div class="my_columns2-4 ingredients-content">
                    <div class="ingredients-text">
                        <h3><?php the_field('ingredients-title'); ?></h3>
                        <?php the_field('ingredients-text') ?>
                        <?php
                            $url = get_page_by_title('About Us');
                        ?>
                        <a href="<?php echo get_permalink($url); ?>" class="button primary">more info</a>
                    </div>
                </div>
                <div class="my_columns2-4">
                    <div class="image">
                        <img src="<?php the_field('ingredients-img'); ?>" alt="ingredients-img">
                    </div>
                </div>

                <?php endwhile; ?>

            </div>
        </div>
    </section>

    <!-- Gallery  -->
    <section class="container clear">
        <div class="gallery">
            <h2 class="text-center primary-text-color">Gallery</h2>
            
            <?php 
            
            $url = get_page_by_title('gallery');

            echo get_post_gallery($url->ID);

            ?>
        </div>
    </section>

    <!-- reservation & map  -->
    <section class="home-reservation  clear">
        <div class="container">
            <div class="my_columns2-4 mpas">
                <iframe class="google-maps" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d50379.98154028825!2d89.9398377164891!3d24.24473414991127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1655959026250!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="my_columns2-4">
                <div class="section-padding">
                    <?php get_template_part('templates/reservation','form'); ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>