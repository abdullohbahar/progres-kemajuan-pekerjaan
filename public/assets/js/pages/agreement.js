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
