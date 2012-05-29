<?php head(array('bodyid'=>'home')); ?>

<div id="primary">

<!-- Added by Colleen -->
 <div id="recent-items">
<h2>Site Progress</h2>
    <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
        <!-- Homepage Text -->
        <?php echo $homepageText; ?>

	<!-- Added by Colleen -->
		<div class="element-text">
			<strong><?php echo 'Total casualties posted to date:&nbsp;'. total_items() .'.'; ?></strong>
		</div>
	<!-- End Added by Colleen -->

    <?php endif; ?>
</div>

<!-- Display Featured Item removed by Colleen -->

    <div id="recent-items">
        <h2>Recently Added Casualties</h2>
        <?php
            $homepageRecentItems = (int)get_theme_option('Homepage Recent Items') ? get_theme_option('Homepage Recent Items') : '3';
            set_items_for_loop(recent_items($homepageRecentItems));
            if (has_items_for_loop()):
        ?>
        <div class="items-list">
            <?php while (loop_items()): ?>

            <div class="item">

                <h3><?php echo link_to_item(); ?></h3>

                <?php if(item_has_thumbnail()): ?>
                    <div class="item-img">
                    <?php echo link_to_item(item_square_thumbnail()); ?>
                    </div>
                <?php endif; ?>

                <?php if ($desc = item('Dublin Core', 'Description', array('snippet'=>150))): ?>

                    <div class="item-description"><?php echo $desc; ?><p><?php echo link_to_item('see more',(array('class'=>'show'))) ?></p></div>

                <?php endif; ?>

            </div>
            <?php endwhile; ?>
        </div>

        <?php else: ?>
            <p>No recent items available.</p>

        <?php endif; ?>

        <p class="view-items-link"><a href="<?php echo html_escape(uri('items')); ?>">View All Items</a></p>

    </div><!--end recent-items -->
</div>

<div id="secondary">

<!-- Added by Colleen -->
    <h2> Featured Memorials</h2>
    <!-- Featured Item -->
    <div id="featured-item" class="featured">
        <?php echo display_random_featured_item(); ?>
    </div>
    <!--end featured-item-->

<hr />
    <?php if (get_theme_option('Display Featured Collection') !== '0'): ?>
    <!-- Featured Collection -->
    <div id="featured-collection" class="featured">
        <?php echo display_random_featured_collection(); ?>
    </div><!-- end featured collection -->
    <?php endif; ?>

    <?php if ((get_theme_option('Display Featured Exhibit') !== '0')
           && plugin_is_active('ExhibitBuilder')
           && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
    <!-- Featured Exhibit -->
    <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
    <?php endif; ?>

<!-- Added by Colleen -->

<!-- Add ShareThis Social Bookmarking Code by Colleen -->
<div>
<h2>Promote This Site</h2>
<p>
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

</div>

<?php foot();
