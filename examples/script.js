let vH1 = document.querySelector('h1')
let vLabel = document.querySelectorAll('label')
let vInput = document.querySelector('input')
let button = document.querySelector('button')
let vBox1 = document.querySelector('.cBox1')
let vBox2 = document.querySelector('.cBox2')
let vA = document.querySelector('a')
let oldHref = vA.getAttribute('href')

vA.setAttribute('href', 'https://ya.ru')
vA.setAttribute('title', 'Go to yandex')
vA.textContent = 'Yandex'

document.getElementById('cLink').addEventListener('click', function (event) {
    let tagName = event.target.tagName.toLowerCase()
    if (tagName === 'li') {
        event.target.style.color = 'blue'
        let liValue = event.target.textContent
        vA.setAttribute('href', 'https://' + liValue)
        vA.setAttribute('title', 'Go to ' + liValue)
        vA.textContent = liValue
    }
    if (event.target.classList.contains('cColor')) {
        event.target.style.color = 'red'
    }
})

function buttonHandler() {
    console.log('clicked!')
    vLabel[0].textContent = vInput.value
    vLabel[1].textContent = vInput.value
}

vH1.addEventListener('mouseenter', function () {
    this.style.color = 'red'
    this.style.backgroundColor = 'darkgray'
    this.textContent = 'Hello PEPTO!'
})
vH1.addEventListener('mouseleave', function () {
    this.style.color = 'black'
    this.style.backgroundColor = 'transparent'
    this.textContent = 'Hello!'
})

vBox1.addEventListener('mouseenter', function () {
    this.style.color = 'white'
    this.style.backgroundColor = 'black'
})
vBox1.addEventListener('mouseleave', function () {
    this.style.color = 'black'
    this.style.backgroundColor = 'transparent'
})

vBox2.addEventListener('mouseenter', function () {
    this.style.color = 'green'
    this.style.backgroundColor = 'darkgray'
})
vBox2.addEventListener('mouseleave', function () {
    this.style.color = 'black'
    this.style.backgroundColor = 'transparent'
})

button.addEventListener('click', buttonHandler)

console.log('vH1.textContent = ', vH1.textContent)
console.log('vLabel[0] = ', vLabel[0].textContent)
console.log('vLabel[1] = ', vLabel[1].textContent)
console.log('vInput.value = ', vInput.value)

