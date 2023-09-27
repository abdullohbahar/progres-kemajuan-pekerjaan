var typingTimer;
var doneTypingInterval = 1000; // Waktu penundaan dalam milidetik

$("#mc_unit_price, #mc_volume").on("keyup", function () {
    clearTimeout(typingTimer); // Hapus timer sebelumnya (jika ada)

    typingTimer = setTimeout(function () {
        var id = $("#idDetail").val();

        console.log(id);

        $.ajax({
            url: `/count-percentage/${id}`,
            method: "GET",
            success: function (response) {
                console.log(response);
                var mcTotalPriceClean = parseFloat(
                    $("#total_mc_price").val().replace(/[^\d]/g, "")
                );

                var allMcPrice =
                    parseFloat(mcTotalPriceClean) +
                    parseFloat(response.allMcPrice);

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
