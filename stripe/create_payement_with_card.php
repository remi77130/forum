<?php
session_start();

require __DIR__ . '/../require/database.php';
require __DIR__ . '/config.php';
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/paiement.class.php';

// On instancie la classe Stripe avec les clefs
$Stripe = new Paiement(PUBLIC_KEY, SECRET_KEY);

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

    // On regarde si le membre a bien un compte Stripe
    if ($selectMembre && !empty($selectMembre['stripe_customer_id'])) {

        $customer_id = $selectMembre['stripe_customer_id'];

        // On liste les moyens de paiement de l'utilisateur
        $payments_methods = $Stripe->stripe_client->paymentMethods->all(
            [
                'customer' => $customer_id,
                'type' => 'card'
            ]
        );

        // On récupère le dernier système de paiement
        if (count($payments_methods->data) > 0) {
            $last_payements_methods = end($payments_methods->data);

            // On effectue le paiement avec ce moyen de paiement
            $payement_intent = $Stripe->createPayementIntentWithCard($customer_id, $last_payements_methods->id);

            if ($payement_intent->status == 'succeeded') {
                $url_redirect = '/tirage.php?selection=' . $_POST['selection'];
            } else {
                $url_redirect = '/grille.php?payement_status=error';
            }

            die(json_encode(['url_redirect' => $url_redirect]));
        }
    }
}
?>