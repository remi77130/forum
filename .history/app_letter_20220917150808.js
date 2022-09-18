const txtAnim = document.querySelector('h1');

new Typewriter(txtAnim, {

    
    //deleteSpeed: 20
})

.typeString('Venez discuter')
.pauseFor(500)

.typeString('Rencontrer')

.start()