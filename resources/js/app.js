require('./bootstrap');

/*Components*/
import MenuProfil from './components/menuProfil';
import Annonce from './components/annonce';
import RegistrationForm from "./components/registrationForm";
/*Components*/

class App {
    constructor () {
        this.initApp();
    }

    initApp () {
        // Start application
        new MenuProfil();
        new Annonce();
        new RegistrationForm()
    }
}
new App();
