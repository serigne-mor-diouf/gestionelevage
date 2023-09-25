<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du mouton</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/assets/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Vos styles CSS existants... */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        /* Styles pour la navbar */
        .navbar {
            background-color: #003366;
            padding: 10px 20px;
            text-align: center;
            display: flex;
            justify-content: space-between; /* Ajuster l'espacement des éléments */
            align-items: center;
            width: 100%;
        }

        .navbar .logo img {
            height: 50px; /* Ajuster la hauteur du logo */
            border-radius: 20px;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 20px;
        }
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
        /* Styles pour le contenu */
        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 230%;
        }

        .card-body {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            width: 30%;
            display: flex;
        }

        .left-section {
            flex: 1;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
            margin-top: 10px;
        }

       /* Style pour les attributs (en gras) */
        .attribute {
            font-weight: bold;
        }

        /* Style pour les valeurs (en bleu) */
        .value {
            color: #007bff; /* Couleur bleue pour les valeurs */
        }


        /* Styles pour la section de droite */
        .right-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            text-align: center;
        }

        .mouton-image-horizontal {
            width: 130%;
            height: auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }

        .btn-acheter {
            background-color: #007bff;
            color: #fff;
            padding: 20px 40px;
            border: none;
            margin-top: 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Styles pour le footer */
        .footer {
            background-color: #003366;
            padding: 20px 0;
            text-align: center;
            color: white;
            width: 100%;
        }

        .social-links a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <img src="{{ asset('MYPHOTO/mouton-ok-acceuil(1).jpg') }}" alt="Logo de votre application">
        </div>
        <div class="nav-links">
            <a href="/">Accueil</a>
            <a href="#">À Propos</a>
            <a href="#">Services</a>
            <a href="/createAchat">payement</a>
            <a href="/mesMoutons">Mes moutons</a>
           
        </div>
        <div class="search-bar" style="background-color: white;">
            <input type="text" placeholder="Rechercher...">
            <button type="submit">Rechercher</button>
        </div>
    </div>

    <!-- Contenu -->
    <div class="content">
        <div class="card-body">
            <div class="left-section">
                <div class="align-center">
                    <h1>Détails du mouton numéro : {{ $mouton->id }}</h1>
                </div>
                <p class="attribute">Numéro du mouton : <span class="value">{{ $mouton->id }}</span></p>
                <p class="attribute">Nom du mouton : <span class="value">{{ $mouton->nom }}</span></p>
                <p class="attribute">NomMere : <span class="value">{{ $mouton->nomMere }}</span></p>
                <p class="attribute">Nom Grand Mere : <span class="value">{{ $mouton->nomgrandMereMaternelle }}</span></p>
                <p class="attribute">Nom Arriere Mere : <span class="value">{{ $mouton->nomArrieregrandMereMaternelle }}</span></p>
                <p class="attribute">Race du Mouton : <span class="value">{{ $mouton->race->nom }}</span></p>
                <p class="attribute">Nom du Proprietaire : <span class="value">{{ $mouton->proprietaire->nom }}</span></p>
                <p class="attribute">Prénom du Proprietaire : <span class="value">{{ $mouton->proprietaire->prenom }}</span></p>
            </div>
            <div class="right-section">
                <img src="{{ asset('MYPHOTO/' . $mouton->photo) }}" alt="Image du mouton" class="mouton-image-horizontal">
                <button class="btn-acheter">
                    <a href="{{ route('login') }}" class="text-white" style="text-decoration: none;">Acheter </a>
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <!-- Liens vers les réseaux sociaux -->
       <div class="social-links">   
       
       <a href="https://www.facebook.com"><i class="fab fa-facebook"></i></a>
            <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
       
        </div>
        <p>&copy; 2023 Votre Application. Tous droits réservés.</p>
    </div>
</body>
</html>
