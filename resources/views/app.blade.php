<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lara Forum</title>

<link rel="stylesheet" href="{{ url('css/app.css') }}">

</head>
<body>

<div id="app">
    <v-app>

        <toolbar-component app></toolbar-component>

        <v-content>

            <v-container fluid>

                <home-page-component></home-page-component>

            </v-container>

        </v-content>

        <v-footer app></v-footer>

    </v-app>
</div>

<script src="{{ url('js/app.js') }}"></script>
</body>
</html>
