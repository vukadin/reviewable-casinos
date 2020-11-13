<?php
namespace Casino;

if( !defined( 'ABSPATH' ) ) exit;

class Backend
{
    public function __construct()
    {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ) );
        add_filter( 'manage_casino_posts_columns', array( $this, 'manage_casino_columns' ) );
        add_action( 'manage_casino_posts_custom_column' , array( $this, 'output_casino_columns' ), 10, 2 );
        add_filter( 'manage_casino_review_posts_columns', array( $this, 'manage_casino_review_columns' ) );
        add_action( 'manage_casino_review_posts_custom_column' , array( $this, 'output_casino_review_columns' ), 10, 2 );
        add_action( 'add_meta_boxes', array( $this, 'register_meta_boxes' ), 9999 );
        add_action( 'save_post', array( $this, 'save_casino' ) );
    }

    public function enqueue_assets()
    {
        wp_enqueue_script( 'casino', plugins_url( 'assets/js/backend.js', CS_FILE ), array( 'jquery' ), CS_VERSION );
        wp_enqueue_style( 'casino', plugins_url( 'assets/css/backend.css', CS_FILE ), null, CS_VERSION );
    }

    public function manage_casino_columns( $columns )
    {
        $new_columns = array();

        $new_columns['cb'] = $columns['cb'];
        $new_columns['image'] = __( 'Image', 'casino' );
        $new_columns['title'] = $columns['title'];
        $new_columns['welcome-bonus'] = __( 'Welcome bonus', 'casino' );
        $new_columns['free-spins'] = __( 'Free Spins', 'casino' );
        $new_columns['landing'] = __( 'Affiliate Landing', 'casino' );
        $new_columns['signup'] = __( 'Affiliate Signup', 'casino' );
        $new_columns['date'] = $columns['date'];

        return $new_columns;
    }

    public function output_casino_columns( $column, $post_id )
    {
        switch( $column ) : 

            case 'image' : 
                $thumbnail_url = get_the_post_thumbnail_url( $post_id );

                if( $thumbnail_url ) :
                    printf( 
                        '<img src="%s" >', 
                        $thumbnail_url 
                    );
                endif;
            break;

            case 'welcome-bonus' : 
                echo Helpers::get_casino_welcome_bonus( $post_id );
            break;

            case 'free-spins' : 
                echo Helpers::get_casino_free_spins( $post_id );
            break;

            case 'landing' : 
                $url = Helpers::get_casino_affiliate_landing( $post_id );
                
                if( $url ) :
                    printf( 
                        '<a href="%1$s" target="_blank" >%s</a>', 
                        $url 
                    );
                endif;
            break;

            case 'signup' : 
                $url = Helpers::get_casino_signup_landing( $post_id );
                
                if( $url ) :
                    printf( 
                        '<a href="%1$s" target="_blank" >%s</a>', 
                        $url 
                    );
                endif;
            break;

        endswitch;
    }

    public function manage_casino_review_columns( $columns )
    {
        $new_columns = array();

        $new_columns['cb'] = $columns['cb'];
        $new_columns['title'] = $columns['title'];
        $new_columns['casino'] = __( 'Casino', 'casino' );
        $new_columns['rating'] = __( 'Rating', 'casino' );
        $new_columns['date'] = $columns['date'];

        return $new_columns;
    }

    public function output_casino_review_columns( $column, $post_id )
    {
        switch( $column ) : 

            case 'casino' : 
                $casino = Helpers::get_casino_review_casino( $post_id );
            break;

            case 'rating' : 
                $rating = Helpers::get_casino_review_rating( $post_id );
            break;

        endswitch;
    }

    public function register_meta_boxes()
    {
        add_meta_box( 'casino-settings', __( 'Settings', 'casino' ), array( $this, 'meta_box_casino_settings' ), 'casino' );
        add_meta_box( 'casino-review-settings', __( 'Settings', 'casino' ), array( $this, 'meta_box_casino_review_settings' ), 'casino_review' );
        remove_meta_box( 'us_portfolio_settings', 'casino', 'advanced' );
        remove_meta_box( 'us_portfolio_settings', 'casino_review', 'advanced' );
    }

    public function meta_box_casino_settings( $post )
    {
        $nonce = Helpers::get_casino_edit_nonce( $post->ID );
        $welcome_bonus = Helpers::get_casino_welcome_bonus( $post->ID );
        $free_spins = Helpers::get_casino_free_spins( $post->ID );
        $affiliate_landing = Helpers::get_casino_affiliate_landing( $post->ID );
        $signup_landing = Helpers::get_casino_signup_landing( $post->ID );

        include CS_DIR.'/templates/backend/metaboxes/casino_settings.php';
    }

    public function meta_box_casino_review_settings( $post )
    {
        //error_reporting(E_ALL); ini_set( 'display_errors', 'on' );
        $nonce = Helpers::get_casino_review_edit_nonce( $post->ID );
        
        $list_casinos = Helpers::get_casino_list();
        $list_countries = Helpers::get_countries();
        $casino = Helpers::get_casino_review_casino( $post_id );
        $email = Helpers::get_casino_review_email( $post_id );
        $country = Helpers::get_casino_review_country( $post_id );
        $rating = Helpers::get_casino_review_rating( $post_id );
        $text = Helpers::get_casino_review_text( $post_id );

        include CS_DIR.'/templates/backend/metaboxes/casino_review_settings.php';
    }

    public function save_casino( $post_id )
    {
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
        if( !current_user_can( 'edit_post', $post_id ) ) return;
        if( get_post_type( $post_id ) !== 'casino' ) return;

        $nonce = isset( $_POST['_casino_nonce'] ) ? $_POST['_casino_nonce'] : '';

        if( !wp_verify_nonce( $nonce, Helpers::get_casino_edit_nonce( $post_id ) ) ) return;

        $welcome_bonus = sanitize_text_field( $_POST['welcome_bonus'] );
        $free_spins = sanitize_text_field( $_POST['free_spins'] );
        $affiliate_landing = sanitize_text_field( $_POST['affiliate_landing'] );
        $signup_landing = sanitize_text_field( $_POST['signup_landing'] );

        Helpers::set_casino_welcome_bonus( $post_id, $welcome_bonus );
        Helpers::set_casino_free_spins( $post_id, $free_spins );
        Helpers::set_casino_affiliate_landing( $post_id, $affiliate_landing );
        Helpers::set_casino_signup_landing( $post_id, $signup_landing );
    }

    public function save_casino_review( $post_id )
    {
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
        if( !current_user_can( 'edit_post', $post_id ) ) return;
        if( get_post_type( $post_id ) !== 'casino_review' ) return;

        $nonce = isset( $_POST['_casino_review_nonce'] ) ? $_POST['_casino_review_nonce'] : '';

        if( !wp_verify_nonce( $nonce, Helpers::get_casino_review_edit_nonce( $post_id ) ) ) return;
    }
}