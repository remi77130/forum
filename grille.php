<?php
session_start();

require __DIR__ . '/require/database.php';
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/stripe/paiement.class.php';

// On regarde s'il y a bien un membre connecté
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $ask_card = true;

    $membre_id = $_SESSION['id'];

    $req_selectMembre = $bdd->prepare('SELECT * FROM membres WHERE id = :id');
    $req_selectMembre->execute(
        [
            'id' => $membre_id
        ]
    );
    $selectMembre = $req_selectMembre->fetch();

    if (!$selectMembre) {
        exit;
    }

    // On instancie la classe Stripe avec les clefs
    $Stripe = new Paiement(STRIPE_KEYS['public'], STRIPE_KEYS['secret']);

    if (!empty($selectMembre['stripe_customer_id'])) {

        $customer_id = $selectMembre['stripe_customer_id'];

        try {
            // On regarde si le customer existe
            $customer = $Stripe->getClientById($customer_id);


            // On liste les moyens de paiement de l'utilisateur
            $payments_methods = $Stripe->stripe_client->paymentMethods->all(
                [
                    'customer' => $customer_id,
                    'type' => 'card'
                ]
            );

            if (count($payments_methods->data) > 0) {
                $ask_card = false;
                $last_card = end($payments_methods->data);
                $last_digit = $last_card->card->last4;
            }
        } catch (Exception $e) {

        }
    }
} else
echo "pas connécté";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Jeux de lotterie</title>

    <style>
        button#play, #stripe_paiement button#submit {
            padding: 10px 20px;
            font-size: 14pt;
            font-weight: bold;
            cursor: pointer;
            background-color: #EA2;
            border: solid 1px #EA2;
            color: #000;
            display: inline-block;
            margin: 4px 2px;
            visibility: hidden;
            border-radius: 16px;
        }

        button:disabled {
            background: rgba(238, 170, 34, 0.5) !important;
            cursor: default !important;
            pointer-events: none;
            color: white !important;
        }

        #stripe_paiement button#submit {
            visibility: visible !important;
        }

        button#play:hover {
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.4);
            color: #FFF;
        }

        #stripe_paiement {
            padding: 0px 20px;
            margin: 50px;
            color: white;
        }

        #error-message {
            margin: 20px;
            color: red;
            font-size: 18pt;
            font-weight: bold;
        }
    </style>

</head>
<body>

<h1>Veuillez séléctionnez 6 cases</h1>

<div class="container_grille">
    <div id="grille">
        <?php
        for ($i = 1; $i <= 49; $i++) {
            ?>
            <input type="button" value="<?php echo $i ?>" id="<?php echo $i ?>" onclick="jouer(this.value)"/>
            <!-- si on clique sur un bouton, on appel une fonction sur laquelle on va passer un argument-->
            <?php
            if ($i % 7 == 0)
                echo "<br />";
        }
        ?>
    </div>


    <div id="selection"></div>

    <button id="play">Jouer pour 1,00€</button>

    <div id="stripe_paiement" style="display: none;">
        <form id="payment-form">
            <div id="error-message"></div>
            <div id="payment-element">
                <!-- Elements will create form elements here -->
            </div>
            <br>
            <button id="submit">Procéder au paiement de 1,00€ puis afficher les résultats...</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script src="https://js.stripe.com/v3/"></script>

<script type="text/javascript">
    // On rajoute chaque sélection dans le tableau
    var selection_nos = [];

</script>

<?php

// Si le membre a un compte Stripe et un moyen de paiement , on ne demande plus de saisir la carte bancaire
if (!$ask_card) { ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#play').on('click', function () {
                if (window.confirm("Vous allez être prelevé de 1€ sur votre carte bancaire terminant par <?= $last_digit ?>, voulez-vous continuer ?")) {

                    $('#play').html('Chargement en cours...').prop('disabled', true);

                    $.ajax({
                        url: '<?= URL_WEBSITE; ?>/stripe/create_payement_with_card.php',
                        method: 'post',
                        dataType: 'json',
                        data: 'selection=' + selection_nos.join(','),
                        success: function (return_data) {
                            window.location.href = return_data.url_redirect;
                        }
                    });
                }
            });
        });
    </script>
<?php

} // Sinon, on  demande la carte bancaire
else { ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#play').on('click', function () {
                $('#play').html('Chargement en cours...').prop('disabled', true);
                $.ajax({
                    url: './stripe/create_payement.php',
                    method: 'post',
                    dataType: 'json',
                    success: function (return_data) {

                        $("#stripe_paiement").fadeIn().animate({}, 800, function () {
                            $('#play').fadeOut();

                            const stripe = Stripe('<?= STRIPE_KEYS['public']; ?>');

                            const appearance = {
                                theme: 'stripe',

                                variables: {
                                    colorText: 'white',
                                }
                            };

                            const options = {
                                clientSecret: return_data.client_secret,
                                appearance: appearance,
                            };

                            // Set up Stripe.js and Elements to use in checkout form, passing the client secret obtained in step 3
                            const elements = stripe.elements(options);

                            // Create and mount the Payment Element
                            const paymentElement = elements.create('payment');
                            paymentElement.mount('#payment-element');

                            const form = document.getElementById('payment-form');

                            form.addEventListener('submit', async (event) => {

                                $('#stripe_paiement #submit').html('Chargement en cours...').prop('disabled', true);

                                event.preventDefault();

                                const {error} = await stripe.confirmPayment({
                                    //`Elements` instance that was used to create the Payment Element
                                    elements,
                                    confirmParams: {
                                        return_url: '<?= URL_WEBSITE; ?>/stripe/check_payement_status.php?selection=' + selection_nos.join(','),
                                    },
                                });

                                if (error) {
                                    $('#stripe_paiement #submit').html('Procéder au paiement de 1,00€ puis afficher les résultats...').prop('disabled', false);

                                    // This point will only be reached if there is an immediate error when
                                    // confirming the payment. Show error to your customer (for example, payment
                                    // details incomplete)
                                    const messageContainer = document.querySelector('#error-message');
                                    messageContainer.textContent = error.message;
                                } else {
                                    $('#stripe_paiement #submit').html('Redirection en cours...')
                                }
                            });
                        });
                    }
                })
            });
        })
    </script>
    <?php
}
?>

<script type="text/javascript">
    i = 0;

    function jouer(val) {
        if (i < 6) {
            document.getElementById(val).style.visibility = "hidden";
            document.getElementById("selection").innerHTML += '<input type="button" value="' + val + '"/>';
            selection_nos.push(val);
            i += 1;
            if (i == 6) {
                $('button#play').css('visibility', 'visible');
            }
        }
    }

</script>
</body>
</html>