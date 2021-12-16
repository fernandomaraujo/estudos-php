<?php
	
	$mensagem = "";
	
    $reserva = $_GET["quarto"];
	$cama = $_GET["cama"];
    $dataEntrada = $_GET["dataEntrada"];
    $dataSaida = $_GET["dataSaida"];
    $diarias = $_GET["diarias"];
    
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $database = "faeterj3dawmanha2";
	

    $conn = new mysqli($servidor, $usuario, $senha, $database);
	

    if ($conn->connect_error){
        die("Conexão com erro: " . $conn->connect_error);
    } else {
		
	$sql = "select count(*) as total from reservas where reserva = '$reserva'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if($row['total'] == 1) {
		
		$mensagem = "Reserva já não mais disponível. Tente uma outra data.";
		
		} else {
		
		// Fim da Validação

		$insert = "INSERT INTO reservas (idQuarto, idCama, dataEntrada, dataSaida) 
        VALUES ('$reserva','$cama','$dataEntrada','$dataSaida')";

		// Validação se a inclusao foi efetuada com sucesso
		mysqli_query($conn, $insert) or die (mysqli_error($conn));
		
		$mensagem = "Reserva cadastrada com sucesso!";
		
		}
	
		mysqli_close($conn);
		
    }
	
	echo "$mensagem";
?>