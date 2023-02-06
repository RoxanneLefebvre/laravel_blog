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
                <div class="card-body">
                    <div class="control-group col-12">
                        <label for="title">Titre du post</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="control-group col-12">
                        <label for="body">post</label>
                        <textarea name="body" id="body" class="form-control"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="save" class="btn btn-success">

                </div>
            </div>

        </form>

    </div>
</div>
@endsection

