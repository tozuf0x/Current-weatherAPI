<?php
if (array_key_exists('submit', $_GET)) {
    if (!$_GET['city']) {
        $error = "пустой поисковый запрос";
    }
    if ($_GET['city']) {
        $apiData = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=" . $_GET['city'] . ",ru&units=metric&lang=ru&APPID=11b132f92950f9c002072b3ec026d327");
        $weatherArray = json_decode($apiData, true);
        $iconweather = $weatherArray[0]->main;
        $temp = $weatherArray['main']['temp'];
        $wind = $weatherArray['wind']['speed'];
        $weather = "<b>Погодные условия: " . $weatherArray['weather']['0']['description'];
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Погода</title>
    <style>
       
        :root {

            --text_light: #fff;
            --text_med: #53627c;
            --text_dark: #1e2432;
            --red: #ff1e42;
            --darkred: #c3112d;
            --orange: #ff8c00;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-weight: normal;
        }

        button {
            cursor: pointer;
        }

        input {
            -webkit-appearance: none;
        }

        button,
        input {
            border: none;
            background: none;
            outline: none;
            color: inherit;
        }

        img {
            display: block;
            max-width: 100%;
            height: auto;
        }

        ul {
            list-style: none;
        }

        body {
            font: 1rem/1.3 "Roboto", sans-serif;

            color: var(--text_dark);
            padding: 50px;
        }

        input {
            font-size: 2rem;
            height: 40px;
            padding: 5px 5px 10px;
            border-bottom: 1px solid;
        }

        .heading {
            font-weight: bold;
            font-size: 2.5rem;
            letter-spacing: 0.02em;
            padding: 0 0 30px 0;
        }

        button {
            font-size: 1rem;
            font-weight: bold;
            letter-spacing: 0.1em;
            padding: 15px 20px;
            margin-left: 15px;
            border-radius: 5px;
            background: var(--red);
            transition: background 0.3s ease-in-out;
        }
        .container{
            width: 700px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="heading">Погода сейчас</h1>
        <form action="" method="GET">
            <p><input type="text" name="city" id="city" placeholder="Ваш город...">
                <button type="submit" name="submit" class="btn btn-success">Ввести</button>
            </p>
            <div class="output">
                <?php
                if ($weather) {
                    echo '<div class="row align-items-left">
                    ' . $weather . ", " . $temp . "&deg;C," . " скорость ветра " . $wind . " м/с" . '
                   </div>';
                }
                if ($error) {
                    echo '<div class="alert alert-danger" role="alert">
                    ' . $error . '
                   </div>';
                }

                ?>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>