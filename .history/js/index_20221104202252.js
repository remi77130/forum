   // Le .ready est obligatoire pour pouvoir faire un script jQuery
   $(document).ready(function () {

    // Si une modification est faite sur le département
    $('#select_departement').on('change', function () {

        departement_code = $(this).val()

        // S'il y a une donnée dans le département
        if (departement_code != "" && departement_code != undefined) {

            // On récupère le département sélectionnée et on fait une requête Ajax 
            // pour récupérer les villes qui correspondent

            // On utilise getJSON (qui est un équivalent d'Ajax 
            // mais correspond mieux pour cette requête)
            
            $.getJSON('./get_villes_from_departement.php', {departement_code: departement_code}, function (villes) {

                options = ['<option value="">Sélectionner la ville...</option>']

                // On parcourt les villes reçues
                $.each(villes, function( index, ville ) {

                    // On rajoute l'option
                    options.push('<option value="' + ville.ville_id + '">' + ville.ville_nom_reel + '</option>');
                });

                // On affiche les options dans le formulaire
                $("#select_ville").html(options.join()) // La méthode permet de rendre notre tableau en string

                // On affiche le champ
                $("#ville").show();
            });
        }
    })
});


<script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
</script>