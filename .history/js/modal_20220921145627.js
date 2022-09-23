var modal = document.getElementById('modal');

var btn = document.getElementById('myBtn');

var span = document.getElementsByClassName('close')[0];

btn.onclick = function() {

// LE MODAL
modal.style.display = "block";

}

span.onclick = function() {
modal.style.display = "none";

}