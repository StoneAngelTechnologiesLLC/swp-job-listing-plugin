<?php
//swp-custom-fields-for-jobs

//to create custom meta-box
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
//           (HTML id,    title     , callback-function to display HTML, post-type where it will display, screen position,priority within screen position)
add_meta_box('swp_meta', 'Job Listing Editor','swp_meta_callback','job','side','core');
}

//        (  WP-Hook(event) , Custom-Function(called on event) )
add_action( 'add_meta_boxes', 'swp_add_custom_metabox');

//------------------------------------------------------------------------------------------------

//Called by 'add_meta_box()'(A WP provided function) held in the 'swp_add_custom_metabox()'(custome function) above

//Using the variable '$post', passes the 'Global Post'-object, as an argument to the function's parameter
function swp_meta_callback($post)
{
	/*
	wp_nonce_field()(WP function):

	The nonce field is used to validate that the contents of the form, has come from the location of the current site and not somewhere else. The nonce does not offer absolute protection, but should protect against most cases. It is very important to use the 'nonce field' in forms.

	*** The $action and $name parameters are optional, but if you want to have better security, 
	    it is strongly suggested to set them.  

	    It is easier to call the function without any parameters.  However, because validation of the nonce doesn’t require any parameters, and the fact that crackers know that is the default, it won’t be difficult for them to find a way around your nonce and cause damage.
----------------------------------------------------

Parameters:

$action
(int|string) (Optional) Action's Name.
Default value: $action = -1

$name
(string) (Optional) Nonce's Name. 
Default value: $name = "_wpnonce"

$referer
(bool) (Optional) Whether to set the referer-field for validation.
Default value: $referer = true

$echo
(bool) (Optional) Whether to display or return hidden form field.
Default value: $echo = true 

Makes sure the data being stored in the Database is acctually coming from the from, instead of another source.

----------------------
Return-Value:

(string) Nonce field HTML markup.
-----------------------------------
Usage

<?php wp_nonce_field( $action, $name, $referer, $echo ) ?>
-----------------------------------------------
*/

	wp_nonce_field( basename( __FILE__ ), 'swp_jobs_nonce' );
/*
-----------------------------------------------------------------------------------------------------------------------------
  
  'get_post_meta()' Function: 

   Returns the values of custom fields, with the specified keys from the specified post'
   it is a wrapper for: get_metadata('post')
   
   To query database and retrive its result (the value of the designated key(string) in the designated post(int)) 

   The $single-parameter (optional) is a Boolean-value.  When set to true, the function will return a single result(as a string), if set to false or not set, the function returns an array of the custom fields.

   When dealing with retrieving serialized arrays 

                                           (manditory,optional,optional)
   Usage: <?php $meta_values = get_post_meta($post_id, $key, $single); ?>

*/ 

    //Retrieves the $post-variable's value from the database which match the 'Global-Post'-objects 'ID'-property's value, by using it as parameter's arugment. 
    
    //which is than assigned as the value of the $swp_stored_meta-variable (right-to-left operation process, of course)
	$swp_stored_meta = get_post_meta( $post -> ID);

	?>

	<div>

		<div class="meta-row">

			<div class="meta-th"> 

				<label for="job_id" class="swp-row-title"><?php _e('Job Id','swp-job-listing'); ?> </label>

			</div>

			<div class="meta-td">

				<input type="text" class="swp-content-row" name="job_id" id="job_id" value="<?php if(!empty($swp_stored_meta['job_id'])) 
				{
					echo esc_attr( $swp_stored_meta['job_id'][0] );
				} ?>"/>

			</div>

		</div>

		<div class="meta-row">

			<div class="meta-th">

				<label for="date_listed" class="swp-row-title"><?php _e( 'Date Listed', 'swp-job-listing' ); ?></label>

			</div>

			<div class="meta-td">

				<input type="text" size=10 class="swp-row-content datepicker" name="date_listed" id="date_listed" value="<?php if (!empty ( $swp_stored_meta['date_listed']))
				{ 
					echo esc_attr( $swp_stored_meta['date_listed'][0] );
				}?>"/>

			</div>

		</div>

		<div class="meta-row">

			<div class="meta-th">

				<label for="application_deadline" class="swp-row-title"><?php _e( 'Application Deadline', 'swp-job-listing' ) ?></label>

			</div>

			<div class="meta-td">

				<input type="text" size=10 class="swp-row-content datepicker" name="application_deadline" id="application_deadline" value="<?php if (!empty ( $swp_stored_meta['application_deadline']))
				{ 
					echo esc_attr( $swp_stored_meta['application_deadline'][0] );
				}?>"/>

			</div>

		</div>

		<div class="meta">

			<div class="meta-th">

				<span><?php _e( 'Principle Duties', 'wp-job-listing' ) ?></span>

			</div>

		</div>

		<div class="meta-editor">

		<?php

		$content = get_post_meta( $post->ID, 'principle_duties', true );

		$editor = 'principle_duties';

		$settings = array( 'textarea_rows' => 8, 'media_buttons' => false );
		
		wp_editor( $content, $editor, $settings);

		?>

		</div>

		<div class="meta-row">

	        <div class="meta-th">

	          <label for="minimum_requirements" class="swp-row-title"><?php _e( 'Minimum Requirements', 'swp-job-listing')?></label>
	        
	        </div>

	        <div class="meta-td">

	          	<textarea class = "swp-textarea" name="minimum_requirements" id="minimum_requirements"><?php if (!empty( $swp_stored_meta['minimum_requirements'] ) ) 
	          	{
		          	echo esc_attr( $swp_stored_meta['minimum_requirements'][0] );
	          	} ?>
	          		
	          	</textarea>

	        </div>

	    </div>

	    <div class="meta-row">

        	<div class="meta-th">

	          <label for="preferred-requirements" class="swp-row-title"><?php _e( 'Preferred Requirements', 'swp-job-listing' )?></label>

	        </div>

	        <div class="meta-td">

	          	<textarea name="preferred_requirements" class ="swp-textarea" id="preferred_requirements"><?php
			          	if ( ! empty ( $swp_stored_meta['preferred_requirements'] ) ) 
			          	{
			            	echo esc_attr( $swp_stored_meta['preferred_requirements'][0] );
			          	}?>   
		     	</textarea>
	        
	        </div>

	    </div>

	    <div class="meta-row">

	        <div class="meta-th">

	          <label for="relocation_assistance" class="swp-row-title"><?php _e( 'Relocation Assistance', 'swp-job-listing'  )?></label>
	        
	        </div>

	        <div class="meta-td">

	          <select name="relocation_assistance" id="relocation_assistance">

	            <option value="yes" <?php if( ! empty ( $swp_stored_meta['relocation_assistance'] ) ) selected( $swp_stored_meta['relocation_assistance'][0], 'Yes' ); ?>><?php _e( 'Yes', 'swp-job-listing' )?></option>';

	              <option value="No" <?php if ( ! empty ( $swp_stored_meta['relocation_assistance'] ) ) selected( $swp_stored_meta['relocation_assistance'][0], 'No' ); ?>><?php _e( 'No', 'wp-job-listing' )?></option>';

	          </select>

	    	</div>

		</div>	 
<?php
}



function swp_meta_save($post_id)
{
	
	//Determines if the specified post is an autosave. 
	//(boolean|int) False if not a revision. Otherwise, returns ID of autosave's parent.
	$is_autosave = wp_is_post_autosave($post_id);

	//Determines if the specified post is a revision.
	//(boolean|int) False if not a revision. Otherwise, returns ID of revision's parent.
	$is_revision = wp_is_post_revision($post_id);

	// When form is being submitted, is there a job value for 'swp_jobs_nonce' && Verify that a nonce is correct and 
	//unexpired with the respect to a specified action. The parameters for 'wp_verify_nonce($nonce,$sction)':

	//$nonce(string) (required) Name of the Nonce, to verify. Default: No defualt

	//(string/int) (optional) Action name. Should give the context to what is taking place and be the same when the nonce 
	//was created. Default: -1

	//Return Values (boolean/integer) Boolean false if the nonce is invalid. Otherwise, returns an integer with the value of:

    //1 – if the nonce has been generated in the past 12 hours or less.
    //2 – if the nonce was generated between 12 and 24 hours ago.

	$is_valid_nonce = (isset( $_POST['swp_jobs_nonce']) && wp_verify_nonce($_POST['swp_jobs_nonce'], basename(__FILE__))) ? 'true' : 'false';
	
	// if it is an autosave or a revison or the nonce is not valid, return without saving
	if($is_autosave || $is_revision || !$is_valid_nonce)
	{
		return;
	}

    //If there is data in 'job_id'-field 
    	if ( isset( $_POST[ 'job_id' ] ) ) 
	{
		//updates the value of an existing meta key (custom field) for the specified post, to database
    	update_post_meta( $post_id, 'job_id', sanitize_text_field( $_POST[ 'job_id' ] ) );
    }

    //If there is data in 'date_listed'-field 
    if ( isset( $_POST[ 'date_listed' ] ) ) 
    {
    	//updates the value of an existing meta key (custom field) for the specified post, to database
    	update_post_meta( $post_id, 'date_listed', sanitize_text_field( $_POST[ 'date_listed' ] ) );
    }

    //If there is data in 'application_deadline'-field 
    if ( isset( $_POST[ 'application_deadline' ] ) ) 
    {
    	//updates the value of an existing meta key (custom field) for the specified post, to database
    	update_post_meta( $post_id, 'application_deadline', sanitize_text_field( $_POST[ 'application_deadline' ] ) );
    }

    //If there is data in 'principle_duties'-field 
    if ( isset( $_POST[ 'principle_duties' ] ) ) 
    {
    	//updates the value of an existing meta key (custom field) for the specified post, to database
    	update_post_meta( $post_id, 'principle_duties', sanitize_text_field( $_POST[ 'principle_duties' ] ) );
    }
	
	//If there is data in 'preferred_requirements'-field 
	if ( isset( $_POST[ 'preferred_requirements' ] ) ) 
	{
		//updates the value of an existing meta key (custom field) for the specified post, to database
		update_post_meta( $post_id, 'preferred_requirements', wp_kses_post( $_POST[ 'preferred_requirements' ] ) );
	}

	//If there is data in 'minimum_requirements'-field 
	if ( isset( $_POST[ 'minimum_requirements' ] ) ) 
	{
		//updates the value of an existing meta key (custom field) for the specified post, to database
		update_post_meta( $post_id, 'minimum_requirements', wp_kses_post( $_POST[ 'minimum_requirements' ] ) );
	}

	//If there is data in 'relocation_assistance'-field 
	if ( isset( $_POST[ 'relocation_assistance' ] ) ) 
	{
		//updates the value of an existing meta key (custom field) for the specified post, to database
		update_post_meta( $post_id, 'relocation_assistance', sanitize_text_field( $_POST[ 'relocation_assistance' ] ) );
	}

}

add_action( 'save_post', 'swp_meta_save' );