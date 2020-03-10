@extends('layouts.app')

@section('titlePage', 'Short Url')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-12">
            <h1 class="text-center py-5" style="font-size:120px;"><i class="icofont-link"></i>Short Url</h1>
            <shorturl-app></shorturl-app>
        </div>
    </div>
</div>
@endsection
