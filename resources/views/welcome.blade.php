@extends('app')
    
<!DOCTYPE html>
<html>
    <head>
        <title>Intranet</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    </head>
    <body>
        <h1>Intranet ARI</h1>
        <button type="button" class="btn btn-primary btn-lg" href="{{ route('procesos.index')}}">Gestionar procesos</button>

    </body>
</html>
