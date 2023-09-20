<?php

function citc_register_custom_post_types() {

        //register Hours post type
        $labels = array(
            'name'               => _x( 'Hours', 'post type general name'  ),
            'singular_name'      => _x( 'Hours', 'post type singular name'  ),
            'menu_name'          => _x( 'Hours', 'admin menu'  ),
            'name_admin_bar'     => _x( 'Hours', 'add new on admin bar' ),
            'add_new'            => _x( 'Add New', 'Hours' ),
            'add_new_item'       => __( 'Add New Hours' ),
            'new_item'           => __( 'New Hours' ),
            'edit_item'          => __( 'Edit Hours' ),
            'view_item'          => __( 'View Hours'  ),
            'all_items'          => __( 'All Hours' ),
            'search_items'       => __( 'Search Hours' ),
            'parent_item_colon'  => __( 'Parent Hours:' ),
            'not_found'          => __( 'No hours found.' ),
            'not_found_in_trash' => __( 'No hours found in Trash.' ),
        );
        
        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_rest'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'hours' ),
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 7,
            'menu_icon'          => 'dashicons-clock',
            'supports'           => array( 'title' ),
            'template_lock'      => 'all',
        );
    
        register_post_type( 'citc-hours', $args );
}

add_action( 'init', 'citc_register_custom_post_types' );
?>