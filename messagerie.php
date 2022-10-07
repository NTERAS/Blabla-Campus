<?php
session_start();
if(isset($_SESSION["mail-rc"])){
    $mail_rc = $_SESSION["mail-rc"];
    $_SESSION["id_trajet_inc_msg0"];
}else{
    header("location: index.php");
}

// $kar = $_SESSION["id_trajet_inc_msg0"];
// $kar2 = $_SESSION["id_trajet_inc_msg1"];
// echo $kar."<br>";
// echo $kar2;


$title = "messagerie - Blabla Campus";
include_once 'header.php';
?>

<main>
    <div class="container my-5">
        <!-- coordonnées -->
        <p class="bungee my-5 mx-4 py-5">Messagerie</p>


        <!-- messages -->
        <?php
        for ($i=0; $i <$mail_rc ; $i++) {
            $user_id = $_SESSION["id-sender".$i];
            $full_message = $_SESSION["full-message".$i];
            $msg_type = $_SESSION["msg-type".$i];
            $name_sender = $_SESSION["name-sender".$i];
            $img_sender = $_SESSION["image-sender".$i];
            $id_trajet_msg = $_SESSION["id_trajet_inc_msg".$i];

            // echo $user_id."<br>";
            // echo $full_message."<br>";
            // echo $msg_type."<br>";
            // echo $name_sender."<br>";
            // echo $img_sender."<br>";
            // echo '<img class="is-rounded" src="data:image;base64,' . $img_sender . '" alt="Image dune personne"/>';
            // echo $id_trajet_msg;
            // echo $msg_type;

            $id_trajet_msg = $_SESSION["id_trajet_inc_msg".$i];
            if($msg_type=="Demande"){
                echo '<a href="validation.php?i='.$i.'&tr='.$id_trajet_msg.'">';
            }
            echo '<div class="mx-4">
            <figure class="is-flex my-5 is-flex-direction-column w90 profil">
            <div class="is-flex">
                <img class="is-rounded ppTrajet" src="data:image;base64,' . $img_sender . '" alt="Image d`une personne">
                <div class="text px-2">
                    <h2 class="epilogue"><strong class="redColor">'.$name_sender.'</strong></h2>
                    <p class="subtitle epilogue"><i><strong class="redColor">'.$msg_type.'</strong> '.$full_message.'</i></p>
                </div>
            </div>
            <span class="traitMessage my-2"></span>
        </figure>
    </div>';
    if($msg_type=="Demande"){
        echo '</a>';
    }
        }
        

        ?>



    </div>

</main>
</body>

</html>