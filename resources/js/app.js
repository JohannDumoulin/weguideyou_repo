require('./bootstrap');

/*Components*/
import MenuProfil from './components/menuProfil';
import Advert from './components/advert';
import Adverts from './components/advert';
import RegistrationForm from "./components/registrationForm";
import Favoris from "./components/favoris";
import AdvertisementPage from './pages/advertisement.js'
import Nav from "./layout/nav";
import Profil from "./pages/profil";
/*Components*/

class App {
    constructor () {
        this.initApp();
    }

    initApp () {
        // Start application

        //components
        new MenuProfil();
        new Advert();
        new Adverts();
        new RegistrationForm();
        new Favoris();
        new Profil;

        //layout
        /*new Nav();*/

        //pages
        new AdvertisementPage;
    }
}
new App();
