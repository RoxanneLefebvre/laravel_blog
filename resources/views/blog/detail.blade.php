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
            <strong><span>creer : </strong>{{ $blogPost->created_at }}</span>
            <strong><span>Categorie :</strong> @isset($blogPost->blogHasCategorie) {{ $blogPost->blogHasCategorie->categorie }} @endisset</span>
            <strong><span> author :</strong> {{ $blogPost->blogHasUser->name }}</span>
            <hr>
        </div>
    </div>
</div>
<div class="row text-center">
<div class="col-4">
        <a href="{{ route('blog.pdf', $blogPost->id)}}" class="btn btn-warning">PDF</a>
    </div>
    <div class="col-4">
        <a href="{{ route('blog.edit', $blogPost->id)}}" class="btn btn-success">mettre a jour</a>
    </div>
    <div class="col-4">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
            Effacer
        </button>
      
    </div>

</div>



<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModalLabel">Effacer un Article</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        etes vous certain de vouloir effacer ce post.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="{{ route('blog.edit', $blogPost->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Effacer">
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

