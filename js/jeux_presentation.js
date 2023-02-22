// fonction pour afficher une pop-up
function showPopup(popup) {
    // affiche la pop-up
    popup.style.display = "block";
    // ferme la pop-up après 5 secondes
    setTimeout(function() {
      popup.style.display = "none";
    }, 5000);
  }
  
  // affiche la première pop-up après 1 seconde
  setTimeout(function() {
    var popup1 = document.getElementById("popup1");
    showPopup(popup1);
  }, 1000);
  
  // affiche la deuxième pop-up après 10 secondes
  setTimeout(function() {
    var popup2 = document.getElementById("popup2");
    showPopup(popup2);
  }, 10000);
  