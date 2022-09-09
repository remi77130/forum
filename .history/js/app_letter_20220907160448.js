const txtAnim = document.querySelector('h1');

new Typewriter(txtAnim, {

   deleteSpeed: 20
})
.changeDelay(20)
.typestring('Bienvenue sur Chanderland')
// PETITE PAUSE DE 300 MINI SECONDE
.pauseFor(300)

.typeString('<strong>, le premier site de chat</strong>')
.pause(1000)
//supp du string
.deleteChars(13)
.start()

