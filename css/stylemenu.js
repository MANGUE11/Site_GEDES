var content = document.querySelector('#hambuger-content');
var sidebarBody = document.querySelector('#hambuger-sidebar-body');
var button = document.querySelector('#hambuger-button');
var overlay = document.querySelector('#hambuger-overlay');
var activatedClass = 'hambuger-activated';
sidebarBody.innerHTML = content.innerHTML;
button.addEventListener('click', function(e){
   e.preventDefault();
   this.parentNode.classList.add(activatedClass);   
});
overlay.addEventListener('click', function(e){
   e.preventDefault();
   this.parentNode.classList.remove(activatedClass);
});