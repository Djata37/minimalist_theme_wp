<?php 

add_action( 'wp_before_admin_bar_render', function () {
    global $wp_admin_bar;

    // Retirer le logo WordPress
    $wp_admin_bar->remove_menu( 'wp-logo' );
    // Dans le menu WordPress : Retirer le lien "à propos de WordPress"
    $wp_admin_bar->remove_menu( 'about' );
    // Dans le menu WordPress : Retirer le lien "Site de WordPress-FR"
    $wp_admin_bar->remove_menu( 'wporg' );
    // Dans le menu WordPress : Retirer le lien "Documentation"
    $wp_admin_bar->remove_menu( 'documentation' );
    // Dans le menu WordPress : Retirer le lien "Forums d’entraide"
    $wp_admin_bar->remove_menu( 'support-forums' );
    // Dans le menu WordPress : Retirer le lien "Remarque"
    $wp_admin_bar->remove_menu( 'feedback' );


    // Retirer le nom du site
    $wp_admin_bar->remove_menu( 'view-site' );
    // Dans le menu "nom du site" : Retirer le lien "Tableau de bord"
    $wp_admin_bar->remove_menu( 'dashboard' ); // Front-end
    // Dans le menu "nom du site" : Retirer le lien "Menus"
    $wp_admin_bar->remove_menu( 'menus' ); // Front-end
    // Dans le menu "nom du site" : Retirer le lien "Widgets"
    $wp_admin_bar->remove_menu( 'widgets' ); // Front-end
    // Dans le menu "nom du site" : Retirer le lien "Themes"
    $wp_admin_bar->remove_menu( 'themes' ); // Front-end
    // Dans le menu "nom du site" : Retirer le lien "Personnaliser"
    $wp_admin_bar->remove_menu( 'customize' ); // Front-end

    // Retirer les mises à jour
    $wp_admin_bar->remove_menu( 'updates' );

    // Retirer les commentaires
    $wp_admin_bar->remove_menu( 'comments' );

    // Retirer le menu "Créer"
    $wp_admin_bar->remove_menu( 'new-content' );
    // Dans le menu "Créer" : Retirer "Article"
    $wp_admin_bar->remove_menu( 'new-post' );
    // Dans le menu "Créer" : Retirer "Mdia"
    $wp_admin_bar->remove_menu( 'new-media' );
    // Dans le menu "Créer" : Retirer "Page"
    $wp_admin_bar->remove_menu( 'new-page' );
    // Dans le menu "Créer" : Retirer "Utilisateur"
    $wp_admin_bar->remove_menu( 'new-user' );

    // Retirer le lien "Modifier l'article"
    $wp_admin_bar->remove_menu( 'edit' ); // Front-end
}, 999 );


function remove_menu() {
    remove_menu_page('edit.php');
    remove_menu_page('edit-comments.php');
    remove_menu_page('index.php');
}
add_action('admin_menu', 'remove_menu');

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

add_theme_support( 'post-thumbnails' );

add_theme_support( 'title-tag' );

// Autoriser l'import des fichiers SVG et WEBP
function capitaine_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    $mimes['webp'] = 'image/webp';
    return $mimes;
}

function minimalist_register_assets() {
    wp_enqueue_script('jquery' );
	wp_enqueue_script( 
        'navigation', 
        get_template_directory_uri() . '/js/navigation.js', 
        array( 'jquery' ), 
        '1.0', 
        true
    );
    wp_enqueue_script( 
        'formulaire', 
        get_template_directory_uri() . '/js/form-validation.js', 
        array( 'jquery' ), 
        '1.0', 
        true
    );
    
    // Déclarer style.css à la racine du thème
    wp_enqueue_style( 
        'base', 
        get_template_directory_uri() . '/css/base.css',
        array(), 
        '1.0'
    );
  	
    // Déclarer un autre fichier CSS
    wp_enqueue_style( 
        'style', 
        get_template_directory_uri() . '/css/style.css',
        array(), 
        '1.0'
    );
}
add_action( 'wp_enqueue_scripts', 'minimalist_register_assets' );

register_nav_menus( array(
	'main' => 'Menu Principal',
	'footer' => 'Bas de page',
    'social' => 'Social',
) );

function portfolio_register_post_types() {
	
    // CPT Portfolio
    $labels = array(
        'name' => 'Portfolio',
        'all_items' => 'Tous les projets',  // affiché dans le sous menu
        'singular_name' => 'Projet',
        'add_new_item' => 'Ajouter un projet',
        'edit_item' => 'Modifier le projet',
        'menu_name' => 'Portfolio'
    );

	$args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor','thumbnail' ),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-admin-customizer',
	);

	register_post_type( 'portfolio', $args );
}
add_action( 'init', 'portfolio_register_post_types' ); // Le hook init lance la fonction