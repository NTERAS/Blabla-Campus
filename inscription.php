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
?>

<body>
  <header id="headerprofil" class="connexion w100 mt-5 is-flex is-justify-content-space-between is-align-items-center">
    <a href="index.php" class="btnbacknone"><img src="assets/img/logo/logo.svg" alt="Le logo Blabla Campus"></a>
    <p>Creer un compte</p>
  </header>

  <main>
    <div class="container is-flex is-justify-content-center is-flex-direction-column my-5">
      <!-- coordonnées -->

      <!-- <form action="functions.php" class="loginForm is-flex is-flex-direction-column container" method="post"
      enctype="multipart/form-data"> -->
      <form action="PHP/includes/signup.inc.php" class="loginForm is-flex is-flex-direction-column container"
        method="post" enctype="multipart/form-data">

        <!-- form login -->
        <p class="bungee my-4 textLeft">Entrez vos coordonnées</p>
        <input type="text" name="name" id="name" class="input is-medium" placeholder="Nom">
        <input type="text" name="pseudo" id="pseudo" class="input is-medium" class="input is-medium"
          placeholder="Nom d'utilisateur">
        <!-- form password -->
        <p class="bungee mt-5 textLeft">Entrez votre mot de passe</p>
        <input type="password" name="password" id="password" class="input is-medium" placeholder="********************">
        <!-- form email -->
        <p class="bungee mt-5 textLeft">Entrez votre email</p>
        <input type="email" name="email" id="email" class="input is-medium" placeholder="email">

        <p class="greyText mx-4">Ajouter votre adresse e-mail pour recevoir des notifications sur votre activité. Cela
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
          placeholder="Entrez votre bio ici"></textarea>
        <!-- upload avatar img -->
        <p class="bungee mt-5 textLeft">Télécharger une image de profil</p>
        <div class="file is-boxed mx-auto w95">
          <label class="file-label radiusForm mx-auto">
            <input class="file-input" type="file" name="resume" accept="image/*" onchange="previewFile()">
            <span class="file-cta">
              <span class="file-icon my-4">
                <img src="assets/img/icones/picture.svg" alt="logo de l'image à uploader">
              </span>
              <span class="file-label is-flex is-align-items-center">
                <strong>Glisser-déposer ou parcourir un fichier</strong>
                <p class="greyText">Taille recommandée : JPG, PNG, GIF</p>
                <p class="greyText">(150x150px, Max 10mb)</p>
              </span>
            </span>
          </label>
        </div>

        <span class="imgChild mx-auto"></span>
        <div class="file-upload-info"></div>

        <div class="mx-auto">



          <button class="button redBtn mt-5" name="action" value="register">
            <p>Creer mon compte</p>
          </button>
        </div>
      </form>

    </div>
  </main>
  <script src="assets/js/app.js"></script>
</body>

</html>