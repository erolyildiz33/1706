<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editor</title>
    <script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
        crossorigin="anonymous">
    </script>
    <script src="{{asset('assets/edit/js/nouislider.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/edit/css/style.css')}}">
    <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/dot-luv/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('assets/edit/css/nouislider.min.css')}}">
</head>
<body>

<div id="resizable" class="ui-widget-content">
    <video class="video" controls>
        <source src="{{'/outputvideos/'.$item}}">
    </video>
    <canvas id="canv"></canvas>
</div>


<div class="hide_until_load hidden">
    <span class="current_time"></span>
    <div class="slider_wrapper">
        <div id="slider"></div>
        <div class="slider_time_pos"></div>
    </div>
    Başlangıç Zamanı: <input type="number" class="slider_control" data-pos="0" value="0" title="Start" />
    Bitiş Zamanı: <input type="number" class="slider_control" data-pos="1" value="1" title="End" />



    <input type="button" id="run_ffmpeg" value="Videoyu Kes!"/>



    <div class="Kesilen_video">

    </div>
</div>

<script src="{{asset('assets/edit/js/control.js')}}"></script>
<script src="{{asset('assets/edit/js/ffmpeg/ffmpeg_runner.js')}}"></script>
</body>
</html>
