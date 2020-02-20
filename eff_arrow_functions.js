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

        Study this page for further info on 'this' and es6

*/

for (var i = 1; i <= 5; i++) {
    setTimeout(function() {
      console.log("i: " + i);
    }, i * 1000);
  }
