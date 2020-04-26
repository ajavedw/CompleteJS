var john = {
  name: "john",
  YOB: 1990,
  job: "teacher",
};

function CalcAge(name, YOB) {
  this.name = name;
  this.YOB = YOB;
}

CalcAge.prototype.calcAge = function () {
  console.log(2019 - this.YOB);
};

CalcAge.prototype.lastname = "Smith";
var john = new CalcAge("john", 1990);
console.log(john);
john.calcAge();

/* prmitives and objects */

/***********
Concept of stack and heap:
git remote -v

stack: stores primitive types--primitive types in JS are numbers, strings, boolean, null and ?
heap: stores dynamic


Heap--Variables allocated on the heap have their memory allocated at run time and accessing this memory is a bit slower, but the heap size is only limited by the size of virtual memory . Element of the heap have no dependencies with each other and can always be accessed randomly at any time. You can allocate a block at any time and free it at any time. This makes it much more complex to keep track of which parts of the heap are allocated or free at any given time.
***********/
var a = 27;
var b = a;
var a = 31;

console.log(a);
console.log(b);

var obj1 = {
  name: "bat",
  surname: "man",
};

var obj2 = {
  name: "bat",
  surname: "man",
};

/*  //obj2 = obj1;
// obj1.surname = 'woman'; */
console.log(obj1.surname);
console.log(obj2.surname);

var age = 22;
var obj3 = {
  name: "phirta",
  city: "lisbon",
};

function change(c, b) {
  c = 30;
  b.city = "attock";
}

change(age, obj3);

console.log(age);
console.log(obj3.city);

var foo = [2, 4];

bar = foo;

bar[0] = 10;

console.log(bar[0], foo[0]);

var stack = 30;
var heap = {
  age: 30,
  name: "adnan",
};
console.log(heap.name); // logs adnan
function changeIt(a, b) {
  a = 25;
  b.name = "aj";
  console.log(a);
}

changeIt(stack, heap);

/* here stack will log stack as 25 and it willbe only for this scope only */

/* b.name is going to mutate heap as b is here a reference to heap ( as &heap). with the refrence it will execute b.name as &heap.name and set/mutate it to 'aj' */

console.log(stack); //logs  30
console.log(heap.name); // logs aj

/* ---------------------------------------------------------------- */
/*                                  ATTEMPT 2                                 */
/* -------------------------------------------------------------------------- */

/* OBject */

console.log("/*  ATTEMPT 2 BELOW THIS */");

var john = {
  name: "john",
  YOB: 1990,
  job: "front-end developer",
};

var Person = function (name, YOB, job) {
  this.name = name;
  this.YOB = YOB;
  this.job = job;
  /*  this.calcualteAge = function (){
      console.log(2020 - this.YOB);
  }; */
};
Person.prototype.lastName = "Smith";
Person.prototype.calcualteAge = function () {
  console.log(2020 - this.YOB);
};

/*  ==================================================================================================
     to add a method to a function prototype we have to add the method to
     function prototype(called class in other languges). The function prototype is basicaly
     a blueprint for object which can be used to create other objects. This prototype is also
     an object and a part of bigger object which includes default methods such hasOwnProperty(),
     toString() etc. So the object that we will create from fn prototype is able to access the
     method in fn prototype and methods of "global object" and thsi is basically prototype chain
     =================================================================================================
*/

/*
1. Every JS Object has a prototype property, whick makes inheritance possible in JS

2. The prototype property of an object/constructor function is where we put methods and props that we want other O's to
 inherit

3. The constructor prototype prop is not the protoype property of constructor itself, its the
  property of all instances that are created through it
  **for joh lets say it would be,

  john:
    properties: (if any)
    methods   ; (if any)
    __proto__: this is is the method or perty added using Person.prototype(basically this is teh prototype of Person object/ constructor function).
    Then there is,
        __proto__: Basically this is the methods of Object Object i.e the Person constructor fnunction kis by itself an object so its inherits some properties from the object of which Person is part of. e.g(hasOwnProperty() etc)

    **test

    what will be the output of
    1. john.hasOwnProperty('lastName')
    &
    2. john.hasOwnProperty('name')


4. when a method is called, its first searched in object itself, if not found there , the search moves
in to the object's prototype. this continues until the methjod is found */

/* GOTO this page to see why we do not want otr method to constructor and would rather prefer to add in.
a protype. */

var john = new Person("john", 1980, "jobless");
john.calcualteAge();


/* ---------------------------------------------------------------------------------------------- */
/* PRIMIIVE vs OBJECTS                                                                            */
/* ---------------------------------------------------------------------------------------------- */

var  alu = 5;
var pyaz = alu;
var alu = 6;
console.log(alu);
console.log(pyaz);

var objective1 = {
  name: 'masala',
  age: 'pata nahi'
}

objective2 =  objective1;
objective1.age = 'pata he';
console.log(objective1);
console.log(objective2);

a = 27;
var objectives = {
  age:40,
  city: 'London'
}

function changing(a,b){
  a = 43;
  b.city = "Lisbon";
  console.log('mutability');

  console.log(a);
}

changing(a,objectives);

console.log(a);
console.log(objectives);

/* ------------------------------------------------------------------------------------ */
/* I dont understanbd the example above.                                                */
/* ------------------------------------------------------------------------------------ */

/*abc = 43 only changes what the abc variable refers to where abc is defined - reassigning a variable, by itself, won't ever have any side effects outside of the scope of that variable ???– CertainPerformance Dec 11 '19 at 5:20 */

/* Now, on to functions and passing parameters.... When you call a function, and pass a parameter, what you are essentially doing is an "assignment" to a new variable, and it works exactly the same as if you simply assigned using the equal (=) sign.*/


var myString = 'hello';

// Assign to a new variable (just like when you pass to a function)
var param1 = myString;
param1 = 'world'; // Re assignment

console.log(myString); // Logs 'hello'
console.log(param1);   // Logs 'world'
//Now, the same thing, but with a function

function myFunc(param1) {
    param1 = 'world';

    console.log(param1);   // Logs 'world'
}

var myString = 'hello';
// Calls myFunc and assigns param1 to myString just like param1 = myString
myFunc(myString);

console.log(myString); // logs 'hello'

