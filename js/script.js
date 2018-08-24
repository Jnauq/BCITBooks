
/* password validation */
function pwd_validation(){
  var theForm = document.posting;

  if (theForm.password.value.length == 0 && theForm.password2.value.length == 0){
    theForm.password.style.backgroundColor='#ffffff';
    theForm.password2.style.backgroundColor='#ffffff';
  }
  if (theForm.password.value.length > 0 && theForm.password2.value.length > 0){
    if (theForm.password.value == theForm.password2.value && theForm.password2.value != ''
        &&theForm.password.value.length >= 4 && theForm.password2.value.length >= 4
        &&theForm.password.value.length <= 20 && theForm.password2.value.length <= 20){
        theForm.password.style.backgroundColor='#ddffdd';
        theForm.password2.style.backgroundColor='#ddffdd';
        return true;
    } else if (theForm.password.value != theForm.password2.value && theForm.password2.value != ''){
        theForm.password.style.backgroundColor='#ffdddd';
        theForm.password2.style.backgroundColor='#ffdddd';
        return false;
    } else if (theForm.password.value.length < 4 || theForm.password2.value.length < 4){
        theForm.password.style.backgroundColor='#ffdddd';
        theForm.password2.style.backgroundColor='#ffdddd';
        return false;
    } else {
      return false;
    }
  } else if (theForm.password.value.length == 0 || theForm.password2.value.length == 0){
    theForm.password.style.backgroundColor='#ffffff';
    theForm.password2.style.backgroundColor='#ffffff';
    return false;
  }
}

/* profanity filter */
var swearWordsList = new Array("fuck","shit","boobies");
var swearAlertList = new Array;

var swearCount = 0;

function validate_text() {
  swearCount = 0;
  var compareText = document.posting.title.value;
  for(var i = 0; i < swearWordsList.length; i++) {
    for(var j = 0; j < (compareText.length); j++) {
      if(swearWordsList[i] == compareText.substring(j, (j + swearWordsList[i].length)).toLowerCase()) {
        swearAlertList[swearCount] = compareText.substring(j, j + swearWordsList[i].length);
        swearCount++;
      }
    }
  }
  var alertText = "";
  for(var k = 1; k <= swearCount; k++) {
    alertText += "\n" + "(" + k + ")  " + swearAlertList[k-1];
  }
  if(swearCount > 0) {

    alert("Do not use bad words! \nThe following illegal words were found:\n_______________________________\n" + alertText + "\n_______________________________");
    return false;

  } else {
    return true;
  }
}

function check_input(){

  var test = validate_text();
  // input validation
  var theForm = document.posting;
  var location1 = document.getElementById("burnabyCam");
  var location2 = document.getElementById("downtownCam");

  if (test == false) {
    return false;
  } else if(theForm.password.value == ""
  || theForm.email.value == ""
  || theForm.title.value == ""
  || theForm.path.value == ""
  || theForm.description.value == ""
  || pwd_validation() == false){
    swal({
      title: "Wait a minute!",
      text: "Something feels empty..",
      icon: "warning",
      button: "I'll fix it",
    });
    return false;
   } else if(location1.checked == false && location2.checked == false){
       swal({
         title: "Wait a minute!",
         text: "It's best to check a location..",
         icon: "warning",
         button: "I'll fix it",
       });
      return false;
  }else {
    // image type validation
    var ext = $('#imgpath').val().split('.').pop().toLowerCase(); //file extension

    if(jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {  // checking extension
      alert('Invalid image file');
      $('#imgpath').val('');  // set up uploaded file as null
      return false;
    }
  }
  saveData('email');
  return true;
}

//uploading msg
$("#confirmBtn").click(function(e){
  $("#confirmForm").submit();
  swal({
    icon: "success",
    title: "You're awesome!",
    text: "we're making your post now!",
    timer: 15000,
    button: false,
  });
  
});

//check input for request page
function checkRequest(){
  var x = document.forms["requesting"]["email"].value;
  var y = document.forms["requesting"]["message"].value;
  if (x == '' || y.trim() == ''){
    swal({
      title: "Hold on!",
      text: "You have to provide info!",
      icon: "warning",
      button: "Yes boss.",
    });
    return false;
    theForm.email.style.backgroundColor='#ffdddd';
  } else {
    return true;
  }
}

//check input for contact page
function checkContact(){
  var name = document.forms["contact"]["name"].value;
  var email = document.forms["contact"]["email"].value;
  var subject = document.forms["contact"]["subject"].value;
  var msg = document.forms["contact"]["message"].value;

  if (name.trim() == "" || email.trim() == "" || subject.trim() == "" || msg.trim() == ""){
    swal({
      title: "Hold on!",
      text: "You forgot to fill all the form out.",
      icon: "warning",
      button: "I'll fix it!",
    });
    return false;

  } else {
    return true;
  }
}


//check input for edit page
function checkEdit(){

  var title = document.posting.title.value;
  var email = document.posting.email.value;
  var msg = document.posting.description.value;
  var password = document.posting.password.value;

  if (title.trim() == ""
  || email.trim() == ""
  || msg.trim() == ""
  || password.trim() == ""
  || pwd_validation() == false){
    swal({
      title: "Hold on!",
      text: "You forgot to fill all the form out.",
      icon: "warning",
      button: "I'll fix it!",
    });
    return false;

  } else {
    return true;
  }
}
