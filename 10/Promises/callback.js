obj = [
    {
        title: 'new1'},
        {title: 'new2'
    }
];

function firstFunc (){
    setTimeout (() => {
        let output ='';
        obj.forEach((post, index) => {
            output += `<li>${post.title}</li>`
        });
        document.body.innerHTML = output;
    },1500);
}

function secFunc (objpart, func){
setTimeout(() => {
    obj.push(objpart);
    func();
}, 5000);
}

secFunc({title:'new3'}, firstFunc);