@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (isset($status))
                <div class="alert alert-info">
                    {{ $status }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
