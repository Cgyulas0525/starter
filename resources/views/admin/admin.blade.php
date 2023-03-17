@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="public/css/app.css">
    <link rel="stylesheet" href="public/css/Highcharts.css">
    @include('layouts.costumcss')
@endsection

@section('content')
    <div class="content">
        @include('admin.adminHeader')
        @include('admin.adminWidget')
    </div>
@endsection

@section('scripts')
    @include('functions.js.ajaxsetup')
    @include('functions.clickEvent')

    <script type="text/javascript">
        $(function () {

            ajaxSetup();

            $('.deleteOutputButton').click(function (event) {

                var url = <?php echo "'" . url('api/deleteOutputFiles') . "'"; ?>;
                var title = "Biztos, hogy törli az output könyvtár file-it?";
                var text = "Output könyvtár ürítés!";
                var icon = "warning";
                var confirmButtonText = "Törlés";
                var cancelButtonText = "Kilép";

                clickEvent(event, url, title, text, icon, confirmButtonText, cancelButtonText);

            });

            $('.truncateButton').click(function (event) {

                var url = <?php echo "'" . url('api/truncateAllTables') . "'"; ?>;
                var title = "Biztos, hogy törli az adatokat az adatbázisból?";
                var text = "Adatbázis tábla adatok ürítés!";
                var icon = "warning";
                var confirmButtonText = "Törlés";
                var cancelButtonText = "Kilép";

                clickEvent(event, url, title, text, icon, confirmButtonText, cancelButtonText);

            });

            $('.loginButton').click(function (event) {

                var url = <?php echo "'" . url('api/loginItemDelete') . "'"; ?>;
                var title = "Biztos, hogy törli a bejelentkezési adatokat az adatbázisból?";
                var text = "LOGIN adatok törlés!";
                var icon = "warning";
                var confirmButtonText = "Törlés";
                var cancelButtonText = "Kilép";

                clickEvent(event, url, title, text, icon, confirmButtonText, cancelButtonText);

            });

            $('.logAllButton').click(function (event) {

                var url = <?php echo "'" . url('api/logAllDelete') . "'"; ?>;
                var title = "Biztos, hogy törli a log adatokat az adatbázisból?";
                var text = "LOG adatok törlés!";
                var icon = "warning";
                var confirmButtonText = "Törlés";
                var cancelButtonText = "Kilép";

                clickEvent(event, url, title, text, icon, confirmButtonText, cancelButtonText);

            });


        });
    </script>
@endsection

