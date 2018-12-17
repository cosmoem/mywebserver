<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Aufgabe 7</title>
  <meta name="author" content="Anna-Frieda Gruse">
  <meta name="viewport" content="wnameth=device-wnameth, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <style type="text/css">

    body {
      width: 98%;
      height: 98%;
      margin: auto;
    }
    form {
      border: 0.1em solid black;
      border-radius: 0.5em;
      margin: 1.5em;
      padding: 1.5em;
      padding-right: 2.5em;
    }

    h1 {
      margin-left: 0.7em;
      margin-top: 0.7em;
    }

    section {
      margin: 1.5em;
      padding:4em;
      background-color: lightgray;
      border-radius: 0.5em;
    }

    .invalid-feedback {
      position: relative;
      right: 1em;
    }
  </style>

</head>
<body>

  <h1>Anmeldung</h1>

  <?php

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


  $validated = false;
  if($_POST) {

    $vorname = trim($_POST['vorname']);
    $vorname = filter_var($vorname, FILTER_SANITIZE_STRING);

    $nachname = test_input($_POST['nachname']);
    $nachname = filter_var($nachname, FILTER_SANITIZE_STRING);

    $email = test_input($_POST['email']);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $studiengang = test_input($_POST['studiengang']);
    $studiengang = filter_var($studiengang, FILTER_SANITIZE_STRING);

    $passwort = test_input($_POST['passwort']);
    $passwort = filter_var($passwort, FILTER_SANITIZE_STRING);

    if($vorname && $nachname && $email && $studiengang && $passwort) $validated = true;

    if($validated) {
      echo "<section><p>Herzlichen Dank " . $_POST['vorname'] . " " . $_POST['nachname'] . " vom Studiengang " . $_POST['studiengang'] . "!<br/>
      Wir haben eine Bestätigung Ihrer Anmeldung an die E-Mail-Adresse " . $_POST['email'] . " versendet.<br/>
      <a href=''>Zurück</a></section>";
    }
  }

  if(empty($_POST) || ($_POST && !$validated)) : ?>

    <form  action="aufgabe7.php" method="post">

     <div class="form-group row">
       <label for="vorname" class="col-4">Vorname: </label>
       <?php
        if(isset($vorname) && !$vorname) {
          echo "<input type='text' class='form-control col-8 is-invalid' name='vorname' placeholder='Vorname' />
          <div class='invalid-feedback col-8 offset-4'>
            Bitte Vornamen eintragen!
          </div>";
        }
        else {
          if(isset($vorname)) {
            echo "<input type='text' class='form-control col-8' name='vorname' value='$vorname'/>";
          }
          else {

            echo "<input type='text' class='form-control col-8' name='vorname' placeholder='Vorname' />";
          }
        }
       ?>
     </div>

     <div class="form-group row">
       <label for="nachname" class="col-4">Nachname: </label>
       <?php
        if(isset($nachname) && !$nachname) {
          echo "<input type='text' class='form-control col-8 is-invalid' name='nachname' placeholder='Nachname' />
          <div class='invalid-feedback col-8 offset-4'>
            Bitte Nachnamen eintragen!
          </div>";
        }
        else {
          if(isset($nachname)) {
            echo "<input type='text' class='form-control col-8' name='nachname' value='$nachname' />";
          }
          else {
            echo "<input type='text' class='form-control col-8' name='nachname' placeholder='Nachname' />";
          }
        }
       ?>
     </div>

     <div class="form-group row">
       <label for="email" class="col-4">E-Mail: </label>
       <?php
        if(isset($email) && !$email) {
          echo "<input type='email' class='form-control col-8 is-invalid' name='email' placeholder='E-Mail' />
          <div class='invalid-feedback col-8 offset-4'>
            Bitte E-Mail-Adresse eintragen!
          </div>";
        }
        else {
          if(isset($email)) {
            echo "<input type='email' class='form-control col-8' name='email' value='$email'/>";
          }
          else {
            echo "<input type='email' class='form-control col-8' name='email' placeholder='E-Mail' />";
          }
        }
       ?>
     </div>

     <div class="form-group row">
       <label for="studiengang" class="col-4">Studiengang: </label>
       <select name="studiengang" class="form-control col-8" size="1" >
         <option value="FIW">Informatik und Wirtschaft</option>
       </select>
     </div>

     <div class="form-group row">
       <label for="passwort" class="col-4">Passwort: </label>
       <?php
        if(isset($passwort) && !$passwort) {
          echo "<input type='password' class='form-control col-8 is-invalid' name='passwort' placeholder='Passwort' />
          <div class='invalid-feedback col-8 offset-4'>
            Bitte Passwort eintragen!
          </div>";
        }
        else {
          if(isset($passwort)) {
            echo "<input type='password' class='form-control col-8' name='passwort' value='$passwort'/>";
          }
          else {
            echo "<input type='password' class='form-control col-8' name='passwort' placeholder='Passwort' />";
          }
        }
       ?>
     </div>

       <button class="btn btn-primary" type="submit">Anmelden</button>
   </form>

   <?php endif; ?>

</body>
</html>
