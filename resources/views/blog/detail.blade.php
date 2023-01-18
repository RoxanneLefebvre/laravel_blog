@extends('layouts.app')
@section('title', 'detail')
@section('content')




<div class="container">
<a href="{{ route('blog.index')}}" class="btn btn-outline-primary">retourne sur la page d'acceuil</a>
    <div class="row">
        <div class="col-12 text-center pt-5">
            <h1 class="display-one mt-5">
            {{ $blogPost->title }}
            </h1>
            <hr>
            <p>{{  $blogPost->body }}
            </p>
            <small>{{ $blogPost->created_at }}</small>
            <strong> author: {{ $blogPost->user_id }}</strong>
            <hr>
        </div>
    </div>
</div>
<div class="row text-center">
    <div class="col-6">
        <a href="{{ route('blog.edit', $blogPost->id)}}" class="btn btn-success">mettre a jour</a>
    </div>
    <div class="col-6">
        <form action="">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" vlaue="Effacer">
        </form>
    </div>

</div>
@endsection

