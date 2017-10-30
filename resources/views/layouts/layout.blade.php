<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <!-- CSRF Token -->
    <meta content="{{csrf_token()}}" name="csrf-token">
    <!-- CSS -->
    <link href="{{asset('css/pnnotify.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <title>{{$title or config('app.name')}}</title>
    @yield('style')
    <script>
        window.base_url = '{{env('APP_URL')}}';
    </script>
</head>
<body>
@include('layouts.common.header')

@yield('content')

@include('layouts.common.footer')

<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{asset('js/jquery-2.2.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jpanelmenu.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/chosen.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/rangeslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/tooltips.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>


<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('js/auth.js')}}"></script>

<script>
$('.icon1').click(function() {
        $('.search').toggleClass('expanded');
    });
</script>

@yield('script')
<?php $messages= ['success','danger','warning']; foreach($messages as $msg){?>
{{--@if(session()->has($msg))--}}
    {{--<script type="text/javascript">--}}
        {{--new PNotify({--}}
            {{--title: '{{ucfirst($msg)}} Message',--}}
            {{--text: '{!! session($msg) !!}',--}}
            {{--shadow: true,--}}
            {{--addclass: 'stack_top_right',--}}
            {{--type: '{{$msg}}',--}}
            {{--width: '290px',--}}
            {{--delay: 2000--}}
        {{--});--}}
    {{--</script>--}}
{{--@endif--}}
<?php }?>
</body>
</html>
