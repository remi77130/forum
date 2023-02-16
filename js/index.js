// modal age

var modal = document.getElementById("myModal");
var btn = document.getElementById("checkBtn");
var span = document.getElementsByClassName("close")[0];
var ageInput = document.getElementById("ageInput");

btn.onclick = function() {
  if (ageInput.value < 18) {
    alert("Vous n'êtes pas majeur. Vous n'êtes pas autorisé à accéder à ce site.");
    window.location.replace("http://www.google.com");
  } else {
    alert("Bienvenue sur ce site !");
    modal.style.display = "none";
  }
};

span.onclick = function() {
  modal.style.display = "none";
};

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

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

// formulaire

$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
 });

// Recaptcha index
 grecaptcha.enterprise.ready(function() {
    grecaptcha.enterprise.execute('6LeC8eMjAAAAABdU5QaRe3xMJJBaPPVzqIRV-B4o', 
    {action: 'login'}).then(function(token) {
       
    });
});


