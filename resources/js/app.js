require('./bootstrap');

/*Components*/
import Admin from "./pages/admin";
import MenuProfil from './components/menuProfil';
import ConnectionPanel from "./components/connectionPanel";
import RegistrationForm from "./components/registrationForm";
import Favoris from "./components/favoris";
import AdvertisementPage from './pages/advertisement.js'
import Annonce from './layout/annonce.js'
import Nav from "./layout/nav";
import Profile from "./pages/profile";
import RegisterForm from "./pages/register";
import Parameters from "./pages/parameters";
import mAdvert from "./pages/mAdvert";
import CreateAdvertisementPage from './pages/create_advertisement.js'
import Payment from './pages/payment.js'
import Mailbox from './pages/mailbox.js'
/*Components*/

class App {
    constructor () {
        this.initApp();
    }

    initApp () {
        // Start application

        //components
        new MenuProfil();
        //new RegistrationForm();
        new Favoris();
        new Profile();
        new RegisterForm();

        //layout
        /*new Nav();*/
        new ConnectionPanel;
        new Annonce();

        //pages
        new AdvertisementPage;
        new Parameters();
        new mAdvert();
        new CreateAdvertisementPage;
        new Payment();
        new Mailbox();

        //admin
        new Admin;
    }
}
new App();
