$(document).ready(function(){
    if ($('#desire_timer')[0]) {
        init_timer();
    }

    //Quand on clique sur une envie
    $(".container_choix button").on("click", function (event) {
        let disabled = $(this).attr("data-disabled");
        if(!disabled){
            let desire_id = $(this).attr("data-desire_id");
            let user_id = $(this).attr("data-user_id");
            let datas = { "action": "updateDesire", "user_id": user_id, "desire_id": desire_id };
            $.ajax({
                // Adresse à laquelle la requête est envoyée
                url: './api/user.php',
                //Données à envoyer
                data: datas,
                //On travaillera en json
                dataType: "json",
                // La fonction à apeller si la requête aboutie et est en succès
                success: function (data, statusText, xhr) {
                    // Si on a un code retour 200, tout s'est bien passé, l'image a été supprimée
                    if (xhr.status == 200) {
                        //On la supprime de l'affichage
                        $(this).attr("data-selected", "selected");
                        $(".container_choix button").attr("data-disabled", "disabled");
                        $("#desire_timer").attr("data-init", 30*60);
                        $("#desire_timer").removeClass("hidden");
                        init_timer();
                    }
                },
    
                // La fonction à appeler si la requête est en erreur
                error: function (xhr) {
                    //On affiche l'erreur dans une alert
                    alert("Une erreur est survenue");
                }
    
            });
        }
    })




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

    function init_timer(){
        const departSecondes = parseInt($("#desire_timer").attr("data-init"));
        let temps = departSecondes;
    
        function appendtime(temps){
            const timerElement = document.getElementById("desire_timer")
            let minutes = parseInt(temps / 60, 10)
            let secondes = parseInt(temps % 60, 10)
    
            minutes = minutes < 10 ? "0" + minutes : minutes
            secondes = secondes < 10 ? "0" + secondes : secondes
    
            timerElement.innerText = `${minutes}:${secondes}`
        }

        function afterEndOfTime(){
            $("#desire_timer").addClass("hidden");
            $(".container_choix button").removeAttr("data-selected");
            $(".container_choix button").removeAttr("data-disabled");
            clearInterval(interval);
            return 0;
        }
    
        appendtime(temps);
    
        var interval = setInterval(() => {
            temps = temps - 1;
            temps <= 0 ? afterEndOfTime() : appendtime(temps);
        }, 1000);
    }

    // Bouton Like
    $(".like_button").on("click", function(event){
        let button = $(this);
        //On annule le comportement par défaut du lien car on ne veut pas recharger la page
        event.preventDefault();
        if(button.hasClass("disabled")){
            return false;
        }
        //On récupère l'identifiant de l'utilisateur à liker
        let user_id = $(this).attr("data-user-id");
        //On crée les données à envoyer à l'API, notament l'action like, et l'identifiant de l'utilisateur à liker
        let datas = { "action": "like", "id": user_id };
        //On définit enfin la requête ajax
        $.ajax({
            // Adresse à laquelle la requête est envoyée
            url: './api/likes.php',
            //Données à envoyer
            data: datas,
            //On travaillera en json
            dataType: "json",
            // La fonction à apeller si la requête aboutie et est en succès
            success: function (data, statusText, xhr) {
                // Si on a un code retour 200, tout s'est bien passé, le commentaire a été supprimée
                if (xhr.status == 200) {
                    //On la supprime de l'affichage
                    //button.attr("disabled", "disabled");
                    if(data.datas.like){
                        button.children(".img_not_liked").first().addClass("hide");
                        button.children(".img_liked").first().removeClass("hide");
                    }
                    else{
                        button.children(".img_liked").addClass("hide");
                        button.children(".img_not_liked").removeClass("hide");
                    }
                    button.closest(".like_container").children(".like_counter").text("(" + data.datas.counter + ")");
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


  ///// Info profil

const toggleButton = document.getElementById('toggleButton');
const content = document.getElementById('content');

toggleButton.addEventListener('click', function() {
  if (content.style.display === 'block') {
    content.style.display = 'none';
    
  } else {
    content.style.display = 'block';
  }
});