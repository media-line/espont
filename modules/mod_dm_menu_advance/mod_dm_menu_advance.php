<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the menu functions only once
require_once __DIR__ . '/helper.php';

$list       = ModMenuAdvanceHelper::getList($params);
$base       = ModMenuAdvanceHelper::getBase($params);
$active     = ModMenuAdvanceHelper::getActive($params);
$default    = ModMenuAdvanceHelper::getDefault();
$active_id  = $active->id;
$default_id = $default->id;
$path       = $base->tree;
$showAll    = $params->get('showAllChildren');
$class_sfx  = htmlspecialchars($params->get('class_sfx'), ENT_COMPAT, 'UTF-8');
if ($params->get('background')){
    $background  = 'style="background-image: url(' . $params->get('background') . ');"';
}
$icon = $params->get('icon');
$color = $params->get('color','transparent');
$iconColor = $params->get('icon_color','#000');

if (count($list))
{
	require JModuleHelper::getLayoutPath('mod_dm_menu_advance', $params->get('layout', 'default'));
}
