<?php
/**
 * Funciones para el template de negocio.
 *
 * @package wprig
 */

/**
 * Prints the horario.
 *
 * @param string $postid es el ID del post del negocio asociado.
 */
function get_horario( $postid = '' ) {
	// Aqui va la funcion.
	$horario = '';
	// Variables correspondientes a las horas de apertura y cierre del negocio.
	$a_dom = get_field( 'abre_domingo', $postid );
	$a_lun = get_field( 'abre_lunes', $postid );
	$a_mar = get_field( 'abre_martes', $postid );
	$a_mie = get_field( 'abre_miercoles', $postid );
	$a_jue = get_field( 'abre_jueves', $postid );
	$a_vie = get_field( 'abre_viernes', $postid );
	$a_sab = get_field( 'abre_sabados', $postid );
	$c_dom = get_field( 'cierra_domingo', $postid );
	$c_lun = get_field( 'cierra_lunes', $postid );
	$c_mar = get_field( 'cierra_martes', $postid );
	$c_mie = get_field( 'cierra_miercoles', $postid );
	$c_jue = get_field( 'cierra_jueves', $postid );
	$c_vie = get_field( 'cierra_viernes', $postid );
	$c_sab = get_field( 'cierra_sabados', $postid );
	if ( $a_dom ) {
		$horario = $horario . '<div class="negocio-horario-fila"> Domingo ' . $a_dom . ' a ' . $c_dom . '</div>';
	}
	if ( $a_lun ) {
		$horario = $horario . '<div class="negocio-horario-fila">Lunes ' . $a_lun . ' a ' . $c_lun . '</div>';
	}
	if ( $a_mar ) {
		$horario = $horario . '<div class="negocio-horario-fila">Martes ' . $a_mar . ' a ' . $c_mar . '</div>';
	}
	if ( $a_mie ) {
		$horario = $horario . '<div class="negocio-horario-fila">Miércoles ' . $a_mie . ' a ' . $c_mie . '</div>';
	}
	if ( $a_jue ) {
		$horario = $horario . '<div class="negocio-horario-fila">Jueves ' . $a_jue . ' a ' . $c_jue . '</div>';
	}
	if ( $a_vie ) {
		$horario = $horario . '<div class="negocio-horario-fila">Viernes ' . $a_vie . ' a ' . $c_vie . '</div>';
	}
	if ( $a_sab ) {
		$horario = $horario . '<div class="negocio-horario-fila">Sábado ' . $a_sab . ' a ' . $c_sab . '</div>';
	}
	echo $horario;
}

/**
 * Prints the ubicacion.
 *
 * @param string $postid es el ID del post del negocio asociado.
 */
function get_ubicacion( $postid = '' ) {
	// Se cargan las variables.
	$provincia = get_field( 'provincia', $postid );
	$c_sj      = get_field( 'cantones_de_san_jose', $postid );
	$c_al      = get_field( 'cantones_de_alajuela', $postid );
	$c_ca      = get_field( 'cantones_de_cartago', $postid );
	$c_he      = get_field( 'cantones_de_heredia', $postid );
	$c_pu      = get_field( 'cantones_de_puntarenas', $postid );
	$c_gu      = get_field( 'cantones_de_guanacaste', $postid );
	$c_li      = get_field( 'cantones_de_limon', $postid );
	$direccion = get_field( 'direccion', $postid );
	$mapa      = get_field( 'mapa', $postid );
	// Se declara la variable que contiene el html.
	$ubicacion = '';
	if ( $provincia ) {
		$ubicacion = $ubicacion . '<div>' . $provincia . ' - ';
		if ( $c_sj ) {
			$ubicacion = $ubicacion . $c_sj;
		} elseif ( $c_al ) {
			$ubicacion = $ubicacion . $c_al;
		} elseif ( $c_ca ) {
			$ubicacion = $ubicacion . $c_ca;
		} elseif ( $c_he ) {
			$ubicacion = $ubicacion . $c_he;
		} elseif ( $c_pu ) {
			$ubicacion = $ubicacion . $c_pu;
		} elseif ( $c_gu ) {
			$ubicacion = $ubicacion . $c_gu;
		} elseif ( $c_li ) {
			$ubicacion = $ubicacion . $c_li;
		}
		$ubicacion = $ubicacion . '</div>';
	}
	if ( $direccion ) {
		$ubicacion = $ubicacion . '<div>' . $direccion . '</div>';
	}
	echo $ubicacion;
}

/**
 * Prints the contacto.
 *
 * @param string $postid es el ID del post del negocio asociado.
 */
function get_contacto( $postid = '' ) {
	// Se cargan las variables.
	$email = get_field( 'correo_electronico', $postid );
	$tef_1 = get_field( 'tef_1', $postid );
	$tef_2 = get_field( 'tef_2', $postid );
	$web   = get_field( 'sitio_web', $postid );
	$fb    = get_field( 'facebook', $postid );
	$ig    = get_field( 'instagram', $postid );
	// Se declara la variable que contiene el html.
	$contacto = '';
	if ( $email ) {
		$contacto = $contacto . '<div>Correo Electrónico: ' . $email . '</div>';
	}
	if ( $tef_1 ) {
		if ( $tef_2 ) {
			$contacto = $contacto . '<div>Teléfonos: <a href="' . $tef_1 . '">' . $tef_1 . '</a> - <a href="' . $tef_2 . '">' . $tef_2 . '</a></div>';
		} else {
			$contacto = $contacto . '<div>Teléfono: <a href="' . $tef_1 . '">' . $tef_1 . '</a></div>';
		}
	}
	if ( $web ) {
		$contacto = $contacto . '<div>Sitio web: ' . $web . '</div>';
	}
	echo $contacto;
}