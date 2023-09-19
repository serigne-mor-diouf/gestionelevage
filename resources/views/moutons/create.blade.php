
@extends('base.layout')
        @section('content')
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ajouter un mouton</title>
   
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
                    <form method="POST" action="{{ route('mouton.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-box">
                            <h1 id="title">Ajouter un mouton <i class="fas fa-sheep"></i></h1>
                            <!-- Section "Mouton" -->
                            <div class="input-container">
                                <div class="input-field">
                                    <!-- <label for="nom">Nom du Mouton <i class="fas fa-sheep"></i></label> -->
                                    <input type="text" name="nom" id="nom" class="input-field" placeholder="entrer le nom du mouton" value="{{old('nom')}}" required>
                                </div>

                                <div class="input-field">
                                    <i class="fas fa-image"></i>
                                    <input type="file" name="photo" id="photo" class="input-field" placeholder="choisir une image" required>
                                </div>

                                <div class="input-field">
                                    <i class="fas fa-sheep"></i>
                                    <input type="text" name="nomMere" id="nomMere" class="input-field" placeholder="entrer le nom  DU mere du mouton" value="{{old('nomMere')}}">
                                </div>

                                <div class="input-field">
                                    <i class="fas fa-sheep"></i>
                                    <input type="text" name="nomgrandMereMaternelle" id="nomgrandMereMaternelle" class="input-field"  placeholder="entrer le nom grang mere du mouton" value="{{old('nomgrandMereMaternelle')}}">
                                </div>

                                <div class="input-field">
                                     <i class="fas fa-sheep"></i>
                                    <input type="text" name="nomArrieregrandMereMaternelle" id="nomArrieregrandMereMaternelle" class="input-field" placeholder="entrer le nom arriere grand mere du mouton"value="{{old('nomArrieregrandMereMaternelle')}}" >
                                </div>

                                <div class="input-field">
                                   <i class="fas fa-calendar"></i>
                                    <input type="number" name="age" id="age" class="input-field"value="{{old('age')}}"  placeholder="entrer l'age du mouton">
                                </div>

                                <div class="input-field">
                                    <i class="fas fa-align-left"></i>
                                    <input type="text" name="description" id="description" class="input-field"  placeholder="entrer la descitpion" >
                                </div>
                            </div>

                            <!-- Section "Propriétaire et Race" -->
                            <div class="input-container">
                                <div class="input-field">
                                    <label for="Proprietaire">Propriétaire <i class="fas fa-user"></i></label>
                                    <select name="proprietaire_id" id="Proprietaire" class="input-field">
                                        @foreach ($proprietaires as $proprietaire)
                                            <option value="{{ $proprietaire->id }}">{{ $proprietaire->nom }} {{ $proprietaire->prenom }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-field">
                                    <label for="race_id">Race <i class="fas fa-horse"></i></label>
                                    <select name="race_id" id="race_id" class="input-field">
                                        @foreach ($races as $race)
                                            <option value="{{ $race->id }}">{{ $race->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Bouton de soumission -->
                            <div class="btn-field">
                                <button type="submit" class="btn btn-primary">Ajouter un mouton</button>
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
@endsection

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
    width: 400%;
    height: 130vh;
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
    width: 370%; /* Augmenter la largeur du formulaire */
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
    padding: 10px 8x;
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
    height: 5%;
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




