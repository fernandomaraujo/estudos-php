<!DOCTYPE html>
  <html>

    <!--
      Verificar se os valores são iguais, identicos, diferentes,
      qual deles é o maior e verificar se são maior ou igual a 5 e menor ou igual a 6.
    -->

    <head>
      <style>

        * {
          font-family: sans-serif;
        }

        input[type="text"] {
          height: 40px;
          width: 100px;
        }

        input[type="submit"] {
          height: 40px;
          width: 100px;
          margin-left: 29px;
        }
        

      </style>
    </head>

    <body>

      <?php
        // Operadores Comparação ==, ===, !=, <>, >, <, >=, <=, <=>
        
        // Variáveis
        $x = intval($_POST["var1"]);
        $y = intval($_POST["var2"]);

      ?>

      <h1>Compara valores informados</h1>

      <form action="ex10_ComparaValores.php" method=POST>

        <h3>Valores<h3>
        
        1°: <input type=text name="var1">
        2°: <input type=text name="var2">

        <input type="submit">

        <p>Resultado: </p>

      </form>

      <?php

        function maiorValor($num1, $num2) {

          // Se o primeiro número é maior
          if ($num1 > $num2) {

            echo "$num1 é maior que $num2";
            echo "<br>";

          } elseif ($num1 < $num2) {
            // Se o segundo número é maior

            echo "$num2 é maior que $num1";
            echo "<br>";

          }
        }

        function checandoValores($num1, $num2) {

          if($num1 >= 5 && $num1 <= 6) {
            echo "$num1 está entre 5 e 6";
          }

          if($num2 >= 5 && $num2 <= 6) {
            echo "$num2 está entre 5 e 6";
          }

        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

          if($x == $y) {
            echo "Números iguais";
            echo "<br>";

          } elseif ($x === $y) {
            echo "Números identicos";
            echo "<br>";

          } elseif ($x != $y) {
            echo "Números diferentes";
            echo "<br>";

            // Se números são diferentes, checa qual maior
            maiorValor($x, $y);
          } 

          // Verificando se maior ou igual a 5
          // e menor ou igual a 6
          checandoValores($x, $y);

        }
      ?>

    </body>
  </html>