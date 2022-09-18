const txtAnim = document.querySelector('h2');

new Typewriter(txtAnim, {

    
    deleteSpeed: 20
})
.changeDelay(50)

.typeString('<span style="color: green;"> Venez</span>')
.pauseFor(500)

.typeString('<span style="color: green;"> Dicutez</span>')
.pauseFor(500)



.deleteChars('7')

.typeString('<strong> Jouer</strong>')
.pauseFor(2000)

.deleteChars('5')

.typeString('<span style="color: green;"> Rencontrer</span>')
.pauseFor(1000)

.deleteChars('10')

.typeString('<span style="color: pink;"> Gratuitement !</span>')

.start()



