<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .gambar {
            margin-bottom: 050px;
            /* margin-top: 50px; */
        }

        .foto4x6 {
            width: 336px;
            height: 480px;
        }

        .foto8r {
            height: 600px;
            width: 880px;
        }

        .label {
            margin-top: 100px;
        }

        @media print {
            body img {
                width: 90%;
                max-width: 1048px;
            }


        }

    </style>
</head>
<body onload="window.print()" onafterprint="window.close()">
    <div class="container">
        <h2 class="label">PAS Foto</h2>
        <div class="row">
            <div class="col">
                <img src="{{ asset('img/pasFoto/normal/'. $pasfoto) }}" class="img-fluid foto4x6 gambar" alt="{{ asset('img/pasFoto/normal/'. $pasfoto) }}"><br>
            </div>
            <div class="col">
                <img src="{{ asset('img/pasFoto/normal/'. $pasfoto) }}" class="img-fluid foto4x6 gambar" alt="{{ asset('img/pasFoto/normal/'. $pasfoto) }}"><br>
            </div>
        </div>
        <h2 class="label">Foto Seluruh Badan</h2>
        <div class="row">
            <div class="col">
                <img src="{{ asset('img/fotoserbadan/normal/'. $fotofulbadan) }}" class="img-fluid foto4x6 gambar" alt="{{ asset('img/fotoserbadan/normal/'. $fotofulbadan) }}"><br>
            </div>
            <div class="col">
                <img src="{{ asset('img/fotoserbadan/normal/'. $fotofulbadan) }}" class="img-fluid foto4x6 gambar" alt="{{ asset('img/fotoserbadan/normal/'. $fotofulbadan) }}"><br>
            </div>
        </div>
        <br><br>
        <h2 class="label">Foto KTP</h2>
        <img src="{{ asset('img/fotoktp/normal/'. $fotoktp) }}" class="img-fluid foto8r" alt="{{ asset('img/fotoktp/normal/'. $fotoktp) }}"><br>
        <h2 class="label">Foto KK</h2>
        <img src="{{ asset('img/fotokk/normal/'. $fotokk) }}" class="img-fluid foto8r" alt="{{ asset('img/fotokk/normal/'. $fotokk) }}"><br>
    </div>
</body>
</html>
