@extends('base.layout')
@section('content')
<div class="container">
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh; width: 100%;">
        <div class="card" style="width: 50%;">
            <div class="card-header" style="text-align: center; color: green; font-weight: bold;">modifier un mouton</div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card-body">
                <form action="{{ route('mouton.update', ['id' => $mouton->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 ">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" id="nom" value="{{ $mouton->nom}}" class="form-control" required>
                    </div>

                 <div class="mb-3">
                    <label for="photo" class="form-label">Image actuelle</label>
                    <img src="{{asset('MYPHOTO/' . $mouton->photo)}}" alt="Image du mouton" width="100">
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">Nouvelle image </label>
                    <input type="file" name="photo" id="photo" class="form-control">
                </div>


                    <div class="mb-3 ">
                        <label for="NomMere" class="form-label">Nom de la Mere</label>
                        <input type="text" name="NomMere" id="NomMere" value="{{$mouton->nomMere}}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="nomgrandMereMaternelle" class="form-label">Nom grand Mere</label>
                        <input type="text" name="nomgrandMereMaternelle" id="nomgrandMereMaternelle" value="{{$mouton->nomgrandMereMaternelle}}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="nomArrieregrandMereMaternelle" class="form-label">Nom Arriere grand Mere Maternelle</label>
                        <input type="text" name="nomArrieregrandMereMaternelle" id="nomArrieregrandMereMaternelle" value="{{$mouton->nomArrieregrandMereMaternelle}}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                            <label for="race_id" class="form-label">Race</label>
                            <select name="race_id" id="race_id" class="form-control" required>
                                @foreach($races as $race)
                                    <option value="{{$race->id}}" {{ $mouton->race_id == $race->id ? 'selected' : '' }}>
                                        {{ $race->nom }}
                                    </option>
                               @endforeach
                        </select>
                    </div>

                        <div class="mb-3">
                            <label for="proprietaire_id" class="form-label">proprietaire</label>
                            <select name="proprietaire_id" id="proprietaire_id" class="form-control" required>
                                @foreach($proprietaires as $pros)
                                    <option value="{{$pros->id}}" {{ $mouton->proprietaire_id == $pros->id ? 'selected' : '' }}>
                                        {{ $pros->nom }}
                                    </option>
                               @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" style="width:90%;">modifier</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@stop

