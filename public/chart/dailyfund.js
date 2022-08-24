var options =
{
    chart: {
        type: '{!! $chart->type() !!}',
        height: {!! $chart->height() !!},
        width: '{!! $chart->width() !!}',
        toolbar: {!! $chart->toolbar() !!},
        zoom: {!! $chart->zoom() !!},
        fontFamily: '{!! $chart->fontFamily() !!}',
        foreColor: '{!! $chart->foreColor() !!}'
    },
    plotOptions: {
        bar: {!! $chart->horizontal() !!},
        pie: {
            donut: {
                size: '70%',
                labels: {
                    show: true,
                    total: {
                        show: true,
                        showAlways: false,
                        label: 'Total',
                        fontSize: '22px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 600,
                        color: '#373d3f',
                        formatter: function (w) {
                            return w.globals.seriesTotals.reduce((a, b) => {
                            return a + b
                            }, 0)
                        }
                    }
                }
            }
        }
    },
    colors: {!! $chart->colors() !!},
    series: {!! $chart->dataset() !!},
    dataLabels: {!! $chart->dataLabels() !!},
    @if($chart->labels())
        labels: {!! json_encode($chart->labels(), true) !!},
    @endif
    title: {
        text: "{!! $chart->title() !!}"
    },
    subtitle: {
        text: '{!! $chart->subtitle() !!}',
        align: '{!! $chart->subtitlePosition() !!}'
    },
    xaxis: {
        categories: {!! $chart->xAxis() !!}
    },
    grid: {!! $chart->grid() !!},
    markers: {!! $chart->markers() !!},
    @if($chart->stroke())
        stroke: {!! $chart->stroke() !!},
    @endif
}

var chart = new ApexCharts(document.querySelector("#{!! $chart->id() !!}"), options);
chart.render();

