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