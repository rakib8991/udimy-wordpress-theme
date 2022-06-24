<?php 

function udimy_reservation_submit(){
    global $wpdb;

    if( isset($_POST['reservation_submit']) && $_POST['hidden'] == "1" &&  !empty($_POST['name']) && !empty($_POST['date']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['message'])){
        $name = sanitize_text_field($_POST['name']);
        $date = sanitize_text_field($_POST['date']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $message = sanitize_text_field($_POST['message']);

        $table = $wpdb->prefix."reservations";

        $data = array(
            'name'  => $name,
            'date'  => $date,
            'email'  => $email,
            'phone'  => $phone,
            'message'  => $message,
        );
        $format = array(
            '%s',
            '%s',
            '%s',
            '%s',
            '%s'
        );
        // insert to table colum
        $wpdb->insert($table,$data,$format,);

        // redirect after from submit
        $url = get_page_by_title('Thanks for your Reservation! ');
        wp_redirect(get_permalink($url));
        exit();

    }

}

add_action('init','udimy_reservation_submit');