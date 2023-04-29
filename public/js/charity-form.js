const slidePage = document.querySelector(".slidepage");
const firstNextBtn=document.querySelector(".nextBtn");

const prevBtnSec=document.querySelector(".prev-1");
const nextBtnSec=document.querySelector(".next-1");

const prevBtnthird=document.querySelector(".prev-2");
const nextBtnthird=document.querySelector(".next-2");

const prevBtnfourth=document.querySelector(".prev-3");
const SubmitBtn=document.querySelector(".submit");

const progressText=document.querySelectorAll(".container .bar .step p");
const progressCheck=document.querySelectorAll(".container .bar .step .check");
const bullet=document.querySelectorAll(".container .bar .step .bullet");

let max=4;
let currnt=1;



firstNextBtn.addEventListener("click",function(){
	slidePage.style.marginLeft = "-25%";
	bullet[currnt-1].classList.add("active");
	progressText[currnt-1].classList.add("active");
	currnt+=1;
});
nextBtnSec.addEventListener("click",function(){
	slidePage.style.marginLeft = "-50%";
	bullet[currnt-1].classList.add("active");
	progressText[currnt-1].classList.add("active");
	currnt+=1;
});
nextBtnthird.addEventListener("click",function(){
	slidePage.style.marginLeft = "-75%";
	bullet[currnt-1].classList.add("active");
	progressText[currnt-1].classList.add("active");
	currnt+=1;
});
/*------------------------*/
prevBtnSec.addEventListener("click",function(){
	slidePage.style.marginLeft = "0%";
	bullet[currnt-2].classList.remove("active");
	progressText[currnt-2].classList.remove("active");
	currnt-=1;
});
prevBtnthird.addEventListener("click",function(){
	slidePage.style.marginLeft = "-25%";
	bullet[currnt-2].classList.remove("active");
	progressText[currnt-2].classList.remove("active");
	currnt-=1;
});
prevBtnfourth.addEventListener("click",function(){
	slidePage.style.marginLeft = "-50%";
	bullet[currnt-2].classList.remove("active");
	progressText[currnt-2].classList.remove("active");
	currnt-=1;
	bullet[currnt-2].classList.remove("active");
	progressText[currnt-2].classList.remove("active");
	currnt-=1;
	
});

/*-----------------------*/
SubmitBtn.addEventListener("click",function(){
	bullet[currnt-1].classList.add("active");
	progressText[currnt-1].classList.add("active");
	currnt+=1;
	setTimeout(function(){
		alert("You're Successfully Signed Up");

	},800);
});