var typingTimer;
var doneTypingInterval = 1000; // Waktu penundaan dalam milidetik

$("#mc_unit_price, #mc_volume").on("keyup", function () {
    clearTimeout(typingTimer); // Hapus timer sebelumnya (jika ada)

    typingTimer = setTimeout(function () {
        var id = $("#idDetail").val();
        var kindOfWorkID = $("#kindOfWorkID").val();

        $.ajax({
            url: `/admin/count-percentage/${id}/${kindOfWorkID}`,
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
