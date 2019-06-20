

$(document).ready(function () {
    $('#changepwd').validate({ // initialize the plugin
        rules: {
            fname: {
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
            phone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 12
                
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
