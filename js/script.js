$(document).ready(function() {

    // register data
    $("#form").on("submit", function(e) {
        e.preventDefault();
        jQuery('#form').validate({
            rules: {
                uname: {
                    required: true,
                },
                mobileno: {
                    required: true,
                    minlength: 10
                },
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 5,
                },
                cpassword: {
                    required: true,
                    equalTo: "#password",
                },
                "hobbie[]": {
                    required: true,
                    minlength: 1
                },
                profile: {
                    required: true,
                    accept: "jpg,jpeg,png,gif"
                }
            },
            messages: {
                uname: {
                    required: "Please Enter The Name",
                },
                mobileno: {
                    required: "Please Enter Mobile Number.",
                },
                email: {
                    required: "Please Enter Email Address..",
                    email: "Please Enter Valid Email Address..",
                },
                password: {
                    required: "Please Enter Password..",
                    minlength: "Password Must be 5 Character long...",
                },
                confirmPassword: {
                    required: "Please Enter The Confirm Password..",
                    equalTo: "Please Enter the same password as above.",
                },
                "hobbie[]": {
                    required: "Please Select The Hobbies",
                },
                profile: {
                    required: "Please select an image to upload.",
                    accept: "Only Support JPEG/JPG/PNG format.."
                }
            },
            errorPlacement: function(error, element) {
                if (element.is(":checkbox")) {
                    error.appendTo('.hobbie');
                } else {
                    error.insertAfter(element);
                }
            },
        })

        if ($("#form").valid()) {
            $.ajax({
                url: "registerdata.php",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data) {
                    var data = JSON.parse(data);
                    if (data.success == "true") {
                        $("#success-alert").removeClass("d-none");
                        $("#success-msg").html(data.message);
                        $("#email-error").addClass('d-none');
                        $("#form").trigger("reset");
                    } else {
                        $("#error-alert").removeClass("d-none");
                        $("#error-msg").html(data.message);
                    }


                    console.log(data);
                }
            })
        }

    })


    // forgot password
    $("#forgotpassword").on("submit", function(e) {
        e.preventDefault();
        jQuery('#forgotpassword').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                mobile: {
                    required: true,
                    minlength: 10
                },

                password: {
                    required: true,
                    minlength: 5,
                },
                rpassword: {
                    required: true,
                    equalTo: "#password",
                },
            },
            messages: {
                email: {
                    required: "Please Enter Email Address..",
                    email: "Please Enter Valid Email Address..",
                },
                mobile: {
                    required: "Please Enter Mobile Number.",
                },
                password: {
                    required: "Please Enter Password..",
                    minlength: "Password Must be 5 Character long...",
                },
                rpassword: {
                    required: "Please Enter The Confirm Password..",
                    equalTo: "Please Enter the same password as above.",
                },
            },
            errorPlacement: function(error, element) {
                if (element.is(":checkbox")) {
                    error.appendTo('.hobbie');
                } else {
                    error.insertAfter(element);
                }
            },
        })
        if ($("#forgotpassword").valid()) {
            $.ajax({
                url: 'forgotpassword-query.php',
                type: "POST",
                data: {
                    email: $("#email").val(),
                    mobile: $("#mobile").val(),
                    password: $("#password").val(),
                    rpassword: $("#rpassword").val()
                },
                success: function(data) {
                    //console.log(data)
                    var returnData = JSON.parse(data)
                    if (returnData.status == "error") {
                        $("#error-alert").removeClass('d-none');
                        $("#error-msg").html(returnData.message)
                    } else {
                        $("#success-alert").removeClass('d-none');
                        $("#success-msg").html(returnData.message)
                        $("#forgotpassword").trigger("reset");
                    }
                }
            })
        }


    });

    //    alerts
    $("#btn-close-success").on("click", function() {
        $("#success-alert").addClass('d-none');
    })
    $("#btn-close-error").on("click", function() {
        $("#error-alert").addClass('d-none');
    })
})