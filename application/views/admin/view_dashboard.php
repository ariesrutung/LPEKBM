<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/cylinder.js"></script>

<style>
  #container {
    height: 400px;
  }

  .highcharts-figure,
  .highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
  }

  .highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
  }

  .highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
  }

  .highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
  }

  .highcharts-data-table td,
  .highcharts-data-table th,
  .highcharts-data-table caption {
    padding: 0.5em;
  }

  .highcharts-data-table thead tr,
  .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
  }

  .highcharts-data-table tr:hover {
    background: #f1f7ff;
  }

  .card {
    position: relative;
    padding: 20px;
    border-radius: 8px;
    border: none;
    background: #fff;
    -webkit-box-shadow: 0 4px 6px 0 rgb(85 85 85 / 8%), 0 1px 20px 0 rgb(0 0 0 / 7%), 0px 1px 11px 0px rgb(0 0 0 / 7%);
    -moz-box-shadow: 0 4px 6px 0 rgba(85, 85, 85, 0.08), 0 1px 20px 0 rgba(0, 0, 0, 0.07), 0px 1px 11px 0px rgba(0, 0, 0, 0.07);
    box-shadow: 0 4px 6px 0 rgb(85 85 85 / 8%), 0 1px 20px 0 rgb(0 0 0 / 7%), 0px 1px 11px 0px rgb(0 0 0 / 7%);
  }

  .info-box-content {
    padding: 5px 10px;
    display: flex;
    flex-direction: column;
    margin: 0;
    position: relative;
    padding: 20px;
    border-radius: 8px;
    border: none;
    background: #fff;
    -webkit-box-shadow: 0 4px 6px 0 rgb(85 85 85 / 8%), 0 1px 20px 0 rgb(0 0 0 / 7%), 0px 1px 11px 0px rgb(0 0 0 / 7%);
    -moz-box-shadow: 0 4px 6px 0 rgba(85, 85, 85, 0.08), 0 1px 20px 0 rgba(0, 0, 0, 0.07), 0px 1px 11px 0px rgba(0, 0, 0, 0.07);
    box-shadow: 0 4px 6px 0 rgb(85 85 85 / 8%), 0 1px 20px 0 rgb(0 0 0 / 7%), 0px 1px 11px 0px rgb(0 0 0 / 7%);
  }

  .info-box-icon {
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
    display: block;
    float: left;
    height: 90px;
    width: 90px;
    text-align: center;
    font-size: 45px;
    line-height: 90px;
    background: transparent;
  }

  #container {
    height: 400px;
  }

  .highcharts-figure,
  .highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
  }

  .highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
  }

  .highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
  }

  .highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
  }

  .highcharts-data-table td,
  .highcharts-data-table th,
  .highcharts-data-table caption {
    padding: 0.5em;
  }

  .highcharts-data-table thead tr,
  .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
  }

  .highcharts-data-table tr:hover {
    background: #f1f7ff;
  }

  .layout-spacing {
    padding-bottom: 25px;
  }

  .layout-spacing {
    padding-bottom: 40px;
  }

  .col-12 {
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
  }

  .top-welcome {
    display: block;
    width: 100%;
    transition: all ease 0.5s;
  }

  .widget {
    position: relative;
    padding: 20px;
    border-radius: 8px;
    border: none;
    background: #fff;
    -webkit-box-shadow: 0 4px 6px 0 rgb(85 85 85 / 8%), 0 1px 20px 0 rgb(0 0 0 / 7%), 0px 1px 11px 0px rgb(0 0 0 / 7%);
    -moz-box-shadow: 0 4px 6px 0 rgba(85, 85, 85, 0.08), 0 1px 20px 0 rgba(0, 0, 0, 0.07), 0px 1px 11px 0px rgba(0, 0, 0, 0.07);
    box-shadow: 0 4px 6px 0 rgb(85 85 85 / 8%), 0 1px 20px 0 rgb(0 0 0 / 7%), 0px 1px 11px 0px rgb(0 0 0 / 7%);
  }

  .col-lg-4 {
    -ms-flex: 0 0 33.333333%;
    flex: 0 0 33.333333%;
    max-width: 33.333333%;
  }

  .align-self-center {
    -ms-flex-item-align: center !important;
    align-self: center !important;
  }

  @media (min-width: 992px) {
    .col-lg-5 {
      -ms-flex: 0 0 41.666667%;
      flex: 0 0 41.666667%;
      max-width: 41.666667%;
    }
  }

  .d-lg-flex {
    display: flex !important;
  }

  .align-items-end {
    -ms-flex-align: end !important;
    align-items: flex-end !important;
  }

  .justify-content-center {
    -ms-flex-pack: center !important;
    justify-content: center !important;
  }

  .flex-column {
    -ms-flex-direction: column !important;
    flex-direction: column !important;
  }

  .text-lg-center {
    text-align: center !important;
  }

  @media (min-width: 992px) {

    .mt-lg-0,
    .my-lg-0 {
      margin-top: 0 !important;
    }
  }

  .mt-4,
  .my-4 {
    margin-top: 1.5rem !important;
  }

  .row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
  }

  .col-3 {
    -ms-flex: 0 0 20%;
    flex: 0 0 20%;
    max-width: 20%;
  }

  .text-muted {
    color: #888ea8 !important;
  }

  .text-truncate {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  .widget h5 {
    font-weight: 700;
    font-size: 19px;
    letter-spacing: 0px;
    margin-bottom: 0;
    color: #515365;
  }

  .mb-0,
  .my-0 {
    margin-bottom: 0 !important;
  }

  .media {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: start;
    align-items: flex-start;
  }

  .mr-3,
  .mx-3 {
    margin-right: 1rem !important;
  }

  .align-self-center {
    -ms-flex-item-align: center !important;
    align-self: center !important;
  }

  .media-body {
    -ms-flex: 1;
    flex: 1;
  }

  .text-muted {
    color: #888ea8 !important;
  }

  .text-primary {
    color: #1e40af !important;
  }

  .mb-2,
  .my-2 {
    margin-bottom: 0.5rem !important;
  }

  .widget h5 {
    font-weight: 700;
    font-size: 19px;
    letter-spacing: 0px;
    margin-bottom: 0;
    color: #515365;
  }

  .mb-0,
  .my-0 {
    margin-bottom: 0 !important;
  }

  #container {
    height: 400px;
  }

  .highcharts-figure,
  .highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
  }

  .highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
  }

  .highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
  }

  .highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
  }

  .highcharts-data-table td,
  .highcharts-data-table th,
  .highcharts-data-table caption {
    padding: 0.5em;
  }

  .highcharts-data-table thead tr,
  .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
  }

  .highcharts-data-table tr:hover {
    background: #f1f7ff;
  }

  .bg-light-success {
    padding: 10px;
    margin: 5px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px 0 rgb(85 85 85 / 9%), 0 1px 2px 0 rgb(0 0 0 / 8%), 0px 1px 11px 0px rgb(0 0 0 / 6%);
    background-color: #dee6ff;
  }

  .avatar-xl {
    height: 5.25rem;
    width: 5.25rem;
  }

  .rounded-circle {
    border-radius: 50% !important;
  }

  .img-fluid {
    max-width: 100%;
    height: auto;
  }

  img {
    vertical-align: middle;
    border-style: none;
  }
</style>

<?php
if (!$this->session->userdata('id')) {
  redirect(base_url() . 'admin');
}
?>
<section class="content-header mb-2">
  <h1>Dasbor</h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing mt-4">
      <div class="widget top-welcome">
        <div class="f-100">
          <div class="row">
            <div class="col-lg-3">
              <div class="media">
                <div class="mr-3">

                  <?php if ($this->session->userdata('photo') == '') : ?>
                    <img src="<?php echo base_url(); ?>public/img/no-photo.jpg" class="user-image" alt="user photo">
                  <?php else : ?>
                    <img src="<?php echo base_url(); ?>public/uploads/<?php echo $this->session->userdata('photo'); ?>" class=" img-fluid avatar-xl rounded-circle" alt="user photo">
                  <?php endif; ?>

                  <span class="hidden-xs"><?php echo $this->session->userdata('full_name'); ?></span>
                  </a>
                  <!-- <img src="../../common-assets/img/profile-16.jpg" alt="" class="avatar-md rounded-circle img-thumbnail"> -->
                </div>
                <div class="align-self-center media-body">
                  <div class="text-muted">
                    <p class="mb-2 text-primary">Hi, Selamat Datang!</p>
                    <!-- <h5 class="mb-1"><?php // echo $this->session->userdata('role'); 
                                          ?></h5> -->
                    <!-- <h5 class="mb-1"><?php // echo 'Aries Rutung' 
                                          ?></h5> -->
                    <?php echo $this->session->userdata('user_name'); ?>
                    <p class="mb-2">System Developer</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="align-self-center col-lg-6">
              <div class="text-lg-center mt-lg-0">
                <div class="row">
                  <div class="col-3">
                    <div class="bg-light-success">
                      <p class="text-muted text-truncate mb-2">Berita</p>
                      <h5 class="mb-0"><?php echo $total_news; ?></h5>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="bg-light-success">
                      <p class="text-muted text-truncate mb-2">Kegiatan</p>
                      <h5 class="mb-0"><?php echo $total_event; ?></h5>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="bg-light-success">
                      <p class="text-muted text-truncate mb-2">Tim Kerja</p>
                      <h5 class="mb-0"><?php echo $total_team_member; ?></h5>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="bg-light-success">
                      <p class="text-muted text-truncate mb-2">Layanan</p>
                      <h5 class="mb-0"><?php echo $total_service; ?></h5>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="bg-light-success">
                      <p class="text-muted text-truncate mb-2">Pelanggan</p>
                      <h5 class="mb-0"><?php echo $total_client; ?></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-none d-lg-flex col-lg-3 align-items-end justify-content-center flex-column">
              <a class="btn btn-primary" href="<?php echo base_url(); ?>" target="_blank">Kunjungi Web</a>
              <!-- <button class="btn btn-info mt-2">
                My Chat
              </button> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- HighCharts -->
  <div class="row">
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="widget info-box">
        <figure class="highcharts-figure">
          <div id="container"></div>
        </figure>
      </div>
      </dv>
    </div>

    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="widget info-box">
        <figure class="highcharts-figure">
          <div id="container1"></div>
        </figure>
      </div>
    </div>

    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="widget info-box">
        <figure class="highcharts-figure">
          <div id="container2"></div>
        </figure>
      </div>
    </div>
  </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
  Highcharts.chart('container', {
    chart: {
      type: 'pie',
      options3d: {
        enabled: true,
        alpha: 45,
        beta: 0
      }
    },
    title: {
      text: 'Global smartphone shipments market share, Q1 2022',
      align: 'left'
    },
    subtitle: {
      text: 'Source: ' +
        '<a href="https://www.counterpointresearch.com/global-smartphone-share/"' +
        'target="_blank">Counterpoint Research</a>',
      align: 'left'
    },
    accessibility: {
      point: {
        valueSuffix: '%'
      }
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        depth: 35,
        dataLabels: {
          enabled: true,
          format: '{point.name}'
        }
      }
    },
    series: [{
      type: 'pie',
      name: 'Share',
      data: [
        ['Samsung', 23],
        ['Apple', 18],
        {
          name: 'Xiaomi',
          y: 12,
          sliced: true,
          selected: true
        },
        ['Oppo*', 9],
        ['Vivo', 8],
        ['Others', 30]
      ]
    }]
  });

  Highcharts.chart('container1', {
    chart: {
      type: 'cylinder',
      options3d: {
        enabled: true,
        alpha: 15,
        beta: 15,
        depth: 50,
        viewDistance: 25
      }
    },
    title: {
      text: 'Number of confirmed COVID-19'
    },
    subtitle: {
      text: 'Source: ' +
        '<a href="https://www.fhi.no/en/id/infectious-diseases/coronavirus/daily-reports/daily-reports-COVID19/"' +
        'target="_blank">FHI</a>'
    },
    xAxis: {
      categories: ['0-9', '10-19', '20-29', '30-39', '40-49', '50-59', '60-69', '70-79', '80-89', '90+'],
      title: {
        text: 'Age groups'
      }
    },
    yAxis: {
      title: {
        margin: 20,
        text: 'Reported cases'
      }
    },
    tooltip: {
      headerFormat: '<b>Age: {point.x}</b><br>'
    },
    plotOptions: {
      series: {
        depth: 25,
        colorByPoint: true
      }
    },
    series: [{
      data: [95321, 169339, 121105, 136046, 106800, 58041, 26766, 14291,
        7065, 3283
      ],
      name: 'Cases',
      showInLegend: false
    }]
  });

  Highcharts.chart('container2', {
    chart: {
      type: 'column',
      options3d: {
        enabled: true,
        alpha: 10,
        beta: 25,
        depth: 70
      }
    },
    title: {
      text: 'External trade in goods by country, Norway 2021',
      align: 'left'
    },
    subtitle: {
      text: 'Source: ' +
        '<a href="https://www.ssb.no/en/statbank/table/08804/"' +
        'target="_blank">SSB</a>',
      align: 'left'
    },
    plotOptions: {
      column: {
        depth: 25
      }
    },
    xAxis: {
      categories: ['Belgium', 'China', 'Denmark', 'Fiji', 'Germany', 'Netherlands', 'Russia',
        'Sweden', 'Turkey', 'United States', 'Unspecified', 'Vietnam'
      ],
      labels: {
        skew3d: true,
        style: {
          fontSize: '16px'
        }
      }
    },
    yAxis: {
      title: {
        text: 'NOK (million)',
        margin: 20
      }
    },
    tooltip: {
      valueSuffix: ' MNOK'
    },
    series: [{
      name: 'Total imports',
      data: [16076, 112688, 39452, 0, 94352,
        30495, 21813, 95908, 11596, 53771, null, 8270
      ]
    }]
  });
</script>