const txtAnim = document.querySelector('h2');

new Typewriter(txtAnim, {

    
    deleteSpeed: 50
})
.changeDelay(100)

.typeString('<span style="color: green;"> Venez</span>')
.pauseFor(500)

.typeString('<span style="color: green;"> Dicutez </span>')
.pauseFor(300)



.deleteChars('2')


.typeString('<span style="color: green;">r</span>')
.pauseFor(300)


.typeString('<strong> Jouer</strong>')
.pauseFor(2000)

.deleteChars('5')

.typeString('<span style="color: green;"> Rencontrer</span>')
.pauseFor(1000)

.deleteChars('10')

.typeString('<span style="color: pink;"> Gratuitement !</span>')

.start()



