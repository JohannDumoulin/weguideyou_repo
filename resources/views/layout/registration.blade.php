<section class="registration">
    <div class="wrap">
        <div>
            <div>
                <span>Bienvenue</span>
            </div>
            <div>
                <div class="registrationNav">
                    <span>connexion</span>
                    <span class="is-selected">inscription</span>
                </div>
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="main-carousel">
                        <div class="carousel-cell registration-step1">
                            <div class="registration-request">
                                <span>Quel type de compte souhaitez vous créer ?</span>
                            </div>
                            <div class="registration-answer">
                                <div>
                                    <p>Professionnel indépendant</p>
                                    <i class="fas fa-chevron-right fa-xs"></i>
                                </div>
                                <div>
                                    <div>
                                        <p>Agence</p>
                                        <span class="registration-detail">(Immobilière, hôtellerie...)</span>
                                    </div>
                                    <i class="fas fa-chevron-right fa-xs"></i>
                                </div>
                                <div>
                                    <p>Club</p>
                                    <i class="fas fa-chevron-right fa-xs"></i>
                                </div>
                                <div>
                                    <p>Particulier</p>
                                    <i class="fas fa-chevron-right fa-xs"></i>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-cell registration-step2">
                            <div class="registration-request">
                                <span>Comment devons nous vous appeller ?</span>
                            </div>
                            <div class="registration-answer">
                                <div>
                                    <input name="name" placeholder="Nom" type="text" required="">
                                </div>
                                <div>
                                    <input name="firstName" placeholder="Prénom" type="text" required="">
                                </div>
                                <div>
                                    <input name="age" placeholder="Age" type="date" required="">
                                </div>
                                <div>
                                    <select name="sex" required="">
                                        <option value="incomplete">Sexe</option>
                                        <option value="femme">Femme</option>
                                        <option value="homme">Homme</option>
                                        <option value="autre">Autre</option>
                                    </select>
                                </div>
                                <a class="buttonLink" href="#"><span>Continuer</span></a>
                            </div>
                        </div>
                        <div class="carousel-cell registration-step3 is-selected">
                            <div class="registration-request">
                                <span>Dernière étape, vous y êtes presque !</span>
                            </div>
                            <div class="registration-answer">
                                <div>
                                    <input name="mail" placeholder="Adresse mail" type="text" required="">
                                </div>
                                <div>
                                    <input name="password" placeholder="Mot de passe" type="password" required="">
                                    <i class="far fa-eye"></i>
                                    <i class="far fa-eye-slash"></i>
                                </div>
                                <div>
                                    <input name="passwordConfirmation" placeholder="Confirmer votre mot de passe" type="password" required="">
                                    <i class="far fa-eye"></i>
                                    <i class="far fa-eye-slash"></i>
                                </div>
                                <div>
                                    <input type="checkbox" id="CGU" name="CGU" required="">
                                    <label for="CGU">J’accepte les <a href="#">Conditions Générales d'Utilisation</a>.</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="newsLetter" name="newsLetter">
                                    <label for="newsLetter">Je souhaite recevoir les dernières nouvelles de la part de We Guide You.</label>
                                </div>
                                <button class="buttonLink">S'inscrire</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <svg id="close-registration" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512px" height="512px"><g><g> <g> <g> <path d="M256,0C114.844,0,0,114.844,0,256s114.844,256,256,256s256-114.844,256-256S397.156,0,256,0z M256,490.667 C126.604,490.667,21.333,385.396,21.333,256S126.604,21.333,256,21.333S490.667,126.604,490.667,256S385.396,490.667,256,490.667 z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/> <path d="M359.542,152.458c-4.167-4.167-10.917-4.167-15.083,0L256,240.917l-88.458-88.458c-4.167-4.167-10.917-4.167-15.083,0 c-4.167,4.167-4.167,10.917,0,15.083L240.917,256l-88.458,88.458c-4.167,4.167-4.167,10.917,0,15.083 c2.083,2.083,4.813,3.125,7.542,3.125s5.458-1.042,7.542-3.125L256,271.083l88.458,88.458c2.083,2.083,4.813,3.125,7.542,3.125 c2.729,0,5.458-1.042,7.542-3.125c4.167-4.167,4.167-10.917,0-15.083L271.083,256l88.458-88.458 C363.708,163.375,363.708,156.625,359.542,152.458z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/> </g> </g> </g></g> </svg><g><g><g><path d="M256,0C114.844,0,0,114.844,0,256s114.844,256,256,256s256-114.844,256-256S397.156,0,256,0z M256,490.667C126.604,490.667,21.333,385.396,21.333,256S126.604,21.333,256,21.333S490.667,126.604,490.667,256S385.396,490.667,256,490.667z"/><path d="M359.542,152.458c-4.167-4.167-10.917-4.167-15.083,0L256,240.917l-88.458-88.458c-4.167-4.167-10.917-4.167-15.083,0c-4.167,4.167-4.167,10.917,0,15.083L240.917,256l-88.458,88.458c-4.167,4.167-4.167,10.917,0,15.083c2.083,2.083,4.813,3.125,7.542,3.125s5.458-1.042,7.542-3.125L256,271.083l88.458,88.458c2.083,2.083,4.813,3.125,7.542,3.125c2.729,0,5.458-1.042,7.542-3.125c4.167-4.167,4.167-10.917,0-15.083L271.083,256l88.458-88.458C363.708,163.375,363.708,156.625,359.542,152.458z"/></g></g></g></svg>
    </div>
</section>
