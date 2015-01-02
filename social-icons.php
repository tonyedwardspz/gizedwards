<div class="FAageSocialIcons">
<?php

$twitter = get_option('path_twitter');
$facebook = get_option('path_facebook');
$youtube = get_option('path_youtube');
$google_plus = get_option('path_google_plus');
?>

<ul>
	<?php if($twitter): ?>
    <li class="twitter">
        <a href="<?php print $twitter; ?>" title="Find Giz on Twitter" target="_blank">
            <i class="social_icon fa fa-twitter"></i></a>
    </li>
    <?php endif; ?>

    <?php if($facebook): ?>
    <li class="facebook">
        <a href="<?php print $facebook; ?>" title="Find Giz on Facebook" target="_blank">
            <i class="social_icon fa fa-facebook"></i></a>
    </li>
    <?php endif; ?>

    <?php if($youtube): ?>
    <li class="youtube">
        <a href="<?php print $youtube; ?>" title="Find Giz on YouTube" target="_blank">
            <i class="social_icon fa fa-youtube-play"></i></a>
    </li>
    <?php endif; ?>

    <?php if($google_plus): ?>
    <li class="googleplus">
        <a href="<?php print $google_plus; ?>" title="Find Giz on Google Plus" target="_blank">
            <i class="social_icon fa fa-google-plus"></i></a>
    </li>
    <?php endif; ?>
</ul>

</div>