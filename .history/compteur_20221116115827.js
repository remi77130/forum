const counter = document.getElementById('counter');

console.log(counter);
const updateCounter = () => {
    const data = fetch('https://api.countapi.xyz/hit/chander-counter/visits')
}

updateCounter();