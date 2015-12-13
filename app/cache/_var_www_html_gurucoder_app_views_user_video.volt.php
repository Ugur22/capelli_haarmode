<h1>Video</h1>
<?php foreach ($user as $video) { ?>

    <h2><a href="video/<?php echo $video->permalink; ?>"><?php echo $video->name; ?></a></h2>
    <?php echo $video->embedCode; ?>



<?php } ?>