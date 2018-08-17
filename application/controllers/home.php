<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

 
/**
 * @property usuario $usuario Classe de usuário
 * @property Doctrine $doctrine Biblioteca ORM
 */

/**
	 * Método principal do mini-crud
	 * 
 	 */
    /**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */	
class Home extends MY_Controller {

	
     // require_once ('controllers/login.php');     
     //$banana = $usuario->minhaFuncaoDaClasseUm();


	public function index()	{
		require_once "application/controllers/login.php";
         $us = new Login();
		 $sessao = $us->logar = $this->session->userdata('usuario');
         $chamar['us'] = $sessao;
        //var_dump($user['us']);
       // exit();

      // require_once ('controllers/login.php');     
     //$banana = $usuario->minhaFuncaoDaClasseUm();
	//chamada da funcao da minha classe Login utilizando OO
	
	
	//mostrar o usuario Logado na sessao	 
   
    //exit();
    //foreach para a visao do usuario	  
	 $chamar['usuarios'] = $this->doctrine->em->getRepository('usuario')->findAll();
	 $this->load->view('admin/home', $chamar);



  	}


  	public function restserver()	{
		    
    // $dados['usuarios']= $this->doctrine->em->getRepository('usuario')->findAll();
  		//findBy(array('age' => array(20, 30, 40)
 //$dados['usuarios'] = $this->doctrine->em->getRepository('usuario')->findAll();
 //$admins = $this->doctrine->em->getRepository('usuario')->geNome();
    // $this->nome
     //$dados['usuarios']->nome=getNome();
      /*$myObj->name = "John";
      $myObj->age = 30;
      $myObj->city = "New York";

   $myJSON = json_encode($myObj);  
   echo $myJSON . "<br/>";
   exit(); */ 

   $list = array();
   $list[0]['userId'] = 1;
   $list[0]['title'] = "Vamos pegar este rest e botar na API!!![-_-]";  
   $list[0]['body'] = "TESTE DO REST com JSON!!!"; 
   echo $myJSON = json_encode($list[0]) . "<br/>";
   exit();
   // $dados['usuarios'] = json_encode($dados['usuarios']);
   // $nome= $this->get('nome');
   // echo  $dados['usuarios'] . "<br/>"; 
   // exit();    
	

	 $this->load->view('admin/restserver', $dados);



  	}





	/**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */	 	 
      public function Cadastrar(){
   //	$logged = $this->session->userdata('logged');   
        $usuario['usuarios'] = new usuario();        			
		
				$this->load->view('admin/cadastro' ,$usuario);				
				//redirect(site_url('admin/cadastro',$usuario));  
				//redirect('cadastro',$usuario);
			//}		
	}


	 /**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */	 
   public function Salvar(){

   	$post = $_POST;
   //var_dump($post);
   	//exit();  
        $usuario['usuarios'] = new usuario();
        $usuario['usuarios']->setNome($post['nome']);
        $usuario['usuarios']->setEmail($post['email']);  
        $usuario['usuarios']->setCelular($post['celular']);
        $usuario['usuarios']->setTelefone($post['telefone']); 
        $usuario['usuarios']->setIdade($post['idade']);                             
                  
         $this->doctrine->em->persist($usuario['usuarios']);
         $this->doctrine->em->flush(); 
         redirect();
         redirect(site_url('admin/home',$usuario));  			
		// Carrega a view 
		//$this->load->view('cadastro',$usuario);
        //$this->load->view('cadastro',$usuario);

	} 



 /**
  * Processa o formulário para salvar os dados
  */
    /**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */	 
    public function Editar($id){
		// Recupera o ID do registro - através da URL - a ser editado
		//$id = $this->uri->segment(2);
		/*echo ('testes');//$id = $this-> uri->segment(2);
		exit();*/
		// Se não foi passado um ID, então redireciona para a home
		if(is_null($id))
		redirect();		
		// Recupera os dados do registro a ser editado		
		 $usuario['usuarios'] = $this->doctrine->em->getRepository('usuario')->findOneBy(array('id'=>$id));
		//echo($id);
		//exit();
		if ($usuario['usuarios'] instanceof usuario)
        {
          //  echo ' Nome: ' . $usuario['usuarios']->getNome() . '<br>';
        }
        else
        {
            echo 'Usuário não localizado';
        }
       // exit();
		
		// Carrega a view passando os dados do registro
		$this->load->view('admin/editar',$usuario);

	}


	 /**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */	 
   public function Atualizar(){
   	$post = $_POST;
   //	var_dump($post['id']);		
			// Checa o status da operação gravando a mensagem na seção
   	        
			// Atualiza os dados no banco recuperando o status dessa operação
			//$status = $usuario['usuarios'] instanceof usuario;
$users=$usuario['usuarios'] = $this->doctrine->em->getRepository('usuario')->findOneBy(array('id'=>$post['id']));
//var_dump($usuario['usuarios']->getId());
//exit();
//$usuario = new usuario();
        $users ->setNome($post['nome']);
        $users ->setEmail($post['email']);
        $users ->setTelefone($post['telefone']);
        $users ->setCelular($post['celular']);
        $users ->setIdade($post['idade']);
		//$usuario = new usuario();          
          $this->doctrine->em->persist($usuario['usuarios']);
          $this->doctrine->em->flush(); 

			if(!$post['id']){
				echo 'Não foi possivel editar usuario';
			}else{
				echo 'OK.Usuário Editado com sucesso!!!!';
				// Redireciona o usuário para a home
				redirect();
			}		
		// Carrega a view para edição
		$this->load->view('editar',$usuario);
	}



	 /**
     * Localiza o usuario para ser editado
     *
     * @param int $id
     */
	public function Excluir($id){		

	$usuario['usuarios'] = $this->doctrine->em->getRepository('usuario')->findOneBy(array('id'=>$id));	
          $this->doctrine->em->remove($usuario['usuarios']);
          $this->doctrine->em->flush(); 
		// Checa o status da operação gravando a mensagem na seção
		if(!$usuario!=null){
				echo 'Não foi possivel excluir o usuario';
			}else{
				echo 'Usuário Excluído com sucesso!!!!';
				// Redireciona o usuário para a home
				redirect();
			}	
		// Redirecionao o usuário para a home
		/*
		if ($entity != null){
                $em->remove($entity);
                $em->flush();
		*/
	}     



}


   





	





