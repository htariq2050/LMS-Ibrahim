@extends('admin.layouts.app')
@section('title')
Student
@endsection
@section('homecontent')
<main>
    <section class="hp-banner">

        <div class="video-container">
            <!-- <video class="local-video" loop="true" autoplay="autoplay" muted>
                <source src="./assets/videos/banner-video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video> -->
            <img class="local-video" src="../assets/images/banner.gif" />
        </div>
        <!-- Text Section -->
        <h1 class="LilitaOne">APPRENDS À LIRE L’ARABE EN 2 SEMAINES!</h1>
        <a href="#" class="discover-button">DÉCOUVRIR</a>

    </section>
    <section class="hp-card-section">

        <h2 class="section-title LilitaOne">LE FONCTIONNEMENT</h2>
        <div class="card-container">
            <!-- Card 1 -->
            <div class="card card-yellow">
                <div class="card-header">
                    <div class="card-number">1</div>
                    <h3 class="LilitaOne">CONNECTES TOI</h3>
                </div>
                <p class="card-text">Tu accèderas à un espace personnel et tu pourras suivre tes cours facilement, à
                    l'aide de vidéos, nos textes explicatifs et nos quiz amusants.</p>
                <div class="card-image">
                    <img src="https://via.placeholder.com/300x200" alt="Card 1 Image">
                </div>
            </div>
            <!-- Card 2 -->
            <div class="card card-purple">
                <div class="card-header">
                    <div class="card-number">2</div>
                    <h3 class="LilitaOne">EXERCES TOI AVEC NOS QUIZ</h3>
                </div>
                <p class="card-text">Les études montrent que l'apprentissage par quiz améliore la rétention des
                    informations de 60%.</p>
                <div class="card-image">
                    <img src="https://via.placeholder.com/300x200" alt="Card 2 Image">
                </div>
            </div>
            <!-- Card 3 -->
            <div class="card card-yellow">
                <div class="card-header">
                    <div class="card-number">3</div>
                    <h3 class="LilitaOne">UN ENSEIGNEMENT DE QUALITÉ ET DES SUPPORTS DE COURS RECONNUS</h3>
                </div>
                <p class="card-text">Cours de qualité, des supports de cours certifiés et accessibles pour mieux
                    apprendre.</p>
                <div class="card-image">
                    <img src="https://via.placeholder.com/300x200" alt="Card 3 Image">
                </div>
            </div>
        </div>

        <br />
        <br />

        <h2 class="section-title LilitaOne">Nos Programmes</h2>
        <div class="programs-container">
            <!-- Beginner Program -->
            <div class="program-card beginner">
                <div class="title-container">
                    <h2 class="bordered-text">Niveau Débutant</h2>
                </div>
                <h6 class="description Bouncy">
                    Si tu démarres de zéro alors ceTTE FORMULE est faitE pour toi!
                </h6>
                <ul>
                    <li>VIDÉOS EXPLICATIVES SUR LA 1ÈRE PARTIE DE LA MOUQADDIMAT DES TOMES DE MÉDINE.</li>
                    <li>ÉCHANGES AVEC NOTRE ÉQUIPE PÉDAGOGIQUE 6JRS/7.</li>
                    <li>NOMBREUX QUIZ INTERACTIFS POUR APPRENDRE TOUT EN S’AMUSANT.</li>
                    <li>CAHIER D’EXERCICES INCLUS POUR S’ENTRAINER À ÉCRIRE.</li>
                    <li>TADJWID: INTRODUCTION AU MAKHARIDJAL HOUROUF.</li>
                </ul>
                <div class="price-buble PermanentMarker">
                    <h1 class="price">29€<span>/mois</span></h1>
                    <small>sans engagement</small>
                </div>
                <a href="#" class="subscribe-btn">Je m'inscris</a>
            </div>

            <!-- Intermediate Program -->
            <div class="program-card intermediate">
                <div class="title-container">
                    <h2 class="bordered-text">Niveau Intermédiaire</h2>
                </div>
                <h6 class="description Bouncy">
                    Si tu sais lire mais prononce mal les lettres arabes, et souhaites t’initier à la grammaire, au
                    Tajwid, et avoir du vocabulaire, alors ceTTE FORMULE est faitE pour toi!
                </h6>
                <ul>
                    <li>VIDÉOS EXPLICATIVES SUR LA 1ÈRE PARTIE DE LA MOUQADDIMAT DES TOMES DE MÉDINE.</li>
                    <li>ÉCHANGES AVEC NOTRE ÉQUIPE PÉDAGOGIQUE 6JRS/7.</li>
                    <li>NOMBREUX QUIZ INTERACTIFS POUR APPRENDRE TOUT EN S’AMUSANT.</li>
                    <li>CAHIER D’EXERCICES INCLUS POUR S’ENTRAINER À ÉCRIRE.</li>
                    <li>TADJWID: INTRODUCTION AU MAKHARIDJAL HOUROUF.</li>
                    <li>INITIATION À LA GRAMMAIRE, À LA CONJUGAISON ET AU VOCABULAIRE.</li>
                </ul>
                <div class="price-buble PermanentMarker">
                    <h1 class="price">39€<span>/mois</span></h1>
                    <small>sans engagement</small>
                </div>
                <a href="#" class="subscribe-btn">Je m'inscris</a>
            </div>

            <!-- Advanced Program -->
            <div class="program-card advanced">
                <div class="title-container">
                    <h2 class="bordered-text">Niveau Confirmé</h2>
                </div>
                <h6 class="description Bouncy">
                    TU SOUHAITEs TE PERFECTIONNER EN TADJWID, EN GRAMMAIRE, et en vocabulaire,
                    alors cette formule est faite pour toi!
                </h6>
                <ul>
                    <li>VIDÉOS EXPLICATIVES SUR LA 1ÈRE PARTIE DE LA MOUQADDIMAT DES TOMES DE MÉDINE.</li>
                    <li>ÉCHANGES AVEC NOTRE ÉQUIPE PÉDAGOGIQUE 6JRS/7.</li>
                    <li>NOMBREUX QUIZ INTERACTIFS POUR APPRENDRE TOUT EN S’AMUSANT.</li>
                    <li>CAHIER D’EXERCICES INCLUS POUR S’ENTRAINER À ÉCRIRE.</li>
                    <li>TADJWID: INTRODUCTION AU MAKHARIDJAL HOUROUF.</li>
                    <li>PERFECTIONNEMENT EN GRAMMAIRE, EN CONJUGAISON ET EN VOCABULAIRE.</li>
                </ul>
                <div class="price-buble PermanentMarker">
                    <h1 class="price">49€<span>/mois</span></h1>
                    <small>sans engagement</small>
                </div>
                <a href="#" class="subscribe-btn">Je m'inscris</a>
            </div>
        </div>

        <h2 class="section-title LilitaOne">FAQ</h2>

        <div class="faq-section">

            <div class="faq-item">
                <div class="question"><span class="question-bullet"></span>Je sais déjà lire l'arabe quel programme
                    choisir ?</div>
                <div class="icon"><i class="fas fa-plus"></i></div>
            </div>
            <div class="faq-answer">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis neque in magna sodales venenatis.
            </div>
            <div class="faq-item">
                <div class="question"><span class="question-bullet"></span>Par où commencer en langue arabe ?</div>
                <div class="icon"><i class="fas fa-plus"></i></div>
            </div>
            <div class="faq-answer">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis neque in magna sodales venenatis.
            </div>
            <div class="faq-item">
                <div class="question"><span class="question-bullet"></span>En combien de temps je pourrai lire l'arabe ?
                </div>
                <div class="icon"><i class="fas fa-plus"></i></div>
            </div>
            <div class="faq-answer">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis neque in magna sodales venenatis.
            </div>
            <div class="faq-item">
                <div class="question"><span class="question-bullet"></span>Apprendre en e-learning est ce difficile ?
                </div>
                <div class="icon"><i class="fas fa-plus"></i></div>
            </div>
            <div class="faq-answer">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis neque in magna sodales venenatis.
            </div>
            <div class="faq-item">
                <div class="question"><span class="question-bullet"></span>Pourquoi apprendre l'arabe littéraire ?</div>
                <div class="icon"><i class="fas fa-plus"></i></div>
            </div>
            <div class="faq-answer">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis neque in magna sodales venenatis.
            </div>

            <a href="#" class="faq-button">Voir Plus</a>
        </div>
    </section>
    <section class="info-section">
        <div class="info-container">
            <p class="title">
                <q>Une méthode d’apprentissage qui allie enfin la <span class="highlight">SIMPLICITÉ</span>,
                    la <span class="highlight">QUALITÉ</span> et la <span class="highlight">RAPIDITÉ</span>.</q>
            </p>
            <div class="stats">
                <div class="stat">
                    <div class="number">10.000.000</div>
                    <div class="description">de musulman(e)s en France</div>
                </div>
                <div class="stat">
                    <div class="number">60%</div>
                    <div class="description">ne savent pas lire l’arabe</div>
                </div>
                <div class="stat">
                    <div class="number">100%</div>
                    <div class="description">de réussite avec cette méthode</div>
                </div>
                <div class="stat">
                    <div class="number">400</div>
                    <div class="description">vidéos et quiz pour mieux illustrer</div>
                </div>
                <div class="stat full-width">
                    <div class="number">6JR/7</div>
                    <div class="description">disponible pour vos questions</div>
                </div>
            </div>
            <br/>
            <br/>
            <p class="title">
                <q>
                    Si moi qui ne connaissais <span class="highlight2">RIEN</span> j’ai pu 
                    <span class="highlight2">RÉUSSIR</span> alors pourquoi pas TOI?
                </q>
            </p>
        </div>
    </section>
    <section class="info-footer">
        <div class="container">
            <img src="../assets/images/banner.gif"/>
            <h3>Florian fondateur du site lirelarabefacile.fr</h3>
            <button>JE M’INSCRIS</button>
        </div>
    </section>

    <script>
        const faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(item => {
            item.addEventListener('click', () => {
                const answer = item.nextElementSibling;

                // Toggle Active Class
                item.classList.toggle('active');
                answer.classList.toggle('active');

                // Close other active FAQ items
                faqItems.forEach(otherItem => {
                    if (otherItem !== item && otherItem.classList.contains('active')) {
                        otherItem.classList.remove('active');
                        otherItem.nextElementSibling.classList.remove('active');
                    }
                });
            });
        });
    </script>
</main>
@endsection