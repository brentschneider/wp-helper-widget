<?php
/*
  Plugin Name: Helper Widget
  Plugin URI: https://github.com/brentschneider/wp-helper-widget
  Description: Adds persistant helper widget(s) to aid the user
  Version: 0.1
  Author: Brent Schneider
  Author URI: http://brentschneider.github.io
 */

class The_Persistant_Widgets extends WP_Widget {

    function __construct() {
        parent::__construct(
                'the_persistant_widgets',
                __('Persistant widgets', 'translation_domain'), // Name
                array('description' => __('Persistant widget', 'translation_domain'),)
        );
    }




    /**************************************************************
     * Front-end display of widget.
     */

    public function widget( $args, $instance ) {
        
        $chat_title = $instance['chat_title'];
        $chat_url = $instance['chat_url'];
        $donation_title = $instance['donation_title'];
        $donation_url = $instance['donation_url'];
        
        // HTML Area

        // Origional
        // $chat_profile = '<li><a href="' . $chat_url . '" target="_self" class="chat">' . $chat_title . '</a></li>';

        // for Chatra
        $chat_profile = '<li><a onclick="' . $chat_url . '" href="#" class="chat">' . $chat_title . '</a></li>';
        
        $donation_profile = '<li><a href="' . $donation_url . '" target="_self" class="donation">' . $donation_title .'</a></li>';

        // $chat_profile = '<li><a data-target="#myModal" href="' . $chat_url . '" target="_blank" class="chat" data-toggle="modal">' . $chat_title . '</a></li>';

        

        

      


        echo $args['before_widget'];

        echo '<div id="my_widget__actions" class="call_to_action"><ul>';

        echo (!empty($chat_url) ) ? $chat_profile : null;
        echo (!empty($donation_url) ) ? $donation_profile : null;
        
        echo '</ul></div>';

        echo $args['after_widget'];
    }



    /**************************************************************
     * Back-end widget form.
     * @see WP_Widget::form() 
     */

    public function form($instance) {

        // empty($instance['chat_title']) ? $chat_title = 'How can we help?' : null;

        isset($instance['chat_title']) ? $chat_title = $instance['chat_title'] : null;
        isset($instance['chat_url']) ? $chat_url = $instance['chat_url'] : null;

        isset($instance['donation_title']) ? $donation_title = $instance['donation_title'] : null;
        isset($instance['donation_url']) ? $donation_url = $instance['donation_url'] : null;

        ?>

        <p>

            <label for="<?php echo $this->get_field_id('chat_title'); ?>"><?php _e('Chat Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('chat_title'); ?>" name="<?php echo $this->get_field_name('chat_title'); ?>" type="text" value="<?php echo esc_attr($chat_title); ?>">

            <label for="<?php echo $this->get_field_id('chat_url'); ?>"><?php _e('Chat URL:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('chat_url'); ?>" name="<?php echo $this->get_field_name('chat_url'); ?>" type="text" value="<?php echo esc_attr($chat_url); ?>">

        </p>

        <p>
            <label for="<?php echo $this->get_field_id('donation_title'); ?>"><?php _e('Donation Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('donation_title'); ?>" name="<?php echo $this->get_field_name('donation_title'); ?>" type="text" value="<?php echo esc_attr($donation_title); ?>">

            <label for="<?php echo $this->get_field_id('donation_url'); ?>"><?php _e('Donation URL:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('donation_url'); ?>" name="<?php echo $this->get_field_name('donation_url'); ?>" type="text" value="<?php echo esc_attr($donation_url); ?>">
        </p>

        <?php
    }

    /**************************************************************
     * Sanitize widget form values as they are saved.
     * @see WP_Widget::update()
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     * @return array Updated safe values to be saved.
     */

    public function update($new_instance, $old_instance) {

        $instance = array();
    
        $instance['chat_title'] = (!empty($new_instance['chat_title']) ) ? strip_tags($new_instance['chat_title']) : '';
        $instance['chat_url'] = (!empty($new_instance['chat_url']) ) ? strip_tags($new_instance['chat_url']) : '';
        $instance['donation_title'] = (!empty($new_instance['donation_title']) ) ? strip_tags($new_instance['donation_title']) : '';
        $instance['donation_url'] = (!empty($new_instance['donation_url']) ) ? strip_tags($new_instance['donation_url']) : '';
    
        return $instance;
    }

}


// register the helper widget
function register_the_persistant_widgets() {
    register_widget('wp-helper-widgets');
}

// enqueue css stylesheet
function the_persistant_widgets_css() {
    wp_enqueue_style('wp-helper-widgets', plugins_url('wp-helper-widgets.css', __FILE__));
}

// 1, 2, 3 ... go!
add_action('widgets_init', 'register_the_persistant_widgets');
add_action('wp_enqueue_scripts', 'wp-helper-widgets_css');
