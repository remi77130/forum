const counter = document.getElementById('counter');

console.log(counter);
const updateCounter = async () => {
    const data = await fetch('https://api.countapi.xyz/hit/chander-counter/visits')
    const count = await data.json()
    counter.innerHTML = count.value*7
    counter.style.filter = 'blur(0)'
}

updateCounter();