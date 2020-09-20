@extends('layouts.app')

@section('content')
<div class="container">
  <!-- <div class="text-right" style="margin-bottom:30px">
    <a class="btn btn-primary" href="{{route('create')}}">Tambah</a>
  </div> -->
  @foreach($posts as $post)
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$post->title}}
                  <!-- <a href="" class="float-right btn btn-danger">Hapus</a>
                  <a href="{{route('edit',$post)}}" class="float-right btn btn-warning" style="margin-right:10px">Edit</a> -->
                 </div>
                <div class="card-body">
                    <p>{{$post->content}}</p>
                </div>
                <div class="card-footer">
                    <p>Dibuat oleh : {{$post->users->name}} | Ditambahkan : {{$post->created_at->diffForHumans()}}</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    @endforeach
    <div class="row justify-content-center">
      <div class="col-md-2">
      {{$posts->links()}}
      </div>
    </div>
</div>
@endsection
