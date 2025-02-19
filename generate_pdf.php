<?php
    session_start();
    
    if(!isset($_SESSION["login"])){
        header("Location: index.php");
    }
    
    $driver_id = $_GET['id'];
    $fileName = 'driver-' . $driver_id . '.pdf';

    require('fpdf/fpdf.php');

    $pdf = new FPDF('P','mm','A4');
    $pdf->AddPage();
    $pdf->Image('images/pdf.png', 0, 48, 210, 250, 'PNG');
    $pdf->Image('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl='.$driver_id, 32, 70, 150, 150, 'PNG');
    $pdf->SetFont('Arial', 'B', 28);
    $pdf->Ln(10);
    $pdf->Ln(10);
    $pdf->Ln(235);
    $pdf->Cell(0,-100,'SCAN ME',0,0,'C');

    $pdf->Output($fileName,"I");
        
?>
