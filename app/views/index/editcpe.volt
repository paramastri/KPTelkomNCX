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
                    <a href="{{ url('indexbaru') }}">Form</a>
                </li>
                <li>
                    <a href="{{ url('data') }}">Data</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">{{ session.get('admin')['username'] }}</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{ url('logout') }}">Keluar</a>
                        </li>
                    </ul>
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

            <div>
                <h4 style="font-family:'GothamRounded-Medium'; margin-left: 70px;">No Order: {{data.no_order}}</h4>
                <h4 style="font-family:'GothamRounded-Medium'; margin-left: 70px; margin-bottom: 30px;">No Quote:
                {{dataumum.no_quote}}</h4>
            </div>


            <body>

<div>

    <div class="container" >
        <div id="rootwizard">
    <div class="navbar">
      <div class="navbar-inner">
        <div class="container">

    <ul>

        {% if (data.dok_p6 != "1" AND data.dok_p6 != "2") %}
        <li><a href="#tab1" data-toggle="tab">DOK P6</a></li>
        {% else %}
        <li><a href="#tab1" data-toggle="tab" style="background-color: #57cf6d">DOK P6</a></li>
        {% endif %}

        {% if (data.dok_p8 != "1" AND data.dok_p8 != "2") %}
        <li><a href="#tab2" data-toggle="tab">DOK P8</a></li>
        {% else %}
        <li><a href="#tab2" data-toggle="tab" style="background-color: #57cf6d">DOK P8</a></li>
        {% endif %}

        {% if (data.dok_kl_wo != "1" AND data.dok_kl_wo != "2") %}
        <li><a href="#tab3" data-toggle="tab">DOK KL/WO</a></li>
        {% else %}
        <li><a href="#tab3" data-toggle="tab" style="background-color: #57cf6d">DOK KL/WO</a></li>
        {% endif %}

        {% if (data.no_agreement == "") %}
        <li><a href="#tab4" data-toggle="tab">No Agreement</a></li>
        {% else %}
        <li><a href="#tab4" data-toggle="tab" style="background-color: #57cf6d">No Agreement</a></li>
        {% endif %}

        {% if (data.approval_sm_crm != "1" AND data.approval_sm_crm != "2") %}
        <li><a href="#tab5" data-toggle="tab">DOK SM/CRM</a></li>
        {% else %}
        <li><a href="#tab5" data-toggle="tab" style="background-color: #57cf6d">DOK SM/CRM</a></li>
        {% endif %}

        {% if (data.no_order == "") %}
        <li><a href="#tab6" data-toggle="tab">No Order</a></li>
        {% else %}
        <li><a href="#tab6" data-toggle="tab" style="background-color: #57cf6d">No Order</a></li>
        {% endif %}

        {% if (data.wfm_mitra != "1" AND data.wfm_mitra != "2") %}
        <li><a href="#tab7" data-toggle="tab">WFM Mitra</a></li>
        {% else %}
        <li><a href="#tab7" data-toggle="tab" style="background-color: #57cf6d">WFM Mitra</a></li>
        {% endif %}

        {% if (data.approval_wfm != "1" AND data.approval_wfm != "2") %}
        <li><a href="#tab8" data-toggle="tab">Approval WFM oleh Mitra</a></li>
        {% else %}
        <li><a href="#tab8" data-toggle="tab" style="background-color: #57cf6d">Approval WFM oleh Mitra</a></li>
        {% endif %}

        {% if (data.status_nde != "1" AND data.status_nde != "2") %}
        <li><a href="#tab9" data-toggle="tab">NDE Closed WFM</a></li>
        {% else %}
        <li><a href="#tab9" data-toggle="tab" style="background-color: #57cf6d">NDE Closed WFM</a></li>
        {% endif %}

        {% if (data.approval_des != "1" AND data.approval_des != "2") %}
        <li><a href="#tab10" data-toggle="tab">Approval DES PJM</a></li>
        {% else %}
        <li><a href="#tab10" data-toggle="tab" style="background-color: #57cf6d">Approval DES PJM</a></li>
        {% endif %}

        {% if (data.baso != "1" AND data.baso != "2") %}
        <li><a href="#tab11" data-toggle="tab">BASO</a></li>
        {% else %}
        <li><a href="#tab11" data-toggle="tab" style="background-color: #57cf6d">BASO</a></li>
        {% endif %}

        {% if (data.jenis_termin != "1" AND data.jenis_termin != "2") %}
        <li><a href="#tab12" data-toggle="tab">Termin/Non</a></li>
        {% else %}
        <li><a href="#tab12" data-toggle="tab" style="background-color: #57cf6d">Termin/Non</a></li>
        {% endif %}
        

    </ul>
     </div>
      </div>
    </div>
    <div id="bar" class="progress">
      <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
    </div>
<form action="{{ url("storeeditcpe") }}" method="post">
    <div style="width: 30%; margin: 0 auto;" class="tab-content">

        <div class="tab-pane" id="tab1">
                <div>
                    <label style="margin-top: 20px;">DOK P6</label>
                    <input type="hidden" name="id_ncx" value="{{data.id_ncx}}">
                </div>

                <select name="dok_p6" class="form-control form-control-sm" style="width: 100%;" required>
                    {% if (data.dok_p6 == 1) %}
                        <option value="0"></option>
                        <option value="1" selected>OK</option>
                        <option value="2">Belum OK</option>
                    {% elseif (data.dok_p6 == 2) %}
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
                {% if (kendala1) %}
                    <div class="form-group">
                        <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                        <textarea class="form-control" name="kendala1" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" >{{kendala1.kendala}}</textarea>
                    </div>                
                {% else %}
                    <div class="form-group">
                        <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                        <textarea class="form-control" name="kendala1" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" ></textarea>
                    </div>
                {% endif %}
        </div>

        <div class="tab-pane" id="tab2">
            <div>
                    <label style="margin-top: 20px;">DOK P8</label>
                </div>

                <select name="dok_p8" class="form-control form-control-sm" style="width: 100%;" >
                    {% if (data.dok_p8 == 1) %}
                        <option value="0"></option>
                        <option value="1" selected>OK</option>
                        <option value="2">Belum OK</option>
                    {% elseif (data.dok_p8 == 2) %}
                        <option value="0"></option>
                        <option value="1">OK</option>
                        <option value="2" selected>Belum OK</option>
                    {% else %}
                        <option value="0"></option>
                        <option value="1">OK</option>
                        <option value="2">Belum OK</option>
                    {% endif %}
                  
                </select>

                <input type="hidden" name="2" value="2">

                {% if (kendala2) %}
                    <div class="form-group">
                        <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                        <textarea class="form-control" name="kendala2" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" >{{kendala2.kendala}}</textarea>
                    </div>
                {% else %}
                    <div class="form-group">
                        <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                        <textarea class="form-control" name="kendala2" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" ></textarea>
                    </div>
                {% endif %}

        </div>

        <div class="tab-pane" id="tab3">
               <div>
                    <label style="margin-top: 20px;">DOK KL/WO</label>
                </div>

                <select name="dok_kl_wo" class="form-control form-control-sm" style="width: 100%;" >
                    {% if (data.dok_kl_wo == 1) %}
                        <option value="0"></option>
                        <option value="1" selected>OK</option>
                        <option value="2">Belum OK</option>
                    {% elseif (data.dok_kl_wo == 2) %}
                        <option value="0"></option>
                        <option value="1">OK</option>
                        <option value="2" selected>Belum OK</option>
                    {% else %}
                        <option value="0"></option>
                        <option value="1">OK</option>
                        <option value="2">Belum OK</option>
                    {% endif %}

                </select>

                <input type="hidden" name="3" value="3">

                {% if (kendala3) %}
                    <div class="form-group">
                        <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                        <textarea class="form-control" name="kendala3" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" >{{kendala3.kendala}}</textarea>
                    </div> 
                {% else %}
                    <div class="form-group">
                        <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                        <textarea class="form-control" name="kendala3" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" ></textarea>
                    </div>
                {% endif %}

        </div>

        <div class="tab-pane" id="tab4">
                <div class="form-group">
                    <label style="margin-top: 15px;">No Agreement</label>
                    <input  type="text" class="form-control" placeholder="Masukkan Nomor Agreement" name="no_agreement" value="{{data.no_agreement}}">
                </div>
        </div>

        <div class="tab-pane" id="tab5">
            <div>
                    <label style="margin-top: 20px;">Approval SM/CRM</label>
                </div>

                <select name="approval_sm_crm" class="form-control form-control-sm" style="width: 100%;" >
                    {% if (data.approval_sm_crm == 1) %}
                        <option value="0"></option>
                        <option value="1" selected>OK</option>
                        <option value="2">Belum OK</option>
                    {% elseif (data.approval_sm_crm == 2) %}
                        <option value="0"></option>
                        <option value="1">OK</option>
                        <option value="2" selected>Belum OK</option>
                    {% else %}
                        <option value="0"></option>
                        <option value="1">OK</option>
                        <option value="2">Belum OK</option>
                    {% endif %}
                </select> 

                <input type="hidden" name="4" value="4">

                {% if (kendala4) %}
                    <div class="form-group">
                        <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                        <textarea class="form-control" name="kendala4" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" >{{kendala4.kendala}}</textarea>
                    </div>
                {% else %}
                    <div class="form-group">
                        <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                        <textarea class="form-control" name="kendala4" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" ></textarea>
                    </div>
                {% endif %}

        </div>

        <div class="tab-pane" id="tab6">
                <div class="form-group">
                    <label style="margin-top: 20px;">No Order</label>
                    <input  type="text" class="form-control" placeholder="Masukkan Nomor Order" name="no_order" value="{{data.no_order}}">
                </div>  
        </div>

        <div class="tab-pane" id="tab7">
            <div>
                    <label style="margin-top: 20px;">WFM Mitra</label>
                </div>

                <select name="wfm_mitra" class="form-control form-control-sm" style="width: 100%;" >
                    {% if (data.wfm_mitra == 1) %}
                        <option value="0"></option>
                        <option value="1" selected>Sudah Masuk</option>
                        <option value="2">Belum Masuk</option>
                    {% elseif (data.wfm_mitra == 2) %}
                        <option value="0"></option>
                        <option value="1">Sudah Masuk</option>
                        <option value="2" selected>Belum Masuk</option>
                    {% else %}
                        <option value="0"></option>
                        <option value="1">Sudah Masuk</option>
                        <option value="2">Belum Masuk</option>
                    {% endif %}
                </select> 

                <input type="hidden" name="5" value="5">

                {% if (kendala5) %}
                    <div class="form-group">
                        <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                        <textarea class="form-control" name="kendala5" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" >{{kendala5.kendala}}</textarea>
                    </div>
                {% else %}
                    <div class="form-group">
                        <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                        <textarea class="form-control" name="kendala5" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" ></textarea>
                    </div>
                {% endif %}

        </div>

        <div class="tab-pane" id="tab8">
            <div>
                    <label style="margin-top: 20px;">Approval WFM oleh Mitra</label>
                </div>

                <select name="approval_wfm" class="form-control form-control-sm" style="width: 100%;" >
                    {% if (data.approval_wfm == 1) %}
                        <option value="0"></option>
                        <option value="1" selected>OK</option>
                        <option value="2">Belum OK</option>
                    {% elseif (data.approval_wfm == 2) %}
                        <option value="0"></option>
                        <option value="1">OK</option>
                        <option value="2" selected>Belum OK</option>
                    {% else %}
                        <option value="0"></option>
                        <option value="1">OK</option>
                        <option value="2">Belum OK</option>
                    {% endif %}
                </select>

                <input type="hidden" name="6" value="6">

                {% if (kendala6) %}
                    <div class="form-group">
                        <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                        <textarea class="form-control" name="kendala6" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" >{{kendala6.kendala}}</textarea>
                    </div>
                {% else %}
                    <div class="form-group">
                        <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                        <textarea class="form-control" name="kendala6" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" ></textarea>
                    </div>
                {% endif %}

        </div>

        <div class="tab-pane" id="tab9">
            <div>
                    <label style="margin-top: 20px;">NDE Closed WFM</label>
                </div>

                <select name="status_nde" class="form-control form-control-sm" style="width: 100%;" >
                    {% if (data.status_nde == 1) %}
                        <option value="0"></option>
                        <option value="1" selected>OK</option>
                        <option value="2">Belum OK</option> 
                    {% elseif (data.status_nde == 2) %}
                        <option value="0"></option>
                        <option value="1">OK</option>
                        <option value="2" selected>Belum OK</option>
                    {% else %}
                        <option value="0"></option>
                        <option value="1">OK</option>
                        <option value="2">Belum OK</option>
                    {% endif %}
                </select>

                <input type="hidden" name="7" value="7">

                {% if (kendala7) %}
                    <div class="form-group">
                        <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                        <textarea class="form-control" name="kendala7" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" >{{kendala7.kendala}}</textarea>
                    </div>
                {% else %}
                    <div class="form-group">
                        <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                        <textarea class="form-control" name="kendala7" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" ></textarea>
                    </div>
                {% endif %}

        </div>

        <div class="tab-pane" id="tab10">
            <div>
                    <label style="margin-top: 20px;">Approval DES PJM</label>
                </div>

                <select name="approval_des" class="form-control form-control-sm" style="width: 100%;" >
                    {% if (data.approval_des == 1) %}
                        <option value="0"></option>
                        <option value="1" selected>OK</option>
                        <option value="2">Belum OK</option>
                    {% elseif (data.approval_des == 2) %}
                        <option value="0"></option>
                        <option value="1">OK</option>
                        <option value="2" selected>Belum OK</option>
                    {% else %}
                        <option value="0"></option>
                        <option value="1">OK</option>
                        <option value="2">Belum OK</option>
                    {% endif %}
                </select>

                <input type="hidden" name="8" value="8">

                {% if (kendala8) %}
                    <div class="form-group">
                        <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                        <textarea class="form-control" name="kendala8" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" >{{kendala8.kendala}}</textarea>
                    </div>
                {% else %}
                    <div class="form-group">
                        <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                        <textarea class="form-control" name="kendala8" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" ></textarea>
                    </div>
                {% endif %}

        </div>

        <div class="tab-pane" id="tab11">
            <div>
                    <label style="margin-top: 20px;">BASO</label>
                </div>

                <select name="baso" class="form-control form-control-sm" style="width: 100%;" >
                    {% if (data.baso == 1) %}
                        <option value="0"></option>
                        <option value="1" selected>OK</option>
                        <option value="2">Belum OK</option>
                    {% elseif (data.baso == 2) %}
                        <option value="0"></option>
                        <option value="1">OK</option>
                        <option value="2" selected>Belum OK</option>
                    {% else %}
                        <option value="0"></option>
                        <option value="1">OK</option>
                        <option value="2">Belum OK</option>
                    {% endif %}
                </select>

                <label style="margin-top: 20px;">Unggah Dokumen</label>
                <input style="font-size: 10pt; margin-bottom: 30px;" type="file" name="file">  

                <input type="hidden" name="9" value="9">

                {% if (kendala9) %}
                    <div class="form-group">
                        <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                        <textarea class="form-control" name="kendala9" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" >{{kendala9.kendala}}</textarea>
                    </div>
                {% else %}
                    <div class="form-group">
                        <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                        <textarea class="form-control" name="kendala9" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" ></textarea>
                    </div>
                {% endif %}
        </div>

        <div class="tab-pane" id="tab12">
                <div>
                    <label>Termin/Non</label>
                </div>

                <select name="jenis_termin" class="form-control form-control-sm" style="width: 100%;" >
                    {% if (data.jenis_termin == 1) %}
                        <option value="0"></option>
                        <option value="1" selected>Termin</option>
                        <option value="2">Non Termin</option>
                    {% elseif (data.jenis_termin == 2) %}
                        <option value="0"></option>
                        <option value="1">Termin</option>
                        <option value="2" selected>Non Termin</option>
                    {% else %}
                        <option value="0"></option>
                        <option value="1">Termin</option>
                        <option value="2">Non Termin</option>
                    {% endif %}
                </select>

            <!--    <div class="form-group">
                    <label style="margin-top: 0px;" for="exampleFormControlTextarea1">Kendala</label>
                    <textarea class="form-control" name="kendala" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" ></textarea>
                </div> -->

        </div>
     

       <!--  <ul class="pager wizard">
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