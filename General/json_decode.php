<?php
session_start();

$data = [
    "idEmpresa" => 1,
    "idLegEmpresa" => "LEGRAND",
    "razaoSocial" => "TOTVS LEGRAND",
    "matriz" => 1,
    "cnpj" => "99999968",
    "integration_data" => '{"execBO": {"url": "a2geraldo.com", "Sistema": "1", "integra": "false", "password": "", "userLogin": "", "localEntrega": "", "sistemaIntegra": "datasul-ERP"}}',
    "logo" => "",
    "modo_homologacao" => 1,
    "a_instancia_rh" => 0,
    "a_setup" => "S"
];

// Decodificar os dados de integração em JSON
$instancia = json_decode($data['integration_data'], true);

// Verificar e definir o sistema com base no valor de 'Sistema'
$id_sistema = $instancia['execBO']['Sistema'] ?? null;
$_SESSION['sistema'] = $id_sistema == 1 ? 'D' : 'P';


print_r($_SESSION);