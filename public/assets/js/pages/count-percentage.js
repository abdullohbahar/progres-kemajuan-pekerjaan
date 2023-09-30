var typingTimer;
var doneTypingInterval = 500; // Waktu penundaan dalam milidetik

$("#mc_unit_price, #mc_volume").on("keyup", function () {
    clearTimeout(typingTimer); // Hapus timer sebelumnya (jika ada)

    typingTimer = setTimeout(function () {
        var id = $("#idDetail").val();

        $.ajax({
            url: `/count-percentage/${id}`,
            method: "GET",
            success: function (response) {
                var mcTotalPriceClean = parseFloat(
                    $("#total_mc_price").val().replace(/[^\d]/g, "")
                );

                var allMcPrice =
                    parseFloat(mcTotalPriceClean) +
                    parseFloat(response.allMcPrice);

                console.log(allMcPrice);

                // hitung persen
                if (!isNaN(mcTotalPriceClean)) {
                    var percentage = (mcTotalPriceClean / allMcPrice) * 100;

                    // Tampilkan hasil perhitungan di dalam input workValue
                    $("#workValue").val(percentage.toFixed(2) + "%");
                }
            },
        });
    }, doneTypingInterval);
});

// menghitung total progress sebelum minggu ini
$("#myForm").on("submit", function (e) {
    e.preventDefault();

    var id = $("#idDetail").val();

    $.ajax({
        url: `/count-total-progress-before-this-week/${id}`,
        method: "GET",
        success: function (response) {
            if (response.status == 200) {
                console.log(response);
                // jika respon data != 0 maka lakukan validasi
                if (response.data != 0) {
                    var cleanWorkValue = parseFloat(
                        $("#workValue").val().replace("%", "")
                    );

                    if (cleanWorkValue > response.data) {
                        alert(
                            `Nilai Pekerjaan Tidak Boleh Melebihi Total Progress Yang Ada. Total Progress: ${response.data}%`
                        );
                    } else {
                        $("#myForm")[0].submit();
                    }
                } else {
                    $("#myForm")[0].submit();
                }
            }
        },
    });
});
