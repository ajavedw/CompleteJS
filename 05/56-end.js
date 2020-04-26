console.log("apple");

function testCallback(arg, callback) {
    //arg = 'my cup';

    finish = 'fill' + arg;
    callback(finish);
}

function cBack(cBackArg) {
    console.log(cBackArg);

}

testCallback('my cup', cBack);

// test

function printing() {
    setTimeout(function () {
        console.log('timer');
    }, 1000);

    console.log('without');
}
printing();

function find(elements, callback) {
    //The time consuming operation
    setTimeout(function () {
        elements.push(3, 4, 5);
        callback(elements);
    }, 2000);
}

find([1, 2], function (results) {
    console.log("Found other elements " + results);
});

/**********/

find1([1, 2], function (results) {
    process(results, onMethodsDone);
});

function onMethodsDone(results1) {
    console.log("Results : " + results1);
}

console.log("Fucked up callbcak");

function process(elements, callback1) {
    //The time consuming operation
    setTimeout(function () {
        elements.push(6, 7, 8);
        callback1(elements);
    }, 2000)
}

function find1(elements, callback) {
    //The time consuming operation
    setTimeout(function () {
        elements.push(3, 4, 5);
        callback(elements);
    }, 2000);
}

// goto https://medium.com/@malintha/javascript-callback-functions-478956695f6a for further examples

// an example starts

// find2([1,2], response);

// function response(err, result) {
//     if(err) {
//        console.log(err);
//     }
//     else {
//        console.log("operation successful : "+result);
//     }
// }

// console.log("meanwhile I show up");

// function find2(elements, callback) {
//     //The time consuming operation
//     setTimeout(function() {
//         if(elements) {
//             elements.push(3,4,5);
//             callback(null, elements);
//         }
//         else {
//             callback("Elements array should not be null", null);
//         }

//     } ,2000);
// }

// an example starts ends

/* Example form 056 */

// 057 starts here  FUNCTIONS RETURNING FUNCTION

/******** CLOSURE STARTS HERE */

/* Lexical scoping

Consider the following: */

function init() {
  var name = 'Mozilla1'; // name is a local variable created by init
  function displayName() { // displayName() is the inner function, a closure
    console.log(name); // use variable declared in the parent function
  }
  displayName();
}
init();

/* init() creates a local variable called name and a function called displayName().
The displayName() function is an inner function that is defined inside init() and is only
available within the body of the init() function. Note that the displayName() function has
 no local variables of its own. However, since inner functions have access to the variables
 of outer functions, displayName() can access the variable name declared in the parent
 function, init().

The console.log() statement within the displayName() function successfully displays the value of the name variable, which is
declared in its parent function. This is an example of lexical scoping, which describes
how a parser resolves variable names when functions are nested. The word "lexical" refers
to the fact that lexical scoping uses the location where a variable is declared within the
source code to determine where that variable is available. Nested functions have access to
 variables declared in their outer scope.
 */

 function makeFunc() {
   var name = "Mozilla2";
   function displayName() {
     console.log(name);
   }
   return displayName;
 }

 var myFunc = makeFunc();
 myFunc();

 /* CLOSURES */

 function retirement(retirementAge){
     var a = " years left until retirement";
     return function (YOB){
         var age =  2020 - YOB;
         console.log((retirementAge - age) + a);
     }
 }

 retirementUS = retirement(65);
 console.log(retirementUS);
 retirementUS(1985);

function interviewQ(job){
    return function output(name) {

    }
}


/* BIND , CALL AND APPLY */
function Presentation(name, age, job)
{
     this.name =name;
     this.age = age;
     this.job = job;
     this.presentaion = function (style,timeOfDay){
         if (style==='formal'){
             console.log("Good " + timeOfDay + ". My name is " + this.name + ' and age is ' + this.age + ' with job of ' + this.job);
             // what about if I use just name, age and job inplace of this.age, this.name and this.job...For emily it will then copy john data
         }
         if (style === "casual") {
           console.log(
             "Its " + timeOfDay + 'bitch. ' + ". My name is " + this.name + " and age is " + this.age + " with job of " + this.job);
         }
     };
};

function Presentation2(name, age, job)
{
     this.name =name;
     this.age = age;
     this.job = job;
};
var john = new Presentation('john', 26, 'teacher');
var emily = new Presentation2("emily", 36, "nurse");
emily.presentaion = john.presentaion;
console.log(john);
console.log(emily);
console.log(emily.presentaion);

john.presentaion("formal", "evening");
emily.presentaion("casual", "morning");

/* var john =  {
    name:
} */


/* ---------------------------------------------------------------- */
/*                                  ATTEMPT 2                                 */
/* -------------------------------------------------------------------------- */

/* CLOSURE  */
console.log("ATTEMPT 2   starts");

function outer (){
    var arr=[];
    var i =0;
    for (i=0; i<4;i++ ){
        arr[i]=  function (){
            return i;
        }
    }
    return arr;
}

var execu = outer();
console.log(execu[0]());
console.log(execu[1]());
console.log(execu[2]());
console.log("ATTEMPT 2   ends");

/* effing good explanation for closure on this link https://www.geeksforgeeks.org/closure-in-javascript/ */

/* Q : WHAT IS A CLOSURE?
A closure is an inner function that has access to the outer (enclosing) function’s variables—scope chain. The closure has three scope chains: it has access to its own scope (variables defined between its curly brackets), it has access to the outer function’s variables, and it has access to the global variables.

The inner function has access not only to the outer function’s variables, but also to the outer function’s parameters. Note that the inner function cannot call the outer function’s arguments object, however, even though it can call the outer function’s parameters directly. */

/*Q : WHY DO WE NEED CLOSURES?

Answers:
---My problem with these and many answers is that they approach it from an abstract, theoretical perspective, rather than starting with explaining simply why closures are necessary in Javascript and the practical situations in which you use them. You end up with a tl;dr article that you have to slog through, all the time thinking, "but, why?". I would simply start with: closures are a neat way of dealing with the following two realities of JavaScript: a. scope is at the function level, not the block level and, b. much of what you do in practice in JavaScript is asynchronous/event driven. – Jeremy Burton Mar 8 '13 at 17:22
53

----@Redsandro For one, it makes event-driven code a lot easier to write. I might fire a function when the page loads to determine specifics about the HTML or available features. I can define and set a handler in that function and have all that context info available every time the handler is called without having to re-query it. Solve the problem once, re-use on every page where that handler is needed with reduced overhead on handler re-invocation. You ever see the same data get re-mapped twice in a language that doesn't have them? Closures make it a lot easier to avoid that sort of thing. –

You create a closure by adding a function inside another function.


A BASIC EXAMPLE OF CLOSURES IN JAVASCRIPT:
-----from (http://javascriptissexy.com/understand-javascript-closures-with-ease/)
function showName (firstName, lastName) {
var nameIntro = "Your name is ";
    // this inner function has access to the outer function's variables, including the parameter
function makeFullName () {
return nameIntro + firstName + " " + lastName;
}

return makeFullName ();
}

showName ("Michael", "Jackson"); // Your name is Michael Jackson

WHATCH THIS AS WELL FROM KUDVENKANT(https://www.youtube.com/watch?v=w1s9PgtEoJs)
*/

