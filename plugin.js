var feild = document.querySelector('textarea');
var backUp = feild.getAttribute('placeholder');
var btn = document.querySelector('.btn');
var clear = document.getElementById('clear');


feild.onfocus = function(){
    this.setAttribute('placeholder','');
    this.style.bordercolor='#333';
    btn.style.display = 'block';
}
clear.onclick = function(){
    feild.value = '';
}