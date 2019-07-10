grecaptcha.ready(function() {
    grecaptcha.execute('6Le696wUAAAAAMy2hNmW5v3ykH1X3GM0emfjeKiW', {action: 'login'}).then(function(token) {
        var recaptcha = document.querySelector("#recaptchaResponse");
        recaptcha.value = token;
        
    })
})

