<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <?php if ( $description = settings('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    
    <title><?php echo settings('site_title'); echo isset($title) ? ' | ' . strip_formatting($title) : ''; ?></title>
    
    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php plugin_header(); ?>
    
    <!-- Stylesheets -->
    <?php 
    queue_css('style');
    display_css(); 
    ?>
    
    <!-- JavaScripts -->
    <?php display_js(); ?>

<script type="text/javascript">var switchTo5x=false;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "5fc2bea4-d5b7-4e6d-9cfa-0c11c29209ba"}); </script>

<!-- Start Lightbox includes -->
<script type="text/javascript" src="<?php echo WEB_ROOT;?>/themes/emiglio/common/lightbox/js/lightbox.js"></script>
<!-- End Lightbox includes -->

</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php plugin_body(); ?>
	<div id="wrap">
        
		<div id="header">
		    <?php plugin_page_header(); ?>
		    <div id="search-container">
    			<?php echo simple_search(); ?>
    			<?php echo link_to_advanced_search(); ?>
    		</div><!-- end search -->
		    
			<div id="site-title"><?php echo link_to_home_page(custom_display_logo()); ?></div>
			
		</div><!-- end header -->
		

		
		<div id="primary-nav">
			<ul class="navigation">
    		<?php echo custom_public_nav_header(); ?>		
            </ul>
		</div><!-- end primary-nav -->
		    <?php echo custom_header_image(); ?>
		<div id="content">
            <?php plugin_page_content(); ?>