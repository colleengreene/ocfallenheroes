<?php
/**
 * The public show view for Timelines.
 */

queue_timeline_assets();
$head = array('bodyclass' => 'timelines primary',
              'title' => metadata($neatline_time_timeline, 'title')
              );
echo head($head);
?>
<h1><?php echo metadata($neatline_time_timeline, 'title'); ?></h1>
<p>This Timeline displays Heroes for which a casualty date has been identified. Click on the purple "year bar" below and slide your mouse to the left or right to see older or more recent casualty dates. Click on a name to view more details.</p>

    <!-- Construct the timeline. -->
    <?php echo $this->partial('timelines/_timeline.php'); ?>

    <?php echo metadata($neatline_time_timeline, 'description'); ?>

<?php echo foot(); ?>
