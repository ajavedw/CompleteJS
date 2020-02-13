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
