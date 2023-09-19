@extends('base.layout')

@section('content') 
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <!-- Inclure la bibliothèque Font Awesome -->
    <link rel="stylesheet" href="style.css">  
</head>
<body>
    <div class="container">
   
        @if(session('success'))
            <div class="bg-green-500 text-white py-2 px-4 rounded-full mb-4">
            {{ session('success') }}
            </div>
        @endif
        <div class="grid-container">
       
            <div class="form-container">
          
                <form method="POST" action="{{ route('login') }}">
                @csrf <!-- Ajoutez le jeton CSRF -->
                <div class="form-box">
                    <h1 id="title">Connection</h1>
                    <div class="input-container">
                        <!-- Champs du formulaire avec des icônes Font Awesome -->
                       
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" placeholder="Email" value="{{old('emai')}}">
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                       
                        <div class="input-field">
                                    <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="input-field" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                          
                    </div>
                    <div class="btn-field">
                        <button type="submit" class="btn btn-primary">Connecter</button>
                        <button type="submit" class="btn btn-primary" id="signinBtn" class="disable"><a href="/inscrire">S'inscrire</button></a>
                    </div>
                    </div>
                    @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                </form>
                </div>
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

