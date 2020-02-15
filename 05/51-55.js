var john = {
    name : 'john',
    YOB: 1990,
    job:'teacher'
};

function CalcAge(name, YOB){
    this.name = name;
    this.YOB = YOB;

}

CalcAge.prototype.calcAge = function() {
  console.log(2019 - this.YOB);
};

CalcAge.prototype.lastname = 'Smith';
var john = new CalcAge('john',1990);
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
    name:'bat',
    surname:'man'
};

var obj2 = {
    name:'bat',
    surname:'man'
};

/*  //obj2 = obj1;
// obj1.surname = 'woman'; */
console.log(obj1.surname);
console.log(obj2.surname);

var age = 22;
var obj3 = {
    name:'phirta',
    city:'lisbon'
};

function change(c,b) {
    c= 30;
    b.city = 'attock';
}

change(age,obj3);

console.log(age);
console.log(obj3.city);

var foo = [2,4];

bar = foo;

bar[0] = 10;

console.log(bar[0],foo[0]);


var stack = 30;
var heap = {
    age: 30,
    name:'adnan'
}
console.log(heap.name);  // logs adnan
function changeIt (a,b)
{
    a =25;
    b.name='aj';
    console.log(a);
}



changeIt(stack, heap);

/* here stack will log stack as 25 and it willbe only for this scope only */

/* b.name is going to mutate heap as b is here a reference to heap ( as &heap). with the refrence it will execute b.name as &heap.name and set/mutate it to 'aj' */


console.log(stack); //logs  30
console.log(heap.name); // logs aj

