var a = "Hello";
first();
function first() {
  var b = "Hi!";
  second();
  function second() {
    var c = "Hey!";
    console.log(a + b + c);
  }
}
/* This keyword */

console.log(this);
checkThis();
function checkThis (){
    console.log(2000-1000);
    console.log(this);  // Here this regferes to winmdow objecta s the function is
    // attached to window object. If we had used strict mode then this would have returned
    // undefined. However, if this function was part of javascript object, then, 'this' would
    // have rurned the property of that object. See example below
}

var jhon ={
    name:'one',
    YOB : 1990,
    calculateAge : function () {
        console.log(2020 - this.YOB);

        function innerFn (){
            console.log(this);
        }
        innerFn(); //why the F it returns window object
    }
};

jhon.calculateAge();

var mike ={
    name:'one',
    YOB : 1990,
};

mike.calculateAge = jhon.calculateAge;
mike.calculateAge(); 


