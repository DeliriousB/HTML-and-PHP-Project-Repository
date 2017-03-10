/**
 * Created by Myself on 6/20/2016.
 */

    function validate(){

        var error = false;
        var fname = document.myform.fname;
        var firstnameSpan = document.getElementById("firstnameSpan");
        var lname = document.myform.lname;
        var lastnameSpan = document.getElementById("lastnameSpan");
        var dob = document.myform.dob;
        var dobSpan = document.getElementById("dob");
        var login = document.myform.login;
        var loginSpan = document.getElementById("loginSpan");
        var password = document.myform.password;
        var passwordSpan = document.getElementById("passwordSpan");
        var verifypassword = document.myform.verifypassword;
        var verifypasswordSpan = document.getElementById("verifypasswordSpan");
        var yesbox = document.myform.yesbox;
        var nobox = document.myform.nobox;
        var checkboxSpan = document.getElementById("checkboxSpan");

        if(fname.value == ""){
            firstnameSpan.style.visibility = "visible";
            fname.style.borderColor = "red";
            error = true;
        }
        else{
            firstnameSpan.style.visibility = "hidden";
            error = false;
        }

        if(lname.value ==""){
            lastnameSpan.style.visibility = "visible";
            lname.style.borderColor = "red";
            error = true;
        }
        else{
            lastnameSpan.style.visibility = "hidden";
            error = false;
        }

       if(dob.value ==""){
            dobSpan.style.visibility = "visible";
            dob.style.borderColor = "red";
            error = true;
        }
        else{
            dobSpan.style.visibility = "hidden";
            error = false;
        }

        if(!(yesbox.checked || nobox.checked)){
            checkboxSpan.style.visibility = "visible"
            yesbox.style.borderColor = "red";
            error = true;
        }

        else{
            checkboxSpan.style.visibility = "hidden";
            error = false;
        }

        if(login.value == ""){
            loginSpan.style.visibility = "visible";
            login.style.borderColor = "red";
            error = true;
        }
        else{
            loginSpan.style.visibility = "hidden";
            error = false;
        }

        if(password.value == ""){
            passwordSpan.style.visibility = "visible";
            password.style.borderColor = "red";
            error = true;
        }
        else{
            passwordSpan.style.visibility = "hidden";
            error = false;
        }

        if(verifypassword.value == ""){
            verifypasswordSpan.style.visibility = "visible";
            verifypassword.style.borderColor = "red";
            error = true;
        }
        else{
            verifypasswordSpan.style.visibility = "hidden";
            error = false;
        }

        if (error == 0){
            return true;
        }

        else{
            return false;
        }

    }