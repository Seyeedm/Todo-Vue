<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        

        <!-- Vue -->
        @vite('resources/js/app.js')
    </head>
    <body>
        <div class="container">
            <div id="app">
                <table-component />
            </div>
        </div>
    </body>
</html>
<style>
    body{
        box-sizing: border-box;
        margin: 0;
    }
    .container{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100%;
    }
</style>
