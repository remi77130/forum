const txtAnim = document.querySelector('h1');

new Typewriter(txtAnim, {

   //deleteSpeed: 20
})

.typestring('Bienvenue sur Chanderland')

// PETITE PAUSE DE 300 MINI SECONDE
.pauseFor(300)

.typestring('<strong>, le premier site de chat</strong>')
.start()
