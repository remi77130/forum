const txtAnim = document.querySelector('h1');

new Typewriter(txtAnim, {

   deleteSpeed: 500
})
.changeDelay(20)
.typestring('Bienvenue sur Chanderland')
// PETITE PAUSE DE 300 MINI SECONDE
.pauseFor(300)

.typeString('<strong>, le premier site de chat</strong>')
.pause(1000)
//supp du string
.deleteChars(13)
.typeString('<span style="color:#27ae60"> CSS </span> ! ')
.pausFor(1000)
// supp string
.deletechars(5)
.typeString('<span style="color:#27ae60"> javaScript </span> ! ')
.pauseFor(1000)
.deleteChars(7)
.typeString('<span style="color:#27ae60">   PHP </span> ! ')

.start()

