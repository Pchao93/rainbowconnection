<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
        <title>Laravel</title>

        <!-- Fonts -->


        <!-- Styles -->

    </head>
    <body>
        <div id="root">
          Content goes here
        </div>

        <form action="api/users/" method="POST">
          <input type="text" name="first_name"></input>
          <input type="text" name="last_name"></input>
          <input type="text" name="color"></input>
          <input type="submit"></input>
        </form>

    </body>
</html>
