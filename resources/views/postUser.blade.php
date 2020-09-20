@extends('layouts.app')

@section('content')
<div class="container">
  <div class="text-right" style="margin-bottom:30px">
    <a class="btn btn-primary" href="{{route('create')}}">Tambah</a>
  </div>
<div class="row justify-content-center">
  <div class="col-md-8">
  @if(session()->has('message'))
  <div class="alert alert-success">
    <div class="alert-body">
          {{ session()->get('message') }}
      </div>
    </div>
  @endif
  </div>
</div>
  @foreach($posts as $post)
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$post->title}}
                  <button data-toggle="modal" data-target="#delete{{$post->id}}" class="float-right btn btn-danger">Hapus</button>
                  <a href="{{route('edit',$post)}}" class="float-right btn btn-warning" style="margin-right:10px">Edit</a>
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
    <div id="delete{{$post->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Resep</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin ?</p>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <a href="{{route('delete',$post)}}" class="btn btn-danger">Hapus</a>
        </div>
    </div>

  </div>
</div>
    @endforeach
    <div class="row justify-content-center">
      <div class="col-md-2">
      {{$posts->links()}}
      </div>
    </div>
</div>
@endsection
