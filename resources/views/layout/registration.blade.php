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
                <form action="" type="POST" class="main-carousel">
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
                            <a class="buttonLink" href="#"><span>S'inscrire</span></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
