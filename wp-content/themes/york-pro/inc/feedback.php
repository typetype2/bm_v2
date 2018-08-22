<?php
/**
 * Theme feedback class.
 * Prompt users to provide feedback for the theme after a week.
 *
 * Heavily based on code by Rhys Wynne
 * https://winwar.co.uk/2014/10/ask-wordpress-plugin-reviews-week/
 * 
 * @package York Pro
 */
 


if ( ! class_exists( 'ThemeBeans_Request_Feedback' ) ) :
class ThemeBeans_Request_Feedback {



    /**
     * Private variables.
     *
     * These should be customised for each project.
     */
    private $slug;        // The plugin slug
    private $name;        // The plugin name
    private $time_limit;  // The time limit at which notice is shown



    /**
     * Variables.
     */
    public $nobug_option;



    /**
     * Fire the constructor up :)
     */
    public function __construct( $args ) {

        $this->slug        = $args['slug'];
        $this->name        = $args['name'];
        if ( isset( $args['time_limit'] ) ) {
            $this->time_limit  = $args['time_limit'];
        } else {
            $this->time_limit = WEEK_IN_SECONDS;
        }

        $this->nobug_option = $this->slug . '-no-bug';

        // Loading main functionality
        add_action( 'admin_init', array( $this, 'check_installation_date' ) );
        add_action( 'admin_init', array( $this, 'set_no_bug' ), 5 );
    }



    /**
     * Seconds to words.
     */
    public function seconds_to_words( $seconds ) {

        // Get the years
        $years = ( intval( $seconds ) / YEAR_IN_SECONDS ) % 100;
        if ( $years > 1 ) {
            return sprintf( esc_html__( '%s years', 'york-pro' ), $years );
        } elseif ( $years > 0) {
            return esc_html__( 'a year', 'york-pro' );
        }

        // Get the weeks
        $weeks = ( intval( $seconds ) / WEEK_IN_SECONDS ) % 52;
        if ( $weeks > 1 ) {
            return sprintf( esc_html__( '%s weeks', 'york-pro' ), $weeks );
        } elseif ( $weeks > 0) {
            return esc_html__( 'a week', 'york-pro' );
        }

        // Get the days
        $days = ( intval( $seconds ) / DAY_IN_SECONDS ) % 7;
        if ( $days > 1 ) {
            return sprintf( esc_html__( '%s days', 'york-pro' ), $days );
        } elseif ( $days > 0) {
            return esc_html__( 'a day', 'york-pro' );
        }

        // Get the hours
        $hours = ( intval( $seconds ) / HOUR_IN_SECONDS ) % 24;
        if ( $hours > 1 ) {
            return sprintf( esc_html__( '%s hours', 'york-pro' ), $hours );
        } elseif ( $hours > 0) {
            return esc_html__( 'an hour', 'york-pro' );
        }

        // Get the minutes
        $minutes = ( intval( $seconds ) / MINUTE_IN_SECONDS ) % 60;
        if ( $minutes > 1 ) {
            return sprintf( esc_html__( '%s minutes', 'york-pro' ), $minutes );
        } elseif ( $minutes > 0) {
            return esc_html__( 'a minute', 'york-pro' );
        }

        // Get the seconds
        $seconds = intval( $seconds ) % 60;
        if ( $seconds > 1 ) {
            return sprintf( esc_html__( '%s seconds', 'york-pro' ), $seconds );
        } elseif ( $seconds > 0) {
            return esc_html__( 'a second', 'york-pro' );
        }

        return;
    }



    /**
     * Check date on admin initiation and add to admin notice if it was more than the time limit.
     */
    public function check_installation_date() {

        if ( true != get_site_option( $this->nobug_option ) ) {

            // If not installation date set, then add it
            $install_date = get_site_option( $this->slug . '-activation-date' );
            if ( '' == $install_date ) {
                add_site_option( $this->slug . '-activation-date', time() );
            }

            // If difference between install date and now is greater than time limit, then display notice
            if ( ( time() - $install_date ) >  $this->time_limit  ) {
                add_action( 'admin_notices', array( $this, 'display_admin_notice' ) );
            }

        }

    }



    /**
     * Display Admin Notice, asking for a review.
     */
    public function display_admin_notice() {

        global $pagenow;
    
        if (( $pagenow == 'index.php' )) {

            $current_user = wp_get_current_user();
            $url = esc_url( get_home_url('/') );

            $no_bug_url = wp_nonce_url( admin_url( '?' . $this->nobug_option . '=true' ), 'review-nonce' );
            $time = $this->seconds_to_words( time() - get_site_option( $this->slug . '-activation-date' ) );

            echo '<div class="updated feedback-notice">
                    <p><b>' . sprintf( esc_html__( 'How do you like %s?', 'york-pro' ), $this->name ) . '</b> '.esc_html__( 'Write a review and get a 10% discount on your next ThemeBeans theme!', 'york-pro' ).'</p>
                    <p><a onclick="location.href=\'' . esc_url( $no_bug_url ) . '\';" class="button button-secondary" href="' . esc_url( 'https://themebeans.com/feedback/?themename='.$this->name.'&email='.$current_user->user_email.'&url='.$url.'' ) . '" target="_blank">' . esc_html__( 'Write a Review', 'york-pro' ) . '</a></p>
                    <a class="dismiss" href="' . esc_url( $no_bug_url ) . '"></a>
                </div>';
        }

    }



    /**
     * Set the theme to no longer bug users if user asks not to be.
     */
    public function set_no_bug() {

        // Bail out if not on correct page
        if (
            ! isset( $_GET['_wpnonce'] )
            ||
            (
                ! wp_verify_nonce( $_GET['_wpnonce'], 'review-nonce' )
                ||
                ! is_admin()
                ||
                ! isset( $_GET[$this->nobug_option] )
                ||
                ! current_user_can( 'manage_options' )
            )
        ) {
            return;
        }

        add_site_option( $this->nobug_option, true );
    }
}
endif;



/**
 * Set the variables for the feedback class
 */
new ThemeBeans_Request_Feedback( array(
    'slug'        => 'york-pro',
    'name'        => 'York Pro',
    'time_limit'  => WEEK_IN_SECONDS,
) );