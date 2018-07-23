<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title', config('adminlte.title', 'AdminLTE 2'))
    @yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/dropify-master/dist/css/dropify.css') }}">


    @if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @if(config('adminlte.plugins.datatables'))
    <!-- DataTables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    @endif

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition @yield('body_class')">

    @yield('body')

    <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/dropify-master/dist/js/dropify.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.form.min.js') }}"></script>

    <script>
        $('textarea').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
    <script type="text/javascript">
        $('.dropify').dropify();
    </script>
    @if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    @endif

    @if(config('adminlte.plugins.datatables')) 
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    @endif

    @if(config('adminlte.plugins.chartjs'))
    <!-- ChartJS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
    @endif
    <script src="{{ asset('vendor/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatable/dataTables.rowReorder.min.js') }}"></script>
    <script src="{{ asset('vendor/datatable/dataTables.responsive.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true
            } );
        } );
        $(document).ready(function() {
            var table = $('#example1').DataTable( {
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true
            } );
        } );
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#aboutVideo').submit(function(e){
                if(!$('#uploadFile').val()){
                    e.preventDefault()
                    alert("You do not upload a file")
                }
                if($('#uploadFile').val()){
                    e.preventDefault()
                    $('#loader-icon').css("display", "flex")
                    $(this).ajaxSubmit({
                        target: "#targetLayer",
                        beforeSubmit: function(){
                            $('.progress-bar').width('0%')
                        },
                        uploadProgress: function(event, position, total, percentComplete){
                            $('.progress-bar').width(percentComplete+'%')
                            $('.progress-bar').html('<div id="progress-status">'+percentComplete+' %</div>')
                        },
                        success: function(){
                            $('#loader-icon').hide()
                        },
                        resetForm: true
                    })
                    return false
                }
            })

        })
        $(document).ready(function() {

          $(".addImg1").click(function(){ 
              var html = $(".clone:last").html();
              $(".increment:last").after(html);
          });

          $("body").on("click",".removeImg1",function(){ 
            $(this).parents(".remove").remove();
        });

      });
        $(document).ready(function() {

            $(".addImg").click(function(){ 
                var html = $(".clones").html();
                $(".rasm").after(html);
            });

            $("body").on("click",".removeImg",function(){ 
                $(this).parents(".rasim").remove();
            });

        });
        $(document).on('change', '.cateAjax', function() {
          var id = $(this).val();
          var url = $(this).data('url');
          $.get('/admin-panel/getCatalog/' + id, function(res) {
            $('.catAjax').html(res);
        });
      });
        $(document).on('change', '.alAjax', function() {
          var id = $(this).val();
          var url = $(this).data('url');
          $.get('/admin-panel/getAlboum/' + id, function(res) {
            $('.catAjax').html(res);
        });
      });
        $(document).on('change', '.dropify', function(){
            if ($(this).val()) {
                console.log('1');
                $(this).parent().siblings('.accessImg').val('1');
            }
        });
    </script>
    @yield('adminlte_js')

</body>
</html>
