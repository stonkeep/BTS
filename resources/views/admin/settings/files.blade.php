{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Files Manager')

@section('content_header')
    <h1>Files Manager</h1>
@stop

@section('content')
    <iframe src="/laravel-filemanager" width="100%" height="100%" frameborder="0"></iframe>

    {{----}}
    {{--<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>--}}
{{--    <textarea name="content" class="form-control my-editor">{!! old('content', $content) !!}</textarea>--}}
    {{--<textarea name="content" class="form-control my-editor"></textarea>--}}
    {{--<script>--}}
        {{--var editor_config = {--}}
            {{--path_absolute : "/",--}}
            {{--selector: "textarea.my-editor",--}}
            {{--plugins: [--}}
                {{--"advlist autolink lists link image charmap print preview hr anchor pagebreak",--}}
                {{--"searchreplace wordcount visualblocks visualchars code fullscreen",--}}
                {{--"insertdatetime media nonbreaking save table contextmenu directionality",--}}
                {{--"emoticons template paste textcolor colorpicker textpattern"--}}
            {{--],--}}
            {{--toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",--}}
            {{--relative_urls: false,--}}
            {{--file_browser_callback : function(field_name, url, type, win) {--}}
                {{--var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;--}}
                {{--var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;--}}

                {{--var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;--}}
                {{--if (type == 'image') {--}}
                    {{--cmsURL = cmsURL + "&type=Images";--}}
                {{--} else {--}}
                    {{--cmsURL = cmsURL + "&type=Files";--}}
                {{--}--}}

                {{--tinyMCE.activeEditor.windowManager.open({--}}
                    {{--file : cmsURL,--}}
                    {{--title : 'Filemanager',--}}
                    {{--width : x * 0.8,--}}
                    {{--height : y * 0.8,--}}
                    {{--resizable : "yes",--}}
                    {{--close_previous : "no"--}}
                {{--});--}}
            {{--}--}}
        {{--};--}}

        {{--tinymce.init(editor_config);--}}
    {{--</script>--}}


    @stop


@section('css')
    <link rel="stylesheet" href="/css/app.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
@stop

@section('js')
    <script src="/js/app.js"></script>
    {{--<script>--}}
        {{--$('#table').bootstrapTable({--}}
            {{--cache: false,--}}
            {{--height: 500,--}}
            {{--striped: true,--}}
            {{--pagination: true,--}}
            {{--pageSize: 10,--}}
            {{--pageList: [All], //list can be specified here--}}
            {{--searchTimeOut: 10--}}
        {{--});--}}
    {{--</script>--}}
@stop