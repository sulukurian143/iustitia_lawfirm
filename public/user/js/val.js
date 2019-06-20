

$(document).ready(function () {
    $('#user_pay').validate({ // initialize the plugin
        rules: {
            credit_name: {
                required: true,
                lettersonly:true
            },
            lname: {
                required: true,
                lettersonly:true
            },
            email: {
                required: true,
                email: true
                //unique:true
            },
            cvv: {
                required: true,
                digits: true,
                minlength: 3,
                maxlength: 3
                
            },
            address: {
                required: true
                
            },
            pass: {
                required: true,
                minlength: 8,
                maxlength: 12
                
            },
            conpass: {
                required: true,
                minlength: 8,
                maxlength: 12
                
            },
           credit_no: {
                required: true,
                digits: true,
                minlength: 16,
                maxlength: 16
                
            },
            url: {
            required: true,
            url: true
            },
            proof: {
                required: true,
                extension: "jpeg|png|jpg",
                maxlength: 12
            },
        }
    });
});
