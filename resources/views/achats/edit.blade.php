        @extends('base.layout')
        @section('content')

        <!DOCTYPE html>

        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Inscription</title>
            <!-- Inclure la bibliothèque Font Awesome -->
            <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
        <div class="container">
            <div class="grid-container">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="form-container">
                    <form method="POST" action="{{ route('achat.update', ['id' =>$achat->id]) }}">
                        @csrf
                        <div class="form-box">
                            <h1 id="title">Modifier un achat</h1>
                            <!-- Section "Achat" -->
                            <div class="input-container">
                                <!-- Champs pour l'achat -->
                                <div class="input-field">
                                    <label for="client_id">Client</label>
                                    <i class="fas fa-user-friends"></i>
                                    <select name="client_id" id="client_id" class="input-field" required>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}" {{ $achat->client_id == $client->id ? 'selected' : '' }}>
                                                {{ $client->nom }} {{ $client->prenom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-field">
                                    <label for="mouton_id">Mouton</label>
                                    <i class="fas fa-sheep"></i>
                                    <select name="mouton_id" id="mouton_id" class="input-field" required>
                                        @foreach($moutons as $mouton)
                                            <option value="{{ $mouton->id }}" {{ $achat->mouton_id == $mouton->id ? 'selected' : '' }}>
                                                {{ $mouton->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-field">
                                    <label for="montant">Montant de l'achat</label>
                                    <i class="fas fa-money-bill-wave"></i>
                                    <input type="text" name="montant" id="montant" value="{{ $achat->montant }}" required>
                                </div>

                                <div class="input-field">
                                    <label for="dateAchat">Date de l'achat</label>
                                    <i class="fas fa-calendar-alt"></i>
                                    <input type="date" name="dateAchat" id="dateAchat" value="{{ $achat->dateAchat }}" required>
                                </div>
                            </div>

                            <!-- Section "Paiement" -->
                            <div class="input-container">
                                <div class="input-field">
                                    <label for="montantPaye">Montant payé</label>
                                    <i class="fas fa-money-check-alt"></i>
                                    <input type="number" name="montantPaye" id="montantPaye" placeholder="Entrez le montant payé" value="{{ $achat->payements->first() ? $achat->payements->first()->montantPaye : '' }}" required>
                                </div>

                                <div class="input-field">
                                    <label for="statutPayement">Statut du paiement</label>
                                    <i class="fas fa-handshake"></i>
                                    <select id="statutPayement" class="form-control" name="statutPayement" required>
                                        <option value="Liquide" {{ $achat->payements->first() && $achat->payements->first()->statutPayement == 'Liquide' ? 'selected' : '' }}>Liquide</option>
                                        <option value="Transfert" {{ $achat->payements->first() && $achat->payements->first()->statutPayement == 'Transfert' ? 'selected' : '' }}>Transfert</option>
                                    </select>
                                </div>

                                <div class="input-field">
                                    <label for="datePayement">Date du paiement</label>
                                    <i class="fas fa-calendar-alt"></i>
                                    <input type="date" name="datePayement" id="datePayement" value="{{ $achat->payements->first() ? $achat->payements->first()->datePayement : '' }}" required>
                                </div>
                            </div>

                            <!-- Bouton de soumission -->
                            <div class="btn-field">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                                <button type="submit" class="btn btn-primary" id="signinBtn" class="disable"><a href="#">Annuler</button></a>
                            </div>
                        </div>
                        @if(session('success'))
                            <div class="bg-green-500 text-white py-2 px-4 rounded-full mb-4">
                                {{ session('success') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div> 
        </div>
    </body>
</html>

<style>
* {
    margin: 0;
    padding: 0;
    font-family: 'poppins', sans-serif;
    box-sizing: border-box ;
}

/* ... (Votre CSS existant) */
/* ... (Votre CSS existant) */
button a{
    text-decoration: none;
    color: white;
}
.container {
    width: 100%;
    height: 120vh;
    background-color: rgba(0, 0, 50, 0.8);
    display: flex;
    align-items: center; /* Centrer verticalement */
    justify-content: center;
}

.grid-container {
    display: flex; /* Utilisez un flex container pour les aligner côte à côte */
    align-items: center;
    gap: 50px;
    height: 80vh; /* Ajuster la hauteur du conteneur */
}

.form-box {
    width: 300%; /* Augmenter la largeur du formulaire */
    max-width: 450px;
    background: #fff;
    padding: 50px 60px 70px;
    text-align: center;
    margin: 0 auto; /* Centrer horizontalement */
}

.image-container img {
    width: 100%;
    height: 200%; /* Ajuster la hauteur de l'image */
    object-fit: cover; /* Pour conserver les proportions de l'image */
}

/* ... (Le reste de votre CSS) */

.form-box h1 {
    font-size: 30px;
    margin-bottom: 60px;
    color: #3c00a0;
    position: relative;
}

.form-box h1::after {
    content: '';
    width: 30px;
    height: 4px;
    border-radius: 3px;
    background: #3c00a0;
    position: absolute;
    bottom: -12px;
    left: 50px;
    transform: translateX(-50%);
}

.input-field {
    background: #eaeaea;
    margin: 15px 0;
    border-radius: 3px;
    display: flex;
    align-items: center;
}

input {
    width: 100%;
    background: transparent;
    border: 0;
    outline: 0;
    padding: 18px 15px;
}

.input-field i {
    margin-left: 15px;
    color: #999;
    max-height: 65px;
    transition: max-height 0.5s;
    overflow: hidden;
}

form p {
    text-align: center;
    font-size: 13px;
}

form p a {
    text-decoration: none;
    color: #3c00a0;
}
form{
    height: 30%;
}
.btn-field {
    width: 100%;
    display: flex;
    justify-content: space-between;
}

.btn-field button {
    flex-basis: 48%;
    background: #3c00a0;
    color: #fff;
    height: 40px;
    border-radius: 20px;
    border: 0;
    outline: 0;
    cursor: pointer;
    transition: content 1s;
}

.input-group {
    height: 200px;
}

.btn-field button.disable {
    background: #eaeaea;
    color: #555;
}
</style>



