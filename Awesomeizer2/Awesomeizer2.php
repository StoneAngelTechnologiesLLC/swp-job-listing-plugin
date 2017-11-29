<?php
/**
* Plugin Name: Awesomeizer2
* Plugin URI: http://showit.co
* Description:  adds an admin menu to the WordPress settings, replaces the word "good" in any post content or title with "awesome" and adds "Be excellent to each other!" to the end of all post content
* Author: John Pietrangelo
* Author URI: http://showit.co
* Version: 1.0
* License: GPLv2
**/


//------------------------------------function calls----------------------------------------------------

add_action( 'admin_menu', 'swp_awesomeizer_plugin_menu' );


function swp_awesomeizer_plugin_menu() 
{
	                   
	add_options_page( 'Awesomeizer Options', 'Awesomeizer', 'manage_options', 'Awesomeizer-slug', 'swp_awesomeizer_plugin_options' );
}

function swp_awesomeizer_plugin_options() 
{
	if ( !current_user_can( 'manage_options' ) )  
	{
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
?>

        <head>

            <meta charset="UTF-8">

            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>Simple Course Registration</title>

            <link href="Styles/stylesReset.css" rel="stylesheet" type="text/css">

            <link href="Styles/styles.css" rel="stylesheet" type="text/css">

            <!-- Created By: John Joseph Pietrangelo III     Go Devils!!-->

            <!--                         IMPORTANT !!!

            If opening browser off-line, formatting will be incorrect. Due to your computer's Defualt.  Unless of course you already have these fonts insatlled on THIS computer hard drive.

            -->

            <!-- <link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">

            <link href="https://fonts.googleapis.com/css?family=Marck+Script" rel="stylesheet"> -->

            <link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">

        </head>

        <body>

        <header>

            <div class="col-sm-12 col-md-12 col-lg-12">

                <h1>University Registration System</h1>

            </div>

        </header>

        <p class="row"></p>

        <main>

            <div class="subHeader col-lg-12 col-md-12 col-sm-12">

                <h3>student Information:</h3>

            </div>

            <p class="row"></p>

            <section class="userInputDiv1 col-lg-03 col-md-04 col-sm-04">

                <p class="userInputLabel nameLabel"><u>First Name</u></p>

                <input class ="inputBoxSm firstName" style="background-color: #e0e0e0; text-shadow: #ffc627 1px;type="text" autofocus="true" name="textbox1" placeholder="Go Devils!" >

            </section>

            <section class="userInputDiv1 col-lg-06 col-md-04 col-sm-4">

                <p class="userInputLabel nameLabel"><u>Last Name</u></p>

                <input class ="inputBoxSm lastName" style="background-color: #e0e0e0; text-shadow: #ffc627 2px; type="text" autofocus="true" name="textbox1" placeholder="Go Devils!">


            </section>

            <section class="userInputDiv1 col-lg-03 col-md-02 col-sm-2">

                <button class="captureButton1">Capture Name</button>

            </section>

            <P class="row"></P>

            <section class="userInputDiv2 col-lg-03 col-md-03 col-sm-03">

                <p class="userInputLabel"><u>Semester</u></p>

                <select class ="inputBoxLg semester" type="text" name="semester"
                        style="background-color: #e0e0e0; text-shadow: #ffc627 1px 1px;">

                    <option value="selectSemester" disabled selected >Select Semester</option>
                    <option value="Spring-2017" >Spring 2017</option>
                    <option value="Fall-2017">Fall 2017</option>

                </select>

            </section>

            <section class="userInputDiv2 col-lg-03 col-md-03 col-sm-3">

                <p class="userInputLabel"><u>Course Number</u></p>

                <select class ="inputBoxLg courseNum" type="text" name="courseNum"
                        style="background-color: #e0e0e0; text-shadow: #ffc627 1px 1px;">

                    <option value="selectCourseNum" disabled selected >Select Course#</option>
                    <option value="cis105" >CIS 105</option>
                    <option value="cis235" >CIS 235</option>
                    <option value="cis340" >CIS 340</option>
                    <option value="cis425" >CIS 425</option>
                    <option value="cis430" >CIS 430</option>
                    <option value="cis440" >CIS 440</option>
                </select>
            </section>

            <section class="userInputDiv2 col-lg-03 col-md-03 col-sm-3">

                <p class="userInputLabel"><u>Course Name</u></p>

                <select class ="inputBoxMed courseTitle" type="text" name="courseTitle"
                        style="background-color: #e0e0e0; text-shadow: #ffc627 1px 1px; ">

                    <option value="sct" disabled selected >Select Course Title</option>
                    <option value="cai" >Computer App-IT</option>
                    <option value="itis" >Intro to Information Systems</option>
                    <option value="bisd" >Business Info System Development</option>
                    <option value="ecs" >E-Commerce Strategy</option>
                    <option value="nads" >Networks and Distributed Systems</option>
                    <option value="esd" >Enterprise Systems Development</option>

                </select>

            </section>

            <section class="userInputDiv2 col-lg-03 col-md-02 col-sm-2">

                <button class="captureButton2">Submit</button>

            </section>

            <P class="row"></P>

            <div class="registrationLabel"></div>

            <P class="row"></P>

            <div class="outputScheduleSpring col-lg-12 col-md-07 col-sm-12 ">

            </div>

            <div class="outputScheduleFall margin col-lg-12 col-md-07 col-sm-12 ">

            </div>

        </main>
        <P class="row"></P>

 <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>

        <script src="JavaScripts/app.js"></script>

        </body>

        <footer>

            <p>StoneAngel Technologies&copy;</p>

            <!--                                     IMPORTANT!!

                        Use Alternate "footer background-color" in linked .css file if using logo
            -->
            <!--
            <img class="image" src="Logomakr_6d5Z30.png" alt = "StoneAngel Technologies Logo">
            -->

        </footer>

        <!--                         IMPORTANT !!!

          If opening browser off-line, jQuery code will not be recognized by your computer!

          -->
       

       
<?php


    }


}







add_filter('the_content', 'swp_filter_posting_content_test');

	add_filter('the_content', 'swp_filter_posting_content');

	add_filter('the_content','swp_good_to_awesome');

	add_filter('the_title','swp_good_to_awesome');


//-------------------------------------plugin functions-------------------------------------------------



function swp_filter_posting_content($content) 
{
  //conditonal-statement to add additional content to both single posts, custom post types and pages which hold content
  //while also using 'is_main_query()'-method to check whether focus is currently inside of the main post query.
  //*(The main post query can be thought of as the primary post loop that displays the main content for the post, page or archive)
  //if(is_singular() && is_main_query())
  //{	

	//conditional-statement using 'is_single()'-method to add additional content only to single-postings which hold content
	//while also using 'is_main_query()'-method to check whether focus is currently inside of the main post query. 
	//*(The main post query can be thought of as the primary post loop that displays the main content for the post)
	if(is_single() && is_main_query())
	{
		//most efficient solution:
		//declaring a variable and initializing it's value to a html 'h3'-heading while using the inline<b>-tag to make all h3-content bold and inline<u>-tags to underline content segments
		$new_content = '<h3><b>Be <u>excellent</u> to <u>each other!</u></b></h3>';
		
		//using 'return'-keyword to place current content which has been appended with 'new_content'-value, via the '.'-operator, to the 'current'-content's location
		// 
		return $content . $new_content;

		//alternative solution:
		//return $content . '<h3><b>Be <u>excellent</u> to <u>each other!</u></b></h3>';
	}
  //}	
}

function swp_filter_posting_content_test($content) 
{
 
	if(is_single() && is_main_query())
	{
		
		$new_content = '<h3><b>Filter is activated</b></h3>';
		
		
		return $content . $new_content;

		
	}
 
}






function swp_good_to_awesome($text)
{
        $replace = array( 'good' => 'awesome', 'Good' => 'Awesome');
        
        $text = str_replace(array_keys($replace), $replace, $text);
        
        return $text;
}