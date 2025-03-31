<?php
// Déclaration du Custom Post Type "Portfolio"
function register_portfolio_cpt() {
    $labels = array(
        'name'                  => 'Portfolio',
        'singular_name'         => 'Projet Portfolio',
        'menu_name'             => 'Portfolio',
        'name_admin_bar'        => 'Projet Portfolio',
        'add_new'               => 'Ajouter un projet',
        'add_new_item'          => 'Ajouter un nouveau projet',
        'new_item'              => 'Nouveau projet',
        'edit_item'             => 'Modifier le projet',
        'view_item'             => 'Voir le projet',
        'all_items'             => 'Tous les projets',
        'search_items'          => 'Rechercher dans le portfolio',
        'not_found'             => 'Aucun projet trouvé',
        'not_found_in_trash'    => 'Aucun projet trouvé dans la corbeille',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'has_archive'           => true,
        'supports'              => array('title', 'editor', 'thumbnail'), // Titre, éditeur, image mise en avant
        'rewrite'               => array('slug' => 'portfolio'), // Permalien personnalisé
        'show_in_rest'          => true, // Support de l’API REST (pour Gutenberg)
        'menu_icon'             => 'dashicons-portfolio', // Icône dans le menu admin
        'taxonomies'            => array('portfolio_category'), // Ajout des catégories personnalisées
    );

    register_post_type('portfolio', $args);
}
add_action('init', 'register_portfolio_cpt');

// Déclaration des catégories personnalisées pour le CPT "Portfolio"
function register_portfolio_taxonomy() {
    $labels = array(
        'name'              => 'Catégories Portfolio',
        'singular_name'     => 'Catégorie Portfolio',
        'search_items'      => 'Rechercher des catégories',
        'all_items'         => 'Toutes les catégories',
        'edit_item'         => 'Modifier la catégorie',
        'update_item'       => 'Mettre à jour la catégorie',
        'add_new_item'      => 'Ajouter une nouvelle catégorie',
        'new_item_name'     => 'Nom de la nouvelle catégorie',
        'menu_name'         => 'Catégories',
    );

    $args = array(
        'hierarchical'      => true, // Comme les catégories, pas comme les étiquettes
        'labels'            => $labels,
        'show_in_rest'      => true, // Support de l’API REST
        'rewrite'           => array('slug' => 'portfolio-category'), // Slug pour les catégories
    );

    register_taxonomy('portfolio_category', array('portfolio'), $args);
}
add_action('init', 'register_portfolio_taxonomy');