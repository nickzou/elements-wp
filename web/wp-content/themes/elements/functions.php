<?php

function load_theme_files()
{
    $directories = [
        'assets',
        'blocks',
        'functions'
    ];

    foreach ($directories as $dir) {
        $full_dir = get_template_directory() . '/inc/' . $dir;

        if (!is_dir($full_dir)) {
            continue;
        }

        $files = glob($full_dir . '/*.php');

        foreach ($files as $file) {
            require_once $file;
        }
    }
}

load_theme_files();
