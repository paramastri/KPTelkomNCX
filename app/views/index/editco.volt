<!DOCTYPE html>
<html>

<head>
    <title>Progres NCX</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="icon" href="../favicon.png" type="png" sizes="16x16">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../style5.css">


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>



    <script>
        $(function() {

            $(".dropdown-menu").on('click', 'a', function() {
                $(".btn:first-child").text($(this).text());
                $(".btn:first-child").val($(this).text());
            });

        });

        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });

        

        function ShowHideDiv() {
        var ddlPassport = document.getElementById("ddlPassport");
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = ddlPassport.value == "1" ? "block" : "none";
        dvPassport2.style.display = ddlPassport.value == "2" ? "block" : "none";
        }

        function ShowHideDivTer() {
            var ddlPassport = document.getElementById("ddlPassportTer");
            var dvPassport = document.getElementById("dvPassportTer");
            dvPassportTer.style.display = ddlPassport.value == "1" ? "block" : "none";
            dvPassportTer2.style.display = ddlPassport.value == "2" ? "block" : "none";
        }

        function ShowHideDivTerr() {
            var ddlPassport = document.getElementById("ddlPassportTerr");
            var dvPassport = document.getElementById("dvPassportTerr");
            dvPassportTerr.style.display = ddlPassport.value == "1" ? "block" : "none";
            dvPassportTerr2.style.display = ddlPassport.value == "2" ? "block" : "none";
        }
    </script>

</head>



<body>


    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <img style="height: 100px; margin-top: 30px;" src="../logo.png" class="rounded mx-auto d-block">
            <div class="sidebar-header">
            <h6 style="text-align: center; color: black; background-color: white; border-radius: 30px; width: 90%; font-size: 12pt;">Website Progres NCX</h6>
            </div>


            <ul style="margin-left: 10px; margin-top: 30px;" class="list-unstyled">

                <li>
                    <a href="{{ url('') }}">Form</a>
                </li>
                <li>
                    <a href="{{ url('data') }}">Data</a>
                </li>
            </ul>




        </nav>



        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="">

                    <button style="margin-right: 30px;" type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <h2 style="font-family:'GothamRounded-Medium'; float: right;">Form Progres NCX</h2>
                    <!--  <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button> -->



                </div>
            </nav>

            <body>
    <div class="container">
        <div id="rootwizard">
    <div class="navbar">
      <div class="navbar-inner">
        <div class="container">
    <ul>
        <li><a href="#tab1" data-toggle="tab">No Agreement</a></li>
        <li><a href="#tab2" data-toggle="tab">No Order</a></li>
        <li><a href="#tab3" data-toggle="tab">BASO</a></li>
        <li><a href="#tab4" data-toggle="tab">Termin/Non</a></li>

    </ul>
     </div>
      </div>
    </div>
    <div id="bar" class="progress">
      <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
    </div>
<form action="{{ url("storeco") }}" method="post">
    <div style="width: 30%; margin: 0 auto;" class="tab-content">

        <div class="tab-pane" id="tab1">
      
                <div class="form-group">
                    <label style="margin-top: 15px;">No Agreement</label>
                    <input type="hidden" name="id_ncx" value="{{data.id_ncx}}">
                    <input  type="text" class="form-control" placeholder="Masukkan Nomor Order" name="no_agreement_con" value="{{data.no_agreement_con}}">
                </div>
        </div>


        <div class="tab-pane" id="tab2">
                <div class="form-group">
                    <label style="margin-top: 15px;">No Order</label>
                    <input  type="text" class="form-control" placeholder="Masukkan Nomor Order" name="no_order_con" value="{{data.no_order_con}}">
                </div>
        </div>



        <div class="tab-pane" id="tab3">
                <div>
                    <label style="margin-top: 15px;">BASO</label>
                </div>
                <select name="baso_con" class="form-control form-control-sm" style="width: 100%;" >
                    {% if (data.baso_con == 1) %}
                        <option value="0"></option>
                        <option value="1" selected>OK</option>
                        <option value="2">Belum OK</option>
                    {% elseif (data.baso_con == 2) %}
                        <option value="0"></option>
                        <option value="1">OK</option>
                        <option value="2" selected>Belum OK</option>
                    {% else %}
                        <option value="0"></option>
                        <option value="1">OK</option>
                        <option value="2">Belum OK</option>
                    {% endif %}
                  
                </select> 

                <input type="hidden" name="1" value="1">

                <div class="form-group">
                    <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                    <input class="form-control" name="kendala1" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" value="{{kendalas[0].kendala}}"></textarea>
                </div>
        </div>

        <div class="tab-pane" id="tab4">
                <div>
                    <label>Termin/Non</label>
                </div>

                <select name="jenis_termin_con" class="form-control form-control-sm" style="width: 100%;" >
                  {% if (data.jenis_termin_con == 1) %}
                    <option value="0"></option>
                    <option value="1" selected>Termin</option>
                    <option value="2">Non Termin</option>
                {% elseif (data.jenis_termin_con == 2) %}
                    <option value="0"></option>
                    <option value="1">Termin</option>
                    <option value="2" selected>Non Termin</option>
                {% else %}
                    <option value="0"></option>
                    <option value="1">Termin</option>
                    <option value="2">Non Termin</option>
                {% endif %}
                  
                </select>

               <!-- <div class="form-group">
                    <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                    <textarea class="form-control" name="kendala" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" ></textarea>
                </div> -->

        </div>
     


        <!-- <ul class="pager wizard">
            <li class="previous first" style="display:none;"><a href="#">First</a></li>
            <li class="previous"><a href="#">Previous</a></li>
            <li class="next last" style="display:none;"><a href="#">Last</a></li>
            <li class="next"><a href="#">Next</a></li>
        </ul> -->
        <div style="margin-top: 30px;">
            <button value="" style="margin: 0 auto;" type="submit" class="btn btn-success">Simpan</button>
        </div>
    </div>
</form>

</div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="../jquery.bootstrap.wizard.js"></script>
    <script>
        $(document).ready(function() {
    $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index+1;
        var $percent = ($current/$total) * 100;
        $('#rootwizard .progress-bar').css({width:$percent+'%'});
    }});
});
    </script>
  </body>


  


</body>

</html>