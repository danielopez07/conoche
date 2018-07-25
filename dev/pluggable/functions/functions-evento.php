<?php
/**
 * Funciones para el template de evento.
 *
 * @package wprig
 */

/**
 * Sets the meta data of the evento.
 *
 * @param string $postid es el ID del post del evento asociado.
 */
function get_meta_evento( $postid = '' ) {
	$fecha_inicio = get_fecha_inicio( $postid );
	$fecha_fin    = get_fecha_fin( $postid );
	$hora_inicio  = get_field( 'hora_de_inicio', $postid );
	$hora_fin     = get_field( 'hora_de_finalizacion', $postid );
	$string       = '<div class="evento-fecha"> Inicio: ' . $fecha_inicio . ' ' . $hora_inicio . '</div>';
	echo $string;
}

/**
 * Sets the right string from the start date.
 *
 * @param string $postid es el ID del post del evento asociado.
 */
function get_fecha_inicio( $postid = '' ) {
	$fecha_inicio      = get_field( 'fecha_de_inicio', $postid );
	$fecha_inicio_dia  = substr( $fecha_inicio, 0, 2 );
	$fecha_inicio_mes  = substr( $fecha_inicio, 2, 2 );
	$fecha_inicio_anno = substr( $fecha_inicio, 4, 4 );
	$nueva_fecha       = $fecha_inicio_dia . '/' . $fecha_inicio_mes . '/' . $fecha_inicio_anno;
	return $nueva_fecha;
}

/**
 * Sets the right string from the finish date.
 *
 * @param string $postid es el ID del post del evento asociado.
 */
function get_fecha_fin( $postid = '' ) {
	$fecha_fin         = get_field( 'fecha_de_finalizacion', $postid );
	$fecha_inicio_dia  = substr( $fecha_fin, 0, 2 );
	$fecha_inicio_mes  = substr( $fecha_fin, 2, 2 );
	$fecha_inicio_anno = substr( $fecha_fin, 4, 4 );
	$nueva_fecha       = $fecha_inicio_dia . '/' . $fecha_inicio_mes . '/' . $fecha_inicio_anno;
	return $nueva_fecha;
}
