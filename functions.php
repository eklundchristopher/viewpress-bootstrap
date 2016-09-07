<?php

/**
 * Enable certain features for the theme.
 */
add_theme_support('post-thumbnails');

/**
 * Register a default sidebar, utilised by the posts page.
 */
add_action('widgets_init', function () {
    register_sidebar([
        'name'          => __('Default Sidebar', 'viewpress-bootstrap'),
        'description'   => __('The sidebar for your posts page.', 'viewpress-bootstrap'),
        'id'            => 'sidebar-default',
        'class'         => 'list-group',
        'before_widget' => '<div id="%1$s" class="panel panel-default %2$s">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="panel-heading">',
        'after_title'   => '</div><div class="panel-body">',
    ]);
});

if (! function_exists('viewpress_pagination')) {
    /**
     * Render a Bootstrap 3 based pagination.
     *
     * @return void
     */
    function viewpress_pagination() {
        global $wp_query;

        $pages = paginate_links([
            'base'      => str_replace(999999999, '%#%', get_pagenum_link(999999999)),
            'format'    => '?page=%#%',
            'current'   => max(1, get_query_var('paged')),
            'total'     => $wp_query->max_num_pages,
            'prev_next' => true,
            'type'      => 'array',
            'prev_text' => __('&larr; Previous', 'viewpress-bootstrap'),
            'next_text' => __('Next &rarr;', 'viewpress-bootstrap'),
        ]);

        if (is_array($pages)) {
            $current = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');

            echo '<ul class="pagination">';
            foreach ($pages as $iteration => $page) {
                if (($current == 1 and $iteration == 0) or ($current != 1 and $current == $iteration)) {
                    echo '<li class="active">'.$page.'</li>';
                    continue;
                }

                echo '<li>'.$page.'</li>';
            }
            echo '</ul>';
        }
    }
}
