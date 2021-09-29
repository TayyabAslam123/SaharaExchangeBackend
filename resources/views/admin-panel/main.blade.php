      
    @extends('admin-panel.layout.master')
     
    @section('style')
    @include('admin-panel.includes.highcharts-style')
    @endsection 
    
    @section('content')
          
  
      <!-- ============================================================== -->
       <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title"><b>WELCOME TO SAHARA EXCHANGE ADMIN PANEL ! </b></h2>
                
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader  -->
    <!-- ============================================================== -->
    <div class="ecommerce-widget">

        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Total<br>Buyers / Sellers</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{$user_count}}</h1>
                        </div>
                      
                    </div>
 
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Total<br>Listings</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{$listing_count}}</h1>
                        </div>
                      
                    </div>
                
                </div>
            </div>

               
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Total<br>Revenue (last 30 Days)</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">$ {{$total_revenue}}</h1>
                        </div>
                      
                    </div>
                  
                </div>
            </div>
          
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Total<br>Businesses Deals (last 30 Days)</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{$total_deals}}</h1>
                        </div>
                      
                    </div>
                  
                </div>
            </div>
        </div>

        
<!--CHARTS START-->
<div class="jumbotron">
    <div class="container">
      <div class="row ">
        <div class="col-md-6 border-3 border-top border-top-primary">
          <figure class="highcharts-figure">
            <div id="g1"></div>
            <p class="highcharts-description">
              <b> Chart showing listing count, according to industries.</b>
            </p>
          </figure>
        </div>
    
        <div class="col-md-6 border-3 border-top border-top-primary">
            <figure class="highcharts-figure">
              <div id="g3"></div>
              <p class="highcharts-description">
                <b> Chart showing listings uploaded on sahara (month wise report).</b>
              </p>
            </figure>
          </div>
      </div>
    </div>
  </div>

  <div class="jumbotron">
    <div class="container">
      <div class="row">
        <div class="col-md-6 border-3 border-top border-top-primary">
          <figure class="highcharts-figure">
            <div id="g2"></div>
            <p class="highcharts-description">
              <b> Chart showing listing count , according to monetization.</b>
            </p>
          </figure>
        </div>
    
        <div class="col-md-6 border-3 border-top border-top-primary">
            <figure class="highcharts-figure">
              <div id="g4"></div>
              <p class="highcharts-description">
                <b> Chart showing users joined sahara (month wise report).</b>
              </p>
            </figure>
          </div>
      </div>
    </div>
  </div>

  <script>
    $( function() {
      var dateFormat = "mm/dd/yy",
        from = $( "#from" )
          .datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
          })
          .on( "change", function() {
            to.datepicker( "option", "minDate", getDate( this ) );
          }),
        to = $( "#to" ).datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          from.datepicker( "option", "maxDate", getDate( this ) );
        });
    
      function getDate( element ) {
        var date;
        try {
          date = $.datepicker.parseDate( dateFormat, element.value );
        } catch( error ) {
          date = null;
        }
    
        return date;
      }
    } );
  </script>
  <!--GRAPH FOR STATUS OF USERS-->
  <script>
    // Build the chart
    Highcharts.chart('g1', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Listings Industry Wise'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
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
            name: 'Industry ',
            colorByPoint: true,
            data: [
                
        //PLACING DATA IN GRAPH        
        <?php foreach($listing_industry_arr as $key => $value){ ?>
               {
                name: '{{$key}}',
                y: {!! $value !!},
                },
        <?php }?>
        //END
    
            ]
        }]
    });
  

      // Build the chart
      Highcharts.chart('g2', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Listings Monetization Wise'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
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
            name: 'Monetization ',
            colorByPoint: true,
            data: [
                
        //PLACING DATA IN GRAPH        
        <?php foreach($listing_monetization_arr as $key => $value){ ?>
               {
                name: '{{$key}}',
                y: {!! $value !!},
                },
        <?php }?>
        //END
    
            ]
        }]
    });

    // Create the chart
    Highcharts.chart('g3', {
          chart: {
              type: 'column'
          },
          title: {
              text: 'New Listings Added With Sahara , (Month Wise)'
          },
          subtitle: {
              text: ' '
          },
          accessibility: {
              announceNewData: {
                  enabled: true
              }
          },
          xAxis: {
              type: 'category'
          },
          yAxis: {
              title: {
                  text: 'Total Listings'
              }
      
          },
          legend: {
              enabled: false
          },
          plotOptions: {
              series: {
                  borderWidth: 0,
                  dataLabels: {
                      enabled: true,
                      pointFormat: '<b>{point.y:1f}</b>',
                  }
              }
          },
      
          tooltip: {
              headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
              pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:1f}</b> of total<br/>'
          },
      
          series: [
              {
                  name: "listings",
                  colorByPoint: true,
                  data: [
      
                             
          //PLACING DATA IN GRAPH        
          <?php foreach($listings as $key => $value){ ?>
                 {
                  name: '{{$value->month}}',
                  y: {!! $value->total !!},
                  },
          <?php }?>
          //END
      
                  ]
              }
          ]
         
      });
      
      // GRAPH END



    // Create the chart
    Highcharts.chart('g4', {
          chart: {
              type: 'column'
          },
          title: {
              text: 'New Users joined Sahara , (Month Wise)'
          },
          subtitle: {
              text: ' '
          },
          accessibility: {
              announceNewData: {
                  enabled: true
              }
          },
          xAxis: {
              type: 'category'
          },
          yAxis: {
              title: {
                  text: 'Total Users'
              }
      
          },
          legend: {
              enabled: false
          },
          plotOptions: {
              series: {
                  borderWidth: 0,
                  dataLabels: {
                      enabled: true,
                      format: '{point.y:1f}'
                  }
              }
          },
      
          tooltip: {
              headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
              pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:1f}</b> of total<br/>'
          },
      
          series: [
              {
                  name: "users",
                  colorByPoint: true,
                  data: [
      
                             
          //PLACING DATA IN GRAPH        
          <?php foreach($users as $key => $value){ ?>
                 {
                  name: '{{$value->month}}',
                  y: {!! $value->total !!},
                  },
          <?php }?>
          //END
      
                  ]
              }
          ]
         
      });
      
      // GRAPH END

  </script>

        @endsection