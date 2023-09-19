<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/assets/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;500&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        /* body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            position: relative;
        } */
        .container {
            width: 80%; /* Largeur du conteneur */
            margin: 0 auto; /* Centre le conteneur horizontalement */
        }
        .mt-5 {
            margin-top: 1.25rem; /* Espace au-dessus du contenu */
        }
        .btn {
            padding: 0.25rem 1rem;
            border: none;
            cursor: pointer;
        }
        .btn-danger {
            background-color: #ff5050;
            color: #fff;
        }
        .btn-danger:hover {
            background-color: #ff0000;
        }
        .btn-success {
            background-color: #2bc48a;
            color: #fff;
        }
        .btn-success:hover {
            background-color: #259f75;
        }
        .btn-info {
            background-color: #5bc0de;
            color: #fff;
        }
        .btn-info:hover {
            background-color: #31b0d5;
        }
        .btn-warning {
            background-color: #f0ad4e;
            color: #fff;
        }
        .btn-warning:hover {
            background-color: #ec971f;
        }

        .sidebar {
            width: 100%; /* Ajustez la largeur à votre convenance */
            float: right; /* Assurez-vous que la barre latérale reste à gauche */
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
        /* Styles pour le formulaire de recherche */
        .search-form {
            margin-bottom: 1rem; /* Espace en dessous du formulaire */
            display: flex; /* Affiche les éléments en ligne */
            align-items: center; /* Centre verticalement les éléments */
            width: 90%;
            border-radius: 12px;
        }
        .search-input {
            flex: 1; /* La barre de recherche s'étend sur toute la largeur disponible */
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
        }
        .search-icon {
            padding: 0.5rem 1rem;
            background-color: #2bc48a;
            color: #fff;
            border: none;
            border-radius: 0 0.25rem 0.25rem 0;
            cursor: pointer;
        }
        .search-icon:hover {
            background-color: #259f75;
        }
        /* Styles pour le tableau */
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem; /* Espace au-dessus du tableau */
        }
        .styled-table th,
        .styled-table td {
            padding: 0.5rem 1rem; /* Espace dans les cellules */
            text-align: center;
            border: 1px solid #ccc;
        }
        .styled-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .styled-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        /* Styles pour les actions dans le tableau */
        .button-container {
            display: flex;
            justify-content: space-between; /* Espace équitablement les boutons */
        }
        .button-container button {
            margin-bottom: 0.5rem; /* Espace en dessous des boutons */
        }
        /* Styles pour l'image "Aucun élément trouvé" */
        .empty {
            width: 100px;
            height: 80px;
            margin: 2rem auto; /* Espace autour de l'image */
            display: block;
        }
        /* Styles pour aligner le bouton de déconnexion à droite */
        .logout-button {
            display: flex;
            justify-content: flex-end; /* Pousse le bouton vers la droite */
        }

        /* Styles pour le Navbar */
        .navbar {
            background-color: #003366;
            color: #fff;
            padding: 15px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            max-width: 100px;
        }

        .nav-links {
            list-style: none;
            display: flex;
        }

        .nav-links li {
            margin-right: 20px;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
        }

        /* Styles pour le Footer */
       /* Styles pour le footer */
       .footer {
            background-color: #003366;
            padding: 20px 0;
            text-align: center;
            color: white;
            margin: 20px;    
        }

        .social-links a {
            color: #fff;
            text-decoration: none;
            font-size: 20px;
            margin: 0 10px;
        }
        p{
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <img src="{{ asset('MYPHOTO/mouton-ok-acceuil(1).jpg') }}" alt="Logo de votre application">
        </div>
        <ul class="nav-links">
            <li><a href="/">Accueil</a></li>
            <li><a href="#">À Propos</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="search-bar" style="background-color: white;">
            <input type="text" placeholder="Rechercher...">
            <button type="submit">Rechercher</button>
        </div>
    </div>

    <div class="container">
        <div class="mt-5">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                @if(session('success'))
                    <div class="bg-green-500 text-green py-2 px-4 rounded-full mb-4" style="background-color: #259f75; height: 50px; text-align: center;">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-green-500 text-green py-2 px-4 rounded-full mb-4" style="background-color: #ff0000; height: 50px; text-align: center;">
                        {{ session('error') }}
                    </div>
                @endif
<br><br>
                <div class="flex justify-between mb-4 logout-button">
                    <form action="{{ route('admin.accueil') }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-sign-out-alt"></i> Retour
                        </button>
                    </form>
                </div>
                <div class="sidebar" style="width: 100%;"> <!-- Augmentez la largeur à votre convenance -->
                <form action="{{ route('user.index') }}" method="GET" class="search-form">
                    <div class="relative">
                        <input type="text" name="search" value="{{ $search }}" class="search-input" placeholder="Rechercher">
                        <button type="submit" class="search-icon">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <table class="styled-table">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Profil</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->prenom }}</td>
                        <td>{{ $user->profil }}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                @if ($user->statut == 0)
                                    <span class="text-success"><i class="fas fa-ban"></i> Inactif</span>
                                @else
                                    <span class="text-danger"><i class="fas fa-check-circle"></i> Actif</span>
                                @endif
                            </div>
                        </td>
                        <td class="dfg" style="display: flex; justify-content: space-between;">
                            <a href="{{ route('user.edit', ['id' => $user->id]) }}">
                                <i class="fas fa-edit"></i> 
                            </a>
                            <form action="{{ route('user.supprimer', ['id' => $user->id]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @if ($user->statut == 1)
                                <form action="{{ route('toggle-statut', ['id' => $user->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" style="border-radius: 60px; height: 40px;">
                                        <i class="fas fa-ban"></i> Rendre Inactif
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('toggle-statut', ['id' => $user->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success" style="border-radius: 60px; height: 40px;">
                                        <i class="fas fa-check-circle"></i> Rendre Actif
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="5">
                            <div class="flex flex-col items-center">
                                <img src="{{ asset('MYPHOTO/empty.svg') }}" alt="Aucun élément trouvé" class="empty">
                                Aucun élément trouvé!
                            </div>
                        </td>
                    </tr>
                @endforelse
            </table><br>
            <div class="mt-3">
                {{ $users->links() }}
            </div>
        </div>
    </div><br>

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
