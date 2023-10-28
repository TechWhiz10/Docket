import ApexCharts from "apexcharts";

const serviceDeskChartOne = () => {
    const chartOptions = {
        series: [
            {
                name: "Sales",
                data: [9, 4, 1],
            },
        ],
        colors: ["#3056D3", "#3056D3", "#3056D3"],
        chart: {
            type: "bar",
            height: 335,
            stacked: true,
            toolbar: {
                show: false,
            },
            zoom: {
                enabled: false,
            },
        },
        responsive: [
            {
                breakpoint: 1536,
                options: {
                    plotOptions: {
                        bar: {
                            borderRadius: 0,
                            columnWidth: "25%",
                        },
                    },
                },
            },
        ],
        plotOptions: {
            bar: {
                horizontal: false,
                borderRadius: 0,
                columnWidth: "80%",
                borderRadiusApplication: "end",
                borderRadiusWhenStacked: "last",
            },
        },
        dataLabels: {
            enabled: false,
        },
        xaxis: {
            categories: ["Amir Said", "Robert Smit", "Jennifer Williams"],
        },
        legend: {
            position: "top",
            horizontalAlign: "left",
            fontFamily: "Satoshi",
            fontWeight: 500,
            fontSize: "14px",
            markers: {
                radius: 99,
            },
        },
        fill: {
            opacity: 1,
        },
    };

    const chartSelector = document.querySelectorAll("#service-desk-chart-one");

    if (chartSelector.length) {
        const chart = new ApexCharts(
            document.querySelector("#service-desk-chart-one"),
            chartOptions
        );
        chart.render();
    }
};

export default serviceDeskChartOne;
