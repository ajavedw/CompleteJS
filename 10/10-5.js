
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
/* getIds
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
}); */

async function getRecipeAsyncAwait(){
    const firstPromise = await getIds;
    console.log(firstPromise);
    const recipe = await getRecipe(firstPromise[2]);
    console.log(recipe);
    const newch = await newCheck(recipe);
    console.log(newch);

    return recipe;
}

getRecipeAsyncAwait();

//what about this
getRecipeAsyncAwait().then( results => console.log(`this iis after ${results}`));

//why not this 
//const why = getRecipeAsyncAwait();
//console.log(why);