const txtAnim = document.querySelector('h1');

new Typewriter(txtAnim, {

    
    deleteSpeed: 20
})
.changeDelay(200)
.typeString('Venez discuter')
.pauseFor(500)

.typeString('<strong>Rencontrer</strong>')
.pause(9000)

.deleteChars('10')
.start()