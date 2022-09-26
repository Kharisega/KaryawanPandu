@extends('layouts.app')

@section('content')
<div class="container">

    <div class="col-md-6 py-4">

        <form action="{{ route('admin.search') }}" method="post">
        <div class="input-group custom-search-form">
                @csrf
                <input type="text" list="searchs" name="search" id="search" class="form-control" placeholder="Search ....">
                <datalist id="searchs">
                    @foreach($data1 as $key => $data11)
                    <option value="{{ $data11->name }}">
                        @endforeach
                </datalist>
                <span class="input-group-append">
                    <button type="submit" class="btn btn-primary btn-block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </span>
            </div>
        </form>
    </div>
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
