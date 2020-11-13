<?php 
if( !defined( 'ABSPATH' ) ) exit;
?>
<div class="casino-grid" >
<?php foreach( $casinos as $casino ) : ?>
    <div class="casino-grid-item" >
        <div class="casino-grid-item-image" >
            <a class="casino-grid-item-image-frame" href="<?php echo esc_attr( $casino['signup_link'] ? $casino['signup_link'] : $casino['affiliate_link'] ); ?>" ></a>
            <div class="casino-grid-item-image-logo" style='background-image:url(<?php echo $casino['image']; ?>)' ></div>
        </div>
        <div class="casino-grid-item-title" ><?php echo $casino['title']; ?></div>
        <div class="casino-grid-item-review" title="<?php echo $casino['review_score']; ?>" >
            <div style="width:<?php $total_width = round( ( $casino['review_score'] / 5 ) * 100 ); echo $total_width; ?>%">
                <div class="casino-grid-item-review-stars" style="width:<?php echo 100 * ( 100 / $total_width ); ?>%" ></div>
            </div>
        </div>
        <div class="casino-grid-item-review-link" >
            <a href="<?php echo esc_attr( $casino['link'] ); ?>" ><?php echo $casino['comments_label']; ?></a>
        </div>
        <div class="casino-grid-item-welcome-bonus" ><?php echo $casino['welcome_bonus']; ?></div>
        <div class="casino-grid-item-free-spins" ><?php echo $casino['free_spins']; ?></div>
        <div class="casino-grid-item-affiliate-link" >
            <a href="<?php echo esc_attr( $casino['affiliate_link'] ); ?>" ><?php _e( 'Play', 'casino' ); ?></a>
        </div>
    </div>
<?php endforeach; ?>
</div>