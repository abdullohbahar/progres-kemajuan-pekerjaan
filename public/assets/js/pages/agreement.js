$("body").on("click", "#agreeBtn", function () {
    var scheduleID = $(this).data("scheduleid");

    Swal.fire({
        title: "Apakah anda yakin?",
        text: "Data yang telah disetujui tidak bisa diubah",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Setujui",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/agree/" + scheduleID,
                dataType: "JSON",
                method: "POST",
                success: function (response) {
                    console.log(response);
                    if (response.status == 200) {
                        success(response.message);
                        setTimeout(function () {
                            window.location = "";
                        }, 1450);
                    }
                },
            });
        }
    });
});

$("#sendWeeklyProgressBtn").on("click", function () {
    var week = $(this).data("week");
    var taskID = $(this).data("taskid");

    var myModal = new bootstrap.Modal("#modalSendWeeklyProgress");

    Swal.showLoading();

    $.ajax({
        url: "/agreement/get-task-this-week/" + taskID + "/" + week,
        method: "GET",
        success: function (response) {
            if (response.status == 200) {
                // Mengambil data dari respons
                var data = response.data.reverse();

                console.log(data[0]);

                // Mendapatkan elemen tabel
                var table = $("#tableWeeklyProgress");

                table.find("tr:not(#headerRow)").remove();

                // Melakukan looping untuk setiap item dalam data
                $.each(data[1], function (index, item) {
                    // Membuat elemen <tr> baru
                    var newRow = $("<tr>");

                    // Mengisi elemen <tr> dengan data dari respons
                    newRow.html(
                        `<td>
                        ${item.name}
                                <input type="text" name="week[]" hidden value="${item.week}" id="">
                                <input type="text" name="date[]" hidden value="${item.date}" id="">
                                <input type="text" name="progress[]" hidden value="${item.progress}" id="">
                                <input type="text" name="task_report_id[]" hidden value="${item.task_report_id}" id="">
                                <input type="text" name="kind_of_work_detail_id[]" hidden value="${item.kind_of_work_detail_id}" id="">
                            </td>
                            <td>
                            ${item.progress}%
                            </td>`
                    );

                    // Menyisipkan elemen <tr> baru ke dalam tabel
                    table.append(newRow);
                });

                // // Mendapatkan elemen tabel
                // var table2 = $("#timeSchedule");

                // table2.find("tr:not(#headerTimeSchedule)").remove();

                // // Melakukan looping untuk setiap item dalam data
                // $.each(data[0], function (index, item) {
                //     // Membuat elemen <tr> baru
                //     var newRow2 = $("<tr>");

                //     // Mengisi elemen <tr> dengan data dari respons
                //     newRow2.html(
                //         `<td>
                //         ${item.name}
                //             </td>
                //             <td>
                //             ${item.progress}%
                //             </td>`
                //     );

                //     // Menyisipkan elemen <tr> baru ke dalam tabel
                //     table2.append(newRow2);
                // });

                myModal.show();
            }
        },
    });

    Swal.close();
});

// Reject
$("#rejectWeeklyProgressBtn").on("click", function () {
    var week = $(this).data("week");
    var taskID = $(this).data("taskid");
    var status = $(this).data("status");
    var reject = $(this).data("reject");

    $("#rejectWeek").val(week);
    $("#rejectTaskID").val(taskID);
    $("#rejectStatus").val(status);
    $("#rejectReject").val(reject);

    var myModal = new bootstrap.Modal("#rejectWeeklyProgressModal");

    myModal.show();

    // Swal.fire({
    //     title: "Apakah anda yakin menolak?",
    //     icon: "warning",
    //     showCancelButton: true,
    //     confirmButtonColor: "#3085d6",
    //     cancelButtonColor: "#d33",
    //     confirmButtonText: "Ya, Tolak",
    //     cancelButtonText: "Batal",
    //     allowOutsideClick: false,
    // }).then((result) => {
    //     if (result.isConfirmed) {
    //         $.ajax({
    //             url: `/agreement/reject/${taskID}/${week}/${status}/${reject}`,
    //             method: "GET",
    //             success: function (response) {
    //                 console.log(response);
    //                 if (response.status == 200) {
    //                     success(response.message);
    //                     setTimeout(function () {
    //                         window.location = "";
    //                     }, 1450);
    //                 }
    //             },
    //         });
    //     }
    // });
});

// agree task report
$("#agreeTaskReport").on("click", function () {
    var taskReportID = $("#taskReportID").val();
    var userID = $("#userID").val();
    var role = $("#role").val();

    Swal.fire({
        title: "Apakah anda yakin menyetujui data tersebut?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Setujui",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/agree-task-report-agreement/${taskReportID}/${userID}/${role}/1`,
                dataType: "JSON",
                method: "PUT",
                success: function (response) {
                    console.log(response);
                    if (response.status == 200) {
                        success(response.message);
                        setTimeout(function () {
                            window.location = "";
                        }, 1450);
                    }
                },
            });
        }
    });
});

// Reject
$("#rejectTaskReport").on("click", function () {
    var myModal = new bootstrap.Modal("#rejectTaskReportModal");

    myModal.show();
});

$("#rejectTaskReportPartner").on("click", function () {
    var myModal = new bootstrap.Modal("#rejectTaskReportPartnerModal");

    myModal.show();
});
