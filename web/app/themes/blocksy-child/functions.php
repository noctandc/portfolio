<?php
function child_theme_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/static/bundle/main.min.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
}
add_action('wp_enqueue_scripts', 'child_theme_enqueue_styles');

// Charger le fichier du CPT Portfolio
require_once get_stylesheet_directory() . '/cpt-portfolio.php';

// Ajouter le support des images mises en avant au thème
function theme_child_setup() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_child_setup');
?>
