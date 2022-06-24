<?php 

function udimy_option_menu(){
    add_menu_page('Udimy','Udimy Option','administrator','udimy_option','udimy_option_fun','',20);
    add_submenu_page('udimy_option','Reservations','Reservations','administrator','reservation','udimy_reservarion_fun',20);
    
}
add_action('admin_menu','udimy_option_menu');

function udimy_option_settion(){
    // header top addres and phone number text
    register_setting('udimy_option_address_text','udimy_address_text');
    register_setting('udimy_opton_phone_text','udimy_phone_text');
    // footer copyright text feild
    register_setting('udimy_option_footer_text','udimy_footer_text');
}

add_action('init','udimy_option_settion');


function udimy_option_fun(){?>

    <div class="wrap">
        <h1>Udimy Option</h1>
        <form action="options.php" method="POST">
            <!-- Fotter copyright text  -->
            <table class="form-table">
                <?php 
                // fotter copyright text
                settings_fields('udimy_option_footer_text');
                do_settings_sections('udimy_option_footer_text');

                ?>
                <tr valign="top">
                    <th scope="row">Footer Copyright Text : </th>
                    <td>
                        <input type="text" name="udimy_footer_text" class="regular-text" value="<?php echo get_option('udimy_footer_text'); ?>">
                    </td>
                </tr>
            </table>
            <!-- Header address table  -->
            <table class="form-table">
                <?php
                // header address and phone text
                settings_fields('udimy_option_address_text');
                do_settings_sections('udimy_option_address_text');

                ?>
                <tr valign="top">
                    <th scope="row">Header Address : </th>
                    <td>
                        <input type="text" name="udimy_address_text" class="regular-text" value="<?php echo get_option('udimy_address_text');?>">
                    </td>
                </tr>
            </table>
            <!-- Header phone text  -->
            <table class="form-table">
                <?php 
                // header top phone 
                settings_fields('udimy_opton_phone_text');
                do_settings_sections('udimy_opton_phone_text');
                
                ?>
                <tr valin="top">
                    <th scope="row">Header Phone No : </th>
                    <td>
                        <input type="text" name="udimy_phone_text" class="regular-text" value="<?php echo get_option('udimy_phone_text'); ?>">
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>

<?php }
function udimy_reservarion_fun(){
    ?>

    <div class="wrap">
        <table class="wp-list-table widefat striped">
            <thead>
                <tr>
                    <th class="manage-column">ID</th>
                    <th class="manage-column">Name</th>
                    <th class="manage-column">Date</th>
                    <th class="manage-column">Email</th>
                    <th class="manage-column">Phone Number</th>
                    <th class="manage-column">Message</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                global $wpdb;
                $table = $wpdb->prefix."reservations";
                $reservations = $wpdb->get_results("SELECT * FROM $table",ARRAY_A);
                
                foreach( $reservations as $reservation ) :
                ?>
                <tr>
                    <td><?php echo $reservation['id']; ?></td>
                    <td><?php echo $reservation['name']; ?></td>
                    <td><?php echo $reservation['date']; ?></td>
                    <td><?php echo $reservation['email']; ?></td>
                    <td><?php echo $reservation['phone']; ?></td>
                    <td><?php echo $reservation['message']; ?></td>
                </tr>

                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

    <?php 
}