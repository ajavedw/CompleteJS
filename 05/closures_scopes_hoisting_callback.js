// Example form https://tylermcginnis.com/ultimate-guide-to-execution-contexts-hoisting-scopes-and-closures-in-javascript/

console.log('name: ', name)
console.log('handle: ', handle)
console.log('getUser :', getUser)

var name = 'Tyler'
var handle = '@tylermcginnis'

function getUser () {
  return {
    name: name,
    handle: handle
  }
}

// Closure Scope and Execution stack
function retirement(retirementAge) {
    var a = 'years left until retirement.';
    return function (YOB) {
        var age = 2016 - YOB;
        console.log((retirementAge - age) + a);
    }
}

var retirementUS = retirement(66);
retirementUS(1990);

const user = {
  name: "Tyler",
  age: 27,
  greet() {
    alert(`Hello, my name is ${this.name}`);
  },
  mother: {
    name: "Stacey",
    greet() {
      alert(`Hello, my name is ${this.name}`);
    }
  }
};

const user1 = {
  name: "Tyler",
  age: 27,
  languages: ["JavaScript", "Ruby", "Python"],
  greet() {
    const hello = `Hello, my name is ${this.name} and I know`;

    const langs = this.languages.reduce(
      function(str, lang, i) {
        if (i === this.languages.length - 1) {
          return `${str} and ${lang}.`;
        }

        return `${str} ${lang},`;
      }.bind(this),
      ""
    );

    alert(hello + langs);
  }
};

/* example from stackoverflow below */

var add = function (x, y) {
  return x + y;
  }

var myObject = {
  value: 0,
  increment: function (inc) {
    this.value += typeof inc === 'number' ? inc : 1;
    }
};

myObject.double2 = function () {
  // var that = this;

  var helper = function () {
    this.value = add(this.value, this.value)
  };

  helper();
};

myObject.increment(100);
document.writeln(myObject.value); // Prints 100
myObject.double2();
document.writeln('<BR/>'); // Prints <BR/>
document.writeln(myObject.value); // Prints 100, **FAILS**


/* And the modified code: */

var add = function (x, y) {
  return x + y;
  }

var myObject = {
  value: 0,
  increment: function (inc) {
    this.value += typeof inc === 'number' ? inc : 1;
    }
};

myObject.double2 = function () {
  var that = this;

  var helper = function () {
    that.value = add(that.value, that.value)
  };

  helper();
};

myObject.increment(100);
document.writeln(myObject.value); // Prints 100
myObject.double2();
document.writeln('<BR/>'); // Prints <BR/>
document.writeln(myObject.value); // Prints 200 - **NOW IT WORKS**



/* ******************************* */
/* First one works and second one doesnt works why*/
/* $('#' + storeId).parent().siblings().each(function () {
  // $(this).children('.left-links-dashboard').css({'color':'lightgrey'});
  selectChildren(this);
});

function selectChildren(esd) {
  $(esd).children('.left-links-dashboard').css({'color': 'grey', 'font-weight': '400'});
  $(esd).children('.left-links-dashboard').children('i').removeClass('fa-arrow-circle-right').addClass('fa-angle-right');

}
Doesn't works..why???
$('#' storeId).parent().siblings().each(function(){
 selectChildren();
});

function selectChildren(){
 $(this).children('.left-links-dashboard').css({'color':'grey'});
 //this one doesn't work..why ????
} */