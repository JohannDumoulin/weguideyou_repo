require('./bootstrap');

/*Components*/
import MenuProfil from './components/menuProfil';
import Annonce from './components/annonce';
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
        new Annonce();
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
