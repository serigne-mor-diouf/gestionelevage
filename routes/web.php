<?php

use App\Http\Controllers\AchatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MoutonController;
use App\Http\Controllers\PayementController;
use App\Http\Controllers\ProprietaireController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddeleware;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//grouper les routes necessitant une authentification 
// Ajoutez le middleware au groupe de routes

Route::get('/proprietaire', [ProprietaireController::class , 'accueil'])->name('proprietaire.accueil')->middleware('auth');
Route::get('/admin', [AdminController::class, 'accueil'])->name('admin.accueil')->middleware('auth');
Route::get('/client', [ClientController::class, 'accueil'])->name('client.accueil')->middleware('auth');




// rout du point d'entrer de l'application
Route::get('/', [AdminController::class , 'accueilapp'])->name('accueil') ;



//route pour bloquer et debloquer
Route::post('/toggle-status/{id}', [UserController::class ,'toggleStatut'])->name('toggle-statut');

//route pour  espace admin




Route::get('/indexUser' , [UserController::class, 'index'])->name('user.index');
Route::get('/inscrire' , [UserController::class, 'create'])->name('user.creer');
Route::post('/register' , [UserController::class, 'store'])->name('user.create');
Route::DELETE('/deletesupprimerUser/{id}' , [UserController::class, 'destroy'])->name('user.supprimer');
Route::get('/editerUser/{id}' , [UserController::class, 'edit'])->name('user.edit');
Route::post('/updateUser/{id}' , [UserController::class, 'update'])->name('user.update');
Route::get('/detailsUser/{id}' , [UserController::class, 'show'])->name('user.details');
Route::get('/mesMoutons' , [UserController::class, 'mesMoutons'])->name('user.mesMoutons');
Route::get('/listmesMouton', [UserController::class,'userList'])->name('listemesMoutons');



Route::get('/index' , [MoutonController::class , 'index'])->name('mouton.index') ;
Route::get('/create' , [MoutonController::class , 'create'])->name('mouton.creer');
Route::post('/inserer' , [MoutonController::class , 'store'])->name(('mouton.create'));
Route::get('/details/{id}' , [MoutonController::class , 'show'])->name(('mouton.details'));
Route::get('/editer/{id}' , [MoutonController::class , 'edit'])->name(('mouton.edit'));
Route::post('/update/{id}' , [MoutonController::class , 'update'])->name(('mouton.update'));
Route::delete('delete/{id}' , [MoutonController::class , 'destroy'])->name(('mouton.delete'));
Route::get('/accueil' , [MoutonController::class , 'accueil'])->name(('mouton.accueil'));
Route::get('/listeclient' , [MoutonController::class , 'indexlistclient'])->name(('mouton.listeclient'));



// Routes d'inscription et de connexionRoute
// Afficher le formulaire d'inscription
Route::get('/inscrire', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
// Traiter la soumission du formulaire d'inscription
Route::post('/register', [RegisterController::class, 'register'])->name('register');


Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout' , [LoginController::class , 'logout'])->name('logout') ;

// Routes du proprietaire
Route::get('/indexProprietaire' , [ProprietaireController::class , 'index'])->name('proprietaire.index') ;
Route::get('/createProprietaire' , [ProprietaireController::class , 'create'])->name('proprietaire.creer');
Route::post('/insererProprietaire' , [ProprietaireController::class , 'store'])->name(('proprietaire.create'));
Route::get('/detailsProprietaire/{id}',[ProprietaireController::class , 'show'])->name(('proprietaire.details'));
Route::get('/editerProprietaire/{id}' , [ProprietaireController::class , 'edit'])->name(('proprietaire.edit'));
Route::post('/updateProprietaire/{id}' , [ProprietaireController::class , 'update'])->name(('proprietaire.update'));
Route::delete('/deleteProprietaire/{id}' , [ProprietaireController::class , 'destroy'])->name(('proprietaire.delete'));
Route::get('/parametreProprietaire' , [ProprietaireController::class , 'parametre'])->name(('proprietaire.parametre'));
Route::get('/contactProprietaire' , [ProprietaireController::class , 'contact'])->name(('proprietaire.contact'));


Route::get('/indexRace' , [RaceController::class , 'index'])->name('race.index') ;
Route::get('/createRace' , [RaceController::class , 'create'])->name('race.creer');
Route::post('/insererRace' , [RaceController::class , 'store'])->name(('race.create'));
Route::get('/detailsRace/{id}' , [RaceController::class , 'show'])->name(('race.details'));
Route::get('/editerRace/{id}' , [RaceController::class , 'edit'])->name(('race.edit'));
Route::post('/updateRace/{id}' , [RaceController::class , 'update'])->name(('race.update'));
Route::delete('deleteRace/{id}' , [RaceController::class , 'destroy'])->name(('race.delete'));



Route::get('/indexPayement' , [PayementController::class , 'index'])->name('payement.index') ;
Route::get('/createPayement' , [PayementController::class , 'create'])->name('payement.creer');
Route::post('/insererPayement' , [PayementController::class , 'store'])->name(('payement.create'));
Route::get('/detailsPayement/{id}' , [PayementController::class , 'show'])->name(('payement.details'));
Route::get('/editerPayement/{id}' , [PayementController::class , 'edit'])->name(('payement.edit'));
Route::post('/updatePayement/{id}' , [PayementController::class , 'update'])->name(('payement.update'));
Route::delete('deletePayement/{id}' , [PayementController::class , 'destroy'])->name(('payement.delete'));


Route::get('/indexClient' , [ClientController::class , 'index'])->name('client.index') ;
Route::get('/createClient' , [ClientController::class , 'create'])->name('client.creer');
Route::post('/insererClient' , [ClientController::class , 'store'])->name(('client.create'));
Route::get('/detailsClient/{id}' , [ClientController::class , 'show'])->name(('client.details'));
Route::get('/editerClient/{id}' , [ClientController::class , 'edit'])->name(('client.edit'));
Route::post('/updateClient/{id}' , [ClientController::class , 'update'])->name(('client.update'));
Route::delete('deleteClient/{id}' , [ClientController::class , 'destroy'])->name(('client.delete'));


Route::get('/indexAchat' , [AchatController::class , 'index'])->name('achat.index') ;
Route::get('/createAchat' , [AchatController::class , 'create'])->name('achat.creer');
Route::post('/insererAchat' , [AchatController::class , 'store'])->name(('achat.create'));
Route::get('/detailsAchat/{id}' , [AchatController::class , 'show'])->name(('achat.details'));
Route::get('/editerAchat/{id}' , [AchatController::class , 'edit'])->name(('achat.edit'));
Route::post('/updateAchat/{id}' , [AchatController::class , 'update'])->name(('achat.update'));
Route::delete('deleteAchat/{id}' , [AchatController::class , 'destroy'])->name(('achat.delete'));
