$(document).ready(function(){
    //Quand on clique sur un bouton de suppression d'image
    $(".btn_image_delete").on("click", function (event) {
        //On annule le comportement par défaut du lien car on ne veut pas recharger la page
        event.preventDefault();
        //On récupère l'identifiant de l'image sur l'attribut data-id
        let id = $(this).attr("data-image-id");
        //On crée les données à envoyer à l'API, notament l'action delete, et l'identifiant de l'image à supprimer
        let datas = { "action": "delete", "id": id };
        //On définit enfin la requête ajax
        $.ajax({
            // Adresse à laquelle la requête est envoyée
            url: './api/images.php',
            //Données à envoyer
            data: datas,
            //On travaillera en json
            dataType: "json",
            // La fonction à apeller si la requête aboutie et est en succès
            success: function (data, statusText, xhr) {
                // Si on a un code retour 200, tout s'est bien passé, l'image a été supprimée
                if (xhr.status == 200) {
                    //On la supprime de l'affichage
                    $(".image_container[data-image-id=" + id + "]").fadeOut("normal", function () {
                        $(this).remove();
                    });
                }
            },

            // La fonction à appeler si la requête est en erreur
            error: function (xhr) {
                //On affiche l'erreur dans une alert
                alert("Une erreur est survenue");
            }

        });
        return false;
    });



    
    //Quand on clique sur un bouton de report de commentaire
    $(".btn_report_comment").on("click", function (event) {
        let button = $(this);
        //On annule le comportement par défaut du lien car on ne veut pas recharger la page
        event.preventDefault();
        //On récupère l'identifiant du commentaire sur l'attribut data-id
        let id = $(this).attr("data-comment-id");
        //On crée les données à envoyer à l'API, notament l'action report, et l'identifiant du commentaire à report
        let datas = { "action": "report", "id": id };
        //On définit enfin la requête ajax
        $.ajax({
            // Adresse à laquelle la requête est envoyée
            url: './api/comments.php',
            //Données à envoyer
            data: datas,
            //On travaillera en json
            dataType: "json",
            // La fonction à apeller si la requête aboutie et est en succès
            success: function (data, statusText, xhr) {
                // Si on a un code retour 200, tout s'est bien passé, le commentaire a été supprimée
                if (xhr.status == 200) {
                    //On la supprime de l'affichage
                    button.attr("disabled", "disabled");
                }
            },

            // La fonction à appeler si la requête est en erreur
            error: function (xhr) {
                //On affiche l'erreur dans une alert
                alert(xhr.responseJSON.message);
            }

        });
        return false;
    });
})

