<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Logger</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <style>
            .pagination {
                width: 66%;
            }
            .pagination ul {
                display: inline-block;
                padding: 0;
                margin: 8px 0;
            }
            .pagination ul li {
                display: inline;
                float: left;
                padding: 8px 16px;
            }

            .pagination ul li a {
                color: black;
                text-decoration: none;
            }
            .pagination ul li.active {
                font-weight: bolder;
                font-size: 16px;
            }
        </style>
    </head>
    <body>
        <h1 class="text-center"><a href="<?= URL::route('logger') ?>">Logger</a></h1>
        @if (isset($day))
            <h2 class="text-center"><a href="<?= URL::route('logger-day', ['day' => $day]) ?>"><?= $day ?></a></h2>
        @endif
        @if (isset($day) && isset($ip))
            <h3 class="text-center"><a href="<?= URL::route('logger-ip', ['ip' => $ip, 'day' => $day]) ?>"><?= $ip ?></a></h3>
        @endif
        @yield('content')

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
