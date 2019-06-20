

$(document).ready(function () {
    $('#signup-form').validate({ // initialize the plugin
        rules: {
            fname: {
                required: true,
                digits: false
            },
            lname: {
                required: true,
                digits: false
            },
            email: {
                required: true,
                email: true
                //unique:true
            },
            phone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 12
                
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
                extension: "jpeg|png|jpg",
                maxlength: 12
            },
        }
    });
});
