<div>
    <section id="chart"
        class="w-full flex flex-wrap gap-12 justify-center items-center bg-white dark:bg-gray-900 text-white">

        <!-- Donut Chart -->
        <div id="column-chart-mahasiswa">
            <div class="grid grid-cols-2 py-3">
                <dl>
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Mahasiswa</dt>
                    <dd class="leading-none text-xl font-bol text-gray-900 dark:text-gray-200">23.635</dd>
                </dl>
            </div>
        </div>
        <div id="donut-chart-dosen"></div>
    </section>

    <script>
        window.addEventListener("load", function() {
            const getChartOptions = () => {
                return {
                    series: [1, 23.5, 2.4, 5.4],
                    colors: ["#1C64F2", "#16BDCA", "#FDBA8C", "#E74694"],
                    chart: {
                        height: 300,
                        width: "100%",
                        type: "donut",
                    },
                    stroke: {
                        colors: ["transparent"],
                        lineCap: "",
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                labels: {
                                    show: true,
                                    name: {
                                        show: true,
                                        fontFamily: "Inter, sans-serif",
                                        offsetY: 20,
                                    },
                                    total: {
                                        showAlways: true,
                                        show: true,
                                        label: "Pengunjung",
                                        fontSize: "10px",
                                        fontFamily: "Inter, sans-serif",
                                        formatter: function() {
                                            return `17021`
                                        },
                                    },
                                    value: {
                                        show: true,
                                        fontFamily: "Inter, sans-serif",
                                        offsetY: -20,
                                        formatter: function(value) {
                                            return value
                                        },
                                    },
                                },
                                size: "80%",
                            },
                        },
                    },
                    grid: {
                        padding: {
                            top: -2,
                        },
                    },
                    labels: ["User Online", "Today Visitor", "Hits hari ini ", "Total Pengunjung"],
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value
                            },
                        },
                    },
                    xaxis: {
                        labels: {
                            formatter: function(value) {
                                return value
                            },
                        },
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                }
            }

            const getChartOptions2 = () => {
                return {
                    series: [23, 33, 5, 10],
                    colors: ["#1C64F2", "#16BDCA", "#FDBA8C", "#E74694"],
                    chart: {
                        height: 300,
                        width: "100%",
                        type: "donut",
                    },
                    stroke: {
                        colors: ["transparent"],
                        lineCap: "",
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                labels: {
                                    show: true,
                                    name: {
                                        show: true,
                                        fontFamily: "Inter, sans-serif",
                                        offsetY: 20,
                                    },
                                    total: {
                                        showAlways: true,
                                        show: true,
                                        label: "Total Dosen",
                                        fontSize: "10px",
                                        fontFamily: "Inter, sans-serif",
                                        formatter: function(w) {
                                            const sum = w.globals.seriesTotals.reduce((a, b) => {
                                                return a + b
                                            }, 0)
                                            return `${sum}`
                                        },
                                    },
                                    value: {
                                        show: true,
                                        fontFamily: "Inter, sans-serif",
                                        offsetY: -20,
                                        formatter: function(value) {
                                            return value
                                        },
                                    },
                                },
                                size: "80%",
                            },
                        },
                    },
                    grid: {
                        padding: {
                            top: -2,
                        },
                    },
                    labels: ["Dosen Teknik Sipil", "Dosen Arsitektur", "Dosen Teknik Komputer",
                        "Dosen Profesi Insinyur"
                    ],
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value
                            },
                        },
                    },
                    xaxis: {
                        labels: {
                            formatter: function(value) {
                                return value
                            },
                        },
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                }
            }


            if (document.getElementById("donut-chart-dosen") && typeof ApexCharts !== 'undefined') {
                const chart2 = new ApexCharts(document.getElementById("donut-chart-dosen"), getChartOptions2());
                chart2.render();
            }

            const options = {
                colors: ["#1A56DB", "#FDBA8C"],
                series: [{
                        name: "Mahasiswa",
                        color: "#1A56DB",
                        data: [{
                                x: "2017",
                                y: 231
                            },
                            {
                                x: "2018",
                                y: 240
                            },
                            {
                                x: "2019",
                                y: 247
                            },
                            {
                                x: "2020",
                                y: 421
                            },
                            {
                                x: "2021",
                                y: 300
                            },
                            {
                                x: "2022",
                                y: 300
                            },
                            {
                                x: "2023",
                                y: 500
                            },
                        ],
                    },

                ],
                chart: {
                    type: "bar",
                    height: "320px",
                    fontFamily: "Inter, sans-serif",
                    toolbar: {
                        show: false,
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "70%",
                        borderRadiusApplication: "end",
                        borderRadius: 8,
                    },
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    style: {
                        fontFamily: "Inter, sans-serif",
                    },
                },
                states: {
                    hover: {
                        filter: {
                            type: "darken",
                            value: 1,
                        },
                    },
                },
                stroke: {
                    show: true,
                    width: 0,
                    colors: ["transparent"],
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -14
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    show: false,
                },
                xaxis: {
                    floating: false,
                    labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        }
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: false,
                },
                fill: {
                    opacity: 1,
                },
            }

            if (document.getElementById("column-chart-mahasiswa") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("column-chart-mahasiswa"), options);
                chart.render();
            }
        });
    </script>
</div>
