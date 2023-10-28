import ApexCharts from "apexcharts";

const serviceDeskChartFive = () => {
    const chartOptions = {
        series: [80, 65, 34, 45],
        chart: {
            type: "donut",
            width: 300,
            height: 250,
        },
        colors: ["#3C50E0", "#6577F3", "#8FD0EF", "#A5E8F0"],
        labels: [
            "Critical",
            "High",
            "Low",
            "Medium",
        ],
        legend: {
            show: false,
            position: "bottom",
        },
        plotOptions: {
            pie: {
                donut: {
                    size: "0%",
                    background: "transparent",
                },
            },
        },
        dataLabels: {
            enabled: false,
        },
        responsive: [
            {
                breakpoint: 640,
                options: {
                    chart: {
                        width: 200,
                    },
                },
            },
        ],
    };

    const chartSelector = document.querySelectorAll("#service-desk-chart-five");

    if (chartSelector.length) {
        const chart = new ApexCharts(
            document.querySelector("#service-desk-chart-five"),
            chartOptions
        );
        chart.render();
    }
};

export default serviceDeskChartFive;
