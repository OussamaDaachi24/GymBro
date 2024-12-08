//1- the image slider

let curr_slide=0;// indicates the current slide ( 0-indexing)
//select the elements
let slides=document.getElementsByClassName('muscle_groups'); // the slides
let next_arrow=document.getElementsByClassName('next_arrow')[0]; // -->
let back_arrow=document.getElementsByClassName('back_arrow')[0]; // <--

//a-function that sets the content of a slide
/*
let set_slide_content=(index)=>{
    let slide_img=document.getElementsByClassName('img_muscle')[index]; // the image
    let prv_slide_img=document.getElementsByClassName('img_muscle')[index-1];//image of previous slide
    let muscle_name=document.querySelectorAll(".content h2")[index];   // the muscle
    let prv_muscle_name=document.querySelectorAll(".content h2")[index-1];// name of previous muscle
    slide_img.src=prv_slide_img.src;
    muscle_name.textContent=prv_muscle_name.textContent;

}*/


//1- move to next
next_arrow.addEventListener('click',()=>{
    //a- still within the 4 slides
    if(0<=curr_slide && curr_slide<3){
        console.log(curr_slide);
        slides[curr_slide+1].classList.add('curr_class');
        slides[curr_slide].classList.remove('curr_class');
        curr_slide++;
    }
    //b- accessing the 5th & 6th slides
    else if(curr_slide>=3 && curr_slide<5){
    }
    //2- changing the color of the arrow
    const next_img=document.getElementsByClassName('left')[0];
    const prv_img=document.getElementsByClassName('right')[0];
    //1- making the next blue and the previous gray
    next_img.style.color="blue";
    prv_img.style.color="gray";

})

//2- move back
back_arrow.addEventListener('click',()=>{
    if(curr_slide>0){
        slides[curr_slide-1].classList.add('curr_class');
        slides[curr_slide].classList.remove('curr_class');
        curr_slide--;
        const next_img=document.getElementsByClassName('left')[0];
        const prv_img=document.getElementsByClassName('right')[0];
        //1- making the next blue and the previous gray
        next_img.color=blue;
        prv_img.color=gray;
    }
})



//handling redirections: 





