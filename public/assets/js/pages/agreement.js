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
    });
});

$("#sendWeeklyProgressBtn").on("click", function () {
    var week = $(this).data("week");
    var taskID = $(this).data("taskid");

    var myModal = new bootstrap.Modal("#modalSendWeeklyProgress");

    Swal.showLoading();

    $.ajax({
        url: "/get-task-this-week/" + taskID + "/" + week,
        method: "GET",
        success: function (response) {
            if (response.status == 200) {
                // Mengambil data dari respons
                var data = response.data.reverse();

                // Mendapatkan elemen tabel
                var table = $("#tableWeeklyProgress");

                table.find("tr:not(#headerRow)").remove();

                // Melakukan looping untuk setiap item dalam data
                $.each(data, function (index, item) {
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

                myModal.show();
            }
        },
    });

    Swal.close();
});
