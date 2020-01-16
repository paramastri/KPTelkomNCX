<!DOCTYPE html>
<html>

<head>
    <title>Progres NCX</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" href="../favicon.png" type="png" sizes="16x16">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../style5.css">

    <!-- tabulator -->
    <link href="{{ url("tabulator.min.css") }}" rel="stylesheet">
    <script src="{{ url("tabulator.min.js") }}"></script>


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
            <h6 style="text-align: center; color: black; background-color: white; border-radius: 30px; width: 90%;">Website Progres NCX</h6>
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
                    <h2 style="font-family:'GothamRounded-Medium'; float: right;">Detail Progres NCX</h2>
                    <!--  <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button> -->



                </div>
            </nav>

            <!-- <h2 style="margin-top: 30px; margin-left: 20px;">Detail</h2> -->

            <div class="container">
                <div class="row">
                    <div class="col-sm">
                       <!-- <ul style="margin-top: 40px;  margin-left: 90px; margin-right: 50%; col-" class="list-group"> -->
                            <li class="list-group-item list-group-item-warning">Nama CC: {{data.nama_cc}}</li>
                            <li class="list-group-item list-group-item-warning">Nama Pekerjaan: {{data.nama_pekerjaan}}</li>
                            <li class="list-group-item list-group-item-warning">Mitra: {{data.mitra}}</li>
                            <li class="list-group-item list-group-item-warning">Nilai NRC: {{data.nilai_nrc}}</li>
                            <li class="list-group-item list-group-item-warning">Nilai MRC: {{data.nilai_mrc}}</li>
                            <li class="list-group-item list-group-item-warning">Status NCX: {{data.status_ncx}}</li>
                            <li class="list-group-item list-group-item-warning">No Quote: {{data.no_quote}}</li>
                            <li class="list-group-item list-group-item-warning">Tipe Order: 
                            {% if (data.tipe_order == 1) %}
                            Connectivity
                            {% elseif (data.tipe_order == 2) %}
                            DITOLAK
                            {% else %}
                            CPE
                            {% endif %}
                            </li>
                            <!-- <li class="list-group-item list-group-item-warning">No Agreement Conectivity: </li> -->
                        <!-- </ul> -->
                    </div>
                    <div class="col-sm">
                            <li class="list-group-item list-group-item-warning">Status NCX:</li>
                            <li class="list-group-item list-group-item-warning">No Quote:</li>
                            <li class="list-group-item list-group-item-warning">No Agreement:</li>
                            <li class="list-group-item list-group-item-warning">Kendala:</li>
                            <li class="list-group-item list-group-item-warning">Tipe Order:</li>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>