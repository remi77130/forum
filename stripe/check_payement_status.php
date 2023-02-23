<?php
session_start();

require __DIR__ . '/../require/database.php';
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/paiement.class.php';

// On regarde si tous les paramètres sont remplis
if (!empty($_GET['payment_intent']) && !empty($_GET['payment_intent_client_secret'])) {

    // On instancie la classe Stripe avec les clefs
    $Stripe = new Paiement(STRIPE_KEYS['public'], STRIPE_KEYS['secret']);

    // On regarde s'il y a bien un membre connecté
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $membre_id = $_SESSION['id'];


        $req_selectMembre = $bdd->prepare('SELECT * FROM membres WHERE id = :id');
        $req_selectMembre->execute(
            [
                'id' => $membre_id
            ]
        );
        $selectMembre = $req_selectMembre->fetch();

        if ($selectMembre) {
            $status = null;

            try {

                // On vient analyser si le paiement a bien été réalisé ou pas
                $payement_intent = $Stripe->getPayementIntent($_GET['payment_intent']);

                $status = $payement_intent->status;
            } catch (Exception $e) {

            }

            // Le paiement a bien fonctionné
            if($status == 'succeeded') {
                header('location: '.URL_WEBSITE.'/tirage.php?selection='.$_GET['selection']);
            }

            // Le paiement n'a pas fonctionné
            else {
                header('location: '.URL_WEBSITE.'/grille.php?payement_status=error');
            }
        }
    }
}

?>