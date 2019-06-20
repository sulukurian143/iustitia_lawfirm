

$(document).ready(function () {
    $('#signup-form').validate({ // initialize the plugin
        rules: {
            name: {
                required: true,
                lettersonly: true
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                digits: true
                
            },
            address: {
                required: true
                
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 12
                
            },
            minvalue: {
                required: true,
                min: 1
                
            },
            maxvalue: {
                required: true,
                max: 100
                
            },
            range: {
                required: true,
                range: [20, 40]
                
            },
            url: {
            required: true,
            url: true
            },
            proof: {
                required: true,
                extension: "jpeg|png|jpg"
            },
        }
    });
});
