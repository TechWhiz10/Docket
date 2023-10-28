import ApexCharts from "apexcharts";

const salesChartTwo = () => {
    const chartOptions = {
        series: [100],
        chart: {
            type: "donut",
            width: 380,
            height: 380,
        },
        colors: ["#3C50E0"],
        labels: ["Existing Customer"],
        legend: {
            show: false,
            position: "top",
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
                        width: 500,
                    },
                },
            },
        ],
    };

    const chartSelector = document.querySelectorAll("#sales-chart-two");

    if (chartSelector.length) {
        const chart = new ApexCharts(
            document.querySelector("#sales-chart-two"),
            chartOptions
        );
        chart.render();
    }
};

export default salesChartTwo;
