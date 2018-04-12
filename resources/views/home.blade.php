@extends('layouts.app')

@section('konten')

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){

            demo.initDashboardPageCharts();
            demo.initVectorMap();

            $.notify({
                icon: 'pe-7s-bell',
                message: "<b>Jemput.in Manage App</b> - Dashboards."

            },{
                type: 'warning',
                timer: 4000
            });

        });
    </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-46172202-1', 'auto');
        ga('send', 'pageview');

    </script>
@endsection
