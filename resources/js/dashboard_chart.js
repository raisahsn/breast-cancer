document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("patientVisitsChart").getContext("2d");

    // Menggunakan tanggal saat ini (Sabtu, 28 Juni 2025)
    // Data dummy untuk jumlah pasien per bulan di tahun 2025 (Januari - Juni)
    const patientData = [50, 55, 62, 70, 65, 80];
    const monthLabels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun"];

    // Hitung total pasien untuk ditampilkan di footer
    const totalPatients = patientData.reduce((sum, value) => sum + value, 0);
    document.getElementById("totalPatients").textContent = totalPatients;

    // Data untuk 'Expected Range' (misalnya +/- 15 dari data aktual)
    const minRangeData = patientData.map((val) => Math.max(0, val - 15)); // Pastikan tidak di bawah 0
    const maxRangeData = patientData.map((val) => val + 15);

    const patientVisitsChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: monthLabels,
            datasets: [
                {
                    label: "Range Min",
                    data: minRangeData,
                    borderColor: "rgba(127, 82, 255, 0.2)",
                    borderWidth: 2,
                    borderDash: [5, 5],
                    fill: false,
                    pointRadius: 0,
                    tension: 0.4,
                },
                {
                    label: "Actual Visits",
                    data: patientData,
                    borderColor: "#7f52ff",
                    backgroundColor: "rgba(127, 82, 255, 0.1)",
                    borderWidth: 3,
                    pointBackgroundColor: "#7f52ff",
                    pointBorderColor: "#fff",
                    pointBorderWidth: 3,
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    fill: {
                        target: "origin",
                        above: "rgba(127, 82, 255, 0.15)", // Warna area range
                    },
                    tension: 0.4,
                },
                {
                    label: "Range Max",
                    data: maxRangeData,
                    borderColor: "rgba(127, 82, 255, 0.2)",
                    borderWidth: 2,
                    borderDash: [5, 5],
                    fill: "-1", // Mengisi area antara dataset ini dan dataset sebelumnya (Actual Visits)
                    backgroundColor: "rgba(127, 82, 255, 0.15)",
                    pointRadius: 0,
                    tension: 0.4,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false, // Sembunyikan legend default karena kita buat custom di footer
                },
                tooltip: {
                    enabled: false, // Nonaktifkan tooltip default
                    position: "nearest",
                    external: function (context) {
                        // Tooltip kustom
                        let tooltipEl =
                            document.getElementById("chartjs-tooltip");
                        if (!tooltipEl) {
                            tooltipEl = document.createElement("div");
                            tooltipEl.id = "chartjs-tooltip";
                            tooltipEl.className = "chartjs-tooltip";
                            document.body.appendChild(tooltipEl);
                        }
                        const tooltipModel = context.tooltip;
                        if (tooltipModel.opacity === 0) {
                            tooltipEl.style.opacity = "0";
                            return;
                        }
                        if (tooltipModel.body) {
                            const dataPoint = tooltipModel.dataPoints[0];
                            const month = dataPoint.label;
                            const patientCount = dataPoint.raw;
                            const header = `<div class="chartjs-tooltip-header">${month} 2025</div>`;
                            const body = `<div class="chartjs-tooltip-body">${patientCount} Patients</div>`;
                            tooltipEl.innerHTML = header + body;
                        }
                        const position =
                            context.chart.canvas.getBoundingClientRect();
                        tooltipEl.style.opacity = "1";
                        tooltipEl.style.left =
                            position.left + tooltipModel.caretX + "px";
                        tooltipEl.style.top =
                            position.top + tooltipModel.caretY + "px";
                    },
                },
            },
            scales: {
                x: {
                    grid: {
                        display: false,
                    },
                    ticks: {
                        color: "#6c757d",
                        font: { size: 14 },
                    },
                    border: {
                        display: false,
                    },
                },
                y: {
                    beginAtZero: true, // Jumlah pasien harus dimulai dari 0
                    ticks: {
                        color: "#6c757d",
                        font: { size: 14 },
                        stepSize: 20, // Atur interval angka di sumbu Y
                    },
                    grid: {
                        color: "rgba(0, 0, 0, 0.05)",
                        drawBorder: false,
                    },
                    border: {
                        display: false,
                    },
                },
            },
        },
    });
});
