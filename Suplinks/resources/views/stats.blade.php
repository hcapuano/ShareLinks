@extends('layouts.app')

@section('content')
    <div class="content">
        @guest
            {{redirect()->route('login')}}
        @endguest
        @auth   <!-- Si la personne est connectée, alors on affiche le contenu -->
            <!-- Affiche le nom du lien -->
            <div class="row justify-content-md-center">
                <div class="col-12 text-center mt-3">
                    <h1 class="text-capitalize">{{$link -> name}}</h1>
                </div>
            </div>

            <div class="row justify-content-md-center my-5 py-5">
                <!-- Affiche le nombre de click total du lien -->
                <div class="col-md-auto col-sm-12 mx-2 clickStat">
                    <i class="icon-mouse-pointer iconStat"></i>
                    {{$link->clicks}}
                </div>

                <!-- Affiche le nom de l'url original -->
                <div class="col-md-auto col-sm-12 mx-2 clickStat">
                    <i class="icon-link iconStat"></i>
                    <a href={{$link->url}}>
                        {{$link->url}}
                    </a>
                </div>

                <!-- Affiche le nom du nouvel url -->
                <div class="col-md-auto col-sm-12 mx-2 clickStat">
                    <i class="icon-cloudapp iconStat"></i>
                    <a href={{'/'.$idLink}}>
                        {{$_SERVER['SERVER_NAME'].'/'.$idLink}}
                    </a>
                </div>
            </div>
            <div class="col-12 text-center mt-3">
                <small>Statistiques</small>
            </div>
            <!-- Graph des clicks au corus du temps(1 semaine) -->
            <div class="row justify-content-md-center my-1">
                <div id="columnchart_material" class="col-md-10 col-sm-12 w-100" style="height: 500px;"></div>
            </div>

            <div class="row justify-content-md-center my-1">
                <!-- Camembert sur les lien de référence -->
                <div id="refererChart" class="col-md-5 col-sm-12 w-100 px-0" style="height: 500px;"></div>
                <!-- Camembert sur les les pays d'où à été cliqué le lien -->
                <div id="countryChart" class="col-md-5 col-sm-12 w-100 px-0 border-left" style="height: 500px;"></div>
            </div>

            <!-- Tableaux sur les lien de références et pays -->
            <div class="row justify-content-md-center my-1">
                <div class="col-md-5 px-0">
                    <table class="w-100">
                        <tr class="border" style="background-color: #eeeeee">
                            <td class="border-right">Referer <i class="icon-server offset-1"></i></td>
                            <td class="border-right">Clicks <i class="icon-mouse-pointer offset-1"></i></td>
                        </tr>
                        @foreach ($referers as $referer)
                            <tr class="border">
                                <td class="border-right">{{$referer->reffer}}</td>
                                <td class="border-right">{{$referer->clicks}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-md-5 px-0">
                    <table class="w-100">
                        <tr class="border" style="background-color: #eeeeee">
                            <td class="border-right">Country <i class="icon-globe offset-1"></i></td>
                            <td class="border-right">Clicks <i class="icon-mouse-pointer offset-1"></i></td>
                        </tr>
                        @foreach ($countries as $country)
                            <tr class="border">
                                <td class="border-right">{{$country->country}}</td>
                                <td class="border-right">{{$country->clicks}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <!-- Utilisation de google chart pour les graphs -->
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <!-- Graph clicks -->
            <script type="text/javascript">
                google.charts.load('current', {'packages':['bar']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([  //Déssine le graph en fonction du tableau de valeurs
                        ['Date', 'Clicks'],
                        @foreach($clicks as $click)
                        <?php echo "['".$click -> date."', ".$click -> clicks."],"; ?>
                        @endforeach
                    ]);

                    var options = { //Titres
                        chart: {
                            title: 'URL performance',
                            subtitle: 'Clicks during the last 7 days'
                        }
                    };

                    //Création du graph à l'endroit où il y a l'id correspondant
                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                    //Dessine le graph voulu
                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }
            </script>

            <!-- Camembert lien de référence, même fonctionnement -->
            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['reffer', 'clicks'],
                        @foreach ($referers as $referer)
                        <?php echo "['".$referer -> reffer."', ".$referer->clicks."],"; ?>
                        @endforeach
                    ]);

                    var options = {
                        title: 'REFERER',
                        is3D:true
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('refererChart'));

                    chart.draw(data, options);
                }
            </script>

            <!-- Camembert pays de référence, même fonctionnement -->
            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['country', 'clicks'],
                        @foreach($countries as $country)
                        <?php echo "['".$country -> country."', ".$country->clicks."],"; ?>
                        @endforeach
                    ]);

                    var options = {
                        title: 'COUNTRY',
                        is3D:true
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('countryChart'));

                    chart.draw(data, options);
                }
            </script>
        @endauth
    </div>
@endsection