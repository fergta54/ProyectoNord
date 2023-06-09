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

$pdf = new MYPDF('L', 'mm', 'Letter', true, 'UTF-8', false);

$pdf->SetMargins(20, 35, 25);
$pdf->SetHeaderMargin(20);
$pdf->SetPrintFooter(false);
$pdf->SetPrintHeader(true);
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

$pdf->SetCreator('juanperez');
$pdf->SetAuthor('Juan Perez');
$pdf->SetTitle('Reporte de Clientes');


$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 10);
$pdf->SetXY(240, 20);
$pdf->Write(0, 'Codigo: 0014122');
$pdf->SetXY(240, 25);
$pdf->Write(0, 'Fecha: '. date('d-m-y'));
$pdf->SetXY(240, 30);
$pdf->Write(0, 'Hora: '. date('h:i A'));

$canal = 'NORDSTERN';
$pdf->SetFont('helvetica', 'B', 10);
$pdf->SetXY(15, 25);
// $pdf->SetTextColor(204,0,0);
// $pdf->Write(0, 'Desarrollador: juan perez');
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(15, 20);
$pdf->Write(0, 'Empresa: '. $canal);



$pdf->Ln(35);
$pdf->Cell(40,26,'',0,0,'C');
$pdf->SetTextColor(34,68,136);
$pdf->SetFont('helvetica','B', 15);
$pdf->Cell(180,6,'LISTA DE CLIENTES',0,0,'C');


$pdf->Ln(10);
$pdf->SetTextColor(0,0,0);

$pdf->SetFIllColor(232,232,232);
$pdf->SetFont('helvetica', 'B', 12);

$pdf->Cell(40,6,'Nombre',1,0,'C',1);
$pdf->Cell(40,6,'Apellido',1,0,'C',1);
$pdf->Cell(55,6,'Correo',1,0,'C',1);
$pdf->Cell(55,6,'Direccion',1,0,'C',1);
$pdf->Cell(40,6,'Telefono',1,0,'C',1);
$pdf->Cell(30,6,'Estado',1,1,'C',1);


$pdf->SetFont('helvetica','',10);


//SQL para las consultas

$sqlTrabajadores = ("SELECT id_cliente  as Nro,nombre_cli as Nombre, apellido_cli as Apellido,
correo_cli as Correo ,direccion_cli as Direccion,telf_cli  as Telefono , estado_cli as Estado
FROM clientes order by Estado, Nombre");

$query = mysqli_query($conexion, $sqlTrabajadores);

while($dataRow = mysqli_fetch_array($query)) {
    $pdf->Cell(40,6,($dataRow['Nombre']),1,0,'C');
    $pdf->Cell(40,6,($dataRow['Apellido']),1,0,'C');
    $pdf->Cell(55,6,($dataRow['Correo']),1,0,'C');
    $pdf->Cell(55,6,($dataRow['Direccion']),1,0,'C');
    $pdf->Cell(40,6,($dataRow['Telefono']),1,0,'C');
    $pdf->Cell(30,6,($dataRow['Estado']==1?"ACTIVO":"INACTIVO"),1,1,'C');

}

//$pdf->AddPage();
$pdf->Output('Reporte_Clientes_'.date('d_m_y').'.pdf', 'I');


?>