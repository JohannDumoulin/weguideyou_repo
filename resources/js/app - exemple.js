require('./bootstrap');

/*Components*/
import HomeChart from './components/homeChart';
import CountryChart from './components/countryChart';

import CountryChart from './components/annonce';
/*Components*/

class App {
    constructor () {
        this.initApp();
    }

    initApp () {
        // Start application
        new HomeChart();
        new CountryChart();
        new annonce();
    }
}

new App();
