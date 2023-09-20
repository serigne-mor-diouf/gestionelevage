<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            color: #000;
            text-decoration: none;
            padding: 12px;
            margin: 12px;
        }

        h1 {
            text-align: center;
        }

        .text-right button a{
            background-color: blue;
            margin-left: 30px;
        }

        .empty {
            width: 100px;
            height: 80px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-header">
                @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card-body">Liste des Moutons</div>
                </div>
                <div class="flex justify-between items-center">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="w-1/3">
                        <form action="{{route('mouton.index') }}" method="GET">
                            <input type="text" name="search" value="{{ $search }}" class="block mt-1 rounded-md border-gray-300 w-full" placeholder="Rechercher">
                            <button type="submit" class="bg-blue-500 rounded-md p-2 text-sm text-white">
                                Rechercher
                            </button>
                        </form>
                    </div>
                    <div class="me-4" style="gap: 7px; margin: 3px">
                        <div class="float-end ">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Déconnexion</button>
                            </form>
                        </div>
                        <button class="float-end">
                            <a href="{{ route('mouton.creer') }}" class="bg-blue-500 rounded-md p-2 text-sm text-blue">
                                Nouveaux mouton
                            </a>
                        </button>
                    </div>
                </div>
                <table class="table mx-auto">
                    <thead>
                        <tr>
                            <th class="text-center">Numero</th>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Photo</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($moutons as $mouton)
                        <tr>
                            <td class="text-center">{{ $mouton->id}}</td>
                            <td class="text-center">{{ $mouton->nom }}</td>
                            <td><img src="{{ asset('MYPHOTO/' . $mouton->photo) }}" width="77" height="64"></td>
    
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('mouton.details', ['id' => $mouton->id]) }}" class="btn btn-primary me-2 p-1 ">Voir plus</a>
                                    <a href="{{ route('mouton.edit', ['id' => $mouton->id]) }}" class="btn btn-primary me-2">Modifier</a>
                                    <form action="{{ route('mouton.delete', ['id' => $mouton->id]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                <div class="flex justify-center content-center p-4">
                                    <img src="{{ asset('MYPHOTO/empty.svg') }}" alt="" class="empty">
                                    <div>Aucun élément trouvé!</div>
                                </div>
                            </td>
                        </tr>  
                        @endforelse
                    </tbody>
                </table>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <table class="table mx-auto">
                            </table>
                            <div class="text-left">
                                {{ $moutons->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
 -->
 @extends('base.layout')
@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}"></script>
<div class="container">
    <div class="card-body" style="background-color:darkgray;">
        <h1 class="mt-4" style="text-align: center;">Liste des Moutons</h1> <br><br>
    </div><br>
    <div class="d-flex justify-content-between align-items-center">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="flex justify-between mb-4 logout-button">
            <form action="{{ route('proprietaire.accueil') }}" method="get">
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-sign-out-alt"></i> Retour
                </button>
            </form>
        </div>
        <form action="{{ route('mouton.index') }}" method="GET" class="w-50">
            <div class="input-group mb-3">
                <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Rechercher" aria-label="Rechercher" aria-describedby="button-rechercher">
                <button class="btn btn-primary" type="submit" id="button-rechercher">Rechercher</button>
            </div>
        </form>

        <button class="btn btn-primary">
            <a href="{{ route('mouton.creer') }}" class="text-white" style="text-decoration: none;">Nouveaux mouton </a>
        </button>
    </div>

    @if($moutons->isEmpty())
    <div class="d-flex justify-content-center align-items-center p-4">
        <img src="{{ asset('MYPHOTO/empty.svg') }}" alt="" class="empty" style="width: 70px;">
        <div class="ms-3">Aucun élément trouvé!</div>
    </div>
    @else
    <div class="image-grid">
        @php $count = 0; @endphp
        @foreach($moutons as $mouton)
        <div class="image-container">
            <img src="{{ asset('MYPHOTO/'.$mouton->photo) }}" alt="{{ $mouton->nom }}" class="mx-auto d-block">
            <h2>{{ $mouton->nom }}</h2>
            <p>{{ $mouton->description }}</p>
            <div class="action-buttons">
                <a href="{{ route('mouton.details', ['id' => $mouton->id]) }}" class="btn btn-primary details-button">Détails</a>
                <a href="{{ route('mouton.edit', ['id' => $mouton->id]) }}" class="btn btn-primary edit-button">Modifier</a>
                <form action="{{ route('mouton.delete', ['id' => $mouton->id]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?') ">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-button">Supprimer</button>
                </form>
            </div>
        </div>
        @php $count++; @endphp
        @if($count % 3 == 0)
        <div class="clear"></div>
        @endif
        @endforeach
    </div>
    @endif

    <!-- Pagination -->
    {{ $moutons->links() }}

</div>
@endsection

<style>
/* Ajoutez ces styles dans votre fichier CSS */
/* Ajoutez ces styles dans votre fichier CSS */

.image-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.image-container {
    border: 2px solid #ccc;
    padding: 10px;
    margin: 10px;
    width: calc(33.33% - 20px);
    text-align: center;
}

.clear {
    clear: both;
}

img {
    max-width: 110%;
    height: auto;
    /* transition: 0.5s; */
    /* transform: rotate(); */
}

.details-link {
    display: block;
    margin-top: 10px;
    text-decoration: none;
    color: #007bff;
    /* transition: color 0.3s ease; */
}

.details-link:hover {
    color: #0056b3;
    padding: 20px;
}

/* Ajoutez ces styles dans votre fichier CSS */

.image-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.image-container {
    border: 2px solid #ccc;
    padding: 10px;
    margin: 10px;
    width: calc(33.33% - 20px);
    text-align: center;
}

.clear {
    clear: both;
}

img {
    max-width: 110%;
    height: auto;
}

.action-buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
    height: 40px;
}

.details-button,
.edit-button,
.delete-button {
    flex: 1;
    margin: 0 5px;
}

</style>














