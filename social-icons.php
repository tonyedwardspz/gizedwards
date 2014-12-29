<div class="FAageSocialIcons">
<?php

$twitter = get_option('path_twitter');
?>

<ul>
	<?php if($twitter): ?>
    <li class="twitter">
        <a href="<?php print $twitter; ?>" title="Find PATH on Twitter" target="_blank">
            <i class="social_icon fa fa-twitter"></i></a>
    </li>
    <?php endif; ?>
</ul>

</div>