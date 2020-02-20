 console.log("apple");
 function testCallback (arg, callback){
    //arg = 'my cup';
    debugger
    finish = 'fill' + arg;
    callback(finish);
}

function cBack(cBackArg){
    console.log(cBackArg);

}

testCallback ('my cup', cBack);

/* function testing(args1, someFun) {
    args1 =  "fill up my" + tech;
    someFun();
  }

  function logQuote(quote) {
      console.log(quote);
  }

  testing('cup',logQuote);
 */
/*********************************BLA BLA BLA BLA BLA  starts **************/
 for (var i = 1; i <= 5; i++) {
   setTimeout(function() {
     console.log("i: " + i);
   }, i * 1000);
 }

//  Technically it's how @rsp explains in his excellent answer. This is how I like to understand things work under the hood. For the first block of code using var

(function timer() {
  for (var i=0; i<=5; i++) {
    setTimeout(function clog() {console.log(i)}, i*1000);
  }
})();
// You can imagine the compiler goes like this inside the for loop

//  setTimeout(function clog() {console.log(i)}, i*1000); // first iteration, remember to call clog with value i after 1 sec
//  setTimeout(function clog() {console.log(i)}, i*1000); // second iteration, remember to call clog with value i after 2 sec
// setTimeout(function clog() {console.log(i)}, i*1000); // third iteration, remember to call clog with value i after 3 sec
// and so on

// since i is declared using var, when clog is called, the compiler finds the variable i in the nearest function block which is
//timer and since we have already reached the end of the for loop, i holds the value 6, and execute clog. That explains 6 being logged six times.

/*********************************BLA BLA BLA BLA BLA  ends **************/