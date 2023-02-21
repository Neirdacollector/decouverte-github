<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'wordpress' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'wordpress' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'cXdt4C2yNNs7k%UMK$9cnzXRx7;gPCaK5bpq)<pOe?RRK#5AgITvE0IcGq8nnlGk' );
define( 'SECURE_AUTH_KEY',  '2 5lF +eI}0P^{EWUD!xCVdCl~P6KF[~jZ%X+{$S4p@GsXBS{0GK3.(f%q/?n-K^' );
define( 'LOGGED_IN_KEY',    'C}8@w?)|%wU&eD<IFnV$PHd&2e@T-w4NE$3s89L$1-+}tgWd]ogN90-rdF(/GZzF' );
define( 'NONCE_KEY',        'uG$X;!aUC6%%&M3=KGS,+y--#WVFNs)sjKnD_C^CBZ}BYOO}3H#+C|~TrU0/Tjw,' );
define( 'AUTH_SALT',        '&_M1s! U33bkQ8i]?iI7DP#$3xvsrL!>~qa$.k>^TL5Y:U~{@VqG~R~;a}4X8eia' );
define( 'SECURE_AUTH_SALT', 'AzY)=ax-v~ex#vW/CBEbB|]3Z:p1R>E(Rl~!Rx)15sZf/S*CH=O20KKcp3mUyT#{' );
define( 'LOGGED_IN_SALT',   'ZBN1_2./NW8eAAJun7(DHa{eCKd!*jr]! nh|KgDote0N)g/(B33#T%!f5EWQfjY' );
define( 'NONCE_SALT',       '0xZG? fmg|9`Uykb]vx{;%bv|Qxj[)qI5G$_bVO@p2Nj@mIi|iWQYUWpWAM;pJoG' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
