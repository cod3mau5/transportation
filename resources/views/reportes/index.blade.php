@extends ('layouts.boxed')

@section ('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><strong>REPORTES</strong></h3>
    </div>
    <div class="box-body">
        <div class="row">
            <!-- LLEGADAS -->
            <a href="{{route('reporte.llegadas')}}">
                <div class="col-lg-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                            <i class="fa fa-sitemap fa-5x"></i>
                        </div>
                        <div class="panel-footer">
                            <span class="pull-left">Llegadas</span>
                            <span class="pull-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a>

            <!-- HOTELES -->
            <a href="{{route('reporte.salidas')}}">
                <div class="col-lg-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                            <i class="fa fa-building fa-5x"></i>
                        </div>
                        <div class="panel-footer">
                            <span class="pull-left">Salidas</span>
                            <span class="pull-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a>

        </div>
    </div><!-- /.box-body -->
</div>
@endsection

@section ('footer-scripts')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
