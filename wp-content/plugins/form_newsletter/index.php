<?php

/**
 * Plugin Name: formulaire newsletter
 * Author: Adrien D
 * Description: création d'un shortcode pour ajouter facilement un formulaire newsletter
 */

function add_formulaire_newsletter(): string
{

    return
        "
    <form method='POST' class='mt-3'>
    <div class='mb-3'> 
    <p> Abonne toi a la newsletter</p>
    <label for='email'> Saisir votre email</label>
    <input type='email' name='email' class='form-control' placeholder='Entrez votre adresse email'>
    " . wp_nonce_field("formulaire", "contact") . "
    </div>
    <input type='submit' class='btn btn-success' value='abonne toi'>
     </form>
    ";
}
add_shortcode("form_newsletter", "add_formulaire_newsletter");

// cette fonctino permet d'ajouter un traitement en pus dans le comportementde wordpress, dans le cas présent, on atend que toutes les fonctions de wordpress soient chargées pour executer les traitements sur le post
add_action("init", function () { 

    if (!empty($_POST["email"])) {

        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) return;

        if (wp_verify_nonce($_POST["contact"], "formulaire") !== 1) return;

        global $wpdb;
        $create = $wpdb->prepare("
            CREATE TABLE IF NOT EXISTS wp_newsletter (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            email VARCHAR(255) NOT NULL
            )
            ");
        $wpdb->get_row($create);
        $query = $wpdb->prepare("INSERT INTO wp_newsletter
        (email)
        VALUES
        (%s)
        ", [$_POST["email"]]);
        $wpdb->get_row($query);
    }
});

function contenu_page_newsletter(){
    global $wpdb;
    $emails = $wpdb -> prepare("SELECT * FROM wp_newsletter");
    $resultat = $wpdb -> get_results($emails);
    $html="";
    $html .="<table class='striped' style='width:100%'>";
    $html .= "<tr>";
    $html .= "<th>id</th>";
    $html .= "<th>email</th>";
    $html .= "<tr>";
    foreach($resultat as $r){
        $html .= "<tr>";
        $html .= "<th>{$r -> id}</th>";
        $html .= "<th>{$r->email}</th>";
        $html .= "<tr>";
    }
    $html .= "</table>";
    echo "<h1>Liste des utilisateurs inscrits à la newsletter</h1>";
    echo $html;
    
}

// ajouter une nouvelle page dans le back office de notre site
// permet de voir tous ceux qui se sont inscrits dans la table wp_newsletter
// admin_init => créer cette page lorsque le back office est chargé
add_action("admin_menu", function(){
    add_menu_page("Newsletter", "Newsletter", 'manage_options', "newsletter", "contenu_page_newsletter");

    //Newsletter => nom de la page
    //Newsletter => texte affiché dans la barre latérale dans le back office
    //manage_options => le estionnaire doit être administrateur pour voir cette page dans le back office
    //newsletter => slug de l'URL de la page
});
