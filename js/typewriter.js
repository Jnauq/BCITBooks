/* Typewriter animation */
function textAnimation1() {
  $("#textAni1").animate({left:'10%'},100).animate({opacity:'1',left:'29%'},2000);
  $("#textAni2").animate({left:'40%'},100).animate({opacity:'1', left:"24%"},2000);
  setTimeout(textAnimation2,4000);
}

function textAnimation2() {
  $("#textAni1").animate({opacity:'0'},2800);
  $("#textAni2").animate({opacity:'0'},2800);
  setTimeout(textAnimation1,3000);
}

$(document).ready(textAnimation1());