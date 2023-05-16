$(document).ready(function () {


    $("#form").on("submit", function (e) {
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
            errorPlacement: function (error, element) {
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
                success: function (data) {

                    if(JSON.parse(data).register == 1){
                        $("#email-error").html(JSON.parse(data).message);
                    }else if (JSON.parse(data).success == "true") {
                        $("#success-alert").removeClass("d-none");
                        $("#success-msg").html(JSON.parse(data).message);
                        $("#email-error").addClass('d-none');
                        $("#form").trigger("reset");
                    } else {
                        $("#error-alert").removeClass("d-none");
                        $("#error-msg").html(JSON.parse(data).message);
                    }
                       console.log(data);
                }
            })
        }

    })

    $("#btn-close-success").on("click", function () {
        $(".alert").addClass('d-none');
    })
    $("#btn-close-error").on("click", function () {
        $(".alert").addClass('d-none');
    })
})