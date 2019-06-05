<?php
/**
* The main template file
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package OneAcademy
*/

get_header();
?>

<div id="fullpage">

  <div class="section" id='section1'>
    <div class="sectionContent">
      <!-- Section Text -->
      <div class="oa_section_text" id="oa_section_text">
        <div class="headText" id="headText">
          <b>One</b> platform for <b>All</b> your elearning needs
        </div>
        <div class="paraText" id="paraText">
          OneAcademy combines: <b>LMS, Virtual Classrooms</b>, & an <b>eCommerce system</b> into one convenient & easy to use solution.
        </div>

      </div>

      <div class="oa_footer" id="oa_footer">
        <div class="oa_footer_left">
          <div class="buttonText" id="oa_footer_button_text">
            Start Trial
          </div>
          <div id="oa_how_it_work" style="font-size:18px;">
            <i class="fa fa-fw fa-video"></i> How it Works?
          </div>
        </div>

        <div class="footerRight">
          <div id="oa_footer_next_text">
            Read More
          </div>
          <div class='downArrow' id="downArrow">
            <i class="fa fa-fw fa-angle-down"></i>
          </div>
        </div>
      </div>

      <div class="oa_section_img">
        <img class="oa_img" src="<?php bloginfo('template_directory'); ?>/static/images/welcome.png" />
      </div>

    </div>
  </div>


  <div class="section" id='section2'>
    <div class="oa_section_img">
      <img class="oa_img" src="<?php bloginfo('template_directory'); ?>/static/images/lms-img.png" />
    </div>
  </div>

  <div class="section" id='section3'>
    <div class="oa_section_img">
      <img class="oa_img" src="<?php bloginfo('template_directory'); ?>/static/images/vclassroom-img.png" />
    </div>
  </div>

  <div class="section" id='section4'>
    <div class="oa_section_img">
      <img class="oa_img" src="<?php bloginfo('template_directory'); ?>/static/images/ecommerce-img.png" />
    </div>
  </div>
  <div class="section" id='section5'>

  </div>
  <div class="section" id='section6'>
    <div class="oa_section_img">
      <img class="oa_img" src="<?php bloginfo('template_directory'); ?>/static/images/partners-img.png" />
    </div>
  </div>
  <div class="section" id='section7'>
    <div class="oa_section_img">
      <img class="oa_img" src="<?php bloginfo('template_directory'); ?>/static/images/emailsubscribe-img.png" />
    </div>

    <form class="oa_email_subscribtion_form">
      <div class="">
        <input type="email" id="oa_email-subscribe" placeholder="Enter email">
      </div>

    </form>
  </div>

</div>

<?php
get_footer();
