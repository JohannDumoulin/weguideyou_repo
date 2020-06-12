require('./bootstrap');

/*Components*/
import MenuProfil from './components/menuProfil';
import Advert from './components/advert';
import Adverts from './components/advert';
import ConnectionPanel from "./components/connectionPanel";
import RegistrationForm from "./components/registrationForm";
import Favoris from "./components/favoris";
import AdvertisementPage from './pages/advertisement.js'
import Nav from "./layout/nav";
import Profil from "./pages/profil";
import RegisterForm from "./pages/register";
import Parameters from "./pages/parameters";
import mAdvert from "./pages/mAdvert";
import CreateAdvertisementPage from './pages/create_advertisement.js'
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
        //new RegistrationForm();
        new Favoris();
        new Profil();
        new RegisterForm();

        //layout
        /*new Nav();*/
        new ConnectionPanel;

        //pages
        new AdvertisementPage;
        new Parameters();
        new mAdvert();
        new CreateAdvertisementPage;
    }
}
new App();
