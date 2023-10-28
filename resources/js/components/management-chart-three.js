import ApexCharts from "apexcharts";

const managementChartThree = () => {
    const chartOptions = {
        series: [
            {
                name: "Sales",
                data: [4444, 5555, 4141, 6767, 2222],
            },
        ],
        colors: ["#3056D3", "#80CAEE"],
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
                columnWidth: "60%",
                borderRadiusApplication: "end",
                borderRadiusWhenStacked: "last",
            },
        },
        dataLabels: {
            enabled: false,
        },
        xaxis: {
            categories: ["Laptop", "Monitor", "Wireless Keyboard", "Wireless Mouse", "Ethernet Cable (5m)"],
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

    const chartSelector = document.querySelectorAll("#management-chart-three");

    if (chartSelector.length) {
        const chart = new ApexCharts(
            document.querySelector("#management-chart-three"),
            chartOptions
        );
        chart.render();
    }
};

export default managementChartThree;
