<?php
class WDS_View_Helper_LinkSortCms extends Zend_View_Helper_Abstract{
	
	public function linkSortCms($label,$column,$ssFilter,$imgLink,$action_link,$default_order = 'DESC'){
		
		if($ssFilter['col'] != $column){		
			$linkOder =  $action_link . '/col/' . $column . '/by/' . $default_order;		
			$xhtml = '<a href="' . $linkOder . '" title="Sort Z-A">' . $label . '</a>';
		}else{
			if($ssFilter['order'] == 'DESC'){
				$sortOrder= 'ASC';
				$iconSort = $imgLink . '/arrow_down.png';
				$title="Sort A-Z";
			}else{
				$sortOrder = 'DESC';
				$iconSort = $imgLink . '/arrow_up.png';
				$title= "Sort Z-A";
			}
			
			$linkOder =  $action_link . '/col/' . $column . '/by/' . $sortOrder;
			$xhtml = '<a href="' . $linkOder . '" title="' . $title . '">
	                ' . $label . '
	               <br>
	               <img src="' . $iconSort .'">
	               </a>';
		}

		return $xhtml;
	}
}