<?php 
if( !defined( 'ABSPATH' ) ) exit;
?>
<table class='form-table' >
    <tr>
        <th>
            <label for='casino-review-casino' ><?php _e( 'Casino', 'casino' ); ?></label>
        </th>
        <td>
            <select class='regular-text' name='casino' id='casino-review-casino' >
                <option value='' ></option>
                <?php 
                    foreach( $list_casinos as $list_casino ) : 
                        printf( 
                            '<option value="%s" %s >%s</option>',
                            $list_casino['post_id'],
                            selected( $list_casino['post_id'], $casino, true ),
                            $list_casino['title']
                        );
                    endforeach;     
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <th>
            <label for='casino-review-email' ><?php _e( 'Email', 'casino' ); ?></label>
        </th>
        <td>
            <input type='email' class='regular-text' name='email' id='casino-review-email' value='<?php echo esc_attr( $email ); ?>' />
        </td>
    </tr>
    <tr>
        <th>
            <label for='casino-review-country' ><?php _e( 'Country', 'casino' ); ?></label>
        </th>
        <td>
            <select class='regular-text' name='country' id='casino-review-country' >
                <option value='' ></option>
                <?php 
                    foreach( $list_countries as $list_country ) : 
                        printf( 
                            '<option value="%s" %s >%s</option>',
                            $list_country['alpha2'],
                            selected( $list_country['alpha2'], $country, true ),
                            $list_country['name']
                        );
                    endforeach;     
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <th>
            <label for='casino-review-rating' ><?php _e( 'Rating', 'casino' ); ?></label>
        </th>
        <td>
            <input type='number' min="1" max="5" step="0.1" class='small-text' name='rating' id='casino-review-rating' value='<?php echo esc_attr( $rating ); ?>' />
        </td>
    </tr>
    <tr>
        <th>
            <label for='casino-review-text' ><?php _e( 'Text', 'casino' ); ?></label>
        </th>
        <td>
            <textarea class='large-text' name='text' id='casino-review-text' ><?php echo esc_textarea( $text ); ?></textarea>
        </td>
    </tr>
</table>
<?php wp_nonce_field( $nonce, '_casino_review_nonce' ); ?>