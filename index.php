<?php get_header(); ?>

    <?php 
    
    $blog_page = get_option('page_for_posts');
    $iamge_id = get_post_thumbnail_id($blog_page);
    $image = wp_get_attachment_image_src( $iamge_id );
    ?>

    <div class="hero" style="background-image: url(<?php echo $image[0]; ?>) ;">
        <div class="heor-content">
            <div class="hero-text">
                <h2><?php echo get_the_title($blog_page); ?></h2>
            </div>
        </div>
    </div>

    <div class="main-content container">
        <div class="container-grid">
            <div class="content-text my_columns2-3">
                <?php while(have_posts()) : the_post(); ?>
                    <article class="blog-entry">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>

                        <header class="entry-header clear">
                        <div class="date">
                                <time>
                                    <?php the_time("d"); ?>
                                    <span><?php the_time("M") ?></span>
                                </time>
                        </div><!-- Date -->
                        <div class="entry_title">
                                <h2><?php the_title(); ?></h2>
                                <p class="author">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <?php the_author(); ?>
                                </p>
                        </div><!-- Title -->
                        </header>
                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="button primary">read more</a>
                        </div><!-- Content -->

                    </article>
                <?php endwhile; ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>



<?php get_footer(); ?>