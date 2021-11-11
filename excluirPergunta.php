<?php

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $pergunta = $_GET["pergunta"];
            
        // Conexão com BD
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $nomeBanco = "jogo3daw";
        
        $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
        

        if ($conn->connect_error){

            die("Conexão com erro: " . $conn->connect_error);

        } else {

        $excluir = "DELETE from questionario where pergunta = '$pergunta'";

        $result = $conn->query($excluir);

    
        if($result != 0){
            $retorno = "Pergunta foi excluída <br><br>";
   
            } else {		
                echo "Erro, não foi possível excluir a pergunta: $pergunta! <br><br>";
            }		
        }
        
        mysqli_close($conn);
        
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>3DAW - AV1 | Fernando Araujo</title>

        <style>
        
            ul {
                list-style-type: none;
            }

            li {
                float: left;
            }

            a {
                display: block;
                padding: 8px;
                background-color: #dddddd;
            }

        </style>

    </head>

    <body>

        <!-- C, R, U, D -->
        <ul>
            <li><a href="criarPergunta.php">Criar</a></li>
            <li><a href="listarPerguntas.php">Listar</a></li>
            <li><a href="alterarPergunta.php">Alterar</a></li>
            <li><a href="excluirPergunta.php">Excluir</a></li>
        </ul>

        <h1>Jogo de perguntas e respostas</h1>
        <h3>Excluindo pergunta</h3>

        <!-- Excluindo perguntas -->
        <form action="alterarPergunta.php" method=GET>
			<p>Pergunta: <input type=text name="pergunta">
				<input type="submit" value="Excluir">
			</p>
		</form>

        <p>
            <?php echo "<p>$retorno</p> <br>" ?>
        </p>

    </body>
</html>