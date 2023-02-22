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

    if ($selectMembre) {

        $customer_id = null;

        // On regarde si l'utilisateur a un `stripe_customer_id`, sinon, on créé un Customer sur Stripe
        if (!empty($selectMembre['stripe_customer_id'])) {

            // On regarde si le Customer existe bien sur Stripe
            try {
                $customer = $Stripe->getClientById($selectMembre['stripe_customer_id']);
                $customer_id = $customer->id;

            } catch (Exception $e) {
            }
        }

        // Si le customer_id n'est pas ressorti, on créé un nouveau client sur Stripe
        if ($customer_id === null) {
            // On créé le client sur Stripe
            $customer = $Stripe->createClient(
                $selectMembre['pseudo'],
                $selectMembre['mail']
            );

            $customer_id = $customer->id;

            // On enregistre le customer_id dans la table membres
            $updateCustomerIdToMembre = $bdd->prepare('UPDATE membres SET stripe_customer_id = :customer_id WHERE id = :id');
            $updateCustomerIdToMembre->execute(
                [
                    'customer_id' => $customer_id,
                    'id' => $selectMembre['id']
                ]
            );
        }

        // A partir de là, on admet qu'on reçoit bien un customer_id
        if ($customer_id) {

            // On prépare la demande de paiement et de CB du client
            $payementIntent = $Stripe->createPayementIntent($customer_id);

            // On doit récupérer le `client_secret` du paiement pour pouvoir demander à l'utilisateur
            $payement_client_secret = $payementIntent->client_secret;

            die(json_encode(['client_secret' => $payement_client_secret]));
        }
    }
}
?>