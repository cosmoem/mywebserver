<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="author" content="Anna-Frieda Gruse">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aufgabe 5</title>
    <?php

      function intlen($int)
      {
        $str = ((string)$int);
        return strlen($str);
      }

      function zufzahl($max, $anzahl, $stellen)
      {
        echo "<table class='table table-striped table-hover'>
          <thead>
            <tr style='background-color:black; color:white;'>
              <th>Zufallszahl</th>

        ";

        for($k=1; $k<=$stellen; $k++)
        {
          echo
            "<th>ersten $k Stellen</th>";
        }

        echo "
            </tr>
          </thead>";

        for($i=1; $i<=$anzahl; $i++)
        {
          $zzahl = rand(1, $max);
          $len = intlen($zzahl);
          $color = "";

          switch ($len)
          {
            case 1: $color="grey"; break;
            case 2: $color="lightgrey"; break;
            case 3: $color="lightyellow"; break;
            case 4: $color="pink"; break;
            case 5: $color="lightblue"; break;
          }

          echo "
              <tr style='background-color: $color;'>
                <td>$zzahl</td>";

          for($j=$stellen; $j>0; $j--)
          {
            $abgeschnitten=abschneiden($zzahl,$j);
            echo "
              <td>$abgeschnitten</td>";
          }

          echo "</tr>";

        }
        echo "</table>";
      }

      function abschneiden($zahl,$stellen)
      {
        $base = pow(10, $stellen);
        return $zahl - ($zahl % $base);
      }
    ?>

    <style type="text/css">

      body {
        font-family: Arial, Verdana, sans-serif;
      }

      h1 {
        text-align: center;
        padding: 0.5em;
      }

      .table {
        text-align: center;
      }

    </style>
  </head>
  <body>
    <h1>Zufallszahlen</h1>
    <div>
      <?php zufzahl(20000, 20, 5); ?>
    </div>
  </body>
</html>
