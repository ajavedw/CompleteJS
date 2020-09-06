const second = () => {
    setTimeout (() => {
        console.log('Async');
    }, 2000);
}
const first = () => {
console.log('Hey');

second();
console.log('You');
};

first();

//10.3

function getRecipe(){
    setTimeout(() => {
        const recipeID = [22, 568, 3545, 4578];
        console.log(recipeID);
        setTimeout (id => {
            const recipe ={
                title: 'Fresh tomato Juice',
                publisher: 'Jonas'
            };
            console.log(`${id}: ${recipe.title}`);
            setTimeout(publisher => {
                const recipe2 = {
                    title : 'Italian',
                    publisher : 'adnan'
                };
                console.log(recipe);
            }, 1500, recipe.publisher)
        },1500, recipeID[2])
    },1500)
}
getRecipe();
