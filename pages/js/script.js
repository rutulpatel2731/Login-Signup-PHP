$(document).ready(function () {

    // insert data
    $("#form").on("submit", function (e) {
        e.preventDefault();
        $.validator.addMethod('regexp', function (value, element) {
            var name = $("#name").val();
            if (!/^[a-z A-Z]+$/.test(name)) {
                return false;
            } else {
                return true;
            }
        }, "Please Enter Valid Name");

        jQuery('#form').validate({
            rules: {
                name: {
                    required: true,
                    regexp: true,
                    // lettersonly:true,
                },
                mobileno: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                gender: {
                    required: true,
                },
                "skill[]": {
                    required: true,
                },
                country: {
                    required: true
                },
                state: {
                    required: true
                },
                "profile[]": {
                    accept: "jpg,jpeg,png,gif"
                },

            },
            messages: {
                name: {
                    required: "Please Enter Name"
                },
                mobile: {
                    required: "Please Enter Mobile Number.",
                    number: "Please enter number only.."
                },
                gender: {
                    required: "Please Select Gender..",
                },
                "skill[]": {
                    required: "Please Select Your Skills",
                },
                country: {
                    required: "Please Select Your Country",
                },
                state: {
                    required: "Please Select Your State",
                },
                "profile[]": {
                    accept: "Only Support JPEG/JPG/PNG format.."
                },
            },
            errorPlacement: function (error, element) {
                if (element.is(":radio")) {
                    error.appendTo('.Gender');
                } else if (element.is(":checkbox")) {
                    error.appendTo('.Skills');
                } else {
                    error.insertAfter(element);
                }
            },
        })
        if ($("#form").valid()) {
            var token = $("#userId").val();
            if (token != 'null') {
                var link = 'updatedata-query.php';
            } else {
                var link = 'insert_data.php';
            }
            $.ajax({
                url: link,
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (returnData) {
                    var data = JSON.parse(returnData);
                    if (data.status == "success") {
                        $("#success-alert").removeClass('d-none');
                        $("#success-msg").html(data.message);
                        $("#main").addClass('d-none');
                        $("#form").trigger("reset");
                        $("#updateDataBtn").addClass('d-none');
                        $("#insertBtn").removeClass('d-none');
                        $("#cancleBtn").addClass('d-none');
                        loadTableData();
                    } else {
                        $("#error-alert").removeClass('d-none');
                        $("#error-msg").html(data.message);
                    }
                }
            })
        }
    })

    // fetch data In table
    function loadTableData() {
        $.ajax({
            url: "fetch_data.php",
            type: "POST",
            success: function (returnData) {
                //  console.log(returnData);
                $("#table-data").html(returnData);
            }
        })
    }
    loadTableData();


    // delete data
    $(document).on("click", ".deletebtn", function () {
        var did = $(this).data("did");
        bootbox.confirm("Are you sure you want to delete record ??? ", function (result) {
            if (result) {
                $.ajax({
                    url: "deletedata.php",
                    type: "POST",
                    data: { empid: did },
                    success: function (returnData) {
                        console.log(returnData);
                        var data = JSON.parse(returnData);
                        if (data.status == "success") {
                            $("#success-alert").removeClass('d-none');
                            $("#success-msg").html(data.message);
                            loadTableData();
                        } else {
                            $("#error-alert").removeClass('d-none');
                            $("#error-msg").html(data.message);
                        }
                    }
                })
            }
        });
    })

    // edit button ajax 
    $(document).on("click", "#updatebtn", function () {
        var sId = $(this).data("uid");
        $.ajax({
            url: "update-fetch.php",
            type: "POST",
            data: { studentId: sId },
            success: function (returnData) {
                $("#gallery").html('');
                $("input:checkbox").prop('checked', false);

                var data = JSON.parse(returnData);

                let gender = data[0].gender;
                $("#userId").val(data[0].userid);
                $("#name").val(data[0].name);
                $("#mobileno").val(data[0].mobileno);
                $("input[name='gender'][value=" + gender + "]").prop('checked', true);

                //fetch checkbox value
                for (var i = 0; i < data[0]['skill'].length; i++) {
                    var checkboxValue = data[0]['skill'][i];
                    $("#" + checkboxValue).prop('checked', true);
                }

                // for image fetch
                $("#main").removeClass('d-none');
                // create dynamic image preview
                data[1].forEach(function (imageName) {
                    var imgId = imageName.id;
                    console.log(imgId)
                    var imgContainer = $("<div>").addClass("image-container");
                    var img = $("<img>").attr("src", "./upload/" + imageName.imgname);
                    var cross = $("<span>")
                        .attr({ class: "crossIcon", id: imgId })
                        .text("X").click(function () {
                            deleteImage(imgId);
                        });
                    imgContainer.append(img, cross);
                    $("#gallery").append(imgContainer);
                });

                // getting dropdown value
                let str = "";
                data[0][0].forEach((state) => {
                    if (state[0] !== data[0].state)
                        str += `<option value='${state[0]}'>${state[0]}</option>`;
                    else
                        str += `<option value='${state[0]}' selected>${state[0]}</option>`;
                })
                $("#state").append(str);
                $("#country").val(data[0].country);

                // Show the update button and hide the insert button
                $("#insertBtn").addClass('d-none');
                $("#updateDataBtn").removeClass('d-none');
                $("#cancleBtn").removeClass('d-none');
            }
        });
    });

    // cancel button at time of update
    $(document).on("click", "#cancleBtn", function (e) {
        e.preventDefault();
        $("#form")[0].reset();
        $("#updateDataBtn").addClass('d-none');
        $("#cancleBtn").addClass('d-none');
        $("#main").addClass('d-none');
        $("#insertBtn").removeClass('d-none');
        $("#state").html('<option selected>Select State</option>');
    })

    // function for delete specific image at the time of edit
    function deleteImage(imgId) {
        var imageId = imgId;
        $.ajax({
            url: "deleteimage.php",
            type: "POST",
            data: { iId: imageId },
            success: function (returnData) {
                var data = JSON.parse(returnData);
                $("#success-alert").removeClass('d-none');
                $("#success-msg").html(data.message);
                $("#" + imageId).parent().remove();
                loadTableData();
            }
        })
    }

    // alert button 
    $("#btn-close-success").on("click", function () {
        $("#success-alert").addClass('d-none');
    })
    $("#btn-close-error").on("click", function () {
        $("#error-alert").addClass('d-none');
    })

    // dependent dropdown Ajax
    $("#country").change(function () {
        var name = $(this).val();
        $.ajax({
            type: "POST",
            url: "getcity.php",
            data: { countryName: name },
            success: function (response) {
                console.log(response);
                $("#state").empty();
                $("#state").html(response);
            }
        });
    });
});