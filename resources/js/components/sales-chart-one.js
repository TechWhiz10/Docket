import ApexCharts from "apexcharts";

const salesChartOne = () => {
  const chartOptions = {
    series: [
      {
        data: [35000],
      },
    ],
    colors: ["#3C50E0"],
    chart: {
      fontFamily: "Satoshi, sans-serif",
      type: "bar",
      height: 350,
      toolbar: {
        show: false,
      },
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "75%",
        endingShape: "rounded",
        borderRadius: 2,
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      show: true,
      width: 8,
      colors: ["transparent"],
    },
    xaxis: {
      categories: [
        "Oct - 2023",
        "Nov - 2023",
        "Dec - 2023",
        "Jan - 2024",
        "Feb - 2024",
        "Mar - 2024",
        "Apr - 2024",
        "May - 2024",
        "Jun - 2024",
        "Jul - 2024",
        "Aug - 2024",
        "Sep - 2024",
      ],
      axisBorder: {
        show: false,
      },
      axisTicks: {
        show: false,
      },
    },
    legend: {
      show: true,
      position: "top",
      horizontalAlign: "left",
      fontFamily: "inter",

      markers: {
        radius: 99,
      },
    },
    yaxis: {
      title: false,
    },
    grid: {
      yaxis: {
        lines: {
          show: false,
        },
      },
    },
    fill: {
      opacity: 1,
    },

    tooltip: {
      x: {
        show: false,
      },
      y: {
        formatter: function (val) {
          return val;
        },
      },
    },
  };

  const chartSelector = document.querySelectorAll("#sales-chart-one");

  if (chartSelector.length) {
    const chart = new ApexCharts(
      document.querySelector("#sales-chart-one"),
      chartOptions
    );
    chart.render();
  }
};

export default salesChartOne;
