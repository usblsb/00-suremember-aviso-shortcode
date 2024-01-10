<?php
/**
 * Plugin Name: 00 Suremembers Aviso OFF
 * Plugin URI: https://webyblog.es/
 * Description: Shortcode [suremember-aviso] muestra un aviso de contenido restringido con boton de acceder o suscribirse, lo uso dentro de los ajustes de SUREMEMBERS o GP en cualquier parte de la web.
 * Version: 04-01-2024
 * Author: Juan Luis Martel
 * Author URI: https://webyblog.es/
 * License: GPL2
 */


if ( ! defined( 'ABSPATH' ) ) exit;


/* Cargamos el CSS externo y le añadimos dinamicamente la version del propio plugin */
function enqueue_suremember_aviso_styles() {
    $css_file = 'style-suremember-aviso-new.css';
    $plugin_data = get_plugin_data( __FILE__ );
    $plugin_version = $plugin_data['Version'];

    wp_enqueue_style( 'suremember-aviso', plugins_url( $css_file, __FILE__ ), array(), $plugin_version );
}
add_action( 'wp_enqueue_scripts', 'enqueue_suremember_aviso_styles' );



function cta_suremember_aviso_shortcode() {
	ob_start();
?> 

<!-- Inicio plugin shortcode Suremembers Aviso -->
<div class="suremember-aviso-main" data-ga-label="suremember-aviso-main">
	<div class="suremember-aviso-texto">		
		<div class="suremember-aviso-texto-header-div">
			<span class="suremember-aviso-texto-header">Contenido Restringido</span>
		</div>
		<div class="suremember-aviso-texto-parrafo-div">
			<span class="suremember-aviso-texto-parrafo">Parte del contenido es solo visible a los suscritores.</span>
		</div>
	</div>
	<div class="suremember-aviso-botones">
		<div class="div-suremember-aviso-button">
			<a class="a-button-aviso a-button-aviso-acceder" rel="noopener noreferrer nofollow" data-ga-label="Acceder" target="_self" href="/customer-dashboard/">Acceder</a>
		</div>
		<div class="div-suremember-aviso-button">
			<a class="a-button-aviso a-button-aviso-sustibirse" rel="noopener noreferrer nofollow" data-ga-label="Suscribirse" target="_self" href="/registro-mensual/">Suscribirse</a>
		</div>
	</div>
</div>
<!-- Fin plugin shortcode Suremembers Aviso -->
<?php
	return ob_get_clean();
}
add_shortcode( 'suremember-aviso', 'cta_suremember_aviso_shortcode' );
?>