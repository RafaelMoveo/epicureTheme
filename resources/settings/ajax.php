<?php
add_filter( 'posts_where', 'extend_wp_query_where', 10, 2 );
function extend_wp_query_where( $where, $wp_query ) {
    if ( $extend_where = $wp_query->get( 'extend_where' ) ) {
        $where .= " AND " . $extend_where;
    }
    return $where;
}

function search_auto_complete(){

    if(isset($_GET["search"])){
        $input = sanitize_text_field($_GET['search']);
        header("Content-Type: application/json");
        $output['restaurants'] = [];
        $output['cuisines'] = [];
        $output['chefs'] = [];

        // Get restaurants
        $restaurants = new WP_Query( array(
            'post_type'    => 'epicure_restaurant',
            'post_status'  => 'publish',
            'extend_where' => "(post_title like '%".$input."%')"
        ));
        if( $restaurants->have_posts() ){
            while( $restaurants->have_posts() ){
                $restaurants->the_post();
                $output['restaurants'][] = [
                    'title'     => get_the_title(),
                    'permalink' => get_the_permalink(),
                ];
            }
        }

        // Get chefs
        $chefs = new WP_Query( array(
            'post_type'    => 'epicure_chef',
            'post_status'  => 'publish',
            'extend_where' => "(post_title like '%".$input."%')"
        ));
        if( $chefs->have_posts() ){
            while( $chefs->have_posts() ){
                $chefs->the_post();
                $output['chefs'][] = [
                    'name'     => get_the_title(),
                    'permalink' => get_the_permalink(),
                ];
            }
        }

        //Get cuisines
        $cuisines = new WP_Term_Query(array(
            'taxonomy'   => 'category',
            'hide_empty' => true,
            'fields'     => 'all',
            'name__like'     => $input,
        ));
        if( !empty( $cuisines->terms )){
            foreach($cuisines->terms as $cuisine){
                $output['cuisines'][] = [
                    'title' => $cuisine->name,
                    'permalink' => get_category_link($cuisine),
                ];
            }
        }
        die(json_encode($output));
    }
}
  
add_action('wp_ajax_nopriv_auto_complete', 'search_auto_complete');
add_action('wp_ajax_auto_complete', 'search_auto_complete');