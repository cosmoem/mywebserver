<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Datei einlesen</title>
    <meta name="author" content="Anna-Frieda Gruse">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body class="container-fluid">
<h1>Datei einlesen</h1>
<?php
/*
 * falls das Zeilenende der einzulesenden Datei nicht korrekt
 * erkannt werden sollte, dann sollte die folgende Anweisung
 * ausgeführt werden
 */
ini_set("auto_detect_line_endings", true);
/* Öffnen der Datei zum Lesen "r"
 * Datei muss im gleichen Verzeichnis liegen wie aufgabe6.php
 * andernfalls Pfadangabe ändern
 * @ unterdrückt evtl Warnungen
 */
$file = @fopen ( "./mockdatatext", "r" );
/*
 * wenn das Öffnen der Datei nicht funktioniert hat, ist $file FALSE
 * ansonsten steht der Dateizeiger am Anfang der ersten Zeile
 */
if (! $file) {
    echo "Es ist ein Problem beim Öffnen der Datei 'mockupdatatext' aufgetreten.";
} else {
    /*
     * feof - end of file
     * prüft, ob ein Dateizeiger am Ende der Datei steht
     */
    $counter = 0;
    echo "<div class='row'><div class='col-xl-3 col-lg-4 col-md-6 col-s-12' style='background-color:lightgray;'>
    <ul class='list-group' style='padding:5px'><li class='list-group-item'>";
    while ( ! feof ( $file ) ) {
        /*
         * fegts() liest eine Zeile einer Datei aus
         * fgets() gibt einen String zürück
         * nach Aufruf von fgets() steht der Dateizeiger
         * in der nächsten Zeile (außer, es wurde eine
         * Leselänge als 2. Parameter fgets übergeben)
         */
        $current_line = fgets ( $file );
        if($counter==10) {
          $counter=0;
          echo "</ul></div><div class='col-xl-3 col-lg-4 col-md-6 col-s-12' style='background-color:lightgray;'>
          <ul class='list-group' style='padding:5px'><li class='list-group-item'>";
        }
        /* prüfen ob zeile leer ist */
        if(empty(trim($current_line))) {
          $current_line="";
          if($counter==9)
          {
            echo "</li>";
          }
          else {
            echo "</li><li class='list-group-item'>";
          }
          $counter++;
        }
        /* prüfen ob zeile @ enthält */
        elseif(strpos($current_line, '@')==true) {
            echo "( <a href='mailto:$current_line'>$current_line</a>)";
        }
        /* prüfen ob zeile nicht leer ist und nicht IP  */
        elseif($current_line!="" && strpos($current_line, '.')==false) {
          echo $current_line;
        }
        /*
         * Sie können für die Lösung der Aufgabe davon ausgehen,
         * dass jeder Datensatz aus 4 Zeilen besteht und dass zwischen
         * den einzelnen Datensätzen immer genau eine Leerzeile ist.
         */
    }
    fclose ( $file );
    echo "</ul></div>";
}
?>
</body>
</html>
