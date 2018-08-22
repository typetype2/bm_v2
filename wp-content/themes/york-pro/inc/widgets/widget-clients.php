<?php
// Register widget
add_action('widgets_init', create_function('', 'return register_widget("York_Clients");'));

class York_Clients extends WP_Widget {

    protected $defaults;
   
    // Constructor
    function __construct() {
        parent::__construct(
            'york_clients', // Base ID
            esc_html__( 'Clients', 'york-pro' ), // Name
            array( 
                'classname' => 'widget--clients', // Classes
                'description' => esc_html__( 'Displays client social proof.', 'york-pro' ), 
                'customize_selective_refresh' => true,
            ) // Args
        );

        $this->defaults = array(
            'image0' => '',
            'image1' => '',
            'image2' => '',
            'image3' => '',
            'image4' => '',
            'image5' => '',
            'image6' => '',
            'image7' => '',
            'image8' => '',
            'image9' => '',
        );
    }  

    // Display widget
    function widget( $args, $instance ) {
        extract( $args );

        // Merge with defaults
        $instance = wp_parse_args( (array) $instance, $this->defaults );

        // Before
        echo balanceTags($before_widget);

            // Content
            echo '<ul class="section-testimonials">';

                // Now you loop through each image
                for ($x = 0; $x <= 9; $x++) {
                    
                    // Set the image source as a variable
                    $img_src = $instance[ 'image'.$x ]; 
                
                    // Only output the number of gallery images that have been uploaded
                    if ( $img_src ) {

                        echo "<li class=\"testimonial\">";
                            echo "<img class=\"thumb\" src=\"{$img_src}\">";
                        echo "</li>";
                    }
                }  

            echo '</ul>';

        // After
        echo balanceTags($after_widget);

    }

    // Update widget
    function update( $new_instance, $old_instance ) {

        $new_instance['image0'] = strip_tags( $new_instance['image0'] );
        $new_instance['image1'] = strip_tags( $new_instance['image1'] );
        $new_instance['image2'] = strip_tags( $new_instance['image2'] );
        $new_instance['image3'] = strip_tags( $new_instance['image3'] );
        $new_instance['image4'] = strip_tags( $new_instance['image4'] );
        $new_instance['image5'] = strip_tags( $new_instance['image5'] );
        $new_instance['image6'] = strip_tags( $new_instance['image6'] );
        $new_instance['image7'] = strip_tags( $new_instance['image7'] );
        $new_instance['image8'] = strip_tags( $new_instance['image8'] );
        $new_instance['image9'] = strip_tags( $new_instance['image9'] );

        return $new_instance;
    }

    // Display form
    function form( $instance ) {

        // Merge with defaults
        $instance = wp_parse_args( (array) $instance, $this->defaults ); 

        $edit_text = esc_html__( 'Edit', 'york-pro' );
        $add_text = esc_html__( 'Add', 'york-pro' ); 
        ?>

        <p>
            <div class="widget-media-container widget-media-container--grid">
     
            <ul>

                <?php 
                for ($x = 0; $x <= 9; $x++) {

                    $field_id = 'image'.$x; 
                    $instance_image = $instance[ 'image'.$x ]; 

                    $img    = ( $instance_image ) ? '' : 'style=display:none;';
                    $no_img = ( $instance_image ) ? 'style=display:none;' : '';
                    $button = ( $instance_image ) ? $edit_text : $add_text; 
                    ?>
                    <li>
                        <div class="image-wrap">
                            <img id="<?php echo esc_attr( $this->get_field_id( $field_id ) ); ?>-preview" src="<?php echo esc_attr( $instance_image ); ?>" <?php echo esc_attr( $img ); ?> />
                            <span class="widget-no-image" id="<?php echo esc_attr( $this->get_field_id( $field_id ) ); ?>-noimg" <?php echo esc_attr( $no_img ); ?>></span></td>
                            <input type="text" id="<?php echo esc_attr( $this->get_field_id( $field_id ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $field_id ) ); ?>" value="<?php echo esc_attr( $instance_image ); ?>" class="widget-media-url" />
                        </div>
                        <div class="buttons-wrap">
                            <input type="button" value="<?php echo esc_attr($button); ?>" class="button widget-media-upload" id="<?php echo esc_attr( $this->get_field_id( $field_id ) ); ?>-button" />
                             <input type="button" value="<?php echo esc_html( 'Remove', 'york-pro' ); ?>" class="button widget-media-remove" id="<?php echo esc_attr( $this->get_field_id( $field_id ) ); ?>-remove" <?php echo esc_attr( $img ); ?> />
                        </div>
                    </li> 
            <?php } ?>

            </ul>
                <br class="clear">
            </div>
        </p>
    <?php
    } //END form
} //END class