<?php head(array('title'=>'Browse by Tag','bodyid'=>'items','bodyclass'=>'tags full')); ?>

<div id="primary">

    <h1>Browse by Tag</h1>

    <ul class="navigation item-tags" id="secondary-nav">
    <?php echo custom_nav_items(); ?>
    </ul>

    <?php echo tag_cloud($tags, uri('items/browse')); ?>

</div><!-- end primary -->

<div id="secondary">
    <!-- Featured Item -->
    <div id="featured-item" class="featured">
        <?php echo display_random_featured_item(); ?>
    </div><!--end featured-item-->

</div>

<?php foot();
