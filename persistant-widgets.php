<?php
/*
  Plugin Name: Persistant Widget
  Plugin URI: https://github.com/brentschneider/wp-helper-widget
  Description: Adds persistant helper widget(s) to aid the user
  Version: 0.2
  Date: Oct/30/17
  Author: Brent Schneider
  Author URI: http://brentschneider.github.io
 */

class Persistant_Widgets extends WP_Widget {

    function __construct() {
        parent::__construct(
                // Base ID of the widget
                'persistant_widgets',
                // Widget name that appears in UI
                __('Persistant Widget', 'translation_domain'), 
                // The widget description
                array('description' => __('Persistant Widget', 'translation_domain'),)
        );
        
    }


    /**************************************************************
     * Front-end display of widget.
     */

    public function widget( $args, $instance ) {

        $widget_id = $instance['widget_id'];
        
        $chat_title = $instance['chat_title'];
        $chat_url = $instance['chat_url'];
        $info_title = $instance['info_title'];
        $info_url = $instance['info_url'];
        $donation_title = $instance['donation_title'];
        $donation_url = $instance['donation_url'];
        

        // HTML output section
        
        $widget_id ='<div id="'. $widget_id . '" class="call_to_action "><ul>';

        $chat_profile = '<li><a onclick="' . $chat_url . '" href="#" class="ea-speech-bubble">' . $chat_title . '</a></li>';
        $donation_profile = '<li><a href="' . $donation_url . '" target="_self" class="ea-gift">' . $donation_title .'</a></li>';
        $info_profile = '<li><a href="' . $info_url . '" target="_self" class="ea-info" aria-hidden="true">' . $info_title .'</a></li>';
       

        // Builds the widget on the page

        echo $args['before_widget'];
    
            echo (!empty($widget_id) ) ? $widget_id : null;
            
                echo (!empty($chat_url) ) ? $chat_profile : null;
                echo (!empty($donation_url) ) ? $donation_profile : null;
                echo (!empty($info_url) ) ? $info_profile : null;

            echo '</ul></div>';

        echo $args['after_widget'];
    }



    /**************************************************************
     * Back-end widget form.
     * @see WP_Widget::form()
     */

    public function form($instance) {

        isset($instance['widget_id']) ? $widget_id = $instance['widget_id'] : null;

        isset($instance['chat_title']) ? $chat_title = $instance['chat_title'] : null;
        isset($instance['chat_url']) ? $chat_url = $instance['chat_url'] : null;

        isset($instance['donation_title']) ? $donation_title = $instance['donation_title'] : null;
        isset($instance['donation_url']) ? $donation_url = $instance['donation_url'] : null;

        isset($instance['info_title']) ? $info_title = $instance['info_title'] : null;
        isset($instance['info_url']) ? $info_url = $instance['info_url'] : null;

        ?>

        <!-- // Specify for Desktop or Mobile -->
        <p> 
            <label for="<?php echo $this->get_field_id('widget_id'); ?>"><?php _e('Widget id:'); ?></label><br />
            <input class="" id="<?php echo $this->get_field_id('widget_id'); ?>" name="<?php echo $this->get_field_name('widget_id'); ?>" type="text" value="<?php echo esc_attr($widget_id); ?>">
        </p>

        <!-- // Chat -->
        <p>
            <label for="<?php echo $this->get_field_id('chat_title'); ?>"><?php _e('Chat Title:'); ?></label> <br />
            <input class="" id="<?php echo $this->get_field_id('chat_title'); ?>" name="<?php echo $this->get_field_name('chat_title'); ?>" type="text" value="<?php echo esc_attr($chat_title); ?>"><br />
            <label for="<?php echo $this->get_field_id('chat_url'); ?>"><?php _e('Chat URL:'); ?></label><br />
            <input class="" id="<?php echo $this->get_field_id('chat_url'); ?>" name="<?php echo $this->get_field_name('chat_url'); ?>" type="text" value="<?php echo esc_attr($chat_url); ?>">
        </p>

        <!-- // Docation -->
        <p>
            <label for="<?php echo $this->get_field_id('donation_title'); ?>"><?php _e('Donation Title:'); ?></label><br />
            <input class="" id="<?php echo $this->get_field_id('donation_title'); ?>" name="<?php echo $this->get_field_name('donation_title'); ?>" type="text" value="<?php echo esc_attr($donation_title); ?>"><br />
            <label for="<?php echo $this->get_field_id('donation_url'); ?>"><?php _e('Donation URL:'); ?></label><br />
            <input class="" id="<?php echo $this->get_field_id('donation_url'); ?>" name="<?php echo $this->get_field_name('donation_url'); ?>" type="text" value="<?php echo esc_attr($donation_url); ?>">
        </p>

        <!-- // Info -->
        <p>
            <label for="<?php echo $this->get_field_id('info_title'); ?>"><?php _e('Info Title:'); ?></label> <br />
            <input class="" id="<?php echo $this->get_field_id('info_title'); ?>" name="<?php echo $this->get_field_name('info_title'); ?>" type="text" value="<?php echo esc_attr($info_title); ?>"><br />
            <label for="<?php echo $this->get_field_id('info_url'); ?>"><?php _e('Info URL:'); ?></label><br />
            <input class="" id="<?php echo $this->get_field_id('info_url'); ?>" name="<?php echo $this->get_field_name('info_url'); ?>" type="text" value="<?php echo esc_attr($info_url); ?>">
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

            $instance['widget_id'] = (!empty($new_instance['widget_id']) ) ? strip_tags($new_instance['widget_id']) : '';
            $instance['widget_location'] = (!empty($new_instance['widget_location']) ) ? strip_tags($new_instance['widget_location']) : '';

            $instance['chat_title'] = (!empty($new_instance['chat_title']) ) ? strip_tags($new_instance['chat_title']) : '';
            $instance['chat_url'] = (!empty($new_instance['chat_url']) ) ? strip_tags($new_instance['chat_url']) : '';

            $instance['donation_title'] = (!empty($new_instance['donation_title']) ) ? strip_tags($new_instance['donation_title']) : '';
            $instance['donation_url'] = (!empty($new_instance['donation_url']) ) ? strip_tags($new_instance['donation_url']) : '';

            $instance['info_title'] = (!empty($new_instance['info_title']) ) ? strip_tags($new_instance['info_title']) : '';
            $instance['info_url'] = (!empty($new_instance['info_url']) ) ? strip_tags($new_instance['info_url']) : '';

        return $instance;
    }

}

// register the widget
function register_persistant_widgets() {
    register_widget('persistant_widgets');
}

// enqueue css stylesheet
function persistant_widgets_css() {
    wp_enqueue_style('social-profile-widget', plugins_url('persistant-widgets.css', __FILE__));
}

// And 1, 2, 3 ... go!
add_action('widgets_init', 'register_persistant_widgets');
add_action('wp_enqueue_scripts', 'persistant_widgets_css');
