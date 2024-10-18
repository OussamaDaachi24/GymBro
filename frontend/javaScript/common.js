const bar_menu=document.getElementsByClassName('menu_bar')[0];
bar_menu.addEventListener('click',()=>{
    options=document.getElementsByClassName('options')[0];
    options.classList.toggle('showMenu');
})