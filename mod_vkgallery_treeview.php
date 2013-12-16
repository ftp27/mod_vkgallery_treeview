<?php
defined('_JEXEC') or die('Restricted access');
require_once(dirname(__FILE__).'/helper.php');

$pathToMod = JURI::base().'modules/mod_vkgallery_treeview';
$document = JFactory::getDocument();

$list = "";
$helper = new modVkGalleryTreeViewHelper();
$helper->buildTree($list,0);

$document->addStyleSheet($pathToMod.'/css/style.css');
$document->addScript($pathToMod.'/js/script.js');

echo "<div class='mod_vkgallery_treeview'><ul id='mod_vkgallery_treeview-0'>";
echo $list;
echo "</ul></div>";
//require(JModuleHelper::getLayoutPath('mod_vkgallery_treeview'));
?>
