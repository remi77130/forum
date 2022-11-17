const counter = document.getElementById('counter');

console.log(counter);
const updateCounter = async () => {
    const data = fetch('https://api.countapi.xyz/hit/chander-counter/visits')
    console.log (data);
}

updateCounter();