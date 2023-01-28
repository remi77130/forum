var modal = document.getElementById("myModal");

var btn = document.getElementById("myBtn");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
    modal.style.display = "block";

}

span.onclick = function() {
    modal.style.display = "none";
}

// fermeture modal sur le coté de la fenetre 
window.onclick = function(event) {
    if(event.target == modal) {
        modal.style.display = "none";
        
    }
}


/*const to_go_header = document.querySelector('.to_go_header');

to_go_header.addEventListener('click', () =>{

    window.scrollTo({
        top: 0, left: 0, behavior: 'smooth'
    })
})*/


// Modal welcome

/*if (newUser) {
    var modal = document.querySelector(".modal");
    modal.style.display = "block";
  }
  var closeButton = document.querySelector("#close-modal");
closeButton.addEventListener("click", function() {
  modal.style.display = "none";
});*/