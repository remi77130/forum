const txtAnim = document.querySelector('h2');

new Typewriter(txtAnim, {

    
    deleteSpeed: 20
})
.changeDelay(20)

.typeString('<span style="color: green;"> Dicutez</span>')
.pauseFor(500)

.typeString('<strong> Jouer</strong>')
.pauseFor(2000)

.deleteChars('10')

.typeString('<span style="color: green;"> Rencontrer</span>')
.pauseFor(1000)

.deleteChars('6')

.typeString('<span style="color: pink;"> Gratuitement !</span>')

.start()



