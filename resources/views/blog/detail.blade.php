@extends('layouts.app')
@section('title', 'detail')
@section('content')




<div class="container">
<a href="{{ route('blog.index')}}" class="btn btn-outline-primary">retourne sur la page d'acceuil</a>
    <div class="row">
        <div class="col-12 text-center pt-5">
            <h1 class="display-one mt-5">
            {{ $blog->title }}
            </h1>
            <hr>
            <p>{{  $blog->body }}
            </p>
            <small>{{ $blog->created_at }}</small>
            <strong> author: {{ $blog->user_id }}</strong>
            <hr>
        </div>
    </div>
</div>
<div class="row text-center">
    <div class="col-6">
        <a href="" class="btn btn-success">mettre a jour</a>
    </div>
    <div class="col-6">
        <a href="" class="btn btn-danger">effacer</a>
    </div>

</div>
@endsection

