<?php
session_start();
if(isset($_SESSION["userid"])){
  $user_id = $_SESSION["userid"];
  $pseudo = $_SESSION["username"];
  $image = $_SESSION["image"];
  $bio = $_SESSION["biog"];
  $email = $_SESSION["email"];
  $my_pwd = $_SESSION["mypwd"];
  // print_r($my_pwd);
}else{
  header("location: index.php");
}
$title = "edition compte - Blabla Campus";
include_once 'headerSimple.php';
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
      <!-- <main class="dekstop box"> -->
      <main class="dekstop">
        <header id="headerprofil"
          class="connexion w100 mt-5 is-flex is-justify-content-space-between is-align-items-center">
          <a href="index.php" class="btnbacknone"><img src="assets/img/logo/logo.svg" alt="Le logo Blabla Campus"></a>
          <a href="profil.php" class="btnbacknone"><img src="assets/img/icones/People.svg"
              alt="Icon d'une personne"></a>
        </header>
        <div class="container is-flex is-justify-content-center is-flex-direction-column my-5">
          <!-- coordonnées -->
          <p class="bungee my-4 mx-3">modifier vos coordonnées</p>

          <form id="file-upload-form" action="PHP/includes/update-user.inc.php"
            class="loginForm is-flex is-flex-direction-column container uploader" method="post"
            enctype="multipart/form-data">

            <!-- form login -->
            <!-- <input type="text" name="name" id="name" class="input is-medium" placeholder="Nom"> -->
            <input type="text" name="pseudo" id="pseudo" class="input is-medium" class="input is-medium"
              value="<?php echo $pseudo; ?>">
            <!-- form password -->
            <p class="bungee mt-5 mx-3">modifier votre mot de passe</p>
            <input type="password" name="password" id="password" class="input is-medium"
              placeholder="********************" />
            <!-- form email -->
            <p class="bungee mt-5 mx-3">modifier votre email</p>
            <input type="email" name="email" id="email" class="input is-medium" value="<?php echo $email; ?>">
            <!-- biographie -->
            <p class="bungee mt-5 mx-3">modifier votre biographie</p>
            <textarea name="biographie" id="biographie" cols="15" rows="4" class="textarea is-medium"
              value="s"><?php echo $bio; ?></textarea>
            <!-- upload avatar img -->
            <p class="bungee mt-5">modifier votre image de profil</p>
            <div class="is-flex is-justify-content-center align-items-center">
              <div class="drop-zone file is-boxed greyBack w77 is-flex is-flex-direction-column">
                <span class="greyText info"></span>
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
                <input type="file" name="resume" class="drop-zone__input">
              </div>
            </div>

            <div class="ppCurent is-flex is-justify-content-center is-align-items-center ">
              <p class="greyText px-3">Avatar actuel :</p>
              <img class="is-rounded preview pp" src="data:image;base64,<?= $image ?>" alt="" />
            </div>
            <!-- <div class="file-upload-info"></div> -->

            <div class="mx-auto">

              <button class="button redBtn mt-5 px-5" name="action" value="register">
                <p>&nbsp;&nbsp;mettre à jour&nbsp;&nbsp;</p>
              </button>

            </div>
          </form>
        </div>
      </main>
      <script src="assets/js/app.js"></script>
      <script src="assets/js/drag2.js"></script>
</body>

</html>