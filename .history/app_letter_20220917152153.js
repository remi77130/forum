const txtAnim = document.querySelector('h1');

new Typewriter(txtAnim, {

    
    deleteSpeed: 20
})
.changeDelay(20)

.typeString('Venez discuter')
.pauseFor(500)

.typeString('<strong> Rencontrer</strong>')
.pauseFor(2000)

.deleteChars('10')

.typeString('<span style="color: green;"> Webcam</span>')
.pauseFor(1000)

.deleteChars('5')

.typeString('<span style="color: pink;"> Jouer</span>')

.start()