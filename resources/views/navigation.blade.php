<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            .navigation {
               margin-top:20px;
            }

            .navigation .previous {
                margin-left:10px;
                float: left;
            }

            .navigation .next {
                margin-left:10px;
                float: right;
            }
           
        </style>
    </head>
    <body>
        <div class="navigation" >
            @if(!empty($prev))
                <a href={{ $prev }} class="previous">
                    Previous
                </a>
            @endif

            @if(!empty($next))
            <a href="{{ $next }}" class="next">
                Next
            </a>
            @endif
        </div>
    </body>
</html>
