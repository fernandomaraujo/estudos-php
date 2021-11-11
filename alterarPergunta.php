<?php

    // Buscando
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $matricula = $_GET["pergunta"];
        
        $retorno = " ";
            
        // Conexão com BD
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $nomeBanco = "jogo3daw";
        
        $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
        
        if ($conn->connect_error){
            die("Conexão com erro: " . $conn->connect_error);

        } else {
     
            $select = "SELECT * from questionario where pergunta = '$pergunta'";
      
            $result = $conn->query($select);

            $row = mysqli_fetch_assoc($result);
            
            if($row == 0) {
                $retorno = "Esta pergunta não existe <br><br>";

                } else {		
                    $pergunta = $row["pergunta"];
                    $valor = $row["ponto"];
                    $dificuldade = $row["dificuldade"];
                }
                

            mysqli_close($conn);			

            
        }
    }

    // Alterando

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pergunta = $_POST["pergunta"];
        $valor = $_POST["ponto"];    
        $dificuldade = $_POST["dificuldade"];
            
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $nomeBanco = "jogo3daw";
        
        $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
        
        if ($conn->connect_error){
            die("Erro na conexão: " . $conn->connect_error);
        } else {


        // Atualizar os dados no BD
        $alterar = "UPDATE questionario SET pergunta = '$pergunta', ponto = '$valor', dificuldade = '$dificuldade' where pergunta = '$pergunta' " ;
        
        if (@mysqli_query($conn, $alterar)){
            
            $retorno = "Alteração feita";
            
            } else {
                
                die (mysqli_error($conn));
                $retorno = "Erro na alteração";
                
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
        <h3>Buscando e alterando perguntas</h3>

        <!-- Buscar pergunta -->
        <form action="alterarPergunta.php" method=GET>

			<p>Pergunta: <input type=text name="pergunta">
				<input type="submit" value="Buscar">
			</p>

		</form>

        <!-- Pergunta veio, agora é alterar ela -->
        <form action="alterarPergunta.php" method=POST>
            <p>Informe sua pergunta:</p> <input type=text name="pergunta"></p>

            <p>Agora quantos pontos vai valer:</p> <input type=number name="ponto"></p>

            <br>

            <label for="dificuldade">E seu nível de dificuldade:</label>

            <select name="dificuldade" id="dificuldade">
                <option value="facil">Fácil</option>
                <option value="media">Média</option>
                <option value="dificil">Difícil</option>
                <option value="muitodificil">Muito difícil</option>
            </select>

            <input type="submit" value="Enviar">
        </form>

        <p>
            <?php echo "<p>$retorno</p> <br>" ?>
        </p>

    </body>
</html>