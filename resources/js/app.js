require('./bootstrap');

/*Components*/
import MenuProfil from './components/menuProfil';
import Annonce from './components/annonce';
import RegistrationForm from "./components/registrationForm";
import Favoris from "./components/favoris";
/*Components*/

class App {
    constructor () {
        this.initApp();
    }

    initApp () {
        // Start application
        new MenuProfil();
        new Annonce();
        new RegistrationForm();
        new Favoris();
    }
}
new App();
