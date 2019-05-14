<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{__("Liman Sistem Yönetimi")}}</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('/css/liman.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="server_id" content="{{request('server_id') ? request('server_id') : ''}}">
    <meta name="extension_id" content="{{request('extension_id') ? request('extension_id') : ''}}">
    
</head>
<body class="hold-transition @yield('body_class')">
<script src="{{asset('js/libraries.js')}}"></script>
<script src="{{asset('/js/liman.js')}}"></script>

@yield('body')
</body>
<script>
    window.onload = function () {
        Swal.close();
        $('table').not('.notDataTable').DataTable({
            autoFill : true,
            bFilter: true,
            destroy: true,
            "language" : {
                url : "{{asset('turkce.json')}}"
            }
        });
        let title = $(".breadcrumb-item.active").html();
        if(title !== undefined){
            document.title = title + " / Liman";
        }
        @if(auth()->check())
        setInterval(function () {
            checkNotifications();
        }, 3000);
        @endif
    };

    function terminal(serverId, name) {
        let elm = $("#terminal");
        $("#terminal .modal-body iframe").attr('src', '/sunucu/terminal?server_id=' + serverId);
        $("#terminal .modal-title").html(name + '{{__(" sunucusu terminali")}}');
        elm.modal('show');
        elm.on('hidden.bs.modal', function () {
            $("#terminal .modal-body iframe").attr('src', '');
        })
    }

</script>
</html>