const txtAnim = document.querySelector('h2');

new Typewriter(txtAnim, {

    
    deleteSpeed: 20
})

//  color: #bb86fc;
//color: #491eae;
//color: #03dac6;
//color: rgb(45, 224, 45);
.changeDelay(100)

.typeString('<span style="color: green;"> Venez</span>')
.pauseFor(500)

.typeString('<span style="color: green;"> discutez </span>')
.pauseFor(500)



.deleteChars('2')
.pauseFor('800')

.typeString('<span style="color: green;">r</span>')
.pauseFor(2500)

.deleteChars('8')

.typeString('<strong> échanger</strong>')
.pauseFor(2000)

.deleteChars('8')

.typeString('<span style="color: green;"> rencontrer</span>')
.pauseFor(2800)

.deleteChars('10')

.typeString('<span style="color: pink;"> gratuitement !</span>')

.start()



