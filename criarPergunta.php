<?php

    // Inicializando antes do valor ser alterado
    $retorno=" ";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $pergunta = $_POST["pergunta"];
        $valor = $_POST["ponto"];    
        $dificuldade = $_POST["dificuldade"];
        // $id = $_POST["id"];
                
        
        // Conexão com BD
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $nomeBanco = "./jogo3daw"; // jogo3daw
        
        $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
        
        // Mensagem de erro se a conexão falhar
        if ($conn->connect_error){
            die("Conexão com erro: " . $conn->connect_error);
        } else {

            $sql = "select count(*) as total from alunos where pergunta = '$pergunta'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            if($row['total'] == 1) {
                $retorno = "Esta pergunta já existe <br><br>";
                
                } else {
                
                // Nome da tabela = questionario
    
                $insert = "INSERT INTO questionario (pergunta, pontos, dificuldade) VALUES ('$pergunta','$valor','$dificuldade')";

                mysqli_query($conn, $insert) or die (mysqli_error($conn));
                
                    $retorno = "Aluno cadstrado com sucesso!";
                
                }

                mysqli_close($conn);
        }
        
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
        <br><br>

        <h1>Jogo de perguntas e respostas</h1>
        <h3>O game é composto por vários desafios e cada desafio tem um objetivo específico, como por
        exemplo, gerenciar o andamento de um projeto, resolver um problema administrativo, contratar um
        novo funcionário, conceder um empréstimo e outros.
        </h3>

        
        <form action="criarPergunta.php" method=POST>
            <p>Informe sua pergunta:</p> <input type=text name="pergunta"></p>

            <p>Informe os pontos dela:</p> <input type=number name="ponto"></p>

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