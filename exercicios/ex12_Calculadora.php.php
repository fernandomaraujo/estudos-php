<!DOCTYPE html>
  <html>
    <head>
    <title>Calculadora - 3DAW</title>

      <!-- CSS não era obrigatório, mas quis mexer pra eu desenferrujar um pouco -->
      <style>

        * {
          font-family: sans-serif;
        }

        body {
          background-color: #212121;
          color: #F7F7F7;
        }

        h1 {
          text-align: center;
          color: #BB86FC;
        }

        form {
          border: solid #BB86FC 2px;
          width: 460px;
          margin-left: auto;
          margin-right: auto;

          padding: 30px;
        }

        input {
          height: 50px;
          width: 50px;
        }

        input[type="text"] {
          height: 40px;
          width: 100px;
        }

      </style>

    </head>
    <body>
      <h1>Calculadora</h1>
      <br>

      <form action="ex12_Calculadora.php" method=POST>

          1°: <input type=text name="var1">
          2°: <input type=text name="var2">

          <br><br>

          <input type="submit" value="+" name="operation">
          <input type="submit" value="-" name="operation">
          <input type="submit" value="x" name="operation">
          <input type="submit" value="/" name="operation">
          <input type="submit" value="exp" name="operation">
          <input type="submit" value="raiz" name="operation">

          <p>Resultado: </p>
          <?php

            // +
            function soma($num1, $num2) {
              echo $num1 + $num2;
            }

            // -
            function sub($num1, $num2) {
              echo $num1 - $num2;
            }

            // x
            function mult($num1, $num2) {
              echo $num1 * $num2;
            }

            // /
            function div($num1, $num2) {
              echo $num1 / $num2;
            }

            // %
            function rest($num1, $num2) {
              echo $num1 % $num2;
            }

            // exponenciação
            function expon($num1, $num2) {
              echo pow($num1, $num2);
            }

            // raiz
            function raiz($num1) {
              echo sqrt($num1);
            }

            // Variáveis
            $x = $_POST["var1"];
            $y = $_POST["var2"];
            $opcao = $_POST['operation'];

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                // Opções
                switch($opcao) {

                  case '+':
                    soma();
                    break;
                  
                  case '-':
                    sub($x, $y);
                    break;
                  
                  case 'x':
                    mult($x, $y);
                    break;

                  case '/':
                    div($x, $y);
                    break;

                  case '%':
                    rest($x, $y);
                    break;

                  case 'exp':
                    expon($x, $y);
                    break;
  
                  case 'raiz':
                    raiz($x);
                    break;
                }
            }

          ?>

      </form>
      
    </body>

  </html>