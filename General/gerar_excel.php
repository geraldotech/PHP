<?php
$html = "<meta charset='UTF-8'>";
$html .= "<table border='1'>
    <thead>
        <tr>
            <th colspan='5' style='text-align: center; font-size: 16px;'>Dados Pessoais</th>
        </tr>
        <tr>
            <th style='background: #2A3F54; color:#FFFFFF'>Grupo</th>
            <th style='background: #2A3F54; color:#FFFFFF'>Cod. Programa</th>
            <th style='background: #2A3F54; color:#FFFFFF'>Desc. Programa</th>
            <th style='background: #2A3F54; color:#FFFFFF'>Nome</th>
            <th style='background: #2A3F54; color:#FFFFFF'>Anonimizado</th>
        </tr>
    </thead>
    <tbody>";


    $dados = [
      [
          'grupo' => 'Administração',
          'cod_programa' => 'ADM001',
          'descricao_programa' => 'Gerenciamento de Recursos',
          'Nome' => 'Carlos Silva',
          'Anonimizado' => 'Não'
      ],
      [
          'grupo' => 'Financeiro',
          'cod_programa' => 'FIN123',
          'descricao_programa' => 'Controle Orçamentário',
          'Nome' => 'Fernanda Oliveira',
          'Anonimizado' => 'Sim'
      ],
      [
          'grupo' => 'Tecnologia',
          'cod_programa' => 'TEC456',
          'descricao_programa' => 'Desenvolvimento de Software',
          'Nome' => 'João Souza',
          'Anonimizado' => 'Não'
      ],
      [
          'grupo' => 'Recursos Humanos',
          'cod_programa' => 'RH789',
          'descricao_programa' => 'Gestão de Pessoas',
          'Nome' => 'Maria Santos',
          'Anonimizado' => 'Sim'
      ],
      [
          'grupo' => 'Marketing',
          'cod_programa' => 'MKT321',
          'descricao_programa' => 'Estratégias de Publicidade',
          'Nome' => 'Ana Costa',
          'Anonimizado' => 'Não'
      ]
  ];

foreach ($dados as $value) {
    $html .= "<tr>";
    $html .= "<td>" . htmlspecialchars($value['grupo'], ENT_QUOTES, 'UTF-8') . "</td>";
    $html .= "<td>" . htmlspecialchars($value['cod_programa'], ENT_QUOTES, 'UTF-8') . "</td>";
    $html .= "<td>" . htmlspecialchars($value['descricao_programa'], ENT_QUOTES, 'UTF-8') . "</td>";
    $html .= "<td>" . htmlspecialchars($value['Nome'], ENT_QUOTES, 'UTF-8') . "</td>";
    $html .= "<td>" . htmlspecialchars($value['Anonimizado'], ENT_QUOTES, 'UTF-8') . "</td>";
    $html .= "</tr>";
}

$html .= "</tbody></table>";

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=\"dados_pessoais_usuario.xls\"");
header("Content-Description: PHP Generated Data");

echo $html;
