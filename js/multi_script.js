entra en la carpeta js y luego en el archivo multi_script.js alli borras todo y copias esto:

//Funcion slider index
var owl = $('.owl-carousel');
owl.owlCarousel({
    loop: true,
    margin: 25,
    autoplay: true,
    autoplayTimeout: 6000,
    autoplayHoverPause: false,
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        600: {
            items: 2,
            nav: true
        },
        760: {
            items: 3,
            nav: true,
        },
        1000: {
            items: 4,
            nav: true,
        }
    }
});


//Select tutores
$( "#s_tutor_uno" ).click(function() {
  $( "#tutor_uno" ).toggle();
  $( "#cerrar_tutor_uno" ).toggle();
  $( "#c_tutor_uno" ).toggle();
});


$( "#cerrar_tutor_uno" ).click(function() {
    $( "#tutor_uno" ).toggle();
    $( "#cerrar_tutor_uno" ).toggle();
    $( "#c_tutor_uno" ).toggle();
  });

//titulo dos
  $( "#s_tutor_dos" ).click(function() {
    $( "#tutor_dos" ).toggle();
    $( "#cerrar_tutor_dos" ).toggle();
    $( "#c_tutor_dos" ).toggle();
  });
  
  
  $( "#cerrar_tutor_dos" ).click(function() {
      $( "#tutor_dos" ).toggle();
      $( "#cerrar_tutor_dos" ).toggle();
      $( "#c_tutor_dos" ).toggle();
    });

//titulo tres
    $( "#s_tutor_tres" ).click(function() {
        $( "#tutor_tres" ).toggle();
        $( "#cerrar_tutor_tres" ).toggle();
        $( "#c_tutor_tres" ).toggle();
      });
      
      
      $( "#cerrar_tutor_tres" ).click(function() {
          $( "#tutor_tres" ).toggle();
          $( "#cerrar_tutor_tres" ).toggle();
          $( "#c_tutor_tres" ).toggle();
        });
  
 //Graficos

 
// Estudiantes | Tutor | Tesis
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'USUARIOS | TESIS'
    },
    tooltip: {
        pointFormat: '{series.name}: {point.y} <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Usuarios y Tesis',
        colorByPoint: true,
        data: [{
            name: 'Estudiantes',
            y: 20,
            sliced: true,
            selected: true
        }, {
            name: 'Tutores(as)',
            y: 30
        }, {
            name: 'Tesis aprobadas',
            y: 20
        }]
    }]
});


// Vicerrectorado | Tutor | Tesis
Highcharts.chart('container2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'USUARIOS | VICERRECTORADO'
    },
    tooltip: {
        pointFormat: '{series.name}: {point.y} <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Estudiantes',
        colorByPoint: true,
        data: [{
            name: 'VPDS',
            y: 30,
            sliced: true,
            selected: true
        }, {
            name: 'VPA',
            y: 10
        }, {
            name: 'VIPI',
            y: 15
        }, {
            name: 'VPDR',
            y: 7
        }]
    }]
});

// tesis por vicerrectorado
Highcharts.chart('container3', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'TESIS | VICERRECTORADO'
    },
    tooltip: {
        pointFormat: '{series.name}: {point.y} <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Tesis',
        colorByPoint: true,
        data: [{
            name: 'VPDS',
            y: 30,
            sliced: true,
            selected: true
        }, {
            name: 'VPA',
            y: 10
        }, {
            name: 'VIPI',
            y: 15
        }, {
            name: 'VPDR',
            y: 7
        }]
    }]
});