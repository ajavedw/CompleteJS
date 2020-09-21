

const first = () => {
    console.log('hi');
    second();
    console.log('log called after asynch');
}

const second = () => {
    setTimeout(() => {
        console.log("Asynch");
    }, 2000);
}
first();

// 10.3
//We are bsicallyu usign call backs as a way to simulate we are getting some recipe data from an ajax call and then we are using that data in another settime out call and thena nother . basically we are simuylating callback hell.
function getRecipe() {
    setTimeout(() => {
        const recipeID = [523, 883, 393, 225];
        console.log(recipeID);

        setTimeout((id) => {
            const recipe = {
                title: "fresh tomato pasta",
                publisher: "Jonas"
            }
            console.log(`${id}: ${recipe.title}`);

            setTimeout((publisher) => {
                const recipe2 = {
                    title: "pizza",
                    publisher: "me"
                }
                console.log(publisher);
            }, 1000, recipe.publisher);

        }, 1000, recipeID[2]);

    }, 1500);
}
getRecipe();