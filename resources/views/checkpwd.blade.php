@extends('layouts.app')

@section('titlePage', 'Short Url')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 py-5">
            <div class="card">
                <div class="card-header">{{ __('Enter Password') }}</div>

                <div class="card-body">
                    <div class="text-center py-3">
                        <small class="h6">{{ 'link : '.asset(request()->path) }}</small>
                    </div>

                    <form action="{{ route('path.check.pass', ['path' => request()->path]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="password" class="form-control {!! session('status') ? 'is-invalid':'' !!}" name="password" id="password" placeholder="Password" required>
                            @if (session('status'))
                                <div class="invalid-feedback">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-5">{{ __('Enter') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
