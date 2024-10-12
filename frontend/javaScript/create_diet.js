/* Jimmi */
let count = 2;
const min = 2;
const max = 6;
const numberDisplay = document.getElementById('number-display');

function increase() {
    if (count < max) {
        count++;
        numberDisplay.textContent = count;
    }
}

function decrease() {
    if (count > min) {
        count--;
        numberDisplay.textContent = count;
    }
}
/* WONT WORK SEPERATELY */