<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mini-Crud com Bootstrap e CodeIgniter 3.0</title>   
     <link href="<?php echo base_url(); ?>includes/bootstrap/css/bootstrap/bootstrap.min.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>includes/bootstrap/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet">	

<div class="container">
	<div class="page-header">
		<h1>Criando um CRUD com CodeIgniter & Doctrine</h1>
	</div>
	

	<form method="post" action="<?=base_url()?>home/Atualizar" enctype="multipart/form-data">
      
		<div class="col-md-4">
			<div class="form-group">
				<label>Nome:</label>
				<input type="text" name="nome" class="form-control" value="<?=$usuarios->getNome()?>" required/>
				<label>Email:</label>
				<input type="text" name="email" class="form-control" value="<?=$usuarios->getEmail()?>" required/>
				<label>Telefone:</label>
				<input type="text" name="telefone" class="form-control" value="<?=$usuarios->getTelefone()?>" required/>
				<label>Cellular:</label>
				<input type="text" name="celular" class="form-control" value="<?=$usuarios->getCelular()?>" required/>
				<label>Idade:</label>
				<input type="text" name="idade" class="form-control" value="<?=$usuarios->getIdade()?>" required/>
			</div>
		</div>    
		
		<div class="col-md-4">
			<label><em>Todos os campos são obrigatórios.</em></label>
			<div class="clearfix"></div>
			<input type="hidden" name="id" value="<?=$usuarios->getId()?>"/>
			<input type="submit" value="Salvar" class="btn btn-success" />
		</div>
	</form>
</div>


