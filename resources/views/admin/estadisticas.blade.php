@extends('admin.main')

@section('title', 'Estadisticas')

@section('css')
    <!--  Chartist SASS    -->
    <link href="{{asset('plugin/chartist/sass/_chartist.scss')}}" rel="text/css"/>
@endsection

@section('content')

    
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="red">
                    <h4 class="title">Estadisticas de ventas</h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="margin-top: 20px !important;">
                                <div class="card-header card-chart" data-background-color="orange">
                                    <div class="ct-chart" id="chart1"></div>
                                </div>
                                <div class="card-content">
                                        
                                    <h4 class="title">Ventas por año</h4>
                                    <p class="category">
                                        <span class="text-success">
                                            <i class="fa fa-long-arrow-up"></i> 55%
                                        </span>
                                        increase in today sales.
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">access_time</i> updated 4 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card" style="margin-top: 20px !important;">
                                <div class="card-header card-chart" data-background-color="orange">
                                    <div class="ct-chart" id="chart2"></div>
                                </div>
                                <div class="card-content">
                                    <h4 class="title">Ventas por mes</h4>
                                    <p class="category">Last Campaign Performance</p>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">access_time</i> campaign sent 2 days ago
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card" style="margin-top: 20px !important;">
                                <div class="card-header card-chart" data-background-color="orange">
                                    <div class="ct-chart" id="chart3"></div>
                                </div>
                                <div class="card-content">
                                    <h4 class="title">Ventas por Categoria</h4>
                                    <p class="category">Last Campaign Performance</p>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">access_time</i> campaign sent 2 days ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection

@section('script')
            <script src={{asset('plugin/chartist/js/chartist.min.js')}} type="text/javascript"></script>
            {{-- <script src={{asset('js/admin/estadisticas.js')}} type="text/javascript"></script> --}}

            <script>
                <!--  Chartist Plugin -->
                //new Chartist.line('#chart1', data);
                var myvar = <?php echo json_encode($serie); ?>;



                
                
                var ejemplo = new Chartist.Line('#chart1', {
                    labels: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
                    /*series: [[myvar]]*/
                    series: [[0, 3, 2, 8, 10]]
                });

                

                //var ventas_anuales = new Chartist.Line('#chart1',data)
                new Chartist.Bar('#chart2', {
                    labels: ['categoria 1', 'categoria 2'],
                    series: [[5, 2, ]]
                });
                new Chartist.Line('#chart3', {
                    labels: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
                    series: [
                        [5, 9, 7, 8, 5, 3, 5, 4,5, 3, 5, 4,8]
                    ]
                }, {
                    low: 0,
                    showArea: true
                });

                /*grafico_anual.updated({
                    labels: ['asd enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
                    series: [[0, 0, 0, 0, 0,0,0,0]] 

                });*/

            </script>
@endsection