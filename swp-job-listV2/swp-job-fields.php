<?php


function swp_add_custom_metabox()
{

/*
add_meta_box( string $id, string $title, callable $callback, string|array|WP_Screen $screen = null, string $context = 'advanced', string $priority = 'default', array $callback_args = null )

Parameters #Parameters

$id
(string) (Required) Meta box ID (used in the 'id' attribute for the meta box).

$title
(string) (Required) Title of the meta box.

$callback
(callable) (Required) Function that fills the box with the desired content. The function should echo its output.

$screen
(string|array|WP_Screen) (Optional) The screen or screens on which to show the box (such as a post type, 'link', or 'comment'). Accepts a single screen ID, WP_Screen object, or array of screen IDs. Default is the current screen. If you have used add_menu_page() or add_submenu_page() to create a new screen (and hence screen_id), make sure your menu slug conforms to the limits of sanitize_key() otherwise the 'screen' menu may not correctly render on your page.
Default value: null

$context
(string) (Optional) The context within the screen where the boxes should display. Available contexts vary from screen to screen. Post edit screen contexts include 'normal', 'side', and 'advanced'. Comments screen contexts include 'normal' and 'side'. Menus meta boxes (accordion sections) all use the 'side' context. Global
Default value: 'advanced'

$priority
(string) (Optional) The priority within the context where the boxes should show ('high', 'low').
Default value: 'default'

$callback_args
(array) (Optional) Data that should be set as the $args property of the box array (which is the second parameter passed to your callback).
Default value: null
*/
//           (HTML id,    title     , callback-function, display-screen, screen position)
add_meta_box('swp_meta','Job Listing','swp_meta_callback','job','normal','low');
}
//        (  WP-Hook(event) , Custom-Function(called on event) )
add_action( 'add_meta_boxes', 'swp_add_custom_metabox');

function swp_meta_callback()
{
	?>
	<div>
    <div class="meta-row">
        <div class="meta-th">
            <label for="job-id" class="swp-row-title">Job ID</label>
        </div>
        <div class="meta-td">
            <input type="text" name="job-id" id="job-id" value=""/>
        </div>
    </div>
    <div class="meta-row">
        <div class="meta-th">
            <label for="date_listed" class="swp-row-title">Date Listed</label>
        </div>
        <div class="meta-td">
            <input type="text" name="date_listed" id="date_listed" value=""/>
        </div>
    </div>
    <div class="meta-row">
        <div class="meta-th">
            <label for="application_deadline" class="swp-row-title">Application Deadline</label>
        </div>
        <div class="meta-td">
            <input type="text" name="application_deadline" id="application_deadline" value=""/>
        </div>
    </div>
    <div class="meta">
        <div class="meta-th">
            <span>Principle Duties</span>
        </div>
    </div>
    <div class="meta-editor"></div>
    <?php
    $content    = get_post_meta( get_the_ID(), 'principle-duties', true );
    $editor = 'principle_duties';
    $settings = array(
        'textarea_rows' => 8,
        'media_buttons' => false,
    );
    wp_editor( $content, $editor, $settings);
?>
    </div>
    <div class="meta-row">
        <div class="meta-th">
          <label for="minimum-requirements" class="wpdt-row-title"><?php _e( 'Minimum Requirements', 'hrm-textdomain' )?></label>
        </div>
        <div class="meta-td">
          <textarea name="minimum-requirements" class ="hrm-textarea" id="minimum-requirements"><?php if ( isset ( $hrm_stored_meta['minimum-requirements'] ) ) echo esc_attr( $hrm_stored_meta['minimum-requirements'][0] ); ?></textarea>
        </div>
    </div>
    <div class="meta-row">
        <div class="meta-th">
          <label for="preferred-requirements" class="wpdt-row-title"><?php _e( 'Preferred Requirements', 'hrm-textdomain' )?></label>
        </div>
        <div class="meta-td">
          <textarea name="preferred-requirements" class ="hrm-textarea" id="preferred-requirements"><?php if ( isset ( $hrm_stored_meta['preferred-requirements'] ) ) echo esc_attr( $hrm_stored_meta['preferred-requirements'][0] ); ?></textarea>
        </div>
    </div>
    <div class="meta-row">
        <div class="meta-th">
          <label for="relocation-assistance" class="prfx-row-title"><?php _e( 'Relocation Assistance', 'hrm-textdomain' )?></label>
        </div>
        <div class="meta-td">
          <select name="relocation-assistance" id="relocation-assistance">
              <option value="select-yes">Yes</option>';
              <option value="select-no">No</option>';
          </select>
    </div> 
</div>  
<?php
}