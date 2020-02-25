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
      alert(index);
    }, i * 1000);
  })(i);
}

for (var i = 1; i < 5; i++) {
  timeout(i);
}
function timeout(i) {
  setTimeout(() => console.log(i), 0);
}