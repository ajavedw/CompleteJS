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
