require('./bootstrap');

/*Components*/
import MenuProfil from './components/menuProfil';
/*Components*/

class App {
    constructor () {
        this.initApp();
    }

    initApp () {
        // Start application
        new MenuProfil();
    }
}
new App();
