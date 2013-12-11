<?php
defined('_JEXEC') or die('Restricted access');
require_once(dirname(__FILE__).'/helper.php');
$list = "";
$helper = new modVkGalleryTreeViewHelper();
$helper->buildTree($list,0);
echo $list;
//require(JModuleHelper::getLayoutPath('mod_vkgallery_treeview'));
?>
