<?php
defined('_JEXEC') or die('Restricted access');

class modVkGalleryTreeViewHelper {
	function getChilds($parent) {
		$db = JFactory::getDBO();
		$query = $db->getQuery(TRUE);
		
		$query->select("id, title, position");
		$query->from("#__vkg_menu");
		$query->where(
			"parent = ".(int) $parent." AND ".
			"type = 'elem' AND visible"
		);
		$db->setQuery($query);
		$result = $db->loadObjectList();

		return $result;
	}

	function galleryiesDetect($parent) {
		$db = JFactory::getDBO();
                $query = $db->getQuery(TRUE);

                $query->select("id, title, position");
                $query->from("#__vkg_menu");
                $query->where(
                        "parent = ".(int) $parent." AND ".
                        "type = 'gallery' AND visible"
                );
                $db->setQuery($query);
		
		return (count($db->loadObjectList()) > 0);
	}

	function buildTree(&$result, $parent) {
		$list = $this->getChilds($parent);
		$count = count($list);
		for ($i=0; $i<$count; $i++) {
			$result .= "<li>";
			if ($this->galleryiesDetect($list[$i]->id)) {
				$result .=
					"<a href='".
					JRoute::_('index.php?option=com_vkgallery&view=vkgallery&id='.$list[$i]->id).
					"'>".JText::_($list[$i]->title).
					"</a>";
			} else {
				$result .=
					"<label>".
					JText::_($list[$i]->title).
					"</label>";
			}
			if (count($this->getChilds($list[$i]->id))>0) {
				$result .= "<ul>";
				$this->buildTree($result, $list[$i]->id);
				$result .= "</ul>";
			}
			$result .= "</li>";
		}
	}
}
?>
