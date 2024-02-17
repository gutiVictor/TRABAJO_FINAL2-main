<?php

require_once ('../fpdf186/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->image('../assets/logo-university.png', 92, 8, 20); // X, Y, Tamaño
    $this->Ln(20);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
  
    // Movernos a la derecha
    $this->Cell(60);

    // Título
    $this->Cell(70,10,'Tabla de Alumnos ',0,0,'C');


     
    // Salto de línea
   
    $this->Ln(30);
    $this->SetFont('Arial','B',10);
    $this->SetX(40);
    $this->Cell(55,10,'Nombre',1,0,'C',0);
    $this->Cell(25,10,'Ciudad',1,0,'C',0,);
    $this->Cell(27,10,'Telefono',1,0,'C',0);
    $this->Cell(25,10,'Clase',1,1,'C',0);
	

  
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
  
    $this->Cell(0,10,'--- Creado por Marvel studios ---' ,0,0,'C');
 
   //$this->SetFillColor(223, 229,235);
    //$this->SetDrawColor(181, 14,246);
    //$this->Ln(0.5);
    // pie de pagina
  
}
}
function verClase($id_clase, $conexion)
{
    $query = mysqli_query($conexion, "SELECT clase FROM clases WHERE id = '$id_clase'");
    $fila = mysqli_fetch_array($query);
    return $fila ? $fila['clase'] : 'No asignada';
}
$conexion = mysqli_connect("localhost", "root", "", "universidad");
        $SQL = "SELECT alumnos.id, alumnos.nombre,alumnos.ciudad,  alumnos.telefono, alumnos.id_clase
         FROM alumnos";

$resultado = mysqli_query($conexion, $SQL);

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
//$pdf->SetWidths(array(10, 30, 27, 27, 20, 20, 20, 20, 22));
while ($row=$resultado->fetch_assoc()) {

    $pdf->SetX(40);

    $pdf->Cell(55,10,$row['nombre'],1,0,'C',0);
    $pdf->Cell(25,10,$row['ciudad'],1,0,'C',0);
	$pdf->Cell(27,10,$row['telefono'],1,0,'C',0);
    $alumno= verClase($row['id_clase' ], $conexion);
    $pdf->Cell(25,10,$alumno,1,1,'C',0);
	


} 


	$pdf->Output();



       
?>
