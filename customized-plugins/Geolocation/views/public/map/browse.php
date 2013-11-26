<?php 
queue_js_url("http://maps.google.com/maps/api/js?sensor=false");
queue_js_file('map');


$css = "
            #map_browse {
                height: 836px;
            }
            .balloon {width:400px !important; font-size:1.2em;}
            .balloon .title {font-weight:bold;margin-bottom:1.5em;}
            .balloon .title, .balloon .description {float:left; width: 220px;margin-bottom:1.5em;}
            .balloon img {float:right;display:block;}
            .balloon .view-item {display:block; float:left; clear:left; font-weight:bold; text-decoration:none;}
            #map-links a {
                display:block;
            }
            #search_block {
                clear: both;
            }";
queue_css_string($css);

echo head(array('title' => __('Browse Map'),'bodyid'=>'map','bodyclass' => 'browse')); ?>


<h1><?php echo __('Browse Casualties on the Map');?> (<?php echo $totalItems; ?> <?php echo __('total');?>)</h1>

<nav class="items-nav navigation secondary-nav">
    <?php echo public_nav_items(); ?>
</nav>

<div class="pagination">
    <?php echo pagination_links(); ?>
</div><!-- end pagination -->

<div id="primary">

<p>Use the scrollbar on the right of the Find A Hero column to view a full list of mapped casualties, and click on the link to locate that Hero on the Map. Or click on the actual Map and move your mouse around to navigate around the Map, then click on a waymark to pull up that Hero's Profile. You can also use the zoom in (+) button or the zoom out (-) button on the left side of the Map.</p>


<div id="map_block">
    <?php echo $this->googleMap('map_browse', array('loadKml'=>true, 'list'=>'map-links'));?>
</div><!-- end map_block -->

<div id="link_block">
    <div id="map-links"><h2><?php echo __('Find A Hero on the Map'); ?></h2></div><!-- Used by JavaScript -->
</div><!-- end link_block -->

</div><!-- end primary -->

<?php echo foot(); ?>