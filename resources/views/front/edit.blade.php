
<?php



?>
    <!DOCTYPE html>
<html>
<head>
    <title>Video Düzenleme</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/hot-sneaks/jquery-ui.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="col-md-6">
        <div id="video_player_box">

                <video id="my_video" controls style="width: 100%">
                    <source src="{{'/outputvideos/'.$item}}">
                </video>

            <div id="video_controls_bar">



                <div class="slider-wrapper slider-danger slider-strips slider-ghost " >
                    <div id="slider" class="input-range"  data-slider-step="1" data-values="[0, 100]" data-min="0" data-max="100" data-range="true" data-slider-tooltip="hide"></div>
                </div>
            </div><div><span id="starttime"></span> / <time id="endtime"></time></div>
            <div id="cutvideo" class="btn btn-primary btn-sm fa fa-cut"></div>
        </div>
    </div>
    <div id="prev" class="col-md-6 " style="display: none">
        <video id="izlevideo" controls style="width: 100%">

        </video>

    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-2.1.3.js"></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="{{asset('assets/js/mainvideo.js')}}"></script>
</body>
</html>
