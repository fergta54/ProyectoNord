<?php
require_once('../../recursos/tcpdf/tcpdf.php');
include('../../conexion.php');
date_default_timezone_set('America/Puerto_Rico');

ob_end_clean();

class MYPDF extends TCPDF{
    public function Header(){
        $bMargin  = $this->getBreakMargin();
        $auto_page_break = $this->AutoPageBreak;
        $this->SetAutoPageBreak(false, 0);
        $img_file = realpath(dirname( __FILE__ )) .'../recursos/img/logo.png';
        $this->Image($img_file, 85, 8, 20, 25, '', '', '', false, 30, '', false, false, 0);
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->setPageMark();
    }
}

$pdf = new MYPDF('P', 'mm', 'Letter', true, 'UTF-8', false);

$pdf->SetMargins(20, 35, 25);
$pdf->SetHeaderMargin(20);
$pdf->SetPrintFooter(false);
$pdf->SetPrintHeader(true);
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

$pdf->SetCreator('juanperez');
$pdf->SetAuthor('Juan Perez');
$pdf->SetTitle('Reporte de Inventario');


$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 10);
$pdf->SetXY(150, 20);
$pdf->Write(0, 'Codigo: 0014122');
$pdf->SetXY(150, 25);
$pdf->Write(0, 'Fecha: '. date('d-m-y'));
$pdf->SetXY(150, 30);
$pdf->Write(0, 'Hora: '. date('h:i A'));

$canal = 'NORDSTERN';
$pdf->SetFont('helvetica', 'B', 10);
// $pdf->SetXY(15, 20);
// $pdf->SetTextColor(204,0,0);
// $pdf->Write(0, 'Desarrollador: juan perez');
// $pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(15, 25);
$pdf->Write(0, 'Empresa: '. $canal);



$pdf->Ln(35);
$pdf->Cell(40,26,'',0,0,'C');
$pdf->SetTextColor(34,68,136);
$pdf->SetFont('helvetica','B', 15);
$pdf->Cell(100,6,'LISTA DE INVENTARIO',0,0,'C');


$pdf->Ln(10);
$pdf->SetTextColor(0,0,0);

$pdf->SetFIllColor(232,232,232);
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(20,6,'Nro',1,0,'C',1);
$pdf->Cell(40,6,'Tienda',1,0,'C',1);
$pdf->Cell(80,6,'Producto',1,0,'C',1);
$pdf->Cell(40,6,'Stock',1,1,'C',1);


$pdf->SetFont('helvetica','',10);


//SQL para las consultas

$sqlTrabajadores = ("SELECT * FROM inventarios inner join tiendas on inventarios.id_tienda = tiendas.id_tienda inner join productos on inventarios.id_producto = productos.id_prod");

$query = mysqli_query($conexion, $sqlTrabajadores);

while($dataRow = mysqli_fetch_array($query)) {
    $pdf->Cell(20,6,($dataRow['id_inventario']),1,0,'C');
    $pdf->Cell(40,6,($dataRow['nombre_tienda']),1,0,'C');
    $pdf->Cell(80,6,($dataRow['nombre_prod']),1,0,'C');
    $pdf->Cell(40,6,($dataRow['stock_inventario']),1,1,'C');

}

//$pdf->AddPage();
$pdf->Output('Reporte_Inventario_'.date('d_m_y').'.pdf', 'I');


?>