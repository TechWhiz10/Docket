import ApexCharts from "apexcharts";

const serviceDeskChartFour = () => {
    const chartOptions = {
        series: [80, 65, 34, 45, 25, 32, 40],
        chart: {
            type: "donut",
            width: 300,
            height: 250,
        },
        colors: ["#3C50E0", "#6577F3", "#8FD0EF", "#A5E8F0", "#B5E7F0", "#AE28F0", "#D5EA32"],
        labels: [
            "",
            "Azure>Applications",
            "Hardware>Laptop",
            "Infrastructure>Data Connection",
            "Standard Applications>MS Office",
            "Standard Applications>Outlook Online",
            "Standard Applications>SharePoint",
        ],
        legend: {
            show: false,
            position: "bottom",
        },
        plotOptions: {
            pie: {
                donut: {
                    size: "55%",
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

    const chartSelector = document.querySelectorAll("#service-desk-chart-four");

    if (chartSelector.length) {
        const chart = new ApexCharts(
            document.querySelector("#service-desk-chart-four"),
            chartOptions
        );
        chart.render();
    }
};

export default serviceDeskChartFour;
