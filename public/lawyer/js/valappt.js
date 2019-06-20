

$(document).ready(function () {
    $('#appt').validate({ // initialize the plugin
        rules: {
            date: {
                required: true,
                
            },
            'check[]': {
                required: true,
                
            },
            email: {
                required: true,
                email: true
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
                extension: "jpeg|png|jpg"
            },
        }
    });
});
