const txtAnim = document.querySelector('h2');

new Typewriter(txtAnim, {

    
    deleteSpeed: 20
})

//color: #bb86fc;
//color: #491eae;
//color: #03dac6;
//color: rgb(45, 224, 45);
//color: #b43f64;
//color: #44e3d0;
.changeDelay(100)

.typeString('<span style="color: #bb86fc;"> Venez</span>')
.pauseFor(500)

.typeString('<span style="color: #491eae;"> discutez </span>')
.pauseFor(500)



.deleteChars('2')
.pauseFor('800')

.typeString('<span style="color: #491eae;">r</span>')
.pauseFor(2500)

.deleteChars('8')

.typeString('<span style="color: #03dac6;">echanger</span>')
.pauseFor(2000)

.deleteChars('8')

.typeString('<span style="color: rgb(45, 224, 45);"> rencontrer</span>')
.pauseFor(2800)

.deleteChars('10')

.typeString('<span style="color: pink;"> gratuitement !</span>')

.start()



