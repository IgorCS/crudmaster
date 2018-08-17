<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



/**
 * @property usuario $usuario Classe de usuário
 * @property Doctrine $doctrine Biblioteca ORM
 */
class Relatorio extends CI_Controller { 
	/**
	 * Método principal do mini-crud
	 * 
 	 */
    /**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */	
	public function relatorio(){

		//require("fpdf.php");
	require ('application/plugins/fpdf/fpdf.php');
		//require_once APPPATH."application/plugins/fpdf/fpdf.php";

  $pdf = new FPDF("P","pt","A4");
       //INICIALIZA AS VARIÁVEIS
//VERIFICA SE RETORNOU ALGUMA LINHA


        //TÍTULO DO RELATÓRIO                                     
$titulo      =  "Colunas Planilhas";                 
//LOGO QUE SERÁ COLOCADO NO RELATÓRIO                     
//$imagem      =  "logo_imasters.png";                      
//ENDEREÇO DA BIBLIOTECA FPDF                             
//$end_fpdf    =  "c:/pagina/biblioteca/fpdf";              
//NUMERO DE RESULTADOS POR PÁGINA                         
$por_pagina  =  13;                                       
//ENDEREÇO ONDE SERÁ GERADO O PDF                         
//$end_final   =  "c:/pagina/imasters/110/artigo_php.pdf";  
//TIPO DO PDF GERADO                                      
//F-> SALVA NO ENDEREÇO ESPECIFICADO NA VAR END_FINAL     
//$tipo_pdf    =  "F"; 


/*var_dump($row = array('joao', 'maria', 'Mario','Chico', 'Astrogildo', 
	              'Neguim','Braulio', 'Igor', 'Marcio','Julielson',
	              'Joazim', 'Fernando', 'Marciana','Natan',
	              'Janio', 'Florencio', 'Joao Marcio','Ramon'));
exit();*/

//print_r($row);


$row = 10;



//if(!$row) { echo "Não retornou nenhum registro"; die; }

//CALCULA QUANTAS PÁGINAS VÃO SER NECESSÁRIAS
$paginas   =  ceil($row/$por_pagina);  

$linha_atual =  0;
$inicio      =  0;

//PÁGINAS
for($x=1; $x<=$paginas; $x++) {
   //VERIFICA
   $inicio      =  $linha_atual;
   $fim         =  $linha_atual + $por_pagina;
   if($fim > $row) $fim = $row;
   
   //$pdf->Open();                    
   $pdf->AddPage();                 
   $pdf->SetFont("Arial", "B", 10); 
   
   //MONTA O CABEÇALHO              
   //$pdf->Image($imagem, 0, 8);
   $pdf->Ln(2);
   $pdf->Cell(185, 8, "Página $x de $paginas", 0, 0, 'R');          
   
   //QUEBRA DE LINHA
   $pdf->Ln(20);
   
           
   $pdf->Cell(130, 15, "Nome:", 1, 0, 'L'); 
   $pdf->Cell(130, 15, "Email:", 1, 0, 'L'); 
   $pdf->Cell(130, 15, "Cellular:", 1, 1, 'L'); 


   //$pdf->Cell(130, 15, "Cellular:", 1, 0, 'C');

   /*
   for($i= 1; $i <10;$i++){
    $pdf->Cell(130,20,"Linha ".$i,1,0,"L");
    $pdf->Cell(140,20,rand(),1,0,"L");
    $pdf->Cell(130,20,rand(),1,0,"L");
    $pdf->Cell(160,20,rand(),1,1,"L");
}
   */  
   
   //EXIBE OS REGISTROS      
   for($i=$inicio; $i<$fim; $i++) {
   	$pdf->Cell(130,15,rand(),1,0,"L");
    $pdf->Cell(130,15,rand(),1,0,"L");
    $pdf->Cell(130,15,rand(),1,1,"L");
   
	  $linha_atual++;
   }//FECHA FOR(REGISTROS - i)
}//FECHA FOR(PAGINAS - x)

//SAIDA DO PDF
$pdf->Output();
	  }		

}


    /*
    <?php
require('fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Output();
?>
    */
        
     

