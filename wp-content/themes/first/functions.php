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
function get_article_filtered(string $slug_categorie): WP_Query
{
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
        "category_name" => $slug_categorie
    );
    $list = ["ASC", "DESC"];
    if (!empty($_GET["order"]) && in_array($_GET["order"], $list)) {
        $args['orderby'] = "title";
        $args['order'] = $_GET["order"];
    }
    if (!empty($_GET["date"]) && DateTime::createFromFormat("Y-m-d", $_GET["date"]) !== false) {
        $date = DateTime::createFromFormat("Y-m-d", $_GET["date"]);
        $args['date_query'] = [
            [
                'year'  => $date->format("Y"),
                'month' => $date->format("m"),
                'day'   => $date->format("d")
            ]
        ];
    }
    return new WP_Query($args);
}

function categorie_badge(int $post_id): string
{
    $resultat = "";
    foreach (get_the_category($post_id) as $category) {
        $resultat .= "<span class='badge bg-warning me-2'>
            <a href='" . get_tag_link($category->term_id) . "' class='text-decoration-none text-white'>{$category->name}</a>
        </span>";
    }
    return $resultat;
}

function add_formulaire_contact(): string
{
    return "
    <form method='POST'>
    <div class='mb-3'> 
    <label for='email'> Saisir votre email</label>
    <input type='email' name='email' class='form-control'>
    </div>
     <div class='mb-3'> 
    <label for='message'> Saisir votre message</label>
    <textarea name='message' class='form-control' id='message' rows='6'></textarea>
    </div>
    <input type='submit' class='btn btn-dark'>
    </form>
    ";
}
// form_contact = mot que l'on va écrire dans le "code court" dans le back office
// add_formulaire_contact = nom de la fonction qui retourne le formulaire ( ou autre)
add_shortcode("form_contact", "add_formulaire_contact");
// ajouter un bloc "code court" => [form_contact]

//traitement du formulaire de contact
if (!empty($_POST["email"]) && !empty($_POST["message"])) {
    global $wpdb;
    $create = $wpdb->prepare("
         CREATE TABLE IF NOT EXISTS wp_contact (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            email VARCHAR(255),
            message TEXT
            )
     ");
    $wpdb->get_row($create);
    $query = $wpdb->prepare("INSERT INTO wp_contact
        (email, message)
        VALUES
        (%s, %s)
        ", [$_POST["email"], $_POST["message"]]);
    $wpdb->get_row($query);
}

add_action('init', function () {
    register_sidebar([
        "name" => "search",
        "id" => "search"
    ]);
});

add_action('init', function () { // permet d'ajouter un onglet "produit" dans le back office



    $args = [
        "label" => "produits",
        "public" => true,
        "supports" => ["title", "editor","thumbnail", "custom-fields"],
        "has_archive" => true
    ];
    
    register_post_type("produits", $args);
    //titre nom produit
    //description contenu
    //image image principale du produit
    //prix
});
