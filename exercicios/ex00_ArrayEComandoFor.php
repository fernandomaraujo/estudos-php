<!DOCTYPE html>

  <?php
          

  ?>

  <html lang="pt-br">
    <head>

    <style>

      * {
        font-family: sans-serif;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        padding: 20px;
      }

      th {
        background-color: #7c5aa4;
        color: white;
      }

      th, td {
        padding: 15px;
        text-align: left;

        border-bottom: 1px solid #ddd;
      }

    </style>

    </head>

    <body>

      <h1>Tabela</h1>

      <table>

        <tr>
          <th>Nome</th>
          <th>Email</th>
          <th>Idade</th>
          <th>Media</th>
        </tr>
        
        <?php
          
          $nomes = array( "Ted", "Barney", "Marshall");
          $idades = array( 31, 30, 44);
          $emails = array ("ted@gmail.com","barney@gmail.com","marshall@gmail.com");
          $medias = array ( 7.5, 7.2, 8.7);

          for ($x=0; $x<=2; $x++)
          {
            echo "<tr>";
            echo "<td>$nomes[$x]</td>";
            echo "<td>$emails[$x]</td>";
            echo "<td>$idades[$x]</td>";
            echo "<td>$medias[$x]</td>";
            echo "</tr>";

          }

        ?>

      </table>

    </body>
  </html>