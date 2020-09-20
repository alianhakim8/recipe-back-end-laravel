@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Resep
                  </div>
                  <form class="" action="{{route('store')}}" method="post">
                    @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" autofocus required>
                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="">Resep</label>
                    <textarea name="content" rows="8" cols="80" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}">{{ old('content') }}</textarea>
                    @if ($errors->has('content'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-center">
                    <input type="submit" value="Tambah" name="tambah" class="btn btn-primary btn-lg">
                  </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
