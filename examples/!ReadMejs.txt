// class -> .CLASS_NAME
// id -> #ID
// tag -> TAG_NAME
var div = document.querySelector('#playground')
var p = document.querySelectorAll('.text')
var h1 = document.querySelector('h1')
var input = document.querySelector('input')
div.innerHTML = '<h2 style="color: red;">From javascript</h2>'
h1.textContent = 'Changed from JS'
console.log(input.value)
console.log(div.innerHTML)
console.log(p)
console.log(h1.textContent)
---------------------------------------------------
var a = document.querySelector('a')
var oldHref = a.getAttribute('href')
a.setAttribute('href', 'https://ya.ru')
a.setAttribute('title', 'Go to yandex')
a.textContent = 'Yandex'
console.log(a.attributes)
---------------------------------------------------
var a = document.querySelector('a')
var oldHref = a.getAttribute('href')
a.setAttribute('href', 'https://ya.ru')
a.setAttribute('title', 'Go to yandex')
a.textContent = 'Yandex'
var box1 = document.querySelector('#box1')
var box2 = document.querySelector('#box2')
box1.classList.add('red')
var hasClass = box2.classList.contains('blue')
console.log(hasClass)
if (hasClass) {
  box2.classList.remove('blue')
} else {
  box2.classList.add('blue')
}
----------------------------------------------------
var button = document.querySelector('button')
var h1 = document.querySelector('h1')
var input = document.querySelector('input')
function buttonHandler() {
  console.log('clicked!')
  h1.textContent = input.value
}
// background-color => backgroundColor
h1.addEventListener('mouseenter', function() {
  this.style.color = 'red'
  this.style.backgroundColor = 'black'
})
h1.addEventListener('mouseleave', function() {
  this.style.color = 'black'
  this.style.backgroundColor = 'transparent'
})
button.addEventListener('click', buttonHandler)
-------------------------------------------------------
var divs = document.querySelectorAll('div')
var link = document.querySelector('a')
for (var i = 0; i < divs.length; i++) {
  divs[i].addEventListener('click', function(event) {
    event.stopPropagation()
    console.log(this.getAttribute('id'))
  })
}
link.addEventListener('click', handleLinkClick)
function handleLinkClick(event) {
  event.preventDefault()

  var div = divs[0]

  div.style.display = div.style.display === 'none'
    ? 'flex'
    : 'none'
}
-------------------------------------------------------
// var p = document.querySelectorAll('p')

// for (var i = 0; i < p.length; i++) {
//   p[i].addEventListener('click', function(event) {
//     event.target.style.color = 'blue'
//   })
// }
document.getElementById('wrapper').addEventListener('click', function(event) {
  var tagName = event.target.tagName.toLowerCase()

  if (tagName === 'p') {
    event.target.style.color = 'blue'
  }
  if (event.target.classList.contains('color')) {
    event.target.style.color = 'red'
  }
})
------------------------------------------------------
var div = document.querySelector('#playground')
var p = document.querySelectorAll('.text')
var h1 = document.querySelector('h1')
var input = document.querySelector('input')
div.innerHTML = '<h2 style="color: red;">From javascript</h2>'
h1.textContent = 'Changed from JS'
console.log(input.value)
console.log(div.innerHTML)
console.log(p)
console.log(h1.textContent)
-------------------------------------------------------
var a = document.querySelector('a')
var oldHref = a.getAttribute('href')
a.setAttribute('href', 'https://ya.ru')
a.setAttribute('title', 'Go to yandex')
a.textContent = 'Yandex'
console.log(a.attributes)
-------------------------------------------------------
var a = document.querySelector('a')
var oldHref = a.getAttribute('href')
a.setAttribute('href', 'https://ya.ru')
a.setAttribute('title', 'Go to yandex')
a.textContent = 'Yandex'
var box1 = document.querySelector('#box1')
var box2 = document.querySelector('#box2')
box1.classList.add('red')
var hasClass = box2.classList.contains('blue')
console.log(hasClass)
if (hasClass) {
  box2.classList.remove('blue')
} else {
  box2.classList.add('blue')
}
-------------------------------------------------------
var button = document.querySelector('button')
var h1 = document.querySelector('h1')
var input = document.querySelector('input')
function buttonHandler() {
  console.log('clicked!')
  h1.textContent = input.value
}
// background-color => backgroundColor
h1.addEventListener('mouseenter', function() {
  this.style.color = 'red'
  this.style.backgroundColor = 'black'
})
h1.addEventListener('mouseleave', function() {
  this.style.color = 'black'
  this.style.backgroundColor = 'transparent'
})
button.addEventListener('click', buttonHandler)
-------------------------------------------------------
var divs = document.querySelectorAll('div')
var link = document.querySelector('a')
for (var i = 0; i < divs.length; i++) {
  divs[i].addEventListener('click', function(event) {
    event.stopPropagation()
    console.log(this.getAttribute('id'))
  })
}
link.addEventListener('click', handleLinkClick)
function handleLinkClick(event) {
  event.preventDefault()
  var div = divs[0]
  div.style.display = div.style.display === 'none'
    ? 'flex'
    : 'none'
}
-------------------------------------------------------
// var p = document.querySelectorAll('p')
// for (var i = 0; i < p.length; i++) {
//   p[i].addEventListener('click', function(event) {
//     event.target.style.color = 'blue'
//   })
// }
document.getElementById('wrapper').addEventListener('click', function(event) {
  var tagName = event.target.tagName.toLowerCase()
  if (tagName === 'p') {
    event.target.style.color = 'blue'
  }
  if (event.target.classList.contains('color')) {
    event.target.style.color = 'red'
  }
})
-------------------------------------------------------
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Javascript</title>
</head>
<body>
  <h1>Javascript extra</h1>

  <input type="text">

  <button>Save</button>

  <script defer src="script.js" type="text/javascript"></script> 
</body>
</html>
*******************************************************
document.querySelector('button').addEventListener('click', function(event) {
  var value = document.querySelector('input').value
  var obj = {
    text: value
  }
  localStorage.setItem('headerText', JSON.stringify(obj))
})
document.addEventListener('DOMContentLoaded', function() {
  var obj = {} // undefined
  try {
    obj = JSON.parse(localStorage.getItem('headerText'))
  } catch(e) {}
  // undefined . text
  if (obj && obj.text && obj.text.trim()) {
    document.querySelector('h1').textContent = obj.text
  }
})
-------------------------------------------------------
// number, string, boolean, null, undefined
// object
var car = {
  name: 'Ford',
  year: 2015,
  person: {
  }
}
// car.__proto__ => Object.prototype
// [] => Array => Object

console.log(car)
-------------------------------------------------------
function Car(name, year) {
  this.name = name
  this.year = year
}
Car.prototype.getAge = function() {
  return new Date().getFullYear() - this.year
}
Car.prototype.color = 'black'
var ford = new Car('Ford', 2015)
var bmw = new Car('BMW', 2017)
ford.color = 'red'
console.log(ford)
console.log(bmw)
-------------------------------------------------------
var ford = Object.create({
  calculateDistancePerYear: function() {
    Object.defineProperty(this, 'distancePerYear', {
      value: Math.ceil(this.distance / this.age),
      enumerable: false,
      writable: false,
      configurable: false
    })
  }
}, {
  name: {
    value: 'Ford',
    enumerable: true,
    writable: false,
    configurable: false
  },
  model: {
    value: 'Focus',
    enumerable: true,
    writable: false,
    configurable: false
  },
  year: {
    value: 2015,
    enumerable: true,
    writable: false,
    configurable: false
  },
  distance: {
    value: 120500,
    enumerable: true,
    writable: true,
    configurable: false
  },
  age: {
    enumerable: true,
    get: function() {
      console.log('Получаем возраст')
      return new Date().getFullYear() - this.year
    },
    set: function() {
      console.log('Устанавливаем значение')
    }
  }
})
ford.calculateDistancePerYear()
for (var key in ford) {
  if (ford.hasOwnProperty(key)) {
    console.log(key, ford[key])
  }
}
-------------------------------------------------------
var person = {
  name: 'Max',
  age: 28,
  job: 'Frontend'
}
// for (var key in person) {
//   if (person.hasOwnProperty(key))
//     console.log(person[key])
// }
Object.keys(person).forEach(function(key) {
  console.log(person[key])
})
-------------------------------------------------------
var createCounter = function(counterName) {
  var counter = 0
  return {
    increment: function() {
      counter++
    },
    decrement: function() {
      counter--
    },
    getCounter: function() {
      return counter
    }
  }
}
var counterA = createCounter('Counter A')
var counterB = createCounter('Counter B')
counterA.increment()
counterA.increment()
counterA.increment()
counterB.decrement()
counterB.decrement()
-------------------------------------------------------
var person = {
  age: 28,
  name: 'Max',
  job: 'Frontend',
  displayInfo: function(ms) {
    setTimeout(function() {
      console.log('Name: ', this.name)
      console.log('Job:', this.job)
      console.log('Age: ', this.age)
    }.bind(this), ms)
  }
}
person.displayInfo(5000)
-------------------------------------------------------
function printObject(objName) {
  console.log('Printing object: ', objName)
  for (var key in this) {
    if (this.hasOwnProperty(key)) {
      console.log('[' + key + ']', this[key])
    }
  }
}
var person = {
  firstName: 'Max',
  job: 'Backend',
  age: 29,
  friends: ['Elena', 'Igor']
}
var car = {
  name: 'Ford',
  model: 'Focus',
  year: 2017
}
var printPerson = printObject.bind(person)
printPerson('Person')
printObject.call(car, 'Car')
printObject.apply(person, ['Person'])
-------------------------------------------------------
var a = [1, 2, 3]
var b = [5, 'Hello', 6]
Array.prototype.double = function() {
  var newArray = this.map(function(item) {
    if (typeof item === 'number') {
      return Math.pow(item, 2)
    }
    if (typeof item === 'string') {
      return item += item
    }
  })
  return newArray
}
var newA = a.double()
var newB = b.double()
console.log('A', newA.double())
console.log('B', newB)
-------------------------------------------------------
// function getAge(year) {
//   const current = new Date().getFullYear()
//   return current - year
// }

// const calculateAge = (year) => {
//   const current = new Date().getFullYear()
//   return current - year
// }

// const getAge = year => {
//   const current = new Date().getFullYear()
//   return current - year
// }

// const getAge = year => new Date().getFullYear() - year

// const logAge = year => console.log(new Date().getFullYear() - year)

// logAge(1993)

// console.log(getAge(1949))

const person = {
  age: 25,
  firstName: 'Maxim',
  logNameWithTimeout() {
    window.setTimeout(() => {
      console.log(this.firstName)
    }, 1000)
  }
}
-------------------------------------------------------
const createPost = (title, text = 'Default text', date = new Date().toLocaleDateString()) => {
  return {title,text,date}
}
const post = createPost('Скоро новый год!')
console.log(post)
-------------------------------------------------------
const createCar = (name, model) => ({name, model})
const ford = createCar('Ford', 'Focus')
console.log(ford)
const yearField = 'year'
const bmw = {
  name: 'BMW',
  ['model']: 'X6 Sport',
  [yearField]: 2018,
  logFields() {
    const {name, year, model} = this
    console.log(name, model, year)
  }
}
console.log(bmw)
bmw.logFields()
// const year = bmw.year
const {year} = bmw
console.log(year)
-------------------------------------------------------
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>JS Objects</title>
</head>
<body>
  <h1>EcmaScript 6</h1>
  <form>
    <input type="text" name="title">
    <br>
    <input type="text" name="text">
    <br>
    <input type="text" name="description">
    <br>
    <button type="submit">Save</button>
  </form>
  <script src="index.js"></script>
</body>
</html>
-------------------------------------------------------
const form = document.querySelector('form')
form.addEventListener('submit', event => {
  event.preventDefault()
  const title = form.title.value
  const text = form.text.value
  const description = form.description.value
  saveForm(title, text, description)
})
// Spread
// function saveForm(data) {
//   const formData = {
//     date: new Date().toLocaleDateString(),
//     ...data
//   }
//   console.log('Ford data:', formData)
// }
// Rest
function saveForm(...args) {
  const [title, text, description] = args

  const formData = {
    date: new Date().toLocaleDateString(),
    title, text, description
  }
  console.log('Ford data:', formData)
}
-------------------------------------------------------
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>JS Objects</title>
</head>
<body>
  <h1>EcmaScript 6</h1>

  <ul>
    
  </ul>

  <script src="index.js"></script>
</body>
</html>
------------------------------------------------
const createLink = ({path, name}) => `<a target="_blank" href="${path}">${name}</a>`
const ul = document.querySelector('ul')
const google = `<li>${createLink({path: 'https://google.com', name: 'Google'})}</li>`
const yandex = `<li>${createLink({path: 'https://ya.ru', name: 'Yandex'})}</li>`
ul.insertAdjacentHTML('afterbegin', google)
ul.insertAdjacentHTML('afterbegin', yandex)
const strToLog = `
  Hello 
  World
    I am 
      New tab
`
console.log(strToLog)
-------------------------------------------------------
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>JS Objects</title>
</head>
<body>
  <h1>EcmaScript 6</h1>

  <div class="wrapper"></div>

  <script src="index.js"></script>
</body>
</html>
------------------------------------------------
// RootElement <= Box <= instances

class RootElement {
  constructor(tagName = 'div') {
    this.$el = document.createElement(tagName)
    this.$el.style.marginBottom = '20px'
  }

  hide() {
    this.$el.style.opacity = '0'
  }

  show() {
    this.$el.style.opacity = '1'
  }

  append() {
    document.querySelector('.wrapper').insertAdjacentElement('beforeend', this.$el)
  }
}

class Box extends RootElement {
  constructor(color, size = 150, tagName) {
    super(tagName)
    this.color = color
    this.size = size
  }

  create() {
    this.$el.style.background = this.color
    this.$el.style.width = this.$el.style.height = `${this.size}px`

    this.append()

    return this
  }
}

class Circle extends RootElement {
  constructor(color) {
    super()

    this.color = color
  }

  create() {
    this.$el.style.borderRadius = '50%'
    this.$el.style.width = this.$el.style.height = `120px`
    this.$el.style.background = this.color

    this.append()

    return this
  }
}

const redBox = new Box('red', 100, 'div').create()
const blueBox = new Box('blue').create()

const circle = new Circle('green').create()

circle.$el.addEventListener('mouseenter', () => {
  circle.hide()
})

circle.$el.addEventListener('mouseleave', () => {
  circle.show()
})
-------------------------------------------------------
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>JS Plugin</title>
  <style>
    * {
      box-sizing: border-box;
    }

    .app {
      width: 100%;
      height: 100vh;
      overflow: hidden;
      display: flex;
      justify-content: center;
      padding-top: 50px;
    }

    .dropdown {
      position: relative;
      width: 400px;
    }

    .dropdown.open .dropdown__menu {
      display: block;
    }

    .dropdown__label {
      padding: 5px 10px;
      border-radius: 5px;
      border: 1px solid black;
      width: 100%;
      cursor: pointer;
    }

    .dropdown__menu {
      list-style: none;
      margin: 0;
      padding: 0;
      display: none;
      border-radius: 5px;
      border: 1px solid black;
      position: absolute;
      width: 100%;
      top: 29px;
      padding-top: 10px;
      padding-bottom: 10px;
    }

    .dropdown__menu li {
      padding: 5px 10px;
    }

    .dropdown__menu li:hover {
      background: rgba(0, 0, 0, .2);
      cursor: pointer;
    }
  </style>
</head>
<body>

  <div class="app">

    <div class="dropdown" id="dropdown">
      <div class="dropdown__label"></div>
      <ul class="dropdown__menu"></ul>
    </div>

  </div>


  <script src="index.js"></script>
</body>
</html>
-------------------------------------------------------
class Dropdown {
  constructor(selector, options) {
    this.$el = document.querySelector(selector)
    this.items = options.items
    
    this.$el.querySelector('.dropdown__label').textContent = this.items[0].label

    this.$el.addEventListener('click', event => {
      if (event.target.classList.contains('dropdown__label')) {
        if (this.$el.classList.contains('open')) {
          this.close()
        } else {
          this.open()
        }
      } else if (event.target.tagName.toLowerCase() === 'li') {
        this.select(event.target.dataset.id)
      }
    })

    const itemsHTML = this.items.map(i => {
      return `<li data-id="${i.id}">${i.label}</li>`
    }).join(' ')

    this.$el.querySelector('.dropdown__menu').insertAdjacentHTML('afterbegin', itemsHTML)
  }

  select(id) {
    const item = this.items.find(i => i.id === id)
    this.$el.querySelector('.dropdown__label').textContent = item.label
    this.close()
  }

  open() {
    this.$el.classList.add('open')
  }

  close() {
    this.$el.classList.remove('open')
  }
}


const dropdown = new Dropdown('#dropdown', {
  items: [
    {label: 'Москва', id: 'msk'},
    {label: 'Санкт-Петербург', id: 'spb'},
    {label: 'Новосибирск', id: 'nsk'},
    {label: 'Краснодар', id: 'krdr'},
    {label: 'Ростов', id: 'rostov'}
  ]
})
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
-------------------------------------------------------
