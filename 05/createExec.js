for (var i = 1; i <= 5; i++) {

  setTimeout(function() {

    console.log("i: " + i);

  }, i * 1000);

}

// var input = document.getElementById("new");

// input.onclick = function() {
//   setTimeout(function() {
//     input.value +=' input'
//   }, 0)
// }

// document.body.onclick = function() {
//   input.value += ' body'
// }

for (var i = 1; i <= 5; i++) {
  (function(index) {
    setTimeout(function() {
      console.log((index));
    }, i * 1000);
  })(i);
}

for (var i = 1; i < 5; i++) {
  timeout(i);
}
function timeout(i) {
  setTimeout(() => console.log(i), 0);
}
var age = 22;
var obj3 = {
    name:'phirta',
    city:'lisbon'
};

function change(c,b) {
    c= 30;
    b.city = 'someplace';
}

change(age,obj3);

console.log(age);
console.log(obj3.city);
d=10;
function change1(d) {
  d= 30;
}; change1(11);

console.log(d);

console.log("why the fuck isn't d 11");