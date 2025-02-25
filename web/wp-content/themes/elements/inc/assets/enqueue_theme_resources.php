<?php

function enqueue_theme_resources(): void
{
    wp_enqueue_style("styles");
    wp_enqueue_style("tailwind");
}

add_action("wp_enqueue_scripts", "enqueue_theme_resources");
