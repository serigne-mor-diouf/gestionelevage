@extends('base.layout')

@section('content') 
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (votre en-tête HTML existant) ... -->
</head>
<body>
    <div class="container">
        <div class="grid-container">
            <div class="form-container">
                <div class="form-box">
                    <h1 id="title">Inscription</h1>
                    <div class="input-container">
                        <!-- Vos champs de formulaire ici -->
                        <div class="input-field" id="nameField">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" placeholder="Nom">
                        </div>
                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" placeholder="Prénom">
                        </div>
                        <div class="input-field">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" placeholder="Email">
                        </div>
                        <div class="input-field">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="btn-field">
                        <button type="submit" class="btn btn-primary">S'inscrire</button>
                        <button type="submit" class="btn btn-primary" id="signinBtn" class="disable">Connecter</button>
                    </div>
                    <p>Vous avez déjà un compte ? <a href="login">Connectez-vous ici</a></p>
                </div>
            </div>
            <div class="image-container">
                <!-- Votre image ici -->
                <img src="{{ asset('MYPHOTO/images (1).jpg') }}" alt="Image">
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

.container {
    width: 100%;
    height: 100vh;
    background-color: rgba(0, 0, 50, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
}

.grid-container {
    display: grid;
    grid-template-columns: 1fr 1fr; /* Deux colonnes égales */
    gap: 10px; /* Espace entre les colonnes */
    align-items: start; /* Alignez en haut */
}

.image-container img {
    width: 100%;
    height: 800%;
}

.form-box {
    width: 90%;
    max-width: 450px;
    background: #fff;
    padding: 50px 60px 70px;
    text-align: center;
}

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
