<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'prensafutbol');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'prensafutbol');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'prensafutbol');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'W[J5km_k3Ye3*=@oCw-Y%6uw:G&ev3pR:5*Q6CAcS@n2F1Tc*g:[-bP#<g,J}vGP'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', 'u?4g.]M^V/fU69|`0KW=J7x*isG=QA:vlHwa@nY]8L5bU$+#12G+o:lA |qGa>Ue'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', 'Ya.b +/wut|GAv^tUIm9P/0+4JuXH+AI}5Dls17Fv*?cu-817QCO8.*l$!$)-|U>'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', '+JpafiM%)PP/j8cYsoDLos-&||?7i6,!(PA5iRZFc+()G,S%{;mV%Cwp>]z5<wj.'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', 'ghM}r.P;Hb 4c+K6mZxnF2ad<-TsWG|y>/`[#6T-oZd4NeEWW}rgC<!GMwtosWVf'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', 'MzZ+Ca+z{.a.SQ1v6.Sk()W?;cDlU((>b+PhQKE8Z])e-B`%UD6irCHImyG2Ank&'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', 'sQBJ9+?o@*Th(ON?OeVm#D/b>A%yJ*ErdUnsT-w57nrajm5D|1wMv)G;KN~h:?&M'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', 'x!E#,POj4DNDEOtbqfv.v^pnow5kIz*IwJ+&<G~(|T<],PwMM+2v~9TV+@m_Q)!7'); // Cambia esto por tu frase aleatoria.

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'pfbl_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

