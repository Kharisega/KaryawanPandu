@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row row-cols-1 row-cols-md-5">
        @foreach($data as $key => $data2)

        <div class="col mb-4">
            <div class="card">
                <img src="@if($data2->namagambar == null) {{ asset('img/pp person.jpg') }} @else {{ asset('img/pasFoto/kecil/'. $data2->namagambar) }} @endif" class="card-img-top" alt="{{ asset('img/pp person.jpg') }}">
                <div class="card-body">
                    <h5 class="card-title">{{ _($data2->name) }}</h5>

                    <form action="{{ route('admin.data',$data2->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary">Lihat Data</button>
                    </form>
                </div>
            </div>
        </div>

        @endforeach

    </div>

</div>
@endsection
