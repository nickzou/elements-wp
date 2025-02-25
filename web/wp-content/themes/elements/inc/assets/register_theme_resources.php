<?php

function register_theme_resources(): void
{
    $theme_uri = get_template_directory_uri();
    $theme_dir = get_template_directory();

    wp_register_style("styles", "$theme_uri/css/styles.css", [], filemtime("$theme_dir/css/styles.css"));
    wp_register_style("tailwind", "$theme_uri/css/tailwind.css", [], filemtime("$theme_dir/css/tailwind.css"));
};

add_action("wp_enqueue_scripts", "register_theme_resources");
