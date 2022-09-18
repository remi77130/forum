const txtAnim = document.querySelector('h2');

new Typewriter(txtAnim, {

    
    deleteSpeed: 20
})
.changeDelay(100)

.typeString('<span style="color: green;"> Venez</span>')
.pauseFor(500)

.typeString('<span style="color: green;"> Dicutez </span>')
.pauseFor(500)



.deleteChars('2')
.pauseFor('800')

.typeString('<span style="color: green;">r</span>')
.pauseFor(2500)

.deleteChars('8')

.typeString('<strong> échanger</strong>')
.pauseFor(2000)

.deleteChars('8')

.typeString('<span style="color: green;"> Rencontrer</span>')
.pauseFor(1000)

.deleteChars('10')

.typeString('<span style="color: pink;"> Gratuitement !</span>')

.start()



