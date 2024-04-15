@extends('layouts.app')



    <div class="container">
        <div class="row">
            <form action="{{route('importar')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="clo-md-6">
                    <input type="file" name="documento">
                    <input type="text" name="name">
                </div>
                <div class="clo-md-6">
                    <button class="btn btn-primary" type="submit">Importar</button>
                </div>
            </form>
        </div>
    </div>
