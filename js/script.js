


























// my functions
function changForm() {
  const signin = document.getElementById("signin");
  const signup = document.getElementById("signup");
 

  signin.classList.toggle("move");
  signup.classList.toggle("move1");
 
  

  
}
function changForm2() {
  const signin = document.getElementById("signin");
  const forgotPs = document.getElementById("forgotPs");
  

  signin.classList.toggle("moveR");
  forgotPs.classList.toggle("move2");















}
function forgotPs(){
  const email = document.getElementById("fps-email");
  const alertBox = document.getElementById("alert-d-forgotPs");
  const loadingve =document.getElementById("loading-ve");

  loadingve.className ="loading  d-flex justify-content-center";


  
  const form = new FormData();
  form.append("email", email.value);

  const request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if(this.responseText=="success"){
        
      changForm3();
      loadingve.className ="d-none";
      
      alertBox.className = "d-none";
    }
    else{
      alertBox.className = "alert alert-danger d-block";
      loadingve.className ="d-none";

      alertBox.innerHTML = this.responseText;
      ;

    }
  }
}
  request.open("POST", "forgotPsProcess.php", true);
  request.send(form);


}

function changForm3() {
  
  const forgotPs = document.getElementById("forgotPs");
  const fverify = document.getElementById("forgotPsverification");
  
  forgotPs.classList.toggle("moveLeft");
  fverify.classList.toggle("move3");

}

function changForm4() {
  const fverify = document.getElementById("forgotPsverification");
  const addNewPs = document.getElementById("addNewPs");
  fverify.classList.toggle("moveLeft2");

  addNewPs.classList.toggle("move4");

}





function enebleBtn() {
  const checkbox2 = document.getElementById("checkbox2");
  const signupBtn = document.getElementById("signupBtn");

  if (!checkbox2.checked) {
    signupBtn.className = "btn btn-warning mt-3 col-12 disabled";
  } else {
    signupBtn.className = "btn btn-warning mt-3 col-12";
  }
}

function signup() {
  const signin = document.getElementById("signin");
  const signup = document.getElementById("signup");
  const innerForm = document.getElementById("inner-form");
  const fname = document.getElementById("fname");
  const lname = document.getElementById("lname");
  const mobile = document.getElementById("mobile");
  const email = document.getElementById("mail");
  const password1 = document.getElementById("psd1");
  const passwordConfirm = document.getElementById("psd2");
  const formSignup = document.getElementById("form-signup");
  const loading = document.getElementById("loading");
  const checkbox2 = document.getElementById("checkbox2");

  innerForm.className = "d-none";
  loading.className = "loading text-center d-block";

  const form = new FormData();
  form.append("fname", fname.value);
  form.append("lname", lname.value);
  form.append("mobile", mobile.value);
  form.append("email", email.value);
  form.append("password1", password1.value);
  form.append("passC", passwordConfirm.value);

  const request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        loading.className = "d-none";
        innerForm.className = "d-block";

        signin.classList.remove("move");
        signup.classList.remove("move1");
        fname.value = "";
        lname.value = "";
        mobile.value = "";
        email.value = "";
        password1.value = "";
        passwordConfirm.value = "";
        if (checkbox2.checked) {
          checkbox2.checked = false;
        }
      } else {
        alert(this.responseText);

        loading.className = "d-none";
        innerForm.className = "d-block";
      }
    }
  };

  request.open("POST", "signUpProcess.php", true);
  request.send(form);
}

function signIn() {
  const email = document.getElementById("l-email").value;
  const password = document.getElementById("l-psw").value;
  const checkbox = document.getElementById("checkbox");
  const alertbox = document.getElementById("alert-d");

  

  const form = new FormData();
  form.append("email", email);
  form.append("password", password);
  form.append("cResults", checkbox.checked);

  const request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        window.location.href = "index.php";
      } else {
        alertbox.className ="alert alert-danger alert-dismissible fade show";
        alertbox.innerHTML = "Error: " + this.responseText;


      }
     
    }
  };
  request.open("POST", "signInProcess.php", true);
  request.send(form);

}

function hideAlert(){
  const alertbox = document.getElementById("alert-d");
  alertbox.className = "d-none";

}
// changForm4();

function verify (){
  const email = document.getElementById("fps-email").value;
  const vCode = document.getElementById("ve-code").value;

  const alertBox = document.getElementById("alert-d-verify");
  const form = new FormData();
  form.append("usermail", email);
  form.append("vCode", vCode);
  const request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        changForm4();
        alertBox.className = "d-none";
      } else {
        alertBox.className = "alert alert-danger d-block";
        alertBox.innerHTML = this.responseText;
        
      }
    }
  };
  request.open("POST", "verifyProcess.php", true);
  request.send(form);

}

function changPs(){

  const nPs = document.getElementById("newPsw").value;
  const cnPs = document.getElementById("cnewPsw").value;
  const email = document.getElementById("fps-email").value;
  const alertBox = document.getElementById("alert-d-changps");

  const form = new FormData();

  form.append("nPs", nPs);
  form.append("cnPs", cnPs);
  form.append("email", email);
  const request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        alertBox.className ="alert alert-success d-block";
        alertBox.innerHTML = "Password changed successfully";
      
        window.location.reload();
      } else {
        alert(this.responseText);
        alertBox.className ="lert alert-danger d-block";
        alertBox.innerHTML = this.responseText;
      }
    }
  };
  request.open("POST", "changePswProcess.php", true);
  request.send(form);



}


