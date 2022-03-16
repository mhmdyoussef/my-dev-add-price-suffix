<?php

/**
 * Plugin Name: Add Price Suffix
 * Plugin URI: https://www.my-dev.pro
 * Description: Add Suffix to price depending on user role
 * Author: MY-Dev [Mohamed Youssef]
 * Author URI: https://www.my-dev.pro
 * Version: 1.0.0
 * Requiers at least: 5.8
 * Requires PHP: 7.4
 */

 if ( ! defined( 'ABSPATH' ) ) exit();

function my_dev_add_ht_suffix() {
    ?>
        <script>
            jQuery(function($) {
                $(".woocommerce-Price-currencySymbol").append("<span> ht</span>");
            });
        </script>
    <?php
}

function my_dev_add_ttc_suffix() {
    ?>
        <script>
            jQuery(function($) {
                $(".woocommerce-Price-currencySymbol").append("<span> ttc</span>");
            });
        </script>
    <?php
}

function my_Dev_add_tax() {

    if ( is_user_logged_in() ) {
        $user = wp_get_current_user();
        $roles = $user->roles;

        $current_user_role = '';

        foreach ( $roles as $role ) {
            $current_user_role = $role;
        }

        if ( $current_user_role == 'administrator' || $current_user_role == 'revendeur' ) {
            my_dev_add_ht_suffix();
        } else {
            my_dev_add_ttc_suffix();
        }
    }
}

add_action( 'wp_footer', 'my_Dev_add_tax' );