const loginBtn = document.getElementById('login');

const email = document.getElementById("email");
const password = document.getElementById("password");

loginBtn.addEventListener('click', function(){
    if(!email.value){
        alert("email is required");               
    }

    if(!password.value){
        alert("password is required");               
    }

})

const forgotlbl = document.getElementById('forgotPass');
const lblPassword = document.getElementById('lblPassword');
const lblBack = document.getElementById('lblBack');
const loginBackup = document.getElementById('loginBackup');

forgotlbl.addEventListener('click', function(){
lblPassword.innerHTML = "Backup Password";
lblBack.style.display = "block";
forgotlbl.style.display = "none";
loginBtn.style.display = "none"
loginBackup.style.display = "block";
})

lblBack.addEventListener('click', function(){
lblPassword.innerHTML = "Password";
lblBack.style.display = "none";
forgotlbl.style.display = "block";
loginBtn.style.display = "block";
loginBackup.style.display = "none";
})
