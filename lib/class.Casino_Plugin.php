<?php
namespace Casino;

if( !defined( 'ABSPATH' ) ) exit;


require_once CS_DIR.'/lib/class.Casino_Helpers.php';
require_once CS_DIR.'/lib/class.Casino_Backend.php';
require_once CS_DIR.'/lib/class.Casino_Frontend.php';

class Plugin
{
    public function __construct()
    {
        add_action( 'init', array( $this, 'register_post_types' ) );

        new Backend();
        new Frontend();
    }

    public function register_post_types()
    {
        $this->register_casino_post_type();
        $this->register_casino_review_post_type();
    }

    private function register_casino_post_type()
    {
        $labels = array(
            'name'                  => _x( 'Casinos', 'Post type general name', 'casino' ),
            'singular_name'         => _x( 'Casino', 'Post type singular name', 'casino' ),
            'menu_name'             => _x( 'Casinos', 'Admin Menu text', 'casino' ),
            'name_admin_bar'        => _x( 'Casino', 'Add New on Toolbar', 'casino' ),
            'add_new'               => __( 'Add New', 'casino' ),
            'add_new_item'          => __( 'Add New Casino', 'casino' ),
            'new_item'              => __( 'New Casino', 'casino' ),
            'edit_item'             => __( 'Edit Casino', 'casino' ),
            'view_item'             => __( 'View Casino', 'casino' ),
            'all_items'             => __( 'All Casinos', 'casino' ),
            'search_items'          => __( 'Search Casinos', 'casino' ),
            'parent_item_colon'     => __( 'Parent Casinos:', 'casino' ),
            'not_found'             => __( 'No casinos found.', 'casino' ),
            'not_found_in_trash'    => __( 'No casinos found in Trash.', 'casino' ),
            'featured_image'        => _x( 'Casino Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'casino' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'casino' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'casino' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'casino' ),
            'archives'              => _x( 'Casino archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'casino' ),
            'insert_into_item'      => _x( 'Insert into casino', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'casino' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this casino', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'casino' ),
            'filter_items_list'     => _x( 'Filter casinos list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'casino' ),
            'items_list_navigation' => _x( 'Casinos list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'casino' ),
            'items_list'            => _x( 'Casinos list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'casino' ),
        );     

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'casinos' ),
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 20,
            'supports'           => array( 'title', 'thumbnail' ),
            'show_in_rest'       => true
        );
        
        register_post_type( 'casino', $args );
    }

    private function register_casino_review_post_type()
    {
        $labels = array(
            'name'                  => _x( 'Casino Reviews', 'Post type general name', 'casino' ),
            'singular_name'         => _x( 'Casino Review', 'Post type singular name', 'casino' ),
            'menu_name'             => _x( 'Casino Reviews', 'Admin Menu text', 'casino' ),
            'name_admin_bar'        => _x( 'Casino Review', 'Add New on Toolbar', 'casino' ),
            'add_new'               => __( 'Add New', 'casino' ),
            'add_new_item'          => __( 'Add New Casino Review', 'casino' ),
            'new_item'              => __( 'New Casino Review', 'casino' ),
            'edit_item'             => __( 'Edit Casino Review', 'casino' ),
            'view_item'             => __( 'View Casino Review', 'casino' ),
            'all_items'             => __( 'All Casino Reviews', 'casino' ),
            'search_items'          => __( 'Search Casino Reviews', 'casino' ),
            'parent_item_colon'     => __( 'Parent Casino Reviews:', 'casino' ),
            'not_found'             => __( 'No casino reviews found.', 'casino' ),
            'not_found_in_trash'    => __( 'No casino reviews found in Trash.', 'casino' ),
            'archives'              => _x( 'Casino Reviews archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'casino' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this casino review', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'casino' ),
            'filter_items_list'     => _x( 'Filter casino reviews list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'casino' ),
            'items_list_navigation' => _x( 'Casino reviews list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'casino' ),
            'items_list'            => _x( 'Casino reviews list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'casino' ),
        );     

        $args = array(
            'labels'             => $labels,
            'public'             => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => false,
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => true,
            'menu_position'      => 20,
            'supports'           => array( 'title' ),
            'show_in_rest'       => false
        );
        
        register_post_type( 'casino_review', $args );
    }
}