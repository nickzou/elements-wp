<?php

function modify_gutenberg_markup()
{
    // Remove default paragraph wrapper
    remove_filter('the_content', 'wpautop');

    $registry = WP_Block_Type_Registry::get_instance();

    if ($registry->is_registered('core/heading')) {
        $block_type = $registry->get_registered('core/heading');

        $block_type->render_callback = 'custom_heading_markup';
    }
}


function custom_heading_markup($attributes, $content)
{
    $tag = isset($attributes['level']) ? 'h' . $attributes['level'] : 'h2';
    $align = isset($attributes['align']) ? $attributes['align'] : 'left';

    $content = strip_tags($content);

    return "<$tag class='custom-heading text-red-900'>$content</$tag>";
}

add_action('init', 'modify_gutenberg_markup', 20);
