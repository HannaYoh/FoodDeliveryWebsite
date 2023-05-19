const submit = document.getElementById('submit');
const forms = document.getElementById('forms');

var regName = /^[A-Za-z\s]*$/;
var regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var regPhone = /^\d{10}$/;

const fullName = document.getElementById("fullName");
const email = document.getElementById("email");
const phoneNumb = document.getElementById("phoneNumb");
const address = document.getElementById("address");
const password = document.getElementById("password");
const conPass = document.getElementById("confirmPassword");
const backPass = document.getElementById("backupPassword");
const conBack = document.getElementById("confirmBackup");

submit.addEventListener('click', function(event){
    /* event.preventDefault(); */
   
    if(!fullName.value){
        alert("name is required");               
    }
    else if(!regName.test(fullName.value)){
        alert('Invalid name');
    }
    else if(!email.value){
        alert("email is required");
    }
    else if(!regEmail.test(email.value)){
        alert('Invalid email');
    }
    else if(!phoneNumb.value){
        alert("phone number is required");
    }
    else if(!regPhone.test(phoneNumb.value)){
        alert('Invalid phone');
    }
    else if(!address.value){
        alert("address is required");               
    }
    else if(!password.value){
        alert("password is required");
    }
    else if(!conPass.value){
        alert("password confirmation is required");
    }
    else if(password.value != conPass.value){
        alert("passwords mutch match");
    }
    else if(!backPass.value){
        alert("backup is required");
    }
    else if(!conBack.value){
        alert("backup confirmation is required");
    }
    else if(backPass.value != conBack.value){
        alert("backup passwords mutch match");
    }
    else{
       /*  //send to php
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'createAcc.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function(){
            if (xhr.status === 200){
                const response = JSON.parse(xhr.responseText);
                if (response.success){
                    forms.reset(); 
                    alert("account created successfully");
                 }
                else{
                    alert('Error inserting data');
                }
            } 
        }
       
        xhr.send(`fullName=${encodeURIComponent(fullName.value)}&email=${encodeURIComponent(email.value)}
        &phoneNumb=${encodeURIComponent(phoneNumb.value)}&address=${encodeURIComponent(address.value)}
        &password=${encodeURIComponent(password.value)}&backupPassword=${encodeURIComponent(backPass.value)}
        `);  */
        alert("account created successfully");
    }
   

})  

