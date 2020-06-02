import $ from 'jquery';
import Chart from 'chart.js';

export default class HomeChart{
    constructor(){
        if ($('body').data('content') === "homePage"){
            this.initEls();
            this.initEvents();
        }
    }

    initEls(){
        this.$els ={
            countryStatsContainer: $('.js-countryStatsContainer'),
        }
    }

    initEvents(){
        this.getCountriesStat();
    }

    getCountriesStat(){
        const api = {
            endpoint:'https://disease.sh/v2/historical/all',
        };
        $.ajaxSetup({cache:false});
        $.getJSON(api.endpoint)
            .then((response) =>{
                this.historicalChart(response);
            })
            .catch((e) =>{
                console.log('error with the quote :', e);
            });
    }

    historicalChart(data){
        console.log(data.cases);
        let casesObject = data.cases;
        let recoveredObject = data.recovered;
        let deathsObject = data.deaths;

        let casesDate = [];
        let casesNumber = [];
        let comp = 0;
        for (const property in casesObject) {
            console.log(`${property}: ${casesObject[property]}`);
            casesDate[comp] = property;
            casesNumber[comp] = casesObject[property];
            comp++;
        }

        let recoveredNumber = [];
        comp = 0;
        for (const property in recoveredObject) {
            console.log(`${property}: ${recoveredObject[property]}`);
            recoveredNumber[comp] = recoveredObject[property];
            comp++;
        }

        let deathsNumber = [];
        comp = 0;
        for (const property in deathsObject) {
            console.log(`${property}: ${deathsObject[property]}`);
            deathsNumber[comp] = deathsObject[property];
            comp++;
        }

        console.log(casesDate, casesNumber);

        var myChart = new Chart(this.$els.countryStatsContainer, {
            type: 'line',
            data: {
                labels: casesDate,
                datasets: [
                    {
                        label: 'Cases',
                        data: casesNumber,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0)'
                        ],
                        borderColor: [
                            'rgba(108, 92, 231, 1)'
                        ],
                        borderWidth: 3,
                        fill:false,
                    },
                    {
                        label: 'Recovered',
                        data: recoveredNumber,
                        backgroundColor: [
                            'rgba(55, 99, 232, 0)'
                        ],
                        borderColor: [
                            'rgba(81, 232, 156, 1)'
                        ],
                        borderWidth: 3,
                        fill:false,
                    },
                    {
                        label: 'Deaths',
                        data: deathsNumber,
                        backgroundColor: [
                            'rgba(155, 199, 32, 0)'
                        ],
                        borderColor: [
                            'rgba(232, 129, 116, 1)'
                        ],
                        borderWidth: 3,
                        fill:false,
                    },
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
}
