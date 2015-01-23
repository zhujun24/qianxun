window.onload = function () {
    var password1 = document.getElementById('password1');
    var password2 = document.getElementById('password2');
    var error = document.getElementById('error');
    var submit = document.getElementById('submit');
    var form = document.getElementsByTagName('form')[0];

    var Passwordpattern = /^([a-z]|[A-Z]|[0-9]){6,20}$/;

    submit.onclick = function () {
        if (password1.value == password2.value && (Passwordpattern.test(password1.value) == true)) {
            submit.className = "btn btn-primary disabled";
        } else {
            error.style.display = "block";
            return false;
        }
    }
}