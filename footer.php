    <!-- Footer Section -->
    <footer class="footer" id="footer">
        <script>
            //Page-loader
            if (document.getElementById('footer')) { 
                setTimeout(function(){
                    document.querySelector('body').classList.add('loaded');
                }, 300);
            }

            //Apexchart

            var optionsArea = {
                chart: {
                     type: "area"
                },
                dataLabels: {
                    enabled: false
                },
                series: [
                    {
                    name: "Series 1",
                    data: [50, 30, 60, 25, 45, 35, 40, 18, 25, 22, 28]
                    }
                ],
                stroke: {
                    width: 0
                },
                plotOptions: {
                    bar: {
                        borderRadius: 40,
                        borderRadiusApplication: 'around',
                        borderRadiusWhenStacked: 'last',
                    }
                },
                yaxis: {
                    min: 0,
                },
                colors: ['#0A990A'],
                fill: {
                    type: "gradient",   
                    gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0,  100]
                    }
                },
                xaxis: {
                    categories: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",

                    ]
                },
                responsive: [
                    {
                    breakpoint: 1000,
                    options: {
                        plotOptions: {
                        bar: {
                            horizontal: false
                        }
                        },
                        legend: {
                            position: "bottom"
                        }
                    }
                    }
                ]
            };

            var chart = new ApexCharts(document.querySelector("#chart"), optionsArea);

            chart.render();

            var optionsStatistics = {
                    chart: {
                        type: 'donut'
                    },
                    colors:["#009E73", "#D55E00", ],
                    series: [33, 67],
                    labels: ['Ticket Sold', 'Ticket Remaining',]
                }

                var chartStatistics = new ApexCharts(document.querySelector("#circle-statistics"), optionsStatistics);

                chartStatistics.render();

            var optionsDiversity = {
                    chart: {
                        type: 'donut'
                    },
                    colors:["#009E73", "#D55E00", ],
                    series: [33, 67],
                    labels: ['Cash', 'Phone Pay',]
                }

                var chartPieDiversity = new ApexCharts(document.querySelector("#circle-diversity"), optionsDiversity);

                chartPieDiversity.render();

                // Calender
                let displayMonth = document.querySelector(".displayMonth");
                let previous = document.querySelector(".left");
                let next = document.querySelector(".right");
                let days = document.querySelector(".days");
                let selected = document.querySelector(".selected");
                let date = new Date();
                let year = date.getFullYear(); 
                let month = date.getMonth(); 
                const options = {year:"numeric",month:'long'};

                previous.onclick = previousDate;
                next.onclick = nextDate;

                displayCalendar();

                function previousDate() {
                    days.innerHTML = "";
                    selected.innerHTML = "";
                    month < 0 ? month = 11 : year--;
                    month--;
                    date.setMonth(month);
                    displayCalendar();
                }
                function nextDate() {
                    days.innerHTML = "";
                    selected.innerHTML = "";
                    month > 11 ? month = 0 : year++;
                    month++;
                    date.setMonth(month);
                    displayCalendar();
                }

                function displayCalendar() {
                    const firstDay = new Date(year,month,1);
                    const lastDay = new Date(year,month+1,0);
                    const firstDayofMonth = firstDay.getDay();
                    const lastDateofLastMonth = new Date(year, month, 0).getDate();
                    const firstDayIndex = firstDay.getDay();
                    const numberOfDays = lastDay.getDate(); // 31
                    let nextDays = new Date(year, month, numberOfDays).getDay();
                    let formatDate = date.toLocaleString("en-US",options);
                    displayMonth.innerHTML = `${formatDate}`;


                    for (let y = firstDayofMonth; y > 0; y--) {
                        const div = document.createElement("div");
                        div.textContent += lastDateofLastMonth - y + 1;
                        div.className = "inactive";
                        days.appendChild(div);
                    }

                    
                    for(let i=1;i<= numberOfDays;i++) {
                        let div = document.createElement("div");
                        let currentDate = new Date(year,month,i);
                        div.dataset.date = currentDate.toDateString();
                        div.innerHTML += i;
                        days.appendChild(div);
                        if(currentDate.getFullYear() === new Date().getFullYear() && currentDate.getMonth() === new Date().getMonth() && currentDate.getDate() === new Date().getDate()
                        ) {
                        div.classList.add("current-date");
                        }
                    }
                    for (let i = nextDays; i < 6; i++) {
                        const div = document.createElement("div");
                        div.textContent += i - nextDays + 1;
                        div.className = "inactive";
                        days.appendChild(div);
                    }
                    function selectedDate(e) {
                        let t = e.target;
                        const selectedDate = t.dataset.date;
                        selected.innerHTML = `Selected Date : ${selectedDate}`;
                    }

                }

                
        </script>
    </footer>
    </div>
    <?php wp_footer(); ?>
</body>
</html>
