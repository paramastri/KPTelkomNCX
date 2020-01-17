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

            <ul style="margin-top: 40px;  margin-left: 90px; margin-right: 50%;" class="list-group">
                <li class="list-group-item list-group-item-primary">Nama CC : {{data.nama_cc}}</li>
                <li class="list-group-item list-group-item-primary">Nama Pekerjaan : {{data.nama_pekerjaan}}</li>
                <li class="list-group-item list-group-item-primary">Mitra : {{data.mitra}}</li>
                <li class="list-group-item list-group-item-primary">Nilai NRC : {{data.nilai_nrc}}</li>
                <li class="list-group-item list-group-item-primary">Nilai MRC : {{data.nilai_mrc}}</li>
                <li class="list-group-item list-group-item-primary">Status NCX : {{data.status_ncx}}</li>
                <li class="list-group-item list-group-item-primary">No Quote : {{data.no_quote}} </li>
                <li class="list-group-item list-group-item-primary">Tipe Order : 
                    {% if (data.tipe_order == 1) %}
                    Connectivity
                    {% elseif (data.tipe_order == 2) %}
                    CPE
                    {% endif %}</li>

                {% if (data.tipe_order == 1) %}
                    {% if (dataco) %}
                        <li class="list-group-item list-group-item-primary">No Agreement : {{dataco.no_agreement_con}}</li>
                        <li class="list-group-item list-group-item-primary">No Order : {{dataco.no_order_con}}</li>
                        <li class="list-group-item list-group-item-primary">Baso : 
                        {% if (dataco.baso_con == 1) %}
                        OK
                        {% elseif (dataco.baso_con == 2) %}
                        Belum OK
                        {% endif %}
                        </li>
                        <li class="list-group-item list-group-item-primary">Jenis Termin : 
                        {% if (dataco.jenis_termin_con == 1) %}
                        Termin
                        {% elseif (dataco.jenis_termin_con == 2) %}
                        Non termin
                        {% endif %}
                        </li>

                        {% if (dataco.jenis_termin_con == 1) %}
                            <li class="list-group-item list-group-item-primary">Billing Nol : {{dataco.billing_nol_con}}</li>
                            <li class="list-group-item list-group-item-primary">Billing Complete : {{dataco.billing_com_con}}</li>
                            <li class="list-group-item list-group-item-primary">Asset : {{dataco.asset_con}}</li>
                            <li class="list-group-item list-group-item-primary">Approval SM :
                            {% if (dataco.approval_sm_con == 1) %}
                            OK
                            {% elseif (dataco.approval_sm_con == 2) %}
                            Belum OK
                            {% endif %}
                            </li>
                            <li class="list-group-item list-group-item-primary">Approval UBC : 
                            {% if (dataco.approval_ubc_con == 1) %}
                            OK
                            {% elseif (dataco.approval_ubc_con == 2) %}
                            Belum OK
                            {% endif %}
                            </li>
                        {% elseif (dataco.jenis_termin_con == 2) %}
                            <li class="list-group-item list-group-item-primary">Billing Complete : {{dataco.billing_com_con}}</li>
                        {% endif %}
                    {% endif %}
                {% elseif (data.tipe_order == 2) %}
                    {% if (datacpe) %}
                        <li class="list-group-item list-group-item-primary">Dokumen P6 : 
                            {% if (datacpe.dok_p6 == 1) %}
                            OK
                            {% elseif (datacpe.dok_p6 == 2) %}
                            Belum OK
                            {% endif %}
                        </li>
                        <li class="list-group-item list-group-item-primary">Dokumen P8 : 
                            {% if (datacpe.dok_p8 == 1) %}
                            OK
                            {% elseif (datacpe.dok_p8 == 2) %}
                            Belum OK
                            {% endif %}
                        </li>
                        <li class="list-group-item list-group-item-primary">Dokumen KL WO : 
                            {% if (datacpe.dok_kl_wo == 1) %}
                            OK
                            {% elseif (datacpe.dok_kl_wo == 2) %}
                            Belum OK
                            {% endif %}
                        </li>
                        <li class="list-group-item list-group-item-primary">Approval SM CRM :
                            {% if (datacpe.approval_sm_crm == 1) %}
                            OK
                            {% elseif (datacpe.approval_sm_crm == 2) %}
                            Belum OK
                            {% endif %}
                        </li>
                        <li class="list-group-item list-group-item-primary">No Agreement : {{datacpe.no_agreement}}</li>
                        <li class="list-group-item list-group-item-primary">No Order : {{datacpe.no_order}}</li>
                        <li class="list-group-item list-group-item-primary">WFM Mitra : 
                            {% if (datacpe.wfm_mitra == 1) %}
                            OK
                            {% elseif (datacpe.wfm_mitra == 2) %}
                            Belum OK
                            {% endif %}
                        </li>
                        <li class="list-group-item list-group-item-primary">Approval WFM : 
                            {% if (datacpe.approval_wfm == 1) %}
                            OK
                            {% elseif (datacpe.approval_wfm == 2) %}
                            Belum OK
                            {% endif %}
                        </li>
                        <li class="list-group-item list-group-item-primary">Status NDE : 
                            {% if (datacpe.status_nde == 1) %}
                            OK
                            {% elseif (datacpe.status_nde == 2) %}
                            Belum OK
                            {% endif %}
                        </li>
                        <li class="list-group-item list-group-item-primary">Approval DES : 
                            {% if (datacpe.approval_des == 1) %}
                            OK
                            {% elseif (datacpe.approval_des == 2) %}
                            Belum OK
                            {% endif %}
                        </li>
                        <li class="list-group-item list-group-item-primary">Baso : 
                            {% if (datacpe.baso == 1) %}
                            OK
                            {% elseif (datacpe.baso == 2) %}
                            Belum OK
                            {% endif %}
                        </li>
                        <li class="list-group-item list-group-item-primary">Jenis Termin : 
                            {% if (datacpe.jenis_termin == 1) %}
                            OK
                            {% elseif (datacpe.jenis_termin == 2) %}
                            Belum OK
                            {% endif %}
                        </li>

                        {% if (datacpe.jenis_termin == 1) %}
                            <li class="list-group-item list-group-item-primary">Billing Nol : {{datacpe.billing_nol}}</li>
                            <li class="list-group-item list-group-item-primary">Billing Complete : {{datacpe.billing_com}}</li>
                            <li class="list-group-item list-group-item-primary">Asset : {{datacpe.asset}}</li>
                            <li class="list-group-item list-group-item-primary">Approval SM :
                            {% if (datacpe.approval_sm == 1) %}
                            OK
                            {% elseif (datacpe.approval_sm == 2) %}
                            Belum OK
                            {% endif %}
                            </li>
                            <li class="list-group-item list-group-item-primary">Approval UBC : 
                            {% if (datacpe.approval_ubc == 1) %}
                            OK
                            {% elseif (datacpe.approval_ubc == 2) %}
                            Belum OK
                            {% endif %}
                            </li>
                        {% elseif (datacpe.jenis_termin == 2) %}
                            <li class="list-group-item list-group-item-primary">Billing Complete : {{datacpe.billing_com}}</li>
                        {% endif %}
                    {% endif %}
                {% endif %}</li>
            </ul>

            <a value = "" style="margin-top: 30px; margin-bottom: 0px; margin-left: 420px; color: white;" type="submit" class="btn btn-primary">Selanjutnya</a>

            <!-- <h2 style="margin-top: 30px; margin-left: 20px;">Detail</h2> -->
           

        </div>


</body>

</html>