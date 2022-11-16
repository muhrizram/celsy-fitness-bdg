const sideBar = document.querySelector('#logoSidebar');
const span = document.querySelectorAll('span#NavWord');

sideBar.addEventListener('click', function(){
    for (let i = 0; i < span.length; i++) {
        span[i].classList.toggle('hidden');
      }
});