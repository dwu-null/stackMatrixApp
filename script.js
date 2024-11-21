/** 
 * File name: script.js
Author: XIN GUO, 041154582
Course: 24F_CST8285_311_Web Programming
Assignment: lab04
Date: 11/08/2024
Professor: Hala Own
 * 
*/


// define the default message.
let defaultMSg="";

let loginErrorMsg="ｘUsername should be non-empty,and within 30 characters long.";
let loginInput=document.querySelector("#login");
let loginError=document.createElement('p');
loginError.setAttribute("class","warning");

document.querySelectorAll(".textfield")[0].append(loginError);
function validatelogin(){
    let login = loginInput.value; 
    let regexp=/^.{1,30}$/; 
    if(regexp.test(login)){ 
        loginError.textContent = defaultMSg;}
    else {
        loginError.textContent = loginErrorMsg;}
    return loginError.textContent;      
}
loginInput.value = loginInput.value.toLowerCase();
loginInput.addEventListener("blur",validatelogin);



let passwdErrorMsg="ｘPassword should be at least 8 characters:1 uppercase, 1 lowercase.";
let passwdInput=document.querySelector("#pass");
let passwdError=document.createElement('p');
passwdError.setAttribute("class","warning");
document.querySelectorAll(".textfield")[1].append(passwdError);
function validatePasswd(){
    let passwd = passwdInput.value; 
    let regexp = /^(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if(regexp.test(passwd)){ 
        passwdError.textContent = defaultMSg;}
    else {
        passwdError.textContent = passwdErrorMsg;}
    return passwdErrorMsg;
      
}
passwdInput.addEventListener("blur",validatePasswd);





let retypErrorMsg="ｘPlease retype password.";
let retypInput=document.querySelector("#pass2");
let retypError=document.createElement('p');
retypError.setAttribute("class","warning");
document.querySelectorAll(".textfield")[2].append(retypError);

function validateRetyp() { 
    if (retypInput.value == defaultMSg) {
        retypError.textContent = retypErrorMsg;
    } else if (retypInput.value === passwdInput.value) { 
        retypError.textContent = defaultMSg;
    } else {
        retypError.textContent = retypErrorMsg;
    }
    return retypError.textContent;
}
retypInput.addEventListener("blur",validateRetyp);



let termsErrorMsg="ｘPlease accept the terms and conditions.";
let termInput=document.querySelector("#terms");
let termError=document.createElement('p');
termError.setAttribute("class","warning terms");
document.querySelectorAll(".checkbox")[1].append(termError);

function validateTerms(){
    if(termInput.checked)
        termError.textContent=defaultMSg;
    else
        termError.textContent=termsErrorMsg;
    return termError.textContent;
}
termInput.addEventListener("change",validateTerms);



/**
 * This block of code define the behavior of submit mentioned in html
   onsubmit="return validate()
   When user click submit, the broswer will validate all the parts as needed.
   When all the validation are passed, meaning all the error message is empty, 
   the valid value is true. And then set the login value to lowercase.

*/

//event handler for submit event
function validate(){
    let valid = false;//global validation 
    
    validatelogin();
    validatePasswd();
    validateRetyp();
    validateTerms();  
    loginInput.value=loginInput.value.toLowerCase();

    let totalLength =
    loginError.textContent.length + termError.textContent.length
    + passwdError.textContent.length + retypError.textContent.length;

    if  (totalLength===0){valid = true;}
    return valid;

    

};


/*Event listener to reset text content of all error message paragraphs when the form is reset.*/
function resertFormError() {
       document.querySelectorAll(".warning").forEach(element => {
       element.textContent = defaultMSg;
    });
}
//Attach the reset event to the form, calling resertFormError to clear error messages.
document.querySelector("form").addEventListener("reset", resertFormError);


/*appendDiv Function: Creates a new div with class comment-section, containing a text prompt, input field, and submit button.*/
function appendDiv() {
    // Create a new div element for the comment section
    const commentSection = document.createElement('div');
    commentSection.classList.add('comment-section');
    
    // Add text content or elements inside the new comment section
    const commentText = document.createElement('p');
    commentText.textContent = "Enter your comment:";
    
    const commentInput = document.createElement('input');
    commentInput.type = "text";
    commentInput.placeholder = "Write a comment...";
    
    // Create a container for the buttons
    const buttonContainer = document.createElement('div');
    buttonContainer.classList.add('button-container');
    
    // Submit button
    const submitCommentButton = document.createElement('button');
    submitCommentButton.textContent = "Submit";
    submitCommentButton.onclick = function() {
        if (commentInput.value.trim() !== "") { // Check if input is not empty
            displayComment(commentInput.value); // Display the comment
            commentInput.value = ""; // Clear input field after submission
        } else {
            alert("Please enter a comment.");
        }
    };
    
    // Cancel button to remove the comment section
    const cancelButton = document.createElement('button');
    cancelButton.textContent = "Cancel";
    cancelButton.onclick = function() {
        commentSection.remove();
    };
    
    // Append buttons to the button container
    buttonContainer.appendChild(submitCommentButton);
    buttonContainer.appendChild(cancelButton);
    
    // Append elements to the comment section
    commentSection.appendChild(commentText);
    commentSection.appendChild(commentInput);
    commentSection.appendChild(buttonContainer);
    
    // Append the comment section to the post-info div
    document.querySelector('.post-info').appendChild(commentSection);
}

function displayComment(comment) {
    // Create a new div to display the submitted comment
    const commentDisplay = document.createElement('div');
    commentDisplay.classList.add('comment-display');
    commentDisplay.textContent = comment;
    
    // Append the displayed comment to the main post-info div
    document.querySelector('.post-info').appendChild(commentDisplay);
}

