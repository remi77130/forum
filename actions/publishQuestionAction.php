<?php
require ('signupAction.php');



// verifie si user appui sur post validate form question

if (isset($_POST['validate'])){

    if(!empty($_POST['title']) and !empty($_POST['description']) and !empty($_POST['content'])){
            // Si champs form question remplis
            //nl2br pour autorisé les saut de ligne
            $question_title = htmlspecialchars ($_POST['title']);
            $question_description = nl2br(htmlspecialchars($_POST['description']));
            $question_content = nl2br(htmlspecialchars($_POST['content']));
            $question_date = date ("d/m/y");
            //$question_id_author = $_SESSION['id']; // id user dans signupAction
            //question_pseudo_author = $_SESSION['pseudo'];  // pseudo dans signupAction

            // insere dans la bdd via variable bdd dans database.php
            $insertQuestionOnWebSite = $bdd->prepare('INSERT INTO questions (titre, description, contenu,
                                                     date_publication)
                                                    VALUES(?,?,?,?)');
            
            $insertQuestionOnWebSite->execute(array($question_title,$question_description,
            $question_content,
           // $question_id_author,
           // $question_pseudo_author,
            $question_date ));

            $successMsg ="Votre question a bien été publiée sur le site";

    }else
    // SINON CHAMPS VIDE
    {
        $errorMsg ="Veuillez compléter tous les champs";
    }

}