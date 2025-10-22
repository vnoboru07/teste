<?php  
	$domain="localhost";// localização
	$user="root";		// usuário
	$password="";		// senha
	$database="loja";	// banco de dados	

	// variavel com o tipo objeto mysqli
	$mysqli = new mysqli($domain,$user,$password,$database); //seguir sequencia no parametro
	$mysqli->set_charset("utf8");  //caracter banco
	
	if($mysqli->connect_errno){//verificar erro
		echo "Não foi possível conectar com o banco de dados ";
		echo $mysqli->connect_error; 
	} // mostra mensagem em caso de erro
?>