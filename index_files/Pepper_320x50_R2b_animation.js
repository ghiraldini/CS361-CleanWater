// JavaScript Document

var tl;
var count = 1;
var intID;
var isCtaPresent = false;

function adVisibilityHandler()
{
	
	// roll over/out
	document.getElementById('bg_clickthrough').addEventListener('mouseover', bg_over, false);
	// animation
	beginAnimation();
}


// ANIMATION
function beginAnimation()
{
	document.getElementById('container').style.display = 'block';
	
	
	tl = new TimelineLite();
	
	tl.from(document.getElementById('eyesImg'), 0.8, {opacity:0, ease:Power4.easeOut}, "-=0.5")
	.to(document.getElementById('armImg'), 0.3, {rotation:12, x:0, ease:Power4.easeOut}, "-=0.1")
	.to(document.getElementById('armImg'), 0.3, {rotation:-12, x:0, ease:Power4.easeOut}, "slideTextIn-=0.1")
	.to(document.getElementById('armImg'), 0.3, {rotation:12, x:0, ease:Power4.easeOut}, "-=0.1")
	.to(document.getElementById('armImg'), 0.2, {rotation:0, x:0, ease:Power4.easeOut}, "-=0.1")

	.from(document.getElementById('copyText1'), 0.8, {right:300, ease:Power4.easeOut},"slideTextIn")
	// .from(document.getElementById('copyText2'), 0.8, {left:300, ease:Power4.easeOut})

	.to(document.getElementById('glowImg'), 1.5, {left:120, ease:Power4.easeOut, onComplete:function(){
		isCtaPresent = true;
		document.getElementById('glowImg').style.display = 'none';
		TweenLite.to(document.getElementById('glowImg'), 0.1, {left:-120, ease:Power4.easeOut});
	}}, "slideHotspot");
}

function bg_over()
{
	if(isCtaPresent){
		document.getElementById('glowImg').style.display = 'none';
		TweenLite.to(document.getElementById('glowImg'), 0.1, {left:-120, ease:Power4.easeOut});	

		intID = setTimeout(function(){
			document.getElementById('glowImg').style.display = 'block';
			TweenLite.to(document.getElementById('glowImg'), 1.5, {left:120, ease:Power4.easeOut,onComplete:function(){
				document.getElementById('glowImg').style.display = 'none';
				TweenLite.to(document.getElementById('glowImg'), 0.1, {left:-120, ease:Power4.easeOut});	
			}});
		},100);	
	}
}

///////////////////////
window.onload = adVisibilityHandler;