<?php

//         CARGA DE CSV

$enter_cargos = fopen("cargos_administrativos.csv", "r");
$ok_cargos = fopen("cargos_administrativos.csv", "w");        // A algunos les falta fecha_termino_cargo
$err_cargos = fopen("cargos_administrativos.csv", "w");

$enter_eventos = fopen("eventos.csv", "r");
$ok_eventos = fopen("eventos.csv", "w");                 // 2026-- problemas con ascii y utf-8
$err_eventos = fopen("eventos.csv", "w");

$enter_pmemb = fopen("pagos_membresias.csv", "r");
$ok_pmemb = fopen("pagos_membresias.csv", "w");
$err_pmemb = fopen("pagos_membresias.csv", "w");

$enter_socios = fopen("personas_socios.csv", "r");
$ok_socios = fopen("personas_socios.csv", "w");
$err_socios = fopen("personas_socios.csv", "w");

$enter_reg = fopen("regiones_comunas.csv", "r");
$ok_reg = fopen("regiones_comunas.csv", "w");
$err_reg = fopen("regiones_comunas.csv", "w");

$enter_reservas = fopen("reservas_arriendos.csv", "r");
$ok_reservas = fopen("reservas_arriendos.csv", "w");
$err_reservas = fopen("reservas_arriendos.csv", "w");

$enter_suc = fopen("sucursales_lugares.csv", "r");
$ok_suc = fopen("sucursales_lugares.csv", "w");
$err_suc = fopen("sucursales_lugares.csv", "w");


// Saltar encabezado
$header = fgetcsv($enter_cargos, 0, ";");
fputcsv($ok_cargos, $header, ";");
fputcsv($err_cargos, $header, ";");

$header = fgetcsv($enter_eventos, 0, ";");
fputcsv($ok_eventos, $header, ";");
fputcsv($err_eventos, $header, ";");

$header = fgetcsv($enter_pmemb, 0, ";");
fputcsv($ok_pmemb, $header, ";");
fputcsv($err_pmemb, $header, ";");

$header = fgetcsv($enter_reg, 0, ";");
fputcsv($ok_reg, $header, ";");
fputcsv($err_reg, $header, ";");

$header = fgetcsv($enter_reservas, 0, ";");
fputcsv($ok_reservas, $header, ";");
fputcsv($err_reservas, $header, ";");

$header = fgetcsv($enter_socios, 0, ";");
fputcsv($ok_socios, $header, ";");
fputcsv($err_socios, $header, ";");

$header = fgetcsv($enter_suc, 0, ";");
fputcsv($ok_suc, $header, ";");
fputcsv($err_suc, $header, ";");

$n = count($eventos);
echo $n



?>