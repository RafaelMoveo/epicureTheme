<?php
function epicure_menus(){
    add_theme_support('menus');
    register_nav_menu('pages', 'Pages Navigation');
    register_nav_menu('actions', 'User actions');
    register_nav_menu('footer_nav', 'Footer menu');
    register_nav_menu('front-page-menu', 'Front page menu');
}
add_action('init', 'epicure_menus');

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}

class MobileMainNav extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {   
        $output .= '<li class="text-center nav-item '.implode(' ', $item->classes).'">';
        $output .= '<a class="nav-link" href="'.$item->url.'">';
        $output .= $item->title.'</a>';
        $output .= '</li>';
    }
}

class DesktopPagesMenu extends Walker_Nav_Menu{
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0){
        $output .= '<a href="'.$item->url.'" class="desktop-nav-page">';
        $output .= $item->title;
        $output .= '</a>';
    }
}

class FooterMenu extends Walker_Nav_Menu{
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0){
        $output .= '<a href="'.$item->url.'" class="desktop-nav-page">';
        $output .= $item->title;
        $output .= '</a>';
    }
}

class FrontPageNav extends Walker_Nav_Menu{
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0){
        $output .= '<a href="'.$item->url.'" class="home-nav-item">';
        $output .=  strtoupper($item->title);
        $output .= '</a>';
    }
}