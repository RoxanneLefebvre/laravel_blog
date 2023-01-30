@extends('layouts.app')
@section('title', 'Authentification')
@section('content')

<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-4 pt-4">
            <div class="card">
                <h3 class="card-header text-center">
                    Enregistrer
                </h3>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                        @endif
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="name" class="form-control" name="name">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="email" class="form-control" name="email">
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="password" class="form-control" name="password">
                            </div>
                            <div class="d-grid mx-auto">
                                <input type="submit" class="btn btn-dark" value="Envoyer">
                            </div>
                        </form>
                </div>
            </div>

        </div>
        </div>
    </div>
</main>











@endsection
