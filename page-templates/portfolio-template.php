<?php
/* Template Name: Portfolio-template */
get_header(); ?>
 <br>
 
<div class="row">
  <div class="large-12 columns">
    <div class="large-6 medium-6 columns">
   	  <div class="panel">
          <div class="wrapper-panel">
        		<h3>Tools for Web Development</h3>
            <p>My faborite tools are: <a target="blank" href="http://wordpress.org">WordPress</a> and 
            <a target="blank" href="http://foundation.zurb.com">Zurb Foundation</a>. I am also proficient in the use of Php, Mysql and Jquery.</p>
          </div>
        </div><!--end panel -->
	     <div class="row">
    	     <div class="large-6 small-6 columns">
            <div class="resume-wrapper">
                <div class="linkedin">
        	     		<a href="http://www.linkedin.com/in/samargote" target="_blank">
                  <img src="<?php echo get_stylesheet_directory_uri().'/images/linkedin-reduced.png' ?>" /></a>
              </div>
              <div class="resume">
                <a href="<?php echo get_stylesheet_directory_uri().'/SamResume-updated.pdf' ?>" target="_blank">
                  <img src="<?php echo get_stylesheet_directory_uri().'/images/iconResume-reduced.png' ?>" /></a>
              </div>
            </div>
    	    </div> 	   
	    </div> <!-- end row -->
	  </div><!-- end large-6 columns -->
	   <div class="large-6 medium-6 columns">   <!-- Skills -->
	   	 <div class="panel">
       <div class="wrapper-panel">
        <center><h2>Skills</h2>
		    <img src="<?php echo get_stylesheet_directory_uri().'/images/about-images-reduced.png'; ?>" />
        </center>
      </div>
		 </div>
	  </div>
  </div><!-- end row -->
	

<!-- Display Porfolio for mobile -->

  <div class="row">
  <div class="large-12 show-for-small-only">         
	     <div class="row">
	       	<div class="large-4 small-1 columns">
        	    <a href="http://www.gagein.com" target="_blank"><img src="<?php echo  get_stylesheet_directory_uri().'/images/revamp/gagein.png' ?>" /></a>
            <div class="panel">
              <p class="subtitle">Gagein - Marketing Software</p>
            </div>
         	 </div>
           <div class="large-4 small-1 columns">
                <a href="http://www.bluebearmusic.org" target="_blank"><img src="<?php echo get_stylesheet_directory_uri().'/images/revamp/blue-bear.png' ?>" /> </a>
                <div class="panel">
                  <p>Blue Bear - School of Music</p>
                </div>
           </div>
	     </div> <!-- end row -->
      	<div class="row">
          <div class="large-4 small-1 columns">
             <a href="http://newlifecpr.samprojects.us" target="_blank"><img src="<?php echo get_stylesheet_directory_uri().'/images/revamp/newlife.png' ?>" /> </a>
                <div class="panel">
                  <p>New Life CPR Classes</p>
                </div>
         </div>
	      </div>	
	      <div class="large-4 small-1 columns">
            <a href="http://www.rbcellars.com/blog" target="_blank"><img src="<?php echo get_stylesheet_directory_uri().'/images/revamp/winery.png' ?>" /> </a>
            <div class="panel">
              <p class="subtitle">R&B Cellars Blog</p>
            </div>
        </div>

    	<div class="row">
   	    <div class="large-4 small-1 columns">
           <a href="http://www.sccolpa.org" target="_blank"><img src="<?php echo get_stylesheet_directory_uri().'/images/revamp/sccolpa.png' ?>" /></a> 
                <div class="panel">
                  <p>Sccolpa - Professional Association</p>
                </div>
        </div>  
    	</div><!-- end row -->
  </div><!--End show-for-small -->
  </div><!-- end row -->

<!-- Display Portfolio for Desktop Screens -->
    <div class="show-for-medium-up">
	  <div class="row">
          <div class="large-4 small-4 columns">
            <div class="sites-wrapper">
             <a href="http://www.gagein.com" target="_blank"><img src="<?php echo  get_stylesheet_directory_uri().'/images/revamp/gagein.png' ?>" /></a>
              <div class="panel">
                <p class="subtitle">Gagein - Marketing Software</p>
              </div>
            </div>
          </div>
          <div class="large-4 small-4 columns">
           <div class="sites-wrapper">
              <a href="http://www.bluebearmusic.org" target="_blank"><img src="<?php echo get_stylesheet_directory_uri().'/images/revamp/blue-bear.png' ?>" /> </a>
              <div class="panel">
                <p>Blue Bear - School of Music</p>
              </div>
           </div>
          </div>
 
          <div class="large-4 small-4 columns">
           <div class="sites-wrapper">
             <a href="http://newlifecpr.samprojects.us" target="_blank"><img src="<?php echo get_stylesheet_directory_uri().'/images/revamp/newlife.png' ?>" /> </a>
              <div class="panel">
                <p>New Life CPR Classes</p>
              </div>
           </div>
	        </div>	
          </div><!-- end row -->

         <div class="row">
          <div class="large-4 small-4 columns">
           <div class="sites-wrapper">
              <a href="http://www.rbcellars.com/blog" target="_blank"><img src="<?php echo get_stylesheet_directory_uri().'/images/revamp/winery.png' ?>" /> </a>
              <div class="panel">
                <p class="subtitle">R&B Cellars Blog</p>
              </div>
           </div>
          </div> 
          <div class="large-4 small-4 columns">
             <div class="sites-wrapper">
              <a href="http://www.sccolpa.org" target="_blank"><img src="<?php echo get_stylesheet_directory_uri().'/images/revamp/sccolpa.png' ?>" /></a> 
              <div class="panel">
                <p>Sccolpa - Professional Association</p>
              </div>
            </div>
          </div>
 
          <div class="large-4 small-4 columns">

            </div>
          </div>
     </div><!-- end row show-for-medium-up-->
</div><!-- End Web Portfolio -->  
    

<?php get_footer(); ?>

