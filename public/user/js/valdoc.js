

$(document).ready(function () {
    $('#doc').validate({ // initialize the plugin
        rules: {
            doc_email: {
                required: true,
                
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
            title: {
                required: true
                
            },
            doc: {
                required: true,
                
                
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
