<?php 
function udimy_reservation_databases_fun(){

    global $wpdb;
    global $udimy_reservation_var;
    $udimy_reservation_var = '1.0.0';

    $table = $wpdb->prefix.'reservations';

    $charset_collate = $wpdb->get_charset_collate();

    // create table for reservation
    $sql = "CREATE TABLE IF NOT EXISTS $table(
        id INT AUTO_INCREMENT NOT NULL,
        name VARCHAR(90) NOT NULL,
        date DATETIME NOT NULL,
        email VARCHAR(90) NOT NULL,
        phone VARCHAR(90) NOT NULL,
        message LONGTEXT NOT NULL,
        PRIMARY KEY(id)
    )$charset_collate";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

add_action('after_setup_theme','udimy_reservation_databases_fun');