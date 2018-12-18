@extends('layouts.web')

@section('content')

    <script>
        Echo.private(`order`)
            .listen('ShippingStatusUpdated', (e) => {
                console.log(e.update);
            });
    </script>

@endsection