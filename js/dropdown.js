/* dropdown menu for mobile screen */
function menu_function(){
  var temp = document.getElementById("menu");
    if (temp.className === "topMenu"){
      temp.className += " responsive";
      document.getElementById("nav-share-btn").classList.remove("responsive");
      document.getElementById("nav").style.height = "210px";
      document.getElementById("article").style.marginTop = "238px";
    } else {
      temp.className = "topMenu";
      document.getElementById("nav").style.height = "72px";
      document.getElementById("article").style.marginTop = "100px";
    }
}

function close_menu(){
  var temp = document.getElementById("menu");
  temp.className = "topMenu";
  document.getElementById("nav").style.height = "72px";
  document.getElementById("article").style.marginTop = "100px";
}