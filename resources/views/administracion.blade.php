@extends ('layouts.boxed')

@section ('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><strong>ADMINISTRACIÓN</strong></h3>
    </div>
    <div class="box-body">
        <div class="row">
            <!-- HOTELES -->
            <a href="{{ route('hotel.index') }}">
                <div class="col-lg-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                            <i class="fa fa-building fa-5x"></i>
                        </div>
                        <div class="panel-footer">
                            <span class="pull-left">Hoteles</span>
                            <span class="pull-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a>
            <!-- USUARIOS -->
            {{-- <a href="{{ route('user.index') }}">
                <div class="col-lg-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="panel-footer">
                            <span class="pull-left">Usuarios</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a> --}}
            {{-- ZONAS --}}
            <a href="{{ route('zonas.index') }}">
                <div class="col-lg-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                            <i class="fa fa-bullseye fa-5x"></i>
                        </div>
                        <div class="panel-footer">
                            <span class="pull-left">Zonas</span>
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
