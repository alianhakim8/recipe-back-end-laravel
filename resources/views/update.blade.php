@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Resep
                  </div>
                  <form class="" action="{{route('update',$post)}}" method="post">
                    @csrf
                    {{ method_field('PATCH') }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="title" value="{{$post->title}}" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" autofocus required>
                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="">Resep</label>
                    <textarea name="content" rows="8" cols="80" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}">{{$post->content }}</textarea>
                    @if ($errors->has('content'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-center">
                    <input type="submit" value="Edit" name="edit" class="btn btn-primary btn-lg">
                  </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
