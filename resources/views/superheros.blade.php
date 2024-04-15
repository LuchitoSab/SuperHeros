@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('importar') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <input type="file" name="documento">
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary" type="submit">Importar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

