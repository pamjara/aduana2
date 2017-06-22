
<?php


include"../inc/comun.php";

include"../fpdf/fpdf.php";


 $bd = new GestarBD;
 
 $x1=$_GET['codigo'];

date_default_timezone_set('America/santiago');
$hora = date('H:i:s a');
$fecha = date('d-m-Y ');
$fecha7dias = date('d-m-Y') ; 




class MiPDF extends FPDF {
	
	
	
	
	}
	
	
		
		
		$mipdf = new MiPDF();
		$mipdf -> addPage();

				$mipdf -> Setfont('Arial','B',10);
				$mipdf -> Ln (2);
				$mipdf -> Cell(200,10,"Lista De Ingresos $fecha",0,0,'C');
				$mipdf -> Ln (10);




				$mipdf -> SetFont('ARIAL','B', 9);
				$mipdf -> SetFillColor(0, 191, 255);
				$mipdf -> Cell(15,11,"Num",1,0,'C',true);
				$mipdf -> SetFont('ARIAL','B', 9);
				$mipdf -> SetFillColor(0, 191, 255);
				$mipdf -> Cell(20,11,"Fecha",1,0,'C',true);

				$mipdf -> SetFont('ARIAL','B', 9);
				$mipdf -> SetFillColor(0, 191, 255);
				$mipdf -> Cell(20,11,"Patente",1,0,'C',true);



				$mipdf -> SetFont('ARIAL','B', 9);
				$mipdf -> SetFillColor(0, 191, 255);
				$mipdf -> Cell(15,11,"DUS",1,0,'C',true);
				$mipdf -> SetFont('ARIAL','B', 9);
				$mipdf -> SetFillColor(0, 191, 255);
				$mipdf -> Cell(20,11,"K.B.",1,0,'C',true);
				$mipdf -> SetFont('ARIAL','B', 9);
				$mipdf -> SetFillColor(0, 191, 255);
				$mipdf -> Cell(15,11,"Pasajeros",1,0,'C',true);
				$mipdf -> SetFont('ARIAL','B', 9);
				$mipdf -> SetFillColor(0, 191, 255);
				$mipdf -> Cell(35,11,"Tipo Carga",1,0,'C',true);
				$mipdf -> SetFont('ARIAL','B', 9);
				$mipdf -> SetFillColor(0, 191, 255);
				$mipdf -> Cell(20,11,"N Sellos",1,0,'C',true);




			

				//$mipdf -> Image("../webcam/fotos/$imagen",10,43,30,"JPG");


	
		

	
	

	
	$mipdf -> Ln(10);
	
$sql="SELECT * FROM Ingresos where id_ingresos";
	//$consulta=mysql_query($conexion,$sql); 
$sql2=$bd->consulta($sql);

		//$fecha55=$fecha7dias;
	//$consulta55=mysql_query($conexion,$fecha55); 
	//$result=mysql_query($fecha55,$link) or die("Error: ".mysql_error());
$oye=0;

$num = 0; 


	while ( $datos = $bd-> mostrar_registros($sql2))
	{
	
	
		$num;


		$id_ingresos= $datos ['id_ingresos'];
		$numIngresos = $datos ['numIngresos'];
		$fechaIngresos = $datos ['fechaIngresos'];
		$patenteIngresos = $datos ['patenteIngresos'];
		$dusIngresos= $datos ['dusIngresos'];
		$kbingresos= $datos ['kbingresos'];
		$pasajerosIngresos = $datos ['pasajerosIngresos'];
		$estadoIngresos = $datos ['estadoIngresos'];
		$numSellos= $datos ['numSellos'];
		
		
		
		
		
		$fec=date('d-m-y',$fechai);
		$d=date('d',$fec);
		$m=date('m',$fec);
		$y=date('Y',$fec);
		
$dia=date(d);
$mes=date(m);
$ano=date(Y);

//fecha de nacimiento

$dianaz=4;
$mesnaz=2;
$anonaz=2005;

//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual

if (($mesnaz == $mes) && ($dianaz > $dia)) {
$ano=($ano-1); }

//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual

if ($mesnaz > $mes) {
$ano=($ano-1);}

//ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad

$edad=($ano-$anonaz);

		$fec=strtotime($parto);
		$fec=date('d-m-Y ',$fec);
		$d=date('d',$fec);
		$m=date('m',$fec);
		$y=date('Y',$fec);
		
		
		
		

 

			
		
		
			
		$mipdf -> Cell(15,5,"$numIngresos",1,0,'C');
		$mipdf -> Cell(20,5,"$fechaIngresos",1,0,'C');	
		$mipdf -> Cell(20,5,"$patenteIngresos",1,0,'C');
        $mipdf -> Cell(15,5,"$dusIngresos",1,0,'C');
		$mipdf -> Cell(20,5,"$kbingresos",1,0,'C');
		$mipdf -> Cell(15,5,"$pasajeroIngresos",1,0,'C');
        $mipdf -> Cell(35,5,"$estadoIngresos",1,0,'C');	
		$mipdf -> Cell(20,5,"$numSellos",1,0,'C');	 
		 
		  
		  
			
			
			
		
	
		$mipdf -> Ln(5);
		}
		
		
	
	/* $mipdf -> Cell(140,5,"",0,0,'C');
	$regu="select sum(horalec)+sum(potelec)-0.5
  from dlec";
$regu2=mysql_query($conexion,$regu);
$fila3 = mysqli_fetch_row($regu2);
$regu3 = $fila3[0];

$r="SELECT  count(horalec) FROM dlec";
$re=mysqli_query($conexion,$r);
$fil = mysqli_fetch_row($re);
$reg = $fil[0];


$pro=$reg/$oye;
*/	

	
	
	 

	 

	

	
		
		$mipdf -> Ln(10);
		$mipdf -> cell(178,5,"fecha : $fecha" , 0 , 10, true);
		$mipdf -> cell(178,1,"hora : $hora" , 0 , 10, true);
		

		
		$mipdf -> Output();
		class PDF extends FPDF
{
function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','I',8);
    // Print centered page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');

}
}
	
	

?>
