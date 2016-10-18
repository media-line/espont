<?php

    defined('_JEXEC') or die;

?>
<div class="uk-menu-advance-block uk-menu-advance-block-<?php echo $class_sfx; ?>">
<div class="uk-menu-advance-block-bg uk-position-relative uk-text-center" <?php echo $background; ?>>
<div class="uk-inline-block uk-text-middle uk-vertical-alignment"></div>
<div class="uk-menu-advance-block-content uk-text-contrast uk-position-relative uk-inline-block uk-text-middle">

<?php if($params->get('image')){ ?>
    <div class="uk-menu-advance-block-image uk-text-center">
        <img src="<?php echo $params->get('image'); ?>" alt="" />
    </div>
<?php } else { ?>
    <div class="uk-text-center">
        <div class="uk-menu-advance-block-icon uk-inline-block" style="background-color: <?php echo $color; ?>; color: <?php echo $iconColor; ?> ">
            <?php if($icon == 0){?> 
                <i class="icon-oval"></i>
            <?php } ?>
            
            <?php if($icon == 1){?> 
                <i class="icon-briefcase"></i>
            <?php } ?> 
            
            <?php if($icon == 2){?> 
                <i class="icon-house"></i>
            <?php } ?>
            
            <?php if($icon == 3){?> 
                <i class="icon-balloons"></i>
            <?php } ?>
        </div>
    </div>
<?php } ?>
<?php if($params->get('subtitle')){ ?>
    <div class="uk-menu-advance-block-subtitle uk-h3 uk-text-uppercase uk-text-center">
        <img src="<?php echo $params->get('subtitle'); ?>" alt="" />
    </div>
<?php } ?>
<?php 
    if($params->get('title')){ 
        $title = str_replace(' ', '<br>', $params->get('title'));
?>
    <div class="uk-menu-advance-block-title uk-h1 uk-text-bold uk-text-uppercase uk-text-center">
        <?php echo $title; ?>
    </div>
<?php } ?>

<ul class="uk-menu-advance-block-list uk-text-left">
<?php foreach ($list as $i => &$item)
{
	$class = 'item-' . $item->id;

	if ($item->id == $default_id)
	{
		$class .= ' default';
	}


	if (($item->id == $active_id) || ($item->type == 'alias' && $item->params->get('aliasoptions') == $active_id))
	{
		$class .= ' current';
	}

	if (in_array($item->id, $path))
	{
		$class .= ' active';
	}
	elseif ($item->type == 'alias')
	{
		$aliasToId = $item->params->get('aliasoptions');

		if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
		{
			$class .= ' active';
		}
		elseif (in_array($aliasToId, $path))
		{
			$class .= ' alias-parent-active';
		}
	}

	if ($item->type == 'separator')
	{
		$class .= ' divider';
	}

	if ($item->deeper)
	{
		$class .= ' deeper';
	}

	if ($item->parent)
	{
		$class .= ' parent';
	}

	echo '<li class="' . $class . '"><span class="uk-menu-advance-block-link-wrapper uk-inline-block uk-position-relative"><span class="uk-menu-advance-block-link-hover" style="background-color: ' . $color . '"></span>';

	switch ($item->type) :
		case 'separator':
		case 'component':
		case 'heading':
		case 'url':
			require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
			break;
	endswitch;

	// The next item is deeper.
	if ($item->deeper)
	{
		echo '<ul class="nav-child unstyled small">';
	}
	// The next item is shallower.
	elseif ($item->shallower)
	{
		echo '</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else
	{
		echo '</span></li>';
	}
}
?></ul>
</div>
</div>
</div>