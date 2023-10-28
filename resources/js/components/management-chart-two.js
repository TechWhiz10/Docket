import ApexCharts from "apexcharts";

const managementChartTwo = () => {
    const chartOptions = {
        series: [65, 34, 45],
        chart: {
            type: "donut",
            width: 380,
            height: 335,
        },
        colors: ["#3C50E0", "#6577F3", "#8FD0EF"],
        labels: ["Retail", "Food", "null"],
        legend: {
            show: false,
            position: "bottom",
        },
        plotOptions: {
            pie: {
                donut: {
                    size: "45%",
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

    const chartSelector = document.querySelectorAll("#management-chart-two");

    if (chartSelector.length) {
        const chart = new ApexCharts(
            document.querySelector("#management-chart-two"),
            chartOptions
        );
        chart.render();
    }
};

export default managementChartTwo;
