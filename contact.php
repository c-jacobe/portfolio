<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Coline Jacobé</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
      crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/styles_global.css">
<link rel="icon" type="image/png" href="img/logo.png" />
</head>
<body>
<header class="py-3">
        <nav class=" navbar navbar-expand-md navbar-dark">
         <a class="nav-link" href="../index.html">Accueil</a>
         <button class="navbar-toggler text-right" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon img-fluid"></span>
           </button>
           <div class="collapse navbar-collapse text-right" id="navbarToggler">
             <ul class="navbar-nav mr-auto text-right">
                 <li class="nav-item text-right">
                   <a class="nav-link text-right" href="../projects.html">Projets</a>
                 </li>
                 <li class="nav-item text-right">
                   <a class="nav-link text-right disabled "href="../contact.php">Contact</a>
                 </li>
               </ul>
            
             </div>
     </nav>
     </header>
          <h1 class="text-center my-5">Contact</h1>

     <div class="container my-5">
         <div class="row my-5">
             <div class="col-md-6 my-5">
     <p class="mt-3">Envie de m'envoyer un message ? N'hésitez pas !</p></div>
<?php
      if(isset($_POST['submit'])){
    
        $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
        $message = htmlspecialchars(stripslashes(trim($_POST['message'])));

        if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
          $email_error = 'E-mail invalide';
        }
        if(strlen($message) === 0){
          $message_error = 'Merci de renseigner un message';
        }
      }
    ?>
    <div class="col-md-6 mb-5">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <input class="form-control" type="text" name="email" placeholder="Votre E-mail">
      <p><?php if(isset($email_error)) echo $email_error; ?></p>
      <textarea class="form-control" name="message" placeholder="Votre message..."></textarea>
      <p><?php if(isset($message_error)) echo $message_error; ?></p>
      <input class="form-control" type="submit" name="submit" value="Submit" style="background: #FFE589;
    color: #4A4D6B; font-weight: bold;">
      <?php 
        if(isset($_POST['submit']) && !isset($email_error) && !isset($message_error)){
          $to = 'coline@jacobe.fr';
          $body = "E-mail: $email\n Message:\n $message";
          if(mail($to, $subject, $body)){
            echo '<p style="color: green">Message envoyé</p>';
          }else{
            echo '<p>Une erreur a eu lieu, veuillez réessayer plus tard.</p>';
          }
        }
      ?>
    </form>
    <p style="font-style: italic; font-size: 0.7rem;">Aucune donnée personnelle n’est conservée par le site via ce formulaire</p>
</div>
    </div>
    </div>
    <footer class="text-center py-5">
    <p>Site web réalisé par <strong>Coline Jacobé</strong></p>
    </footer>
</body>
</html>