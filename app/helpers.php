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

		echo "<pre>";

		print_r($records);

		die();

	}
}

function getChildMenusList($MenuPagemodel, $menu_id, $parent_id = 0) {

}

?>