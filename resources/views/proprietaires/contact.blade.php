<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body style="background-image: url(https://source.unsplash.com/650x550)">
    <div class="container">
        <nav>
            <div class="logo">
                <img src="{{ asset('MYPHOTO/mouton-ok-acceuil(1).jpg') }}" alt="Logo de votre application" class="logo-img">
            </div>
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="#">À Propos</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="/listmesMouton">listes</a></li>
            </ul>
            <div class="search-bar">
                <input type="text" placeholder="Rechercher...">
                <button type="submit">Rechercher</button>
            </div>
        </nav>
        <header>
            <h1>Contact de l'utilisateur</h1>
        </header>
        <div class="content">
            <div class="content-form">
                <section>
                    <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                    <h2>profil</h2>
                    <p>
                        {{ $profil }}
                    </p>
                </section>

                <section>
                    <i class="fa fa-phone fa-2x" aria-hidden="true"></i>
                    <h2>telephone</h2>
                    <p>{{ $telephone }}</p>
                </section>

                <section>
                    <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
                    <h2>E-mail</h2>
                    <p>{{ $email }}</p>
                </section>
            </div>
        </div>

        <form>
            <div class="form">
                <div class="right">
                    <div class="contact-form">
                        <input type="text" required>
                        <span>Full Name</span>
                    </div>

                    <div class="contact-form">
                        <input type="E-mail" required>
                        <span>E-mail Id</span>
                    </div>
                    <div class="contact-form">
                        <textarea name="text"></textarea>
                        <span> Type your Message....</span>
                    </div>

                    <div class="contact-form">
                        <input type="submit" name="submit">
                    </div>
                </div>
            </div>
        </form>
        <div class="media">
            <li><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></li>
            <li><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></li>
            <li><i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i></li>
            <li><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></li>
        </div>
        <div class="empty"></div>
    </div>
</body>
</html>


<style>
 * {
    padding: 0;
    margin: 0;
    color: #fff;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    border: none;
}

body {
    background-image: url('images/photo5.jpeg');
    width: 100%;
    height: 110vh;
    background-size: 100% 100vh;
    position: relative;
    background-repeat: no-repeat;
}

nav {
    background-color: #003366;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    position: sticky;
    top: 0;
    width: 100%;
    z-index: 1000;
}

nav .logo img {
    max-height: 50px; /* Ajustez la taille de votre logo */
    border-radius: 10px;
}

nav ul {
    list-style: none;
    display: flex;
    margin-right: 30px; /* Ajoute une marge à droite pour séparer les liens du bouton Rechercher */
}

nav ul li {
    margin-right: 20px;
}

nav ul li:last-child {
    margin-right: 6px;
}

nav ul li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
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

.search-bar button {
    background-color: #003366;
    color: #fff;
    border: none;
    border-radius: 25px;
    padding: 10px 20px;
    cursor: pointer;
}

header {
    position: absolute;
    text-align: center;
    width: 75%;
    left: 12%;
    top: 2rem;
}

header h1 {
    font-size: 30px;
}

.empty {
    width: 100%;
    height: 110vh;
    background-color: rgba(0, 0, 0, 0.5);
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
}

.content {
    display: flex;
    min-height: 110vh;
}

.content section {
    margin-top: 8vh;
    margin-left: 20vh;
}

.content-form {
    margin-top: 7rem;
}

section i {
    border-radius: 50%;
    width: 40px;
    height: 40px;
    background-color: rgba(255, 255, 255, 0.8);
    color: black;
    text-align: center;
}

.form {
    display: flex;
    position: absolute;
    top: 0;
    left: 0;
    margin-left: 50%;
    justify-content: center;
    align-items: center;
    min-height: 110vh;
}

.form .contact-form input {
    width: 30rem;
    background-color: transparent;
    border: 0;
    margin: 20px;
    padding: 10px;
    font-size: 18px;
    border-bottom: 2px solid #fff;
}

.form .contact-form input ~ span {
    position: absolute;
    left: 20px;
    transition: 0.9s ease-in-out;
    margin-top: 10px;
}

.form .contact-form input:focus ~ span {
    transform: translateY(-20px);
    pointer-events: none;
}

.form .contact-form textarea {
    width: 30rem;
    border: 0;
    background-color: transparent;
    margin: 20px;
    font-size: 17px;
    border-bottom: 2px solid white;
}

.form .contact-form textarea ~ span {
    position: absolute;
    left: 20px;
    margin-top: 10px;
    transition: 0.9s ease-in-out;
}

.form .contact-form textarea:focus ~ span {
    transform: translateY(-20px);
    pointer-events: none;
}

.form .contact-form input[type=submit] {
    background-color: dodgerblue;
    border: 2px solid dodgerblue;
    font-size: 18px;
    width: 50%;
    height: 40px;
    margin-top: -5px;
}

.form .contact-form input[type=submit]:hover {
    background-color: transparent;
    color: white;
}

.media {
    position: absolute;
    top: 85vh;
    right: 20vh;
    display: flex;
    list-style: none;
}

.media li {
    margin: 20px 30px;
}

@media screen and (max-width: 800px) {
    body {
        background-repeat: repeat-y;
        overflow: auto;
    }

    header {
        position: absolute;
        left: 0;
        top: 20%;
        width: 100%;
    }

    .empty {
        height: 200vh;
    }

    .form {
        position: absolute;
        top: 100vh;
        margin-left: 10%;
    }

    .content-form {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 0;
        margin-top: 53vh;
        margin-left: 10vh;
    }

    .content section {
        margin-top: 0vh;
        margin-left: 0vh;
    }

    .media {
        position: absolute;
        top: 183vh;
        right: 30px;
    }
}

</style>