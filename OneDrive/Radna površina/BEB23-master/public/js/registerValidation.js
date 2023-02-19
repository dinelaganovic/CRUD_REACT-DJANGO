const name = document.getElementById('name');
const nameError = document.getElementById('nameError');

const lastname = document.getElementById('lastname');
const lastnameError = document.getElementById('lastnameError');

const male = document.getElementById('male');
const female = document.getElementById('female');

const genderError = document.getElementById('genderError');

const birthDate = document.getElementById('birthDate');
const birthDateError = document.getElementById('birthDateError');

const birthPlace = document.getElementById('birthPlace');
const birthPlaceError = document.getElementById('birthPlaceError');

const birthCountry = document.getElementById('birthCountry');
const birthCountryError = document.getElementById('birthCountryError');

const contact = document.getElementById('contact');
const contactError = document.getElementById('contactError');

const profilePicture = document.getElementById('profilePicture');
const profilePictureError = document.getElementById('profilePictureError');

const jmbg = document.getElementById('jmbg');
const jmbgError = document.getElementById('jmbgError');

const username = document.getElementById('username');
const usernameError = document.getElementById('usernameError');

const email = document.getElementById('email');
const emailError = document.getElementById('emailError');

const password = document.getElementById('password');
const passwordError = document.getElementById('passwordError');

const confirmPassword = document.getElementById('confirmPassword');
const confirmPasswordError = document.getElementById('confirmPasswordError');

const accountType = document.getElementById('accountType');

// Basic info div
const basicInfo = document.getElementById('basicInfo');

// Patient info div
const accountTypePatient = document.getElementById('accountTypePatient');

// Patinet info
const accc = document.getElementById('accc');

const acccError = document.getElementById('acccError');
const acc = document.getElementById('acc');

const accError = document.getElementById('accError');


if(accountType.value === 'student') {
    accountTypeStudent.hidden = false;
} else {
    accountTypeStudent.hidden = true;
}
if(accountType.value === 'teacher') {
    accountTypeTeacher.hidden = false;
} else {
    accountTypeTeacher.hidden = true;
}

const handleChangeAccountType = _ => {
    if(accountType.value === 'student') {
        accountTypeStudent.hidden = false;
    } else {
        accountTypeStudent.hidden = true;
    }
    if(accountType.value === 'teacher') {
        accountTypeTeacher.hidden = false;
    } else {
        accountTypeTeacher.hidden = true;
    }
}

// Validation
const namePattern = /^[a-zA-Z]{3,16}$/;
const lastnamePattern = /^[a-zA-Z]{3,24}$/;
const datePattern = /^[0-9]{2}-[0-9]{2}-[0-9]{4}$/;
const jmbgPattern = /^[0-9]{13}$/;
const emailPattern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

const handleSubmit = e => {
    let valid = true;

    if(namePattern.test(name.value)) {
        nameError.hidden = true;        
    } else {
        nameError.hidden = false;
        valid = false;
    }

    if(lastnamePattern.test(lastname.value)) {
        lastnameError.hidden = true;
    } else {
        lastnameError.hidden = false;
        valid = false;
    }

    if(male.checked === true || female.checked === true) {
        genderError.hidden = true;
    } else {
        genderError.hidden = false;
        valid = false;
    }
    if(birthDate.value) {
        if (moment().diff(birthDate.value, 'years') >= 18) {
            birthDateError.hidden = true;
        } else {
            birthDateError.hidden = false;
            birthDateError.innerHTML = 'Morate biti stariji od 18 godina.';
            valid = false;
        }
    } else {
        birthDateError.hidden = false;
        valid = false;
    }
    if(birthPlace.value==""){
        birthDateError.hidden = false;
    }else{
        birthDateError.hidden = true;
        valid=false;
    }
    if(birthCountry.value==""){
        birthCountryError.hidden = false;
    }else{
        birthCountryError.hidden = true;
        valid=false;
    }
    if(birthCountry.value==""){
        birthCountryError.hidden = false;
    }else{
        birthCountryError.hidden = true;
        valid=false;
    }
    if(contact.value==""){
        contactError.hidden = false;
    }else{
        contactError.hidden = true;
        valid=false;
    }
    if(jmbgPattern.test(jmbg.value)) {
        jmbgError.hidden = true;
    } else {
        jmbgError.hidden = false;
        valid = false;
    }
    if (profilePicture.files.length > 0) {
        profilePictureError.hidden = true
    } else {
        profilePictureError.hidden = false;
        valid = false;
    }
    if(emailPattern.test(email.value)) {
        emailError.hidden = true;
    } else {
        emailError.hidden = false;
        valid = false;
    }
    if((password.value.length >= 8) || (password.value !== "")) {
        passwordError.hidden = true;
    } else {
        passwordError.hidden = false;
        valid = false;
    }

    if((password.value === confirmPassword.value)) {
        confirmPasswordError.hidden = true;
    } else {
        confirmPasswordError.hidden = false;
        valid = false;
    }

    if(accountType.value === 'teacher') {
        if(accc.value.length == "") {
            acccError.hidden = false;
        } else {
            acccError.hidden = true;
            valid = true;
        }
        
    }
    if(accountType.value === 'student') {
        if(acc.value.length == "") {
            accError.hidden = false;
        } else {
            accError.hidden = true;
            valid = true;
        }
        
    }

    if(!valid) {
        e.preventDefault();
    }
}