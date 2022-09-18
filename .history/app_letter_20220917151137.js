const txtAnim = document.querySelector('h1');

new Typewriter(txtAnim, {

    
    deleteSpeed: 200
})
.changeDelay(20)
.typeString('Venez discuter')
.pauseFor(500)

.typeString('<strong>Rencontrer</strong>')
.pause(1000)

.deleteChars('10')
.start()