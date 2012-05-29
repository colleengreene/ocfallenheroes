<?php head(array('title' => item('Dublin Core', 'Title'), 'bodyid'=>'items','bodyclass' => 'show')); ?>

<div id="primary">


<!-- -----Start Custom Metadata Display by Colleen----- -->

<h1 id="item-title"><?php echo item('Dublin Core', 'Title'); ?></h1>

<p><?php echo item('Dublin Core', 'Description'); ?></p>

<!-- Add ShareThis Social Bookmarking Code by Colleen -->
<div><p>
<span class='st_facebook'></span>
<span class='st_twitter'></span>
<span class='st_googleplus'></span>
<span class='st_blogger'></span>
<span class='st_diigo'></span>
<span class='st_delicious'></span>
<span class='st_citeulike'></span>
<span class='st_email'></span>
<span class='st_sharethis'></span>
</p></div>

<!-- Start of Bio Box -->


<h2>Biographical Profile</h2>

	<!-- If the item belongs to a collection, the following creates a link to that collection. -->
   	 <?php if (item_belongs_to_collection()): ?>
        <p><strong>War:</strong> <?php echo link_to_collection_for_item(); ?></p>
    	<?php endif; ?>

    	<p><strong>Hometown(s):</strong> <?php echo item('Item Type Metadata', 'Hometown'); ?></p>

	<p><strong>Age:</strong> <?php echo item('Item Type Metadata', 'Age'); ?></p>

 	<p><strong>Gender:</strong> <?php echo item('Item Type Metadata', 'Gender'); ?></p>

    	<p><strong>Date of Birth:</strong> <?php echo item('Item Type Metadata', 'Birth Date'); ?></p>

	<p><strong>Place of Birth:</strong> <?php echo item ('Item Type Metadata', 'Birthplace'); ?></p>
    
	<p><strong>Date of Death:</strong> <?php echo item('Item Type Metadata', 'Death Date'); ?></p>

	<p><strong>Place of Death:</strong> <?php echo item('Item Type Metadata', 'Place of Death'); ?></p>

	<p><strong>Place(s) of Interment:</strong> <?php echo item('Item Type Metadata', 'Place of Interment'); ?></p>

<h2>Military Profile</h2>

	<p><strong>Grade:</strong> <?php echo item('Item Type Metadata', 'Grade'); ?></p>

	<p><strong>Branch(es):</strong> <?php echo item('Item Type Metadata', 'Branch'); ?></p>

	<p><strong>Unit(s):</strong> <?php echo item('Item Type Metadata', 'Unit'); ?></p>

	<p><strong>Place(s) of Service:</strong> <?php echo item('Item Type Metadata', 'Place of Service'); ?></p>

<h2>Biographical Narrative</h2>

	<p><?php echo item('Item Type Metadata', 'Biographical Text'); ?></p>

<p><?php echo plugin_append_to_items_show(); ?></p>

<h2>Sources</h2>

<h4>Bibliography</h4>

<p><div id="sources"><?php echo item('Item Type Metadata', 'Bibliography'); ?></div></p>

<h4>Image Credits</h4>

<p><div id="sources"><?php echo item('Item Type Metadata', 'Photo Credit'); ?></div></p>

<!-- -----Added by Colleen----- -->

<h2>Share a Comment or Question</h2>
<!-- Start Disqus -->

<div id="disqus_thread"></div>
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

</div><!-- end primary -->

<div id="secondary">

    <!-- The following returns all of the files associated with an item. -->
    <div id="itemfiles" class="element">
        <!--<h3>Photos</h3>-->
        <div class="element-text">
		    <?php 
		    if (item_has_thumbnail()) 
					{
					echo '<p><em>Click the Image for Full Size</em></p>';
					echo display_files_for_item(array('linkAttributes'=>array('rel'=>'lightbox[gallery]'))); 
										}
			else
				{
				echo display_files_for_item();
				}
			?>
	 </div>
    </div>

    <!-- The following prints a list of all tags associated with the item -->
    <?php if (item_has_tags()): ?>
    <div id="item-tags" class="element">
        <h3>Tags</h3>
        <div class="element-text tags"><?php echo item_tags_as_string(); ?></div>
    </div>
    <?php endif; ?>

    <!-- If the item belongs to a collection, the following creates a link to that collection. -->
    <?php if (item_belongs_to_collection()): ?>
        <div id="collection" class="element">
            <h3>Collection</h3>
            <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
        </div>
    <?php endif; ?>

<!-- Begin Added by Colleen -->

<h3>Record Details</h3>

<p><strong>Contributor:</strong> <?php echo item('Dublin Core', 'Contributor'); ?><br />
<strong>Date Added:</strong> <?php echo date('m/d/Y', strtotime($item->added)); ?><br />
<strong>Last Updated:</strong> <?php echo date('m/d/Y', strtotime($item->modified)); ?></p>

<!-- End Added by Colleen -->

    <!-- The following prints a citation for this item. -->
    <div id="item-citation" class="element">
        <h3>Recommended Citation</h3>
        <div class="element-text"><?php echo item_citation(); ?></div>
    </div>

</div><!-- end secondary -->

<ul class="item-pagination navigation">
    <li id="previous-item" class="previous">
        <?php echo link_to_previous_item('Previous Item'); ?>
    </li>
    <li id="next-item" class="next">
        <?php echo link_to_next_item('Next Item'); ?>
    </li>
</ul>


<?php foot();
