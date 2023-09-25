<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Application</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/assets/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Liens vers les fichiers CSS supplémentaires, les polices, etc. -->
</head>
<body>
    <header>
        <!-- Barre de navigation avec votre logo -->
        <nav>
            <div class="logo">
                <img src="{{ asset('MYPHOTO/mouton-ok-acceuil(1).jpg') }}" alt="Logo de votre application">
            </div>
       
    <ul>
        <li><a href="/">Accueil</a></li>
        <li><a href="#">À Propos</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="/contactProprietaire">Nous Contactez</a></li>
    </ul>
    <div class="search-bar">
        <!-- Barre de recherche ici -->
    </div>


        <!-- Barre de recherche -->
        <div class="search-bar" style="background-color: white;">
            <input type="text" placeholder="Rechercher...">
            <button type="submit">Rechercher</button>
        </div>
        </nav>
    </header>
    
    <main>
   <!-- Image et description de l'application -->
        <section class="app-info">
            <div class="app-description">
              
            <section class="hero">
            <h1>Bienvenue sur Votre Application Kharbi</h1>
            <p>Découvrez nos services exceptionnels.</p>
            <button><a href="/listeclient" class="cta-button" style="background-color: #003366;">Acceder a nos moutons</a></button>
        </section>
            </div>
            <div class="app-image">
                <img src="{{asset('MYPHOTO/mouton-ok-acceuil(1).jpg')}}" alt="Image de l'application">
            </div>   
        </section>
        <!-- Contenu principal de la page -->
            
        <section class="features">
            <!-- Section de fonctionnalités de votre application -->
        </section>
        <br><br>
    </main>

    <footer>
        <!-- Pied de page avec des liens vers les réseaux sociaux -->
        <div class="social-links">   
           <a href="https://www.facebook.com"><i class="fab fa-facebook"></i></a>
            <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
        </div>
        </div>
        <p>&copy; 2023 Votre Application. Tous droits réservés.</p>
    </footer>
  </body>
</html>

<style>
    /* styles.css */

/* Réinitialisation des styles par défaut du navigateur */
body, h1, h2, p {
    margin: 0;
    padding: 0;
}

/* Styles de base pour le corps de la page */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

/* Barre de navigation */
nav {
    background-color: #003366;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
}

nav .logo img {
    max-height: 50px; /* Ajustez la taille de votre logo */
    border-radius: 12px;
}

/* Ajuster la distance entre le bouton Rechercher et les liens du menu */
nav ul {
    list-style: none;
    display: flex;
    margin-right: 30px; /* Ajoute une marge à droite pour séparer les liens du bouton Rechercher */
}

nav ul li {
    margin-right: 20px;
}

nav ul li:last-child {
    margin-right: 6;
}

nav ul li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
}


/* Barre de recherche */
.search-bar {
    margin: 20px 0;
    text-align: center;
}

.search-bar input[type="text"] {
    width: 300px;
    padding: 10px;
    border: none;
    border-radius: 25px;
}

/* Personnaliser la couleur du bouton Rechercher */
.search-bar button {
    background-color: #003366; /* Couleur de fond du bouton */
    color: #fff; /* Couleur du texte du bouton */
    border: none;
    border-radius: 25px;
    padding: 10px 20px;
    cursor: pointer;
}

/* Augmenter la marge entre la barre de recherche et le titre h1 */
.hero {
    text-align: center;
    padding: 100px 0 50px; /* Augmentez la valeur 50px pour augmenter la marge vers le bas */
    background-image: url('/MYPHOTO/mouton-ok-accueil(1).jpg');
    background-size: cover;
    color: #fff;
}

/* Augmenter la marge entre le titre h1 et le paragraphe */
.hero h1 {
    font-size: 36px;
    margin-bottom: 10px; /* Augmentez la valeur pour augmenter la marge */
}

/* Augmenter la marge entre le paragraphe et le bouton "Voir plus" */
.hero p {
    font-size: 18px;
    margin-bottom: 50px; /* Augmentez la valeur pour augmenter la marge */
}

/* ... (autres styles) */


.cta-button {
    background-color: #2bc48a;
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: bold;
}

.cta-button:hover {
    background-color: #259f75;
}

/* Styles pour le pied de page */
footer {
    background-color: #003366;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

.social-links {
    margin-bottom: 20px;
}

.social-links a {
    margin: 0 10px;
    text-decoration: none;
    color: #fff;
    font-size: 24px;
}

/* Styles pour la section d'information sur l'application */
.app-info {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    background-color: #2bc48a; /* Couleur verte pour illustrer la nature */
    color: #fff; /* Couleur du texte en blanc */
}

.app-description {
    text-align: center;
    padding: 20px;
}

.app-description h3 {
    font-size: 24px;
}

.app-description p {
    font-size: 18px;
}

.app-image {
    text-align: center;
}

.app-image img {
    max-width: 100%;
    height: auto;
    border-radius: 10px; /* Ajout d'un arrondi aux coins de l'image */
}


</style>