<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
use setasign\Fpdi\Fpdi;
/**
 * @property usuario $usuario Classe de usuário
 * @property Doctrine $doctrine Biblioteca ORM
 */

class Report extends CI_Controller {

  /**
   * Método principal do mini-crud
   * 
   */
    /**
   * Método principal do mini-crud
   * @param nenhum
   * @return view
   */ 
    public function index(){   
        $chamar['usuarios'] = $this->doctrine->em->getRepository('usuario')->findAll();
       //$this->load->view('home', $chamar);       
    }
 
/**
 * Localiza o usuario para ser editado
 *
 * @param int $id
 */
public function imprime($id){    
 require ('application/plugins/fpdf/fpdf.php');
 $pdf = new FPDF("P","pt","A4");
 $titulo      =  "Colunas Planilhas";      
 $por_pagina  =  13;                                       
//ENDEREÇO ONDE SERÁ GERADO O PDF                
 $row = 10;
//if(!$row) { echo "Não retornou nenhum registro"; die; }
//CALCULA QUANTAS PÁGINAS VÃO SER NECESSÁRIAS
 $paginas   =  ceil($row/$por_pagina);  
 $linha_atual =  0;
 $inicio      =  0;
//PÁGINAS
    for($x=1; $x<=$paginas; $x++){
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
       $pdf->Ln(50);   

        //MONTA O CABEÇALHO
        //$pdf->Cell(15, 8, "", 1, 0, 'C');
       $pdf->Cell(100);
       $pdf->Cell(100, 15, "Nome:", 1, 0, 'L');
       $pdf->Cell(100, 15, "Email:", 1, 0, 'L');
       $pdf->Cell(100, 15, "Cellular:", 1, 1, 'L');

           //EXIBE OS REGISTROS  
       $post = $_POST;  
       $usuario = $this->doctrine->em->getRepository('usuario')->findOneBy(array('id'=>$id));
           //exit();  
       $pdf->Cell(100);
       $pdf->Cell(100,15,$usuario->getNome(),1, 0, 'C');
       $pdf->Cell(100,15,$usuario->getEmail(),1, 0, 'L');
       $pdf->Cell(100,15,$usuario->getCelular(),1, 1, 'L');
       $linha_atual++; 
    }
    //SAIDA DO PDF
    $pdf->Output();
} 

    public function imprimeAll1(){  
        require ('application/plugins/fpdf/fpdf.php');
        $pdf = new FPDF("P","pt","A4");
        $pdf->AddPage();                 
        $pdf->SetFont("Arial", "B", 10); 
        $pdf->Cell(100);   
        $pdf->Cell(100, 15, "Nome:", 1, 0, 'L');
        $pdf->Cell(100, 15, "Email:", 1, 0, 'L');
        $pdf->Cell(100, 15, "Cellular:", 1, 1, 'L');  
        $usuario = $this->doctrine->em->getRepository('usuario')->findAll();          
            foreach ($usuario as $users){
                $pdf->Cell(100);
                $pdf->Cell(100,15,$users->getNome(),1, 0, 'C');
                $pdf->Cell(100,15,$users->getEmail(),1, 0, 'L');
                $pdf->Cell(100,15,$users->getCelular(),1, 1, 'L');
            }        
        $pdf->Output();
    }

    /*public function imprimeAll1(){
      //use setasign\Fpdi;
      // setup the autoload function

      require_once('application/plugins/fpdi2/src/autoload.php');
      require_once('application/plugins/fpdi2/src/fpdi.php');

      // initiate FPDI
      $pdf = new Fpdi\Fpdi();
      // add a page
      $pdf->AddPage();
      // set the source file
      $pdf->setSourceFile('C:/Users/Predial/Desktop/DESK/Livro/somente_a_capa10082018.pdf');
      // import page 1
      $tplId = $pdf->importPage(1);
      // use the imported page and place it at point 10,10 with a width of 100 mm
      $pdf->useTemplate($tplId, 10, 10, 100);

      $pdf->Output();            
  }*/

    public function imprimeAllFuncionando(){     
     //namespace Entity;
     //use \Query;     
    
     require_once('application/plugins/fpdi2/src/autoload.php');
     //require_once('application/plugins/fpdi2/src/fpdi.php');
     require_once('application/plugins/fpdf/fpdf.php');   

        $pdf = new FPDF();
       // use setasign\Fpdi\Fpdi;

        // initiate FPDI
        $pdf = new Fpdi();
        // add a page
        $pdf->AddPage();
        // set the source file
        $pdf->setSourceFile('file:///C:/Users/Predial/Desktop/DESK/Livro/prestacao_5b368a3d74a2e.pdf');
       // $pdf->setSourceFile('https://dev.classecon.com.br/images/arquivos/prestacaoconta/prestacao_5b6b285777267.pdf');
        // import page 1
        $tplIdx = $pdf->importPage(1);
        // use the imported page and place it at position 10,10 with a width of 100 mm
        $pdf->useTemplate($tplIdx, 10, 10, 100);

        // now write some text above the imported page
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(255, 0, 0);
        $pdf->SetXY(30, 30);
        $pdf->Write(0, 'Pagina 001');

        $pdf->Output();
    }

    public function imprimeAll(){
            // Editar o arquivo original.pdf, adicionando uma frase: Comentário adicionado com o FPDI
            require_once('application/plugins/fpdi2/src/autoload.php');
            require_once('application/plugins/pdf2text/pdf2text.php');
            require_once('application/plugins/fpdf/fpdf.php');   
            // initiate FPDI
            $pdf = new Fpdi();
            // get the page count
            $pageCount =
            //Arquivo Ok.
            $file = 'file:///C:/Users/Predial/Desktop/DESK/Livro/SECOVI.pdf';
            //ok;
            //$file = 'file:///C:/Users/Predial/Desktop/DESK/gildelia/ClasseConPlanilhaOrc_5.pdf';
            //CORRIMPIDO:
            //$file = 'file:///C:/Users/Predial/Downloads/prestacao_5b63650dda0be.pdf';
            $filename = 'Custom file name for the.pdf'; /* Note: Always use .pdf at the end. */
            $arq  = fopen($file, 'r');
            $arquivo =  $file;
            $a = new PDF2Text();
            $a->setFilename($arquivo);
            $a->decodePDF();
            //echo $a->output();
            $saida=$a->output();
            /*if($saida=null){
                echo'Arquivo Corrompido!'.'<br />';
            }else{
                echo'Arquivo Válido!'.'<br />';
            }*/
            /*--------------------------------------------------*/
            $myfile = fopen($arquivo, "r") or die("Unable to open file!");
            $file=fread($myfile,filesize($arquivo));          
            $_verifica  = $file;
            $domain = strstr($_verifica, '.');
            //echo $domain; 
            // prints @example.com
            $existe = strstr($_verifica, '.', true); 
            echo $existe; // prints name
            if ($existe=='%PDF-1'){
                echo '<br />'.'ARQUIVO OK'.'<br />'.'<br />'.$saida;
            }elseif($saida=null||$existe!='%PDF-1'){
                echo '<br />'.'<br />'.'Arquivo Corrompido!'.'<br />'.'<br />';
            }
            fclose($myfile);  
           /*--------------------------------------------------*/
         //exit();       
        //$pdf->Output();
    }
     
}
