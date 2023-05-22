$(document).ready(function () {

    // insert data
    $("#form").on("submit", function (e) {
        e.preventDefault();
        jQuery('#form').validate({
            rules: {
                name: "required",
                mobileno: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                gender: {
                    required: true,
                },
                "profile[]": {
                    accept: "jpg,jpeg,png,gif"
                }
            },
            messages: {
                name: "Please Enter Name..",
                mobile: {
                    required: "Please Enter Mobile Number.",
                    number: "Please enter number only.."
                },
                gender: {
                    required: "Please Select Gender..",     
                },
                "profile[]": {
                    accept: "Only Support JPEG/JPG/PNG format.."
                }
            },
            errorPlacement: function(error, element) {
                if (element.is(":radio")) {
                    error.appendTo('.Gender');
                } else {
                    error.insertAfter(element);
                }
            },
        })
        if ($("#form").valid()) {
            var token = $("#userId").val();
            // console.log(token)
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
                    console.log(returnData)
                    var data = JSON.parse(returnData);
                    if (data.status == "success") {
                        $("#success-alert").removeClass('d-none');
                        $("#success-msg").html(data.message);
                        $("#main").addClass('d-none');
                        $("#form").trigger("reset");
                        $("#updateDataBtn").addClass('d-none');
                        $("#insertBtn").removeClass('d-none');
                        loadTableData();
                    } else {
                        $("#error-alert").removeClass('d-none');
                        $("#error-msg").html(data.message);
                    }
                }
            })
        }
    })

    // alert button 
    $("#btn-close-success").on("click", function () {
        $("#success-alert").addClass('d-none');
    })
    $("#btn-close-error").on("click", function () {
        $("#error-alert").addClass('d-none');
    })

    // image close button onclick
    $("#cancleImage").on("click", function (e) {
        e.preventDefault();
        $("#image-preview").hide();
        $("#profile").val("");
    })


    // fetch data
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
        // console.log(eid);
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



    $(document).on("click", "#updatebtn", function () {
        var sId = $(this).data("uid");
        $.ajax({
            url: "update-fetch.php",
            type: "POST",
            data: { studentId: sId },
            success: function (returnData) {
                console.log(returnData)
                var data = JSON.parse(returnData);
                console.log(data);
                let gender = data[0].gender;
                $("#userId").val(data[0].userid);
                $("#name").val(data[0].name);
                $("#mobileno").val(data[0].mobileno);
                $("input[name='gender'][value=" + gender + "]").prop('checked', true);

                // // Clear the previous image previews
                $("#main").removeClass('d-none');
                $("#gallery").empty();

                // Generate image previews with cross icons
                data[1].forEach(function (imageName) {
                    var imgId = imageName.id;
                    var imgContainer = $("<div>").addClass("image-container");
                    var img = $("<img>").attr("src", "./upload/" + imageName.imgname);
                    var cross = $("<span>").attr({ class: "crossIcon", id: imgId }).text("X").click(function () {
                        deleteImage(imgId);
                    });
                    imgContainer.append(img, cross);
                    $("#gallery").append(imgContainer);
                });

                // Show the update button and hide the insert button
                $("#insertBtn").addClass('d-none');
                $("#updateDataBtn").removeClass('d-none');
            }
        });
    });

    function deleteImage(imgId) {
        var imageId = imgId;
        // console.log(imageId);
        $.ajax({
            url: "deleteimage.php",
            type: "POST",
            data: { iId: imageId },
            success: function (returnData) {
                //console.log(returnData);
                var data = JSON.parse(returnData);
                $("#success-alert").removeClass('d-none');
                $("#success-msg").html(data.message);
                $("#" + imageId).parent().remove();
            }
        })
    }

});