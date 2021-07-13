<?php 

function front_menu($MenuPagemodel, $menu_id, $classes = '') {

	$html = '';

	$main_ul_class = isset($classes['main_ul_class']) ? $classes['main_ul_class'] : '';

	$html .= '<div class="col-lg-6 position-static"> <div class="main-menu-area"> <div class="main-menu"> <nav class="desktop-menu"> <ul>';

	$html .= getMenusHtml($MenuPagemodel, $menu_id, 0, 0, '', $classes);

	$html .= '</ul> </nav> </div> </div> </div>';

	return  $html;
}

function getMenusHtml($MenuPagemodel, $menu_id, $parent_id = 0, $lavel, $html='', $classes = '') {

	if(!empty($menu_id)) {

		$records = $MenuPagemodel::where('menu_id', $menu_id)->where('parent_id', $parent_id)->OrderBy('sort_number', 'ASC')->get();

		if(!empty($records)) {
			$i = 1;
			$lavel = $lavel + 1;

			foreach($records as $record) {
				if ($record['mega_menu'] == 0) {
					$menusArr  = array();

					$menusArr['children'] = getChildMenusList($MenuPagemodel, $menu_id, $record['id']);

					$main_li_class= isset($classes['']) ? $classes[''] : '';

					$target = ($record['new_tab'] == 1) ? '_blank' : '';

					if(!empty($menusArr['children'])) {
						$child_ul_class =  isset($classes['child_ul_class']) ? $classes['child_ul_class'] : '';
					}

					$html .= '<li>';

					$slug = $record['slug'];

					$html .= '<a href="'.$slug.'" target="'.$target.'">';

					$html .= $record['title'];

					if(!empty($menusArr['children'])) {
						$html .= '<i class="fa fa-angle-down"></i>';
					}

					$html .= '</a>';

					if(!empty($menusArr['children'])) { 
						$sub_child_ul_class = ($lavel > 1) ? 'dropdown' : '';

						$html .= '<ul class="'.$child_ul_class.$sub_child_ul_class.'">';

						$html .= getMenusHtml($MenuPagemodel, $menu_id, $record['id'], $lavel);

						$html .= '</ul>';
					}
					else {
						unset($menusArr['children']);
					}

					$html .= '</li>';

					$i++;
				}
				else {
					$menusArr  = array();

					$menusArr['children'] = getChildMenusList($MenuPagemodel, $menu_id, $record['id']);

					$main_li_mega_menu_class = isset($classes['main_li_mega_menu_class']) ? $classes['main_li_mega_menu_class'] : '';

					$target = ($record['new_tab'] == 1) ? '_blank' : '';

					if(!empty($menusArr['children'])) {
						$child_ul_mega_menu_class =  isset($classes['child_ul_mega_menu_class']) ? $classes['child_ul_mega_menu_class'] : '';
					}

					$html .= '<li class="'.$main_li_mega_menu_class.'">';

					$slug = $record['slug'];

					$html .= '<a href="'.$slug.'" target="'.$target.'">';

					$html .= $record['title'];

					if(!empty($menusArr['children'])) {
						$html .= '<i class="fa fa-angle-down"></i>';
					}

					$html .= '</a>';

					if(!empty($menusArr['children'])) { 
						$sub_child_ul_mega_menu_class = ($lavel > 1) ? '' : '';

						$html .= '<ul class="'.$child_ul_mega_menu_class.$sub_child_ul_mega_menu_class.'">';

						$html .= getMenusHtml($MenuPagemodel, $menu_id, $record['id'], $lavel);

						$html .= '</ul>';
					}
					else {
						unset($menusArr['children']);
					}

					$html .= '</li>';

					$i++;
				}
			}
		}

		return $html;
	}
}

function getChildMenusList($MenuPagemodel, $menu_id, $parent_id = 0) {

	$menus = array();

	if(!empty($menu_id)) {

		$records = $MenuPagemodel::where('menu_id', $menu_id)->where('parent_id', $parent_id)->OrderBy('sort_number', 'ASC')->get();

		if(!empty($records)) {
			$i = 1;

			foreach($records as $record) {
				$menusArr  = array();				
				$menusArr['id'] = $record['id'];
				$menusArr['text'] = $record['title'];
				$menusArr['href'] = $record['slug'];
				$menusArr['page_type'] = $record['page_type'];
				$menusArr['parent_id'] = $record['parent_id'];
				$menusArr['sort_number'] = $record['sort_number'];
				$menus[$record['id']] = $menusArr;
				$i++;
			}
		}

		$menus = !empty($menus) ? array_values($menus) : '';

		return $menus;

	}
}

?>