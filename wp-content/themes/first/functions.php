<?php


// activer la possibilité d'ajouter des miniatures dans nos articles

//hook => point d'accroche (modifier le comportement natif de wordpress)
// ajouter un traitement en plus par rapport aux actions réalisées par défaut par wordpress

// "after_setup_theme" => après que le thème soit mis en place
// ajouter en + => add_theme_support( "post-thumbnails" );
// permet d'ajouter un champ supplementaire les formulaires de gestion des articles => un champ pour
// ajouter une image de miniature

add_action("after_setup_theme", function () {
    add_theme_support("post-thumbnails");
});


/**
 * commentaire pour documenter la fonction crée
 *
 * @param string $titre_page
 * @return string
 */
function get_page_url(string $titre_page): string
{
    return get_the_permalink(get_page_by_title($titre_page));
}
/**
 * Fonction qui permet de récupérer la catégorie avec le slug
 *
 * @param string $slug
 * @return string
 */
function get_category_url(string $slug): string
{
    return get_tag_link(get_category_by_slug($slug)->term_id);
}

/**
 * Retourne un objet WP_Query pour une categorie triée par titre croissant/décroissant
 *
 * @param string $slug_categorie
 * @return void
 */
function get_article_filtered(string $slug_categorie):WP_Query{
    $args = array(
        "category_name" => $slug_categorie,
        'orderby' => 'title',
        'order' => $_GET["order"] ?? "ASC"
    );
    return new WP_Query($args);

}

function get_article_filtered_by_date(string $slug_categorie): WP_Query
{
    $args = array(
        "category_name" => $slug_categorie,
        'orderby' => 'date',
        'date_order' => $_GET["date_order"] ?? "DASC"
    );
    return new WP_Query($args);
}
