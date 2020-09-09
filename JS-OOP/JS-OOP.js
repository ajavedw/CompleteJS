// from https://www.youtube.com/watch?v=4l3bTDlT6ZI&list=PL4cUxeGkcC9i5yvDkJgt60vNVWffpblB7&index=1

/* array is also an object e.g  */

var names = ["abs", "def", "efef"];

console.log(names);

/* in console.log i can see that there is a length property defined for this array and other prototype properties defined for this array. These properties/methods makes array kind of an objectE.g map push pop are all there in ___proto__*/

/* The mother of all objects is window object with properties/methods like innerWidth */

console.log(window);

/* Primitives in JS are  boolean, undefined, null, numbers, strings*/

var name = "mario"; // is a string primitive

/* but we can find the length of using name.length. That is because js can convert a string in an object and we can use different functions like slice, concat on strings */

console.log("name is mario and name.length is " + name.length);

/* or we can use  */

var name2 = new String("name"); //String ??
/* see the log result for name and what is String */
console.log(name2);
//This is object and called as object literal
var obj = {
    name: "AJ",
    email: "alimajoli@gmail.com",
    login() {
        console.log(this.email + " has logged in.");
    }
};
//can access using
console.log(obj.name);
//can access dynamically
var prop = "name"
console.log(obj[prop]);
var prop2 = "email";
console.log(obj[prop2]);
//or change value
obj.name = "Adnan";
obj.age = 32;

//Classes using prototype model. They use teh function constructor method

//Classes using syntactic sugar. under the hood they are like prototype model

class User {
    constructor(email, name) {
        this.name = name;
        this.email = email;
        this.score = 0;
    }

    login() {
        //this method has access to variable defined in constructor
        console.log(this.email + " has just logged in");
        return this;
    }
    logout() {
        console.log(this.name + " has just logged out");
        return this;

    }
    updateScore() {
        this.score++;
        console.log(this.email + "score is now " + this.score);
        return this;
    }

    //wtf does return this; in methods do

    /* hey Shaun, can you give me an example that when we will use this method chaining in our projects ? and what is the usage of it ?i mean aside of chaining methods what is the real purpose of using it ? how it can be useful to use it ?

    it just makes code more readable and easy to write. Consider a following example:

    user.setName('Jacob').setAge(28).addMark('A')

    user.setName('Jacob')
    user.setAge(28);
    user.addMark('A'); 
   Reilly
3 months ago
For those who are learning about method chaining for the first time: the UpdateScore function is not necessary to method chain userOne.login().logout() or any other variant. All you needed to add to your code (assuming you have the same code as the last video) is "return this;" under the two functions "login" and "logout" . Shaun simply added the function updateScore because he wanted to arbitrarily count starting from 0 each time the  updateScore function is called. Hope that clears the air for any that are confused!
.active

 */
   

    //method chaining userOne.login().logout();

}

//class inheritance els e.g i want an admin. the admin can add or delete user
class Admin extends User{
      deleteUser(user){
          users = users.filter(u => {
            return u.email != user.email;
          });
      }
}

/* filter function takes an array, applies a logic and return a new array with only those element which passed the logic. */
var userOne = new User('ryan@ninaja.com', 'ryan');

var userTwo = new User('yoshi@ninaja.com', 'yoshi');

var admin = new Admin('admin@admin.com', 'admin');

var users =[ userOne, userTwo, admin]
console.log(userOne);
console.log(userTwo);
debugger
admin.deleteUser(userTwo);
console.log(admin); // see the results this. you will see two levels of __proto__. one having 
//deleteUser method and the other having inherited method of login, logout and update user.

/* userOne.login().updateScore().updateScore().logout(); */