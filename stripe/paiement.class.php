<?php

class Paiement
{
    private $product_amount = 100; // Montant du produit en centime, donc 1€
    private $public_key;
    private $secret_key;
    private $stripe_client;

    // On instancie la classe avec les clefs de connexion
    public function __construct($public_key, $secret_key)
    {
        $this->public_key = $public_key;
        $this->secret_key = $secret_key;

        try {
            $this->stripe_client = new \Stripe\StripeClient($this->secret_key);

            // On récupère la liste des produits pour voir son arrive à se connecter
            $this->getProductList();

        } catch (Exception $e) {
            die("Une erreur s'est produite: " . $e->getMessage());
        }
    }

    // Méthode permettant d'identifier un client (Customer)
    public function getClientById($customer_id)
    {
        $customer = $this->stripe_client->customers->retrieve($customer_id);

        return $customer;
    }

    // Méthode permettant de créer un client
    /*
     * On attend le name et l'e-mail du client (Customer)
     */
    public function createClient($name, $email, $optional_opts = [])
    {
        $default_opts = [
            'name' => $name,
            'email' => $email,
        ];

        $opts = array_merge($default_opts, $optional_opts);

        try {

            $customer = $this->stripe_client->customers->create($opts);

            return $customer;
        } catch (Exception $e) {
            die("Une erreur s'est produite: " . $e->getMessage());
        }
    }

    // Méthode permettant d'instancier un système de paiement pour un client
    public function createPayementIntent($customer_id)
    {
        try {
            $paymentIntent = $this->stripe_client->paymentIntents->create([
                'customer' => $customer_id,
                'setup_future_usage' => 'off_session',
                'amount' => $this->product_amount,
                'currency' => 'eur',
                'automatic_payment_methods' => [
                    'enabled' => 'true',
                ],
            ]);

            return $paymentIntent;
        } catch (Exception $e) {
            die("Une erreur s'est produite: " . $e->getMessage());
        }
    }

    // Méthode permettant de récupérer un PayementIntent avec son ID
    public function getPayementIntent($payement_intent_id)
    {
        return $this->stripe_client->paymentIntents->retrieve(
            $payement_intent_id,
            []
        );
    }

    // Méthode permettant de récupérer la liste des paiements (aussi utilisée pour voir si on peut se connecter à l'API)
    public function getProductList()
    {
        return $this->stripe_client->products->all();
    }
}

?>