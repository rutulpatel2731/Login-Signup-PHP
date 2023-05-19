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



    //update data
    $(document).on("click",".updatebtn",function(){
        var sId  = $(this).data("uid");
        // console.log(sId);
        $.ajax({
            url : "update-fetch.php",
            type : "POST",
            data : {studentId : sId},
            success : function(returnData){
                console.log(returnData);
                var data = JSON.parse(returnData);
                let gender = data.gender;
                $("#name").val(data.name);
                $("#mobileno").val(data.mobileno);
                // $("input[name='gender']:checked").val(data.gender);
                $("input[name='gender'][value=" + gender + "]").prop('checked', true);
                $("#preview").attr("src","./upload/" + data.image)
                $("#preview").show();
                $("#cancleImage").show();
                // var imgElement = $("<img>").attr("src","./upload/", data.image);
                // $("#profile").after(imgElement);
            }

        })
    })
});


