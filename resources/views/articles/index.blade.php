@extends('layouts.master')

@section('content')
  <div class="row">
    @forelse($articles as $article)
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <span>Abiral Acharya</span>

          <span class="pull-right">
            {{ $article->created_at->diffForHumans() }}

        </div>

        <div class="panel-body">
          {{ $article->shortContent }}

          <a href="/articles/{{$article->id}}"> Read more </a>
      </div>

      <div class="panel-footer clearfix" style="background-color:white;">

        @if ($article->user_id == Auth::id())
          <form class="pull-right" style="margin-left:25px;" action="/articles/{{$article->id}}" method="POST">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button class="btn btn-danger btn-sm">
              Delete
            </button>
          </form>
        @endif
        <i class="fa fa-heart pull-right "> </i>
      </div>
    </div>
  </div>
  @empty
  No articles.
  @endforelse
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {{$articles->links()}}
  </div>
</div>
@endsection
