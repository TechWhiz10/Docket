import './bootstrap';

import managementChartOne from "./components/management-chart-one";
import managementChartTwo from "./components/management-chart-two";
import managementChartThree from "./components/management-chart-three";

import salesChartOne from './components/sales-chart-one';
import salesChartTwo from './components/sales-chart-two';

import serviceDeskChartOne from './components/service-desk-chart-one';
import serviceDeskChartTwo from './components/service-desk-chart-two';
import serviceDeskChartThree from './components/service-desk-chart-three';
import serviceDeskChartFour from './components/service-desk-chart-four';
import serviceDeskChartFive from './components/service-desk-chart-five';
import serviceDeskChartSix from './components/service-desk-chart-six';

document.addEventListener("DOMContentLoaded", () => {
    managementChartOne();
    managementChartTwo();
    managementChartThree();

    salesChartOne();
    salesChartTwo();

    serviceDeskChartOne();
    serviceDeskChartTwo();
    serviceDeskChartThree();
    serviceDeskChartFour();
    serviceDeskChartFive();
    serviceDeskChartSix();
});
