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
            <?php the_content(); ?>
        </div>
    </div>

    <div class="box-information container clear">

        <div class="single-box">
            <?php 
                $id_image = get_field('image_1');
                $image = wp_get_attachment_image_src($id_image, 'boxes');
            ?>
                <img src="<?php echo $image[0]; ?>" alt="image 1" class="box-image">

            <div class="box-content">
                <?php echo the_field('description_1'); ?>
            </div>
        </div>
        
        <div class="single-box">
            <div class="box-content">
                <?php echo the_field('description_2'); ?>
            </div>

            <?php 
                $id_image = get_field('image_2');
                $image = wp_get_attachment_image_src($id_image, 'boxes');
            ?>
            <img src="<?php echo $image[0]; ?>" alt="image 2" class="box-image">

        </div>

        <div class="single-box">
            <?php 
                $id_image = get_field('image_3');
                $image = wp_get_attachment_image_src($id_image, 'boxes');
            ?>
                <img src="<?php echo $image[0]; ?>" alt="image 3" class="box-image">

            <div class="box-content">
                <?php echo the_field('description_3'); ?>
            </div>
        </div>

    </div>

<?php endwhile; ?>

<?php get_footer(); ?>