<?php
  include "CMS/db/connection.php";
  
  $texto = "";
// Connect to MySQL database
$pdo = pdo_connect_mysql();

// Prepare the SQL statement and get records from our languages table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM languages ORDER BY id');
$stmt->execute();
// Fetch the records so we can display them in our template.
$languages = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare the SQL statement and get records from our languages table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM skills ORDER BY id');
$stmt->execute();
// Fetch the records so we can display them in our template.
$skills = $stmt->fetchAll(PDO::FETCH_ASSOC);

$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $text = isset($_POST['text']) ? $_POST['text'] : '';
    // Insert new record into the languages table
    $stmt = $pdo->prepare('INSERT INTO form VALUES (?, ?, ?, ?)');
    $stmt->execute([$id, $email, $subject, $text]);
    // Output message
    $msg = 'Enviado com sucesso';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">

</head>

<body class="light">
  <button
        type="button"
        class="btn btn-lg light"
        id="btn-back-to-top"
        >
        <i class="bi bi-arrow-up-circle-fill"></i>
</button>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light light">
      <a class="navbar-brand light" href=" ">Meu Perfil</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="bi bi-list light"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item" >
            <a class="nav-link light" href="#geral">Geral</a>
          </li>
          <li class="nav-item">
            <a class="nav-link light" href="#skills">Skills</a>
          </li>
          <li class="nav-item">
            <a class="nav-link light" href="#lingua">Línguas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link light" href="#sobreMim">Sobre Mim</a>
          </li>
          <li class="nav-item">
            <a class="nav-link light" href="../CMS/auth/login.php">Sua Conta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link light">Dark Mode: 
              <label class="switch">
                <input type="checkbox" onclick="changeColor()">
                <span class="slider round"></span>
              </label>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="row">
      <div class="col-sm-6 border-end  text-center" id="geral">
        <img class="rounded" src="assets/eu.jpg" alt="EU" height="240" width="230">
        <h1><?php
          $stmt = $pdo->prepare('SELECT texto FROM informacoes where id = 3');
          $stmt->execute();
          // Fetch the records so we can display them in our template.
          $informacoes= $stmt->fetch(PDO::FETCH_ASSOC);
          echo $informacoes["texto"];
        ?>
        </h1>
        <h3><?php
          $stmt = $pdo->prepare('SELECT texto FROM informacoes where id = 4');
          $stmt->execute();
          // Fetch the records so we can display them in our template.
          $informacoes= $stmt->fetch(PDO::FETCH_ASSOC);
          echo $informacoes["texto"];
        ?></h3>
        <h5><?php
          $stmt = $pdo->prepare('SELECT texto FROM informacoes where id = 5');
          $stmt->execute();
          // Fetch the records so we can display them in our template.
          $informacoes= $stmt->fetch(PDO::FETCH_ASSOC);
          echo $informacoes["texto"];
        ?></h5>
        <b>Contactos: </b>
        <a href=<?php
          $stmt = $pdo->prepare('SELECT contato FROM contato where id = 1');
          $stmt->execute();
          // Fetch the records so we can display them in our template.
          $contato= $stmt->fetch(PDO::FETCH_ASSOC);
          echo $contato["contato"];
        ?> class="lightI" id="git"><i class="bi bi-github"></i></a>
        <a href=<?php
          $stmt = $pdo->prepare('SELECT contato FROM contato where id = 2');
          $stmt->execute();
          // Fetch the records so we can display them in our template.
          $contato= $stmt->fetch(PDO::FETCH_ASSOC);
          echo $contato["contato"];
        ?> class="lightI" id="link"><i class="bi bi-linkedin"></i></a>
        <a onclick="mail()" href="#form" class="lightI" id="botao"><i class="bi bi-envelope-fill"></i></a>
        <p><?php
          $stmt = $pdo->prepare('SELECT contato FROM contato where id = 3');
          $stmt->execute();
          // Fetch the records so we can display them in our template.
          $contato= $stmt->fetch(PDO::FETCH_ASSOC);
          echo $contato["contato"];
        ?></p>
      </div>
      <div class="col-sm-6">
        <div class="row" id="skills">
          <h3>Skills: </h3>
          <div class="content read">
            <table>
                  <tbody>
                      <?php foreach ($skills as $skill): ?>
                      <tr>
                          <td><?=$skill['name']?></td>
                          <td></td>
                          <td></td>
                          <td><?=$skill['level']?></td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
          </div>
        </div>
        <hr class="lightHr">
        <div class="row" id="lingua">
          <h3>Línguas: </h3>
          <div class="content read">
            <table>
                  <tbody>
                      <?php foreach ($languages as $language): ?>
                      <tr>
                          <td><?=$language['name']?></td>
                          <td></td>
                          <td></td>
                          <td><?=$language['level']?></td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
    <hr class="lightHr">
    <div class="row" id="sobreMim">
      <h3> Sobre mim:</h3>
      <p><?php
          $stmt = $pdo->prepare('SELECT texto FROM informacoes where id = 2');
          $stmt->execute();
          // Fetch the records so we can display them in our template.
          $informacoes= $stmt->fetch(PDO::FETCH_ASSOC);
          echo $informacoes["texto"];
        ?></p>
    </div>
    <hr class="lightHr">
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
    <div class="row text-center" id="form">
      <div class="content update">
        <form action="index.php" method="post">
        <div>
            <label for="email"><b>Email: </b></label>
            <input type="email" id="email" name="email"></textarea>
          </div>
          <div>
            <label for="subject"><b>Subject: </b></label>
            <input type="text" id="subject" name="subject"></textarea>
          </div>
          <div>
            <label for="text"><b>Text: </b></label>
            <textarea id="text" name="text"></textarea>
          </div>
          <input type="submit" value="Enviar" onclick="enviar()">
          <input type="button" value="Cancelar" onclick="cancelar()">
        </form>
      </div>
    </div>

  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="script.js"></script>

</html>