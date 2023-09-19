<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body style="background-image: url(https://source.unsplash.com/650x550)">
    <div class="container">
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
        <li><a href="#">Contact</a></li>
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
                  <textarea name="text">
                    
                  </textarea>
                  <span> Type your Message....</span>
              </div>
  
              <div class="contact-form">
                  <input type="submit" name="submit">
              </div>
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
        <div class="empty">

        </div>
    </div>    
</body>
</html>

<style>
    *{
    padding: 0;
    margin: 0;
    color: #fff;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    border: none;
}
body{
    background-image: url('images/photo5.jpeg');
    width: 100%;
    height: 100vh;
    background-size: 100% 100vh;
    position: relative;
    background-repeat: no-repeat;
}
header{
    position: absolute;
    text-align: center;
    width: 75%;
    left: 12%;
    top: 2rem;
}
header h1{
    font-size: 30px;
}
.empty{
    width: 100%;
    height: 100vh;
    background-color: rgba(0,0,0,0.5);
    position: absolute;
    top: 0px;
    left: 0;
    z-index: -1;
}

.content{
    display: flex;
    min-height: 110vh;
}
.content section{
    margin-top: 8vh;
    margin-left: 20vh;
}
.content-form{
    margin-top: 7rem;
}
section i{
    border-radius: 50%;
    width: 40px;
    height: 40px;
    background-color: rgba(255,255,255,0.8);
    color: black;
    text-align: center;
}
.form{
    display: flex;
    position: absolute;
    top: 0;
    left: 0;
    margin-left: 50%;
    justify-content: center;
    align-items: center;
    min-height: 110vh;
}

.form .contact-form input{
    width: 30rem;
    background-color: transparent;
    border: 0px;
    border: transparent;
    margin: 20px;
    padding: 10px;
    font-size: 18px;
    border-bottom: 2px solid #fff;
}
.form .contact-form input ~ span{
    position: absolute;
    left: 20px;
    transition: 0.9s ease-in-out;
    margin-top: 10px;
}
.form .contact-form input:focus ~span{
    transform: translateY(-20px);
    pointer-events: none;
}
.form .contact-form textarea{
    width: 30rem;
    border: 0px;
    background-color: transparent;
    margin: 20px;
    font-size: 17px;
    border-bottom: 2px solid white;
}
.form .contact-form textarea ~ span
{
    position: absolute;
    left: 20px;
    margin-top: 10px;
    transition: 0.9s ease-in-out;
}
.form .contact-form textarea:focus ~span{
    transform: translateY(-20px);
    pointer-events: none;
}
.form .contact-form input[type=submit]{
    background-color: dodgerblue;
    border: 2px solid dodgerblue;
    font-size: 18px;
    width: 50%;
    height: 40px;
    margin-top: -5px;
}
.form .contact-form input[type=submit]:hover{
    background-color: transparent;
    color: dodgerblue;
}
.media{
    position: absolute;
    top: 85vh;
    right: 20vh;
    display: flex;
    list-style: none;
}
.media li{
    margin: 20px 30px;
}
@media screen and (max-width: 900px){
    body{
        background-repeat: repeat-y;
        overflow: auto;
    }
    header{
        position: absolute;
        left: 0;
        top: 20%;
        width: 100%;
    }
    .empty{
        height: 200vh;
    }
    .form{
        position: absolute;
        top: 100vh;
        margin-left: 10%;
    }
    .content-form{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 0;
        margin-top: 53vh;
        margin-left: 10vh;
    }
    .content section{
        margin-top: 0vh;
        margin-left: 0vh;
    }
    .media{
        position: absolute;
        top: 183vh;
        right: 30px;
    }


    nav {
    background-color: #003366;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
}





nav .logo img {
    max-height: 10px; /* Ajustez la taille de votre logo */
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
/* Ajoutez ces styles à votre CSS pour positionner la barre de navigation en haut */
nav {
    background-color: #003366;
    color: #fff;
    position: sticky;
    top: 0;
    width: 100%;
    z-index: 1000;
}

/* Ajoutez une marge pour que le contenu ne soit pas masqué par la barre de navigation */
.container {
    margin-top: 60px; /* Ajustez la valeur selon vos besoins */
}

/* Le reste de vos styles CSS */


}
</style>