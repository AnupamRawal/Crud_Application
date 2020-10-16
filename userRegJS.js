$(document).ready(function () {
    $('#nameErr').hide();
    $('#emailErr').hide();
    $('#passwordErr').hide();
    $('#genderErr').hide();
    $('#cPasswordErr').hide();

    let nameErr = false;
    let emailErr = false;
    let genderErr = false;
    let passwordErr = false;
    let cPasswordErr = false;


    $('#name').focusout(function () {
        console.log($(this));
        nameErrfn();
    });

    $('#email').focusout(function () {
        emailErrfn();
    });

    $('input[name="gender"]').focusout(function () {
        genderErrfn();
    });

    $('#mypassword').focusout(function () {
        passwordErrfn();
    });

    $('#cPassword').focusout(function () {
        cPasswordErrfn();
    });

    function nameErrfn() {
        let userName = $('#name').val();
        nameErr = true;
        if (nameErr && userName.length == 0) {
            $('#nameErr').show();
            $('#nameErr').html('This field is required');
            return nameErr = false;
        } else {
            $('#nameErr').hide();
            return nameErr = true;
        }
    };

    function emailErrfn() {
        let emailId = $('#email').val();
        emailErr = true;
        if (emailErr && emailId.length == 0) {
            $('#emailErr').show();
            $('#emailErr').html('Please enter a valid email');
            return emailErr = false;
        } else {
            $('#emailErr').hide();
            return true;
        }
    }

    function genderErrfn() {
        let genderId = $('input[name="gender"]:checked').val();
        // console.log('selected',genderId);
        genderErr = true;
        // console.log('formale check',((genderId!='male') && (genderId!='female')));

        if (genderErr && ((genderId != 'male') && (genderId != 'female'))) {
            $('#genderErr').show();
            $('#genderErr').html('Please select gender');
            return genderErr = false;
        } else {
            $('#genderErr').hide();
            return true;
        }
    };

    function passwordErrfn() {
        let passwordId = $('#mypassword').val();
        passwordErr = true;
        // console.log('l',(passwordId.length));

        if (passwordErr && (passwordId.length == 0)) {
            $('#passwordErr').show();
            $('#passwordErr').html('Please enter a valid password');
            return passwordId = false;
        } else {
            $('#passwordErr').hide();
            return true;
        }
    }



    function cPasswordErrfn() {
        let cPasswordId = $('#cPassword').val();
        let passwordId = $('#mypassword').val();
        cPasswordErr = true;
        // console.log(cPasswordId.length);

        if (cPasswordErr && cPasswordId.length == 0) {
            $('#cPasswordErr').show();
            $('#cPasswordErr').html('Please confirm your password');
        } else if (cPasswordId != passwordId) {
            $('#cPasswordErr').show();
            $('#cPasswordErr').html('Password did not matched');
            return cPasswordErr = false;
        } else {
            $('#cPasswordErr').hide();
            return true;
        }
    }

    $('#submitBtn').on('click', function () {
        let nameErr = nameErrfn();
        let emailErr = emailErrfn();
        let genderErr = genderErrfn();
        let passwordErr = passwordErrfn();
        let cPasswordErr = cPasswordErrfn();

        if (nameErr && emailErr && passwordErr && cPasswordErr && genderErr) {
            return true;
        } else {
            return false;
        }
    });
});
