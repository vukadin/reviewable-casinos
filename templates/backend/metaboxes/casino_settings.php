<?php 
if( !defined( 'ABSPATH' ) ) exit;
?>
<table class='form-table' >
    <tr>
        <th>
            <label for='casino-welcome-bonus' ><?php _e( 'Welcome bonus', 'casino' ); ?></label>
        </th>
        <td>
            <input type='text' class='regular-text' name='welcome_bonus' id='casino-welcome-bonus' value='<?php echo esc_attr( $welcome_bonus ); ?>' />
        </td>
    </tr>
    <tr>
        <th>
            <label for='casino-free-spins' ><?php _e( 'Number of free spins', 'casino' ); ?></label>
        </th>
        <td>
            <input type='text' class='regular-text' name='free_spins' id='casino-free-spins' value='<?php echo esc_attr( $free_spins ); ?>' />
        </td>
    </tr>
    <tr>
        <th>
            <label for='casino-affiliate-landing' ><?php _e( 'Affiliate Lading Page', 'casino' ); ?></label>
        </th>
        <td>
            <input type='text' class='large-text' name='affiliate_landing' id='casino-affiliate-landing' value='<?php echo esc_attr( $affiliate_landing ); ?>' />
        </td>
    </tr>
    <tr>
        <th>
            <label for='casino-signup-landing' ><?php _e( 'Affiliate Signup Page', 'casino' ); ?></label>
        </th>
        <td>
            <input type='text' class='large-text' name='signup_landing' id='casino-signup-landing' value='<?php echo esc_attr( $signup_landing ); ?>' />
        </td>
    </tr>
</table>
<?php wp_nonce_field( $nonce, '_casino_nonce' ); ?>