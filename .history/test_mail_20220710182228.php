<html>
<head>

    ....

    <style>

        body {
            font-family: Arial;
            width: 550px;
        }

        .response-ribbon {
            padding: 10px;
            background: #ccc;
            border: #bcbcbc 1px solid;
            margin-bottom: 15px;
            border-radius: 3px;
        }

        input,
        textarea {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #Submit-btn {
            background: #1363cc;
            color: #fff;
            width: 150px;
        }




        #email-form {
            border: 1px solid #ccc;
            padding: 20px;

        }

    </style>

</head>


<body>

    <?php 

        if(!empty($responseText)) {

    ?>


    <div class="response-ribbon">

        <?php echo $responseText; ?>

    </div>


    <?php 

        }

    ?>


    <form id="email-form" name="email-form" method="post" action="traitement.php">

        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">

            <tr>

                <td>

                    <div class="label">Nom:</div>

                    <div class="field">

                        <input name="name" type="text" id="name" required />

                    </div>

                </td>

            </tr>

            <tr>

                <td>

                    <div class="label">E-mail:</div>

                    <div class="field">

                        <input name="email" type="text" id="email" required />

                    </div>

                </td>

            </tr>

            <tr>

                <td>

                    <div class="label">Message:</div>

                    <div class="field">

                        <textarea name="msg" cols="45" rows="5" id="msg" required></textarea>

                    </div>

                </td>

            </tr>

            <tr>

                <td>

                    <div class="field">

                        <input name="submit_btn" type="submit" id="submit-btn" value="Envoyer" />

                    </div>

                </td>

            </tr>

        </table>

    </form>

</body>

</html>