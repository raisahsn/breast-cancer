// Mengambil elemen canvas dari HTML
const ctx = document.getElementById("diagnosisChart").getContext("2d");

// Data untuk grafik (tetap sama)
const labels = ["Jan", "Feb", "March", "Apr", "Mei", "Jun", "Jul"];
const chartData = {
    labels: labels,
    datasets: [
        {
            label: "Maligna",
            data: [22, 28, 0, 0, 0, 0, 0], // Data sesuai interpretasi gambar
            backgroundColor: "rgba(255, 99, 132, 0.6)", // Merah dengan transparansi
            borderColor: "rgba(255, 99, 132, 1)",
            borderWidth: 1,
        },
        {
            label: "Beligna",
            data: [3, 0, 0, 0, 0, 0, 0], // Data sesuai interpretasi gambar
            backgroundColor: "rgba(255, 206, 86, 0.6)", // Kuning dengan transparansi
            borderColor: "rgba(255, 206, 86, 1)",
            borderWidth: 1,
        },
    ],
};

// Konfigurasi untuk grafik
const config = {
    type: "bar", // Jenis grafik adalah 'bar' (batang)
    data: chartData,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: "top",
            },
            tooltip: {
                callbacks: {
                    label: function (context) {
                        let label = context.dataset.label || "";
                        if (label) {
                            label += ": ";
                        }
                        if (context.parsed.y !== null) {
                            label += context.parsed.y;
                        }
                        return label;
                    },
                },
            },
        },
        scales: {
            // TIDAK ADA LAGI 'stacked: true' DI SINI
            x: {
                grid: {
                    display: false,
                },
            },
            y: {
                beginAtZero: true,
                max: 60,
                ticks: {
                    stepSize: 10,
                },
            },
        },
    },
};

// Membuat grafik baru dengan elemen canvas, konfigurasi, dan data
const diagnosisChart = new Chart(ctx, config);
