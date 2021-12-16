<?php
	
	$mensagem = "";
	
    $nome = $_GET["nome"];
	$endereco = $_GET["endereco"];
    $postalCode = $_GET["postalCode"];
    $pais = $_GET["pais"];
    $cpf = $_GET["cpf"];
    $passaporte = $_GET["passaporte"];
    $email = $_GET["email"];
    $dataNascimento = $_GET["dataNascimento"];
    
 	
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $database = "faeterj3dawmanha2";
	

    $conn = new mysqli($servidor, $usuario, $senha, $database);
	

    if ($conn->connect_error){
        die("Conexão com erro: " . $conn->connect_error);
    } else {
		
	$sql = "select count(*) as total from clientes where nome = '$nome'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if($row['total'] == 1) {
		
		$mensagem = "Cliente já cadastrado!";
		
		} else {
		
		// Fim da Validação

		$insert = "INSERT INTO clientes (nome, endereco, postalCode, pais, cpf, passaporte, email, dataNascimento) 
        VALUES ('$nome','$endereco','$postalCode','$pais','$cpf','$passaporte','$email','$dataNascimento')";

		// Validação se a inclusao foi efetuada com sucesso
		mysqli_query($conn, $insert) or die (mysqli_error($conn));
		
		$mensagem = "Cliente cadastrada(o) com sucesso!";
		
		}
	
		mysqli_close($conn);
		
    }
	
	echo "$mensagem";
?>