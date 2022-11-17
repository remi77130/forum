const counter = document.getElementById('counter');

console.log(counter);
const updateCounter = async () => {
    const data = await fetch('https://api.countapi.xyz/hit/chander-counter/visits')
    const count = await data.json()
    counter.innerHTML = count.value*10000
    counter.style.filter = 'bluer(50)'
}

updateCounter();