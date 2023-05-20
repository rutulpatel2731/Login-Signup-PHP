$(document).ready(function() {

    // insert data
    $("#form").on("submit", function(e) {
        e.preventDefault();
        var token = $("#userId").val();
        // console.log(token)
        if (token != 'null') {
            var up = 'updatedata-query.php';
        } else {
            var up = 'insert_data.php';
        }
        $.ajax({
            url: up,
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(returnData) {
                console.log(returnData)
                var data = JSON.parse(returnData);
                if (data.status == "success") {
                    $("#success-alert").removeClass('d-none');
                    $("#success-msg").html(data.message);
                    $("#image-preview").hide();
                    $("#form").trigger("reset");
                    $("#insertBtn").show();
                    $("#updateDataBtn").hide();
                    loadTableData();
                } else {
                    $("#error-alert").removeClass('d-none');
                    $("#error-msg").html(data.message);
                }
            }
        })
    })

    // alert button 
    $("#btn-close-success").on("click", function() {
        $("#success-alert").addClass('d-none');
    })
    $("#btn-close-error").on("click", function() {
        $("#error-alert").addClass('d-none');
    })

    // image close button onclick
    $("#cancleImage").on("click", function(e) {
        e.preventDefault();
        $("#image-preview").hide();
        $("#profile").val("");
    })


    // fetch data
    function loadTableData() {
        $.ajax({
            url: "fetch_data.php",
            type: "POST",
            success: function(returnData) {
                // console.log(returnData);
                $("#table-data").html(returnData);
            }
        })
    }
    loadTableData();


    // delete data
    $(document).on("click", ".deletebtn", function() {
        var did = $(this).data("did");
        // console.log(eid);
        bootbox.confirm("Are you sure you want to delete record ??? ", function(result) {
            if (result) {
                $.ajax({
                    url: "deletedata.php",
                    type: "POST",
                    data: { empid: did },
                    success: function(returnData) {
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



    //update data
    $(document).on("click", ".updatebtn", function() {
            var sId = $(this).data("uid");
            // console.log(sId);
            $.ajax({
                url: "update-fetch.php",
                type: "POST",
                data: { studentId: sId },
                success: function(returnData) {
                    // console.log(returnData);
                    var data = JSON.parse(returnData);
                    let gender = data.gender;
                    $("#userId").val(data.id)
                    $("#name").val(data.name);
                    $("#mobileno").val(data.mobileno);
                    $("input[name='gender'][value=" + gender + "]").prop('checked', true);
                    $("#profile").attr("value", data.image);
                    // Display the image preview
                    $("#preview").attr("src", "./upload/" + data.image);

                    // Hide or show the preview buttons
                    $("#image-preview").show();
                    $("#cancleImage").hide();
                    // Hide & show Insert update buttons
                    $("#insertBtn").hide();
                    $("#updateDataBtn").show();
                }
            })
        })
        // hide update button bydefault
    $("#updateDataBtn").hide();
});