const txtAnim = document.querySelector('h3');

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

.typeString('<span style="color: #5f5fff;"> Venez</span>')
.pauseFor(500)

.typeString('<span style="color: #00ff00;"> discutez </span>')
.pauseFor(500)



.deleteChars('2')
.pauseFor('800')

.typeString('<span style="color: #00ff00;">r</span>')
.pauseFor(2500)

.deleteChars('8')

.typeString('<span style="color: #d27eff;">échanger</span>')
.pauseFor(2000)

.deleteChars('8')

.typeString('<span style="color: #f00f0f;"> rencontrer</span>')
.pauseFor(2800)

.deleteChars('10')

.typeString('<span style="color: #44e3d0;"> gratuitement !</span>')

.start()



