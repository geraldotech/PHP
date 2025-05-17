<?php 

 require_once('../vendors/fpdf186/fpdf.php'); // Para instalação manual
// require_once 'vendor/autoload.php'; // Para instalação via Composer

$pdf = new fpdf();
$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 16);


 //$logs = file_get_contents(dirname(__DIR__). '/error_log');
 $logs = "Geraldo de Logs\n";

// $pdf->Cell(0, 10, 'Testando TCPDF!', 1, 1, 'C');
 $pdf->Cell(0, 10, $logs, 1, 1, 'C');
$pdf->Output('teste.pdf', 'I');
