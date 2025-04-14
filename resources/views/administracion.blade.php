@extends ('layouts.boxed')

@section ('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><strong>ADMINISTRACIÓN</strong></h3>
    </div>
    <div class="box-body">
        <div class="row">
            {{-- ZONAS Y PRECIOS --}}
            <a href="{{ route('zonas.index') }}">
                <div class="col-lg-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center" style="display: inline-flex;width: 100%;justify-content: center;">
                            <i class="fas fa-map-marked-alt fa-5x" style="margin-right:10px"></i>
                            <i class="fas fa-money-check-alt fa-5x"></i>
                        </div>
                        <div class="panel-footer">
                            <span class="pull-left">Zonas y Precios</span>
                            <span class="pull-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a>
            {{-- TOURS --}}
            <a href="{{ route('tours.index') }}">
                <div class="col-lg-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                            <i class="fa fa-church fa-5x" aria-hidden="true"></i>
                        </div>
                        <div class="panel-footer">
                            <span class="pull-left">Tours</span>
                            <span class="pull-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a>

            {{-- UNIDADES --}}
            <a href="{{  route('units.index')}}">
                <div class="col-lg-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                            <i class="fa fa-shuttle-van fa-5x"></i>
                        </div>
                        <div class="panel-footer">
                            <span class="pull-left">Unidades</span>
                            <span class="pull-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a>

            {{-- USUARIOS --}}
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
