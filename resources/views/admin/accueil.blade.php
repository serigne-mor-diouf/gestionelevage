<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/font-awesome/css/all.min.css">

    <title>Tableau de bord de l'administrateur</title>
    <!-- Inclure ici vos liens vers les fichiers CSS et JavaScript nécessaires -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }

        .dashboard {
            background-color: #003366;
            color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 200px;
        }

        .dashboard a {
            color: #fff;
            text-decoration: none;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            width: 150px;
            height: 65px;
        }

        .dashboard a:hover {
            color: #007bff;
        }

        .dashboard .logout {
            margin-top: auto;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar {
            width: 25%; /* Largeur de la barre latérale */
            background-color: #f0f0f0; /* Couleur de fond de la barre latérale */
            padding: 20px; /* Espace à l'intérieur de la barre latérale */
        }

        header {
            background-color: #222;
            padding: 10px;
        }

        .search-bar {
            background-color: #eee;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            flex-grow: 1;
        }

        .search-bar input[type="text"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
            width: 100%;
        }

        .search-bar button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #444;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        td {
            background-color: #444;
        }

        footer {
            background-color: #222;
            padding: 10px;
            text-align: center;
            width: 100%;
        }
    </style>
</head>
<body>

    <!-- Le contenu dynamique sera chargé ici -->

    <div class="dashboard">
    <div class="content">
        <header>
            <!-- Barre de navigation -->
            <h1>KharBi</h1> 
            <nav>
                <a href="javascript:void(0)">
                    <span style="margin-right: 15px;">🏠</span> Accueil
                </a>
                <a href="javascript:void(0)">
                    <span style="margin-right: 15px;">👤</span> Mon Compte
                </a>
                <a href="/inscrire">
                    <span style="margin-right: 15px;">👤</span> Ajouter un compte 
                </a>
                <a href="/indexUser">
                    <span style="margin-right: 15px;">📋</span> Liste
                </a>

                <a href="/login">
                    <span style="margin-right: 15px;">🔒</span> Déconnecter
                </a>

                <a href="#">
                <span style="margin-right: 15px;"></span>
                         Paramètre
                </a>

            </nav>
        </header>
        <div class="logout">
            <a href="/login">
                <span style="margin-right: 10px;">🚪</span> Déconnexion
            </a>
        </div>
    </div>
    </div>
    <script>
        // Fonction pour afficher/cacher le tableau lorsque vous cliquez sur le lien "Liste"
        function toggleTable() {
            const table = document.getElementById('table');
            table.style.display = table.style.display === 'none' ? 'table' : 'none';
        }

              

    </script>
</body>
</html>
