<?php 
// session_start();
// include_once "PHP/functions.php";
$title = "Inscription - Blabla Campus";
include_once "headerSimple.php";
session_start();
if(isset($_SESSION['username'])){
  header("location: index.php");
}else{
   
}
if(isset($_GET['error'])){
  $pseudo = $_POST["username"];
}

?>


<body>
  <section id="containerbox" class="w100 minh100 is-flex is-justify-content is-align-items-center">
    <div id="divleft" class="posre h100 w55 is-justify-content-center is-align-items-start is-flex-direction-column">
      <?php include_once 'vitrineLeft.php'; ?>
    </div>

    <div id="divright"
      class="w35 posre is-flex is-justify-content-center is-align-items-center is-flex-direction-column">
      <img class="posabL" src="assets/img/autres/pos1.svg" alt="">
      <img class="posabR" src="assets/img/autres/pos2.svg" alt="">

      <main class='dekstop'>
        <header id="headerprofil"
          class="connexion w100 mt-5 is-flex is-justify-content-space-between is-align-items-center">
          <a href="index.php" class="btnbacknone"><img src="assets/img/logo/logo.svg" alt="Le logo Blabla Campus"></a>
          <p>Creer un compte</p>
        </header>

        <div class="container is-flex is-justify-content-center is-flex-direction-column my-5">
          <!-- coordonnées -->

          <!-- <form action="functions.php" class="loginForm is-flex is-flex-direction-column container" method="post"
      enctype="multipart/form-data"> -->
          <form action="PHP/includes/signup.inc.php" class="loginForm is-flex is-flex-direction-column container"
            method="post" enctype="multipart/form-data">

            <!-- form login -->
            <p class="bungee my-4 textLeft">Entrez vos coordonnées</p>
            <input type="text" name="name" id="name" class="input is-medium" placeholder="Nom" required>
            <input type="text" name="pseudo" id="pseudo" class="input is-medium" class="input is-medium"
              placeholder="Nom d'utilisateur" required />
            <!-- form password -->
            <p class="bungee mt-5 textLeft">Entrez votre mot de passe</p>
            <input type="password" name="password" id="password" class="input is-medium"
              placeholder="********************" required>
            <!-- form email -->
            <p class="bungee mt-5 textLeft">Entrez votre email</p>
            <input type="email" name="email" id="email" class="input is-medium" placeholder="email" required>

            <p class="greyText mx-4">Ajouter votre adresse e-mail pour recevoir des notifications sur votre activité.
              Cela
              ne sera pas affiché sur votre profil.</p>
            <!-- genre -->
            <p class="bungee mt-5 textLeft">Choisissez votre genre</p>
            <div class="control mx-auto">
              <label class="radio">
                <input type="radio" name="answer" value="femme" class="genderInput">
                Femme <img src="assets/img/icones/female.svg" alt="genre femme">
              </label>
              <label class="radio">
                <input type="radio" name="answer" value="homme" class="genderInput">
                Homme <img src="assets/img/icones/male.svg" alt="genre homme">

              </label>
            </div>
            <!-- biographie -->
            <p class="bungee mt-5 textLeft">Entrez votre biographie</p>
            <textarea name="biographie" id="biographie" cols="15" rows="4" class="textarea is-medium"
              placeholder="Entrez votre bio ici" required></textarea>
            <p class="bungee mt-5">Télécharger une image de profil</p>
            <div class="is-flex is-justify-content-center align-items-center">
              <div class="drop-zone file is-boxed greyBack w77 is-flex is-flex-direction-column">
                <span class="greyText info py-3"></span>
                <span class="file-label is-flex is-align-items-center drop-zone__prompt">
                  <span class="file-icon my-4">
                    <img src="assets/img/icones/picture.svg" alt="">
                  </span>
                  <strong>Glisser-déposer ou parcourir un fichier</strong>
                  <p class="greyText">Taille recommandée : JPG, PNG, GIF</p>
                  <p class="greyText">(150x150px, Max 1mb)</p>
                  <span class="imgChild mx-auto dsn">
                  </span>
                </span>
                <input type="file" name="resume" class="drop-zone__input"
                  accept="image/png, image/gif, image/jpeg ,image/jpg">
              </div>
            </div>

            <div class="mx-auto">

              <button class="button redBtn mt-5" name="action" value="register">
                <p>Creer mon compte</p>
              </button>
            </div>
          </form>

        </div>
      </main>
      <script src="assets/js/app.js"></script>
      <script src="assets/js/drag2.js"></script>
</body>

</html>