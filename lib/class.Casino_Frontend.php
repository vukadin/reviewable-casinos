<?php
namespace Casino;

if( !defined( 'ABSPATH' ) ) exit;

class Frontend
{
    public function __construct()
    {
        add_shortcode( 'casino_list', array( $this, 'shortcode_casino_list' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
        add_filter( 'the_content', array( $this, 'casino_content' ) );
    }

    public function shortcode_casino_list()
    {
        $casinos = Helpers::get_casino_list();

        ob_start();
        include CS_DIR.'/templates/frontend/shortcodes/casino_list.php';
        return ob_get_clean();
    }

    public function enqueue_assets()
    {
        wp_enqueue_script( 'casino', plugins_url( 'assets/js/frontend.js', CS_FILE ), array( 'jquery' ), CS_VERSION );
        wp_enqueue_style( 'casino', plugins_url( 'assets/css/frontend.css', CS_FILE ), null, CS_VERSION );
    }

    public function casino_content( $content )
    {
        if( !is_admin() && get_post_type( get_the_ID() ) === 'casino' ):
            ob_start();
            $review_score = Helpers::get_reviews_score( get_the_ID() );
            $review_count = Helpers::get_reviews_count( get_the_ID() );
            include CS_DIR.'/templates/frontend/content/casino.php';
            $content = ob_get_clean();
        endif;

        return $content;
    }
}