
    <footer>
        <?php 

            $args = array(
                'theme_location'    => 'primary_menu',
                'container'         => 'nav',
                'after'             => '<span class ="divider"> |</span>'
            );
            wp_nav_menu($args);
        
        ?>

        <div class="location">
            <p>house no: 03, belding no:12, street no: 03, uttra-11, dhaka</p>
            <p>phone no: +8013-234-232-443</p>
        </div>
        <div class="copyright">
            <p><?php echo get_option('udimy_footer_text'); ?></p>
        </div>
    </footer>
<?php wp_footer(); ?>
</body>
</html>