function first() {
    console.log(1);
}

function second() {
    console.log(2);
}

function third() {
    console.log(3);
}


// Execute the functions
first();
second();
third();

/*
--Add first() to the stack, run first() which logs 1 to the console, remove first() from the stack.
--Add second() to the stack, run second() which logs 2 to the console, remove second() from the stack.
--Add third() to the stack, run third() which logs 3 to the console, remove third() from the stack.
*/

// Define three example functions, but one of them contains asynchronous code
function firstasynch() {
    console.log('asynch');
}

function secondasynch(passtosetTime) {
    setTimeout((num) => { //settime out takes twoarguments; time and variable argumen
        console.log(`'synch timeout ${num}`);
    }, 0, passtosetTime);
}

function thirdasynch() {
    console.log('asynch');
}
// Execute the functions
firstasynch();
secondasynch(4);
thirdasynch();

/*   
Add first() to the stack, run first() which logs 1 to the console, remove first() from the stack.
Add second() to the stack, run second().

Add setTimeout() to the stack, run the setTimeout() Web API which starts a timer and adds the anonymous function to the queue, remove setTimeout() from the stack.
Remove second() from the stack.
Add third() to the stack, run third() which logs 3 to the console, remove third() from the stack.
The event loop checks the queue for any pending messages and finds the anonymous function from setTimeout(), adds the function to the stack which logs 2 to the console, then removes it from the stack */

function firstcallBack() {
    console.log('callBack');
}

function secondcallBack(passtosetTime) {
    setTimeout((num) => { //settime out takes twoarguments; time and variable argument
        console.log('secCallBack');
        //console.log(`'synch timeout ${num}`);
        num();
    }, 1500, passtosetTime);
}

function set(arg){
    setTimeout((argVal) => {
        console.log(argVal);
    }, 1500,arg);
}
set('CHECKSET');

function setEs5(some){
    setTimeout(function(someval){
        console.log(someval);
    },1500, some)
}
setEs5('USINGes5');

function thirdcallBack() {
    console.log('3rdcallBack');
}
// Execute the functions
firstcallBack();
secondcallBack(thirdcallBack);

//This works
function asyncFunction(callback) {
    setTimeout(callback, 1000, 'foo'); // passes foo to the callback
}
asyncFunction(function (bar) {
    console.log(bar)
});

// This doesn't work
function asuncFn(callbacks) {
    setTimeout((passedFn) => {

    }, 2000, callbacks);
}
asuncFn(console.log('was not working'));

// Example asynchronous function
function asynchronousRequest(args, callback) {
    // Throw an error if no arguments are passed
    if (!args) {
      return callback(new Error('Whoa! Something went wrong.'))
    } else {
      return setTimeout(
        // Just adding in a random number so it seems like the contrived asynchronous function
        // returned different data
        () => callback(null, {body: args + ' ' + Math.floor(Math.random() * 10)}),
        500,
      )
    }
  }
  
  // Nested asynchronous requests
  function callbackHell() {
    asynchronousRequest('First', function first(error, response) {
      if (error) {
        console.log(error)
        return
      }
      console.log(response.body)
      asynchronousRequest('Second', function second(error, response) {
        if (error) {
          console.log(error)
          return
        }
        console.log(response.body)
        asynchronousRequest(null, function third(error, response) {
          if (error) {
            console.log(error)
            return
          }
          console.log(response.body)
        })
      })
    })
  }
  
  // Execute
  callbackHell();