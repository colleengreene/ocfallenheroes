<?php 
queue_js_file('lightbox-2.6.min', 'javascripts/vendor');
queue_css_file('lightbox');
?>

<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>

<h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>

<div id="primary">

    <?php if ((get_theme_option('Item FileGallery') == 0) && metadata('item', 'has files')): ?>
    <?php echo files_for_item(array('imageSize' => 'fullsize')); ?>
    <?php endif; ?>
    
    <?php echo all_element_texts('item'); ?>
    
    <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

<!-- -----Added by Colleen----- -->
<div>
<h2>Share a Comment, Question, Fact, or Memory</h2>
<!-- Start Disqus -->
<div id="disqus_thread">
<h2>Share a Comment, Question, or Memory</h2>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'ocfallenheroes'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>
</div>
</div>

</div><!-- end primary -->

<aside id="sidebar">

   <!-- Add ShareThis Social Bookmarking Code (Added by Colleen) -->
   <div>
      <h2>Share This Profile</h2>
      <p>
      <span class='st_facebook_large' displayText='Facebook'></span>
      <span class='st_twitter_large' displayText='Tweet'></span>
      <span class='st_googleplus_large' displayText='Google +'></span>
      <span class='st_evernote_large' displayText='Evernote'></span>
      <span class='st_email_large' displayText='Email'></span>
      <span class='st_sharethis_large' displayText='ShareThis'></span>
      </p>
   </div>

    <!-- The following returns all of the files associated with an item. -->
    <?php if ((get_theme_option('Item FileGallery') == 1) && metadata('item', 'has files')): ?>
    <div id="itemfiles" class="element">
        <h2><?php echo __('Photos'); ?></h2>
        <div class="element-text">
		<!--displays larger image sizes than thumbnails (Added by Colleen)--> 
		<?php
		$itemFiles = $item->Files;
		//display the first one fullsize
		echo file_markup($itemFiles[0], array('imageSize'=>'fullsize'));
		//get rid of the first one
		unset($itemFiles[0]);
		//display the rest as usual
		echo file_markup($itemFiles);
		?>
	  </div>
    </div>
    <?php endif; ?>

    <!-- If the item belongs to a collection, the following creates a link to that collection. -->
    <?php if (metadata('item', 'Collection Name')): ?>
    <div id="collection" class="element">
        <h2><?php echo __('Collection'); ?></h2>
        <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
    </div>
    <?php endif; ?>

    <!-- The following prints a list of all tags associated with the item -->
    <?php if (metadata('item', 'has tags')): ?>
    <div id="item-tags" class="element">
        <h2><?php echo __('Tags'); ?></h2>
        <div class="element-text"><?php echo tag_string('item'); ?></div>
    </div>
    <?php endif;?>

<!-- Begin Added by Colleen -->
<div>
<h2>Timestamp</h2>
<strong>Date Added:</strong> <?php echo date('m/d/Y', strtotime($item->added)); ?><br />
<strong>Last Updated:</strong> <?php echo date('m/d/Y', strtotime($item->modified)); ?></p>
</div>
<!-- End Added by Colleen -->

    <!-- The following prints a citation for this item. -->
    <div id="item-citation" class="element">
        <h2><?php echo __('Citation'); ?></h2>
        <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
    </div>

</aside>

<ul class="item-pagination navigation">
    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
</ul>

<?php echo foot(); ?>
