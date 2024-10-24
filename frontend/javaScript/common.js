const bar_menu=document.getElementsByClassName('menu_bar')[0];
bar_menu.addEventListener('click',()=>{
    options=document.getElementsByClassName('options')[0];
    options.classList.toggle('showMenu');
})


//hide the options when the screen is wide
const mob_options=document.getElementsByClassName('options')[0];
const screen=window;
screen.addEventListener('resize',()=>{
    if(Number(window.innerWidth)>680){
        mob_options.classList.add('hide');
        options.classList.remove('showMenu');
    }
    else{
        mob_options.classList.remove('hide');
    }
})
