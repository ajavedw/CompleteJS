// Arow function 
/* 
const years = [199, 1925, 1937, 1932];

//ES 5
var ages5 =  years.map(function (el){
 return 2019 - el;
});
console.log(ages5);
//ES 6

const ages6 = years.map(el => 2016 - el);
console.log(ages6);
 */


// read this https://www.geeksforgeeks.org/javascript-promises/#:~:text=Promises%20are%20used%20to%20handle%20asynchronous%20operations%20in%20JavaScript.&text=Promises%20are%20the%20ideal%20choice,handling%20than%20callbacks%20and%20events.

/* Promise is
1.  an object that keeps track about whether a certain event has happened or not
2. Determines what happens after the event has happened
3. Implements the concept of future value that we are expecting  */
const getIds = new Promise((resolve, reject) => {
    setTimeout(() => {
        resolve([567, 435, 678, 999]);
        /* reject([567, 435, 678, 999]); */
    }, 1500);
}); 

const getRecipe = (IDse) => {
    return new Promise ((resolve, reject) => { 
        setTimeout((id) => {
            const recipe = {
                title:"some recipe",
                publisher:"js"
            }
            resolve(`${id}:${recipe.title}`);
            
        }, 1500, IDse);
    });
}

const newCheck = (getRecipeReturn) => {
    return new Promise((resolve,reject) => {
        setTimeout((id) => {
            const recipe2 ={
                title: "tatatat",
                publisher: "lalala"
            }
            resolve(`${recipe2.title} is ${id}`);
        }, 1500, getRecipeReturn);
    });
};
getIds
.then(IDs => {  //IDs si the result of the successfull ppromise
    console.log(IDs);  
    return getRecipe(IDs[2]);
})
.then(somename => {
    console.log(somename);
    return newCheck(somename);
})
.then( returnFrmnewCheck => {
    console.log(returnFrmnewCheck);
})
.catch(error => {
    console.log("error");
});