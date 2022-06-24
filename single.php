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
            <div class="entry-information">
            <header class="entry-header clear">
                <div class="date">
                        <time>
                            <?php the_time("d"); ?>
                            <span><?php the_time("M") ?></span>
                        </time>
                </div><!-- Date -->
                <div class="entry_title">
                    <p class="author single-author">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <?php the_author(); ?>
                    </p>
                </div><!-- Title -->
                </header>
            </div>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <div class="container comment">
        <?php 
        
        comment_form();
        
        ?>
        <div class="container commentlist">
            <ul class="comment-list">
                <?php 
                // Comment list
                $comment = get_comment(array(
                    'poat_id'       => $post->ID,
                    'status'        => 'approve'     
                ));
                $comment = get_comment(array(
                    'post_id'   => $post->ID,
                    'status'    => 'approve',
                ));
                wp_list_comments(array(
                    'per_page'      => 10,
                    'reverse_top_level' => false,
                ),$comment); 

                ?>
            </ul>
        </div>
    </div>

<?php endwhile; ?>

<?php get_footer(); ?>