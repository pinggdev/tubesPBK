@extends('front-end.tampilantutor.master-tutorial')

@section('content')    
@if (Session::has('nilai'))
<div class="alert alert-primary" role="alert">
    {{ Session('nilai') }}
</div>
@endif

<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="alert alert-primary" role="alert">
                @if($result->total_points >= 3)
                <h4 class="alert-heading">Well done!</h4>
                @else
                <h4 class="alert-heading">Sayang sekali!</h4>
                @endif
                <p>Nilai anda adalah {{ $result->total_points }} points</p>
                <hr>
                @if($result->total_points >= 3)
                <p class="mb-0">Silahkan lanjut ke bab berikutnya!</p>
                @else
                <p class="mb-0">Silahkan ulangi kuisnya</p>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection