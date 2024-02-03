@extends('template')

@section('header')
    <title>Fisheries | Machine</title>
@endsection

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mb-3">Machine Data</h1>
                        <form method="post" action="{{ route('edit-machine', ['machine' => $machine -> id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Owner</label>
                                        <select name="user_id" id="user_id" class="form-control nilaiHuruf" style="width: 100%;">
                                            @foreach ($user as $item)
                                                @if($machine -> user_id == $item -> id)
                                                    <option value="{{ $item->id }}" selected>{{ $item->id}} ( {{ $item->email }} ) </option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->id}} ( {{ $item->email }} ) </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lat">Latitude</label>
                                <input value="{{ $machine -> lat }}" type="text" name="lat" class="form-control" id="lat">
                              </div>
                            <div class="form-group">
                                <label for="lng">Longitude</label>
                                <input value="{{ $machine -> lng }}" type="text" name="lng" class="form-control" id="lng">
                              </div>
                            <div class="flex">
                              <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="{{ route('machine') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
