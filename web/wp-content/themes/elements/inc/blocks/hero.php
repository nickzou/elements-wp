<?php

function register_hero_section_block()
{
    if (!function_exists('register_block_type')) {
        return;
    }

    // Register the block script
    wp_register_script(
        'hero-section-editor',
        get_template_directory_uri() . '/js/hero-section-editor.js',
        ['wp-blocks', 'wp-element', 'wp-editor', 'wp-components'],
        filemtime(get_template_directory() . '/js/hero-section-editor.js')
    );

    // Register the block style
    /*wp_register_style(*/
    /*    'hero-section-editor-style',*/
    /*    get_template_directory_uri() . '/assets/css/hero-section-editor.css',*/
    /*    array('wp-edit-blocks'),*/
    /*    filemtime(get_template_directory() . '/assets/css/hero-section-editor.css')*/
    /*);*/

    // Register the block
    register_block_type('elements/hero-section', array(
        'editor_script' => 'hero-section-editor',
        //'editor_style' => 'hero-section-editor-style',
        'render_callback' => 'render_hero_section_block',
        'attributes' => [
            'title' => [
                'type' => 'string',
                'default' => 'Hero Section Title',
        ],
        ],
    ));
}
add_action('init', 'register_hero_section_block');

/**
 * Server-side rendering function for the hero section block
 *
 * @param array $attributes Block attributes.
 * @return string Block HTML.
 */
function render_hero_section_block($attributes)
{
    $title = isset($attributes['title']) ? $attributes['title'] : 'Hero Section Title';

    $output = sprintf(
        "<div class=\"wp-block-custom-namespace-hero-section\">
            <h2 class=\"hero-section-title somethingelse\">%1\$s</h2>
        </div>",
        esc_html($title)
    );

    return $output;
}
