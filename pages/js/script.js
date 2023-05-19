$(document).ready(function () {

    // insert data
    $("#form").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: 'insert_data.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (returnData) {
                // console.log(data)
                var data = JSON.parse(returnData);
                if (data.status == "success") {
                    $("#success-alert").removeClass('d-none');
                    $("#success-msg").html(data.message);
                    $("#preview").hide();
                    $("#cancleImage").hide()
                    $("#form").trigger("reset");
                    loadTableData();
                } else {
                    $("#error-alert").removeClass('d-none');
                    $("#error-msg").html(data.message);
                }
            }
        })
    })

    $("#btn-close-success").on("click", function () {
        $("#success-alert").addClass('d-none');
    })
    $("#btn-close-error").on("click", function () {
        $("#error-alert").addClass('d-none');
    })

    // cancle button
    $("#cancleImage").on("click", function (e) {
        e.preventDefault();
        //  console.log("sdfds");
        $("#preview").hide();
        $("#cancleImage").hide();
        $("#profile").val("");
    })


    // fetch data
    function loadTableData() {
        $.ajax({
            url: "fetch_data.php",
            type: "POST",
            success: function (returnData) {
                // console.log(returnData);
                $("#table-data").html(returnData);
            }
        })
    }
    loadTableData();


    // delete data
    $(document).on("click", ".deletebtn", function () {
        var eid = $(this).data("uid");
        window.location.href("action.php?id="+eid);
        // console.log(eid);
        bootbox.confirm("Are you sure you want to delete record ??? ", function (result) {
            if (result) {
                $.ajax({
                    url: "deletedata.php",
                    type: "POST",
                    data: { empid: eid },
                    success: function (returnData) {
                        //console.log(returnData);
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



});


