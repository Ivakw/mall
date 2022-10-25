<?php

/**
 * Dokan Review Listing Template
 *
 * @since 2.4
 *
 * @package dokan
 */

?>
<form id="dokan_comments-form" action="" method="post">
    <table id="dokan-comments-table" class="dokan-table dokan-table-striped">
        <?php if ( dokan_get_option( 'seller_review_manage', 'dokan_selling', 'on' ) === 'on' ) : ?>
            <div class="dokan-form-group">
                <?php if ( current_user_can( 'dokan_manage_reviews' ) && dokan_get_option( 'seller_review_manage', 'dokan_selling', 'on' ) === 'on' ) : ?>
                    <select name="comment_status">
                        <?php
                        if ( $comment_status === 'hold' ) {
                            ?>
                            <option value="none"><?php esc_html_e( 'Bulk Actions', 'dokan' ); ?></option>
                            <option value="approve"><?php esc_html_e( 'Mark Approve', 'dokan' ); ?></option>
                            <option value="spam"><?php esc_html_e( 'Mark Spam', 'dokan' ); ?></option>
                            <option value="trash"><?php esc_html_e( 'Mark Trash', 'dokan' ); ?></option>
                        <?php } elseif ( $comment_status === 'spam' ) { ?>
                            <option value="none"><?php esc_html_e( 'Bulk Actions', 'dokan' ); ?></option>
                            <option value="approve"><?php esc_html_e( 'Mark Not Spam', 'dokan' ); ?></option>
                            <option value="delete"><?php esc_html_e( 'Delete permanently', 'dokan' ); ?></option>
                        <?php } elseif ( $comment_status === 'trash' ) { ?>
                            <option value="none"><?php esc_html_e( 'Bulk Actions', 'dokan' ); ?></option>
                            <option value="approve"><?php esc_html_e( 'Restore', 'dokan' ); ?></option>
                            <option value="delete"><?php esc_html_e( 'Delete permanently', 'dokan' ); ?></option>
                        <?php } else { ?>
                            <option value="none"><?php esc_html_e( 'Bulk Actions', 'dokan' ); ?></option>
                            <option value="hold"><?php esc_html_e( 'Mark Pending', 'dokan' ); ?></option>
                            <option value="spam"><?php esc_html_e( 'Mark Spam', 'dokan' ); ?></option>
                            <option value="trash"><?php esc_html_e( 'Mark Trash', 'dokan' ); ?></option>
                            <?php
                        }
                        ?>
                    </select>

                    <?php wp_nonce_field( 'dokan_comment_nonce_action', 'dokan_comment_nonce' ); ?>

                    <input type="submit" value="<?php esc_html_e( 'Apply', 'dokan' ); ?>" class="dokan-btn dokan-btn-sm" name="comt_stat_sub">
            </div>


            <thead>
                <tr>
                    <th class="col-check"><input class="dokan-check-all" type="checkbox"></th>
                    <th class="col-author"><?php esc_html_e( 'Author', 'dokan' ); ?></th>
                    <th class="col-content"><?php esc_html_e( 'Comment', 'dokan' ); ?></th>
                    <th class="col-link"><?php esc_html_e( 'Link To', 'dokan' ); ?></th>
                    <th class="col-link"><?php esc_html_e( 'Rating', 'dokan' ); ?></th>
                </tr>
            </thead>
        <?php endif; ?>

        <tbody>

            <?php

            /**
             * Dokan_review_listing_table_body hook
             *
             * @hooked dokan_render_listing_table_body
             */
            do_action( 'dokan_review_listing_table_body', $post_type )
            ?>

        </tbody>

    </table>

</form>
<?php endif; ?>
