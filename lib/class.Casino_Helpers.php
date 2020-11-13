<?php
namespace Casino;

if( !defined( 'ABSPATH' ) ) exit;

class Helpers
{
    public static function get_casino_edit_nonce( $post_id )
    {
        return 'edit_casino_'.$post_id;
    }

    public static function get_casino_welcome_bonus( $post_id )
    {
        return get_post_meta( $post_id, '_welcome_bonus', true );
    }

    public static function set_casino_welcome_bonus( $post_id, $value )
    {
        update_post_meta( $post_id, '_welcome_bonus', $value );
    }

    public static function get_casino_free_spins( $post_id )
    {
        return get_post_meta( $post_id, '_free_spins', true );
    }
    
    public static function set_casino_free_spins( $post_id, $value )
    {
        update_post_meta( $post_id, '_free_spins', $value );
    }

    public static function get_casino_affiliate_landing( $post_id )
    {
        return get_post_meta( $post_id, '_affiliate_landing', true );
    }
    
    public static function set_casino_affiliate_landing( $post_id, $value )
    {
        update_post_meta( $post_id, '_affiliate_landing', $value );
    }

    public static function get_casino_signup_landing( $post_id )
    {
        return get_post_meta( $post_id, '_signup_landing', true );
    }
    
    public static function set_casino_signup_landing( $post_id, $value )
    {
        update_post_meta( $post_id, '_signup_landing', $value );
    }

    public static function get_casino_list()
    {
        $casinos = array();

        $args = array(
            'post_type' => 'casino',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'fields' => 'ids',
            'order' => 'asc',
            'orderby' => 'title'
        );

        $post_ids = get_posts($args);

        foreach( $post_ids as $post_id ) : 

            $casino = array();

            $casino['post_id'] = $post_id;
            $casino['title'] = get_the_title( $post_id );
            $casino['link'] = get_permalink( $post_id );
            $casino['image'] = get_the_post_thumbnail_url( $post_id, 'full' );
            $casino['welcome_bonus'] = Helpers::get_casino_welcome_bonus( $post_id );
            $casino['free_spins'] = Helpers::get_casino_free_spins( $post_id );
            $casino['affiliate_link'] = Helpers::get_casino_affiliate_landing( $post_id );
            $casino['signup_link'] = Helpers::get_casino_signup_landing( $post_id );
            $casino['review_score'] = Helpers::get_reviews_score( $post_id );
            $casino['comments_count'] = Helpers::get_reviews_count( $post_id );
            $casino['comments_label'] = $casino['comments_count'] > 0 ? sprintf( '%d commentaires', $casino['comments_count'] ) : 'Donnez-nous votre avis ici!';

            $casinos[] = $casino;

        endforeach;

        return $casinos;
    }

    public static function get_reviews_count( $post_id )
    {
        return rand(0,10);
    }

    public static function get_reviews_score( $post_id )
    {
        return round( rand(20,100)/2 ) / 10;
    }

    public static function get_casino_review_edit_nonce( $post_id )
    {
        return 'edit_casino_review_'.$post_id;
    }

    public static function get_casino_review_casino( $post_id )
    {
        return get_post_meta( $post_id, '_casino', true );
    }
    
    public static function set_casino_review_casino( $post_id, $value )
    {
        update_post_meta( $post_id, '_casino', $value );
    }

    public static function get_casino_review_email( $post_id )
    {
        return get_post_meta( $post_id, '_email', true );
    }
    
    public static function set_casino_review_email( $post_id, $value )
    {
        update_post_meta( $post_id, '_email', $value );
    }

    public static function get_casino_review_country( $post_id )
    {
        return get_post_meta( $post_id, '_country', true );
    }
    
    public static function set_casino_review_country( $post_id, $value )
    {
        update_post_meta( $post_id, '_country', $value );
    }

    public static function get_casino_review_rating( $post_id )
    {
        return get_post_meta( $post_id, '_rating', true );
    }
    
    public static function set_casino_review_rating( $post_id, $value )
    {
        update_post_meta( $post_id, '_rating', $value );
    }

    public static function get_casino_review_text( $post_id )
    {
        return get_post_meta( $post_id, '_text', true );
    }
    
    public static function set_casino_review_text( $post_id, $value )
    {
        update_post_meta( $post_id, '_text', $value );
    }

    public static function get_countries()
    {
        include CS_DIR.'/lib/countries.php';

        return $countries;
    }
}