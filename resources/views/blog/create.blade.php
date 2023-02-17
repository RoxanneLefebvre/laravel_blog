@extends('layouts.app')
@section('title', 'ajouter')
@section('content')




<div class="container">

    <div class="row">
        <div class="col-12 text-center mt-2">
            <h1 class="display-one">Ajouter un article</h1>
        </div>
    </div>

    <hr>



    <div class="row justify-content-center">
        <div class="col-md-6 text-center">

            <form method="post">
                @csrf

                <div class="card">
                    <div class="card-header">
                        formulaire
                    </div>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">English</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Francais</button>
                        </li>

                    </ul>


                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <div class="card-body">
                                <div class="control-group col-12">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control">
                                </div>
                                <div class="control-group col-12">
                                    <label for="body">post</label>
                                    <textarea name="body" id="body" class="form-control"></textarea>
                                </div>
                                <div class="control-group col-12">
                                    <label for="categorie">categorie</label>
                                    <select name="categories_id" id="categorie" class="form-control">
                                        <option value="" selected disabled>select a value</option>
                                        @foreach($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->categorie}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" value="save" class="btn btn-success">

                            </div>
                        </div>
                    </div>

                </div>


            </form>


        </div>
    </div>
    @endsection






    <!-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    
                        <div class="card-body">
                            <div class="control-group col-12">
                                <label for="title">titre</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="control-group col-12">
                                <label for="body">post</label>
                                <textarea name="body" id="body" class="form-control"></textarea>
                            </div>
                            <div class="control-group col-12">
                                <label for="categorie">categorie</label>
                                <select name="categories_id" id="categorie" class="form-control">
                                    <option value="" selected disabled>choisisez un categorie</option>
                                    @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}">{{$categorie->categorie}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" value="save" class="btn btn-success">
    
                        </div>
                    </div> -->