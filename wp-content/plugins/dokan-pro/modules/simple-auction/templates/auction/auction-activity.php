<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 *  Dokan auction activity
 *
 *  @since 3.3.9
 *
 *  @package dokan
 */

do_action( 'dokan_dashboard_wrap_start' );


// Checking if vendor can see customer info
$can_vendor_see_customer_info = 'off' === dokan_get_option( 'hide_customer_info', 'dokan_selling', 'off' );

$activities     = dokan_auction_get_activity();
$localized_date = $date_from && $date_to ? dokan_format_datetime( $date_from ) . ' - ' . dokan_format_datetime( $date_to ) : '';
?>
<div class="dokan-dashboard-wrap">
    <?php
    do_action( 'dokan_dashboard_content_before' );
    do_action( 'dokan_auction_activity_content_before' );
    ?>

    <div class="dokan-dashboard-content">
        <?php

        /**
         *  Hook dokan_auction_activity_content_inside_before
         *
         *  @since 3.3.9
         */
        do_action( 'dokan_auction_activity_content_inside_before' );
        ?>
        <header class="dokan-dashboard-header dokan-clearfix">
            <h1 class="entry-title">
                <?php esc_html_e( 'Auctions Activity', 'dokan' ); ?>
                <a type="button" href="<?php echo esc_url( dokan_get_navigation_url( 'auction' ) ); ?>" name="clear_filter" class="dokan-btn dokan-right button-ml"><span class="fa fa-arrow-left back-to-auction"></span> <?php esc_html_e( 'Auctions', 'dokan' ); ?></a>
            </h1>
        </header><!-- .entry-header -->

        <div class="dokan-auction-activity-section">
            <div class="filter">
                <form id="auction-activity-form" method="get" class="dokan-form-inline">
                    <div class="dokan-form-group">
                        <input id="auction-activity-datetime-range" type="text" autocomplete="off" placeholder="<?php esc_attr_e( 'Select Date Range', 'dokan' ); ?>" value="<?php echo esc_attr( $localized_date ); ?>"/>
                        <input name="_auction_dates_from" id="_auction_dates_from" type="hidden" value="<?php echo esc_attr( $date_from ); ?>" readonly="">
                        <input name="_auction_dates_to" id="_auction_dates_to" type="hidden" value="<?php echo esc_attr( $date_to ); ?>" readonly="">
                    </div>
                    <div class="dokan-form-group">
                        <button type="submit" name="auction_activity_date_filter" class="dokan-btn dokan-btn-theme"><span class="fa fa-filter"></span> <?php esc_html_e( 'Filter', 'dokan' ); ?></button>
                        <button id="auction-clear-filter-button" type="button" name="clear_filter" style="margin-left: 16px;" class="dokan-btn"><span style="font-size: 16px; vertical-align: middle;" class="fa fa-undo"></span> <?php esc_html_e( 'Reset', 'dokan' ); ?></button>
                    </div>

                    <?php wp_nonce_field( 'dokan-auction-activity', 'auction_activity_nonce', false ); ?>
                </form>

                <form>
                    <div class="search-box">
                        <input type="text" class="dokan-form-control" name="auction_activity_search" value="<?php echo esc_attr( $search_string ); ?>" placeholder="<?php esc_attr_e( 'Search By Auction, Name, Email', 'dokan' ); ?>">
                        <button type="submit" class="dokan-btn"><?php esc_html_e( 'Search', 'dokan' ); ?></button>
                    </div>

                    <?php wp_nonce_field( 'dokan-auction-activity', 'auction_activity_nonce', false ); ?>
                </form>
            </div>
            <table class="dokan-table table-striped product-listing-table">
                <thead>
                <tr>
                    <th><?php esc_html_e( 'Auction', 'dokan' ); ?></th>
                    <th><?php esc_html_e( 'User Name', 'dokan' ); ?></th>
                    <?php if ( $can_vendor_see_customer_info ) : ?>
                    <th><?php esc_html_e( 'User Email', 'dokan' ); ?></th>
                    <?php endif; ?>
                    <th><?php esc_html_e( 'Bid', 'dokan' ); ?></th>
                    <th><?php esc_html_e( 'Date', 'dokan' ); ?></th>
                    <th><?php esc_html_e( 'Proxy', 'dokan' ); ?></th>
                </tr>
                </thead>
                <tbody>

                <?php if ( 0 === count( $activities ) ) : ?>
                    <tr>
                        <td><?php esc_html_e( 'No Auctions Activity Found!', 'dokan' ); ?></td>
                    </tr>
                <?php endif; ?>

                <?php foreach ( $activities as $activity ) : ?>
                    <tr>
                        <td><a href="<?php echo esc_url( dokan_edit_product_url( $activity['post_id'] ) ); ?>"><?php echo esc_html( $activity['post_title'] ); ?></a></td>
                        <td><?php echo esc_html( $activity['user_nicename'] ); ?></td>
                        <?php if ( $can_vendor_see_customer_info ) : ?>
                        <td><?php echo esc_html( $activity['user_email'] ); ?></td>
                        <?php endif; ?>
                        <td><?php echo wc_price( $activity['bid'] ); ?></td>
                        <td><?php echo dokan_format_datetime( $activity['date'] ); ?></td>
                        <td><?php $activity['proxy'] ? esc_html_e( 'Yes', 'dokan' ) : esc_html_e( 'No', 'dokan' ); ?></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>

            </table>
            <?php
            $activities_count = dokan_auction_get_activity( true );

            $num_of_pages = $activities_count ? ceil( $activities_count / 10 ) : 0;
            $pagenum      = isset( $_GET['pagenum'] ) ? absint( wp_unslash( $_GET['pagenum'] ) ) : 1; // phpcs:ignore

            if ( $num_of_pages > 1 ) :
                $base_url   = dokan_get_navigation_url( 'auction-activity' );
                $page_links = paginate_links(
                    array(
                        'current'  => $pagenum,
                        'total'    => $num_of_pages,
                        'base'     => $base_url . '%_%',
                        'format'   => '?pagenum=%#%',
                        'add_args' => false,
                        'type'     => 'array',
                    )
                );
                ?>
                <div class="pagination-wrap">
                    <ul class="pagination">
                        <li>
                            <?php echo join( '</li><li>', $page_links ); ?>
                        </li>
                    </ul>
                </div>
                <?php
            endif;
            ?>

        </div>

        <?php
        do_action( 'dokan_dashboard_content_after' );

        /**
         *  Hook dokan_auction_activity_content_after
         *
         *  @since 3.3.9
         */
        do_action( 'dokan_auction_activity_content_after' );
        ?>
    </div>
</div><!-- .dokan-dashboard-wrap -->

<?php do_action( 'dokan_dashboard_wrap_end' ); ?>

<script>
    ;(function($) {
        $( document ).ready( function() {
            let localeData = {
                format: dokan_get_daterange_picker_format( dokan_helper.i18n_date_format + ' ' + dokan_helper.i18n_time_format  ),
                ...dokan_helper.daterange_picker_local
            };

            const date_time_range = $('#auction-activity-datetime-range');

            date_time_range.daterangepicker({
                autoUpdateInput : false,
                locale          : localeData,
                timePicker      : true,
            });

            date_time_range.on( 'apply.daterangepicker', function( ev, picker ) {
                $( this ).val( picker.startDate.format( localeData.format ) + ' - ' + picker.endDate.format( localeData.format ) );

                $("#_auction_dates_from").val(picker.startDate.format('YYYY-MM-DD HH:mm'));
                $("#_auction_dates_to").val(picker.endDate.format('YYYY-MM-DD HH:mm'));
            });

            date_time_range.on( 'cancel.daterangepicker', function( ev, picker ) {
                $( this ).val('');

                $("#_auction_dates_from").val('');
                $("#_auction_dates_to").val('');
            });

            $( '#auction-clear-filter-button' ).on( 'click', function () {
                window.location = window.location.href.split("?")[0];
            } );
        });
    })(jQuery)
</script>
