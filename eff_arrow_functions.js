// function namedFunction() {
//     console.log("arrow function");
// }
// //normal function
// const aFunction = function (arg1, arg2) {  };
// //arrow function
// const aFunction2 =  (arg1, arg2) => {};

// namedFunction();
// var namedFunction1 = function () {
//     console.log("arrow function1");
//   }

// button.addEventListener('click', function () {
//     console.log("arrow function3");
// });

// button.addEventListener('click', () => {
//     console.log("arrow function 3");
// });

/*Arrow function syntax depeneds on:
    i.  No of Argumewnts

        *Examples*
        const zeroArgs = () => { do something};

        const zeroArgs = _ => { do something};  //These two are similar

        const zeroArgs = (only_one_arg) => { do something};

        const zeroArgs = only_one_arg =>  //These two are similar

        But for many args we use

        const manyArgs =  (arg1, arg2) => { do something};

    ii. Whether you'd like an implicit return.

        *Example*
        Arrow functions, by default, automatically create a return keyword if the code only takes up one line, and is not enclosed in a block.

        So, these two are equivalent:

        const sum1 = (num1, num2) => num1 + num2
        const sum2 = (num1, num2) => { return num1 + num2 }

        **These two factors are the reason why you can write shorter code like the moreThan20 you’ve seen above:

        let array = [1,7,98,5,4,2]

        // ES5 way
        var moreThan20 = array.filter(function (num) {
        return num > 20
        })

        // ES6 way
        let moreThan20 = array.filter(num => num > 20)
        In summary, arrow functions are pretty cool. They take a bit of time to get used to, so give it a try and you’ll be using it everywhere pretty soon.

        But before you jump onto the arrow functions FTW bandwagon, I want to let you know about another nitty-gritty feature of the ES6 arrow function that cause a lot of confusion – the lexical this.

        The lexical this
this is a unique keyword whose value changes depending on how it is called. When it’s called outside of any function, this defaults to the Window object in the browser.

console.log(this) // Window
This defaults to window object in browsers
This defaults to window object in browsers
When this is called in a simple function call, this is set to the global object. In the case of browsers, this will always be Window.

function hello () {
  console.log(this)
}

hello() // Window
JavaScript always sets this to the window object within a simple function call. This explains why the this value within functions like setTimeout is always Window.

When this is called in an object method, this would be the object itself:

let o = {
  sayThis: function() {
    console.log(this)
  }
}

o.sayThis() // o
This refers to the object when the function is called in an object method.
This refers to the object when the function is called in an object method.
When the function is called as a constructor, this refers to the newly constructed object.

function Person (age) {
  this.age = age
}

let greg = new Person(22)
let thomas = new Person(24)

console.log(greg) // this.age = 22
console.log(thomas) // this.age = 24
This refers to the constructed object called with the new keyword or Object.create().
This refers to the constructed object called with the new keyword or Object.create().
When used in an event listener, this is set to the element that fired the event.

let button = document.querySelector('button')

button.addEventListener('click', function() {
  console.log(this) // button
})
As you can see in the above situations, the value of this is set by the function that calls it. Every function defines it’s own this value.

In fat arrow functions, this never gets bound to a new value, no matter how the function is called. this will always be the same this value as its surrounding code. (By the way, lexical means relating to, which I guess, is how the lexical this got its name).

Okay, that sounds confusing, so let’s go through a few real examples.

First, you never want to use arrow functions to declare object methods, because you can’t reference the object with this anymore.

let o = {
  // Don't do this
  notThis: () => {
    console.log(this) // Window
    this.objectThis() // Uncaught TypeError: this.objectThis is not a function
  },
  // Do this
  objectThis: function () {
    console.log(this) // o
  }
  // Or this, which is a new shorthand
  objectThis2 () {
    console.log(this) // o
  }
}
Second, you may not want to use arrow functions to create event listeners because this no longer binds to the element you attached your event listener to.

However, you can always get the right this context with event.currentTarget. Which is why I said may not.

button.addEventListener('click', function () {
  console.log(this) // button
})

button.addEventListener('click', e => {
  console.log(this) // Window
  console.log(event.currentTarget) // button
})
Third, you may want to use the lexical this in places where the this binding changes without you wanting it to. An example is the timeout function, so you never have to deal with the this, that or self nonsense.

let o = {
  // Old way
  oldDoSthAfterThree: function () {
    let that = this
    setTimeout(function () {
      console.log(this) // Window
      console.log(that) // o
    })
  },
  // Arrow function way
  doSthAfterThree: function () {
    setTimeout(() => {
      console.log(this) // o
    }, 3000)
  }
}
This use case is particularly helpful if you needed to add or remove a class after some time has elapsed:

let o = {
  button: document.querySelector('button')
  endAnimation: function () {
    this.button.classList.add('is-closing')
    setTimeout(() => {
      this.button.classList.remove('is-closing')
      this.button.classList.remove('is-open')
    }, 3000)
  }
}
Finally, feel free to use the fat arrow function anywhere else to help make your code neater and shorter, like the moreThan20 example we had above:

let array = [1,7,98,5,4,2]
let moreThan20 = array.filter(num => num > 20)
Let’s move on.

        Study this page for further info on 'this' and es6 https://zellwk.com/blog/es6/#arrow-functions

*/

for (var i = 1; i <= 5; i++) {
    setTimeout(function() {
      console.log("i: " + i);
    }, i * 1000);
  }
