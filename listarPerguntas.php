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
        <h3>Listando perguntas</h3>

        <!-- Listando perguntas -->
        <table>
            <th>Pergunta(s) do jogo</th>
            <tr>
                <td>Pergunta</td>
            </tr>

            <?php

                $servidor = "localhost";
                $usuario = "root";
                $senha = "";
                $nomeBanco = "jogo3daw";

                $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);

                if ($conn->connect_error){
                    die("Conexão com erro: " . $conn->connect_error);
                }

                $comandoSQL = "SELECT * FROM questionario ";

                $result = $conn->query($comandoSQL);

                while($linha = $result->fetch_assoc()) {
                    $pergunta = $linha["pergunta"];
                    $valor = $linha["ponto"];
                    $dificuldade = $linha["dificuldade"];


                    echo "
                    <tr>
                        <td>$pergunta</td>
                    
                        
                        <td>
                            <a href='alterarPergunta.php?matricula=$pergunta'>
                                Alterar
                            </a>
                        </td>
                        <td>
                            <a href='excluirPergunta.php?matricula=$pergunta'>
                                Excluir
                            </a>
                        </td>
                    </tr>
                        ";
                }

                /**
                 *     <td>$valor</td> <td>$dificuldade</td>
                 */

            ?>

        </table>

    </body>
</html>