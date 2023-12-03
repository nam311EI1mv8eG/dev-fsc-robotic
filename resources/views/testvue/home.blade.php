@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    hello there
                    

                    <component-a></component-a>
                 <cal-score></cal-score>
                    <example-component></example-component>
                    <component-b></component-b>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection