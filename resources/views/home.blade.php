@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form id="post-send" action="/user" method="POST" >
                            @csrf
                            <input type="text" id="message" name="message">
                            <input type="submit" class="btn btn-primary" id="postet" value="Gönder Bakalım" >
                        </form>

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

