
let btn = document.querySelector('#btnProcess');
let content = document.querySelector('#content');
btn.onclick = function(){
    urls = content.value.split("\n");
    content.value = JSON.stringify(urls);
}