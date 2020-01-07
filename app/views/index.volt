<!DOCTYPE html>
<html>

<head>
    <title>Progres NCX</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" href="favicon.png" type="png" sizes="16x16">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style5.css">


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
            <img style="height: 100px; margin-top: 30px;" src="logo.png" class="rounded mx-auto d-block">
            <div class="sidebar-header">
            <h6 style="text-align: center; color: black; background-color: white; border-radius: 30px; width: 90%;">Website Progres NCX</h6>
            </div>


            <ul style="margin-left: 10px; margin-top: 30px;" class="list-unstyled">

                <li>
                    <a href="#">Form</a>
                </li>
                <li>
                    <a href="#">Data</a>
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
            <form  action="" method = "post" style="margin-left: 90px; margin-top: 50px; width: 30%; font-family:'GothamRounded-Medium';">

                <div class="form-group">
                    <label>Nama CC</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama CC" name="" required>
                </div>

                <div class="form-group">
                    <label>Nama Pekerjaan</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama Pekerjaan" name="" required>
                </div>

                <div class="form-group">
                    <label>Mitra</label>
                    <input type="text" class="form-control" placeholder="Masukkan Mitra" name="" required>
                </div>

                <div class="form-group">
                    <label style="margin-top: 0px;">Nilai NRC</label>
                    <input  type="text" class="form-control" placeholder="Masukkan Nilai NRC" name="" required>
                </div>

                <div class="form-group">
                    <label>Nilai MRC</label>
                    <input  type="text" class="form-control" placeholder="Masukkan Nilai MRC" name="" required>
                </div>

                <div class="form-group">
                    <label>Status NCX</label>
                    <input  type="text" class="form-control" placeholder="Masukkan Status NCX" name="" required>
                </div>

                <div class="form-group">
                    <label>No Quote</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nomor Quote" name="" required>
                </div>

                <div class="form-group">
                    <label>No Agreement</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nomor Agreement" name="" required>
                </div>

            


                <div>
                    <label>Tipe Order</label>
                </div>


                <select id = "ddlPassport" onchange = "ShowHideDiv()" class="form-control form-control-sm" style="width: 100%; font-size: 15pt;" required>
                  <option value="0"></option>
                  <option value="1">Connectivity</option>
                  <option value="2">CPE</option>
                </select>

                <!-- <div class="form-group">
                    <label style="margin-top: 20px;" for="exampleFormControlTextarea1">Kendala</label>
                    <textarea class="form-control" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" required></textarea>
                </div> -->

                 <div id="div0" style="display: none;"></div>


                <!-- Connectivity -->

    <div id="dvPassport" style="display: none">
                <h3 style="margin-top: 30px; margin-bottom: 30px; color: red;">Connectivity</h3>


                <div class="form-group">
                    <label style="margin-top: 15px;">No Order</label>
                    <input  type="text" class="form-control" placeholder="Masukkan Nomor Order" name="" required>
                </div>

                <div>
                    <label style="margin-top: 20px;">BASO</label>
                </div>

                <select name="" class="form-control form-control-sm" style="width: 100%; font-size: 15pt;" required>
                  <option value="0"></option>
                  <option value="1">OK</option>
                  <option value="2">Belum OK</option>
                </select> 
                
                <div>
                    <label style="margin-top: 25px;">Termin/Non Termin</label>
                </div>

                <select id = "ddlPassportTer" onchange = "ShowHideDivTer()" name="" class="form-control form-control-sm" style="width: 100%; font-size: 15pt;" required>
                  <option value="0"></option>
                  <option value="1">Termin</option>
                  <option value="2">Non Termin</option>
                </select>

    

                <!--  Kalau Termin -->
            <div id="dvPassportTer" style="display: none">    
                <div class="form-group">
                    <label style="margin-top: 20px;">Billing NOL</label>
                    <input type="date" class="form-control" name="tanggal" required>
                </div>

                <div class="form-group">
                    <label>Asset</label>
                    <input  type="text" class="form-control" placeholder="Masukkan Asset" name="" required>
                </div>       

                <div>
                    <label style="margin-top: 5px;">Approval SM</label>
                </div>

                <select name="" class="form-control form-control-sm" style="width: 100%; font-size: 15pt;" required>
                  <option value="0"></option>
                  <option value="1">OK</option>
                  <option value="2">Belum OK</option>
                </select> 


                <div>
                    <label style="margin-top: 20px;">Approval UBC</label>
                </div>

                <select name="" class="form-control form-control-sm" style="width: 100%; font-size: 15pt;" required>
                  <option value="0"></option>
                  <option value="1">OK</option>
                  <option value="2">Belum OK</option>
                </select> 

                <div>
                    <label style="margin-top: 20px;">Billing Complete</label>
                    <input type="date" class="form-control" name="tanggal" required>
                </div>

                <div class="form-group">
                    <label style="margin-top: 20px;" for="exampleFormControlTextarea1">Kendala</label>
                    <textarea class="form-control" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" required></textarea>
                </div>
            </div>


               <!--  Kalau Non Termin -->
            <div id="dvPassportTer2" style="display: none">   

                <div>
                    <label style="margin-top: 20px;">Billing Complete</label>
                    <input type="date" class="form-control" name="tanggal" required>
                </div>

                <div class="form-group">
                    <label style="margin-top: 20px;" for="exampleFormControlTextarea1">Kendala</label>
                    <textarea class="form-control" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" required></textarea>
                </div>
            </div>
        </div>

                <!-- -- -->


                <!-- CPE -->
  <div id="dvPassport2" style="display: none">

                <h3 style="margin-top: 30px; margin-bottom: 30px; color: red;">CPE</h3>

                <div>
                    <label style="margin-top: 20px;">DOK P6</label>
                </div>

                <select name="" class="form-control form-control-sm" style="width: 100%; font-size: 15pt;" required>
                  <option value="0"></option>
                  <option value="1">OK</option>
                  <option value="2">Belum OK</option>
                </select> 


                <div>
                    <label style="margin-top: 20px;">DOK P8</label>
                </div>

                <select name="" class="form-control form-control-sm" style="width: 100%; font-size: 15pt;" required>
                  <option value="0"></option>
                  <option value="1">OK</option>
                  <option value="2">Belum OK</option>
                </select> 


                <div>
                    <label style="margin-top: 20px;">DOK KL/WO</label>
                </div>

                <select name="" class="form-control form-control-sm" style="width: 100%; font-size: 15pt;" required>
                  <option value="0"></option>
                  <option value="1">OK</option>
                  <option value="2">Belum OK</option>
                </select> 


                <div>
                    <label style="margin-top: 20px;">DOK SM/CRM</label>
                </div>

                <select name="" class="form-control form-control-sm" style="width: 100%; font-size: 15pt;" required>
                  <option value="0"></option>
                  <option value="1">OK</option>
                  <option value="2">Belum OK</option>
                </select> 


                <div class="form-group">
                    <label style="margin-top: 20px;">No Order</label>
                    <input  type="text" class="form-control" placeholder="Masukkan Nomor Order" name="" required>
                </div>    


                <div>
                    <label style="margin-top: 20px;">WFM Mitra</label>
                </div>

                <select name="" class="form-control form-control-sm" style="width: 100%; font-size: 15pt;" required>
                  <option value="0"></option>
                  <option value="1">Sudah Masuk</option>
                  <option value="2">Belum Masuk</option>
                </select> 


                <div>
                    <label style="margin-top: 20px;">Approval WFM oleh Mitra</label>
                </div>

                <select name="" class="form-control form-control-sm" style="width: 100%; font-size: 15pt;" required>
                  <option value="0"></option>
                  <option value="1">OK</option>
                  <option value="2">Belum OK</option>
                </select> 


                <div>
                    <label style="margin-top: 20px;">NDE Closed WFM</label>
                </div>

                <select name="" class="form-control form-control-sm" style="width: 100%; font-size: 15pt;" required>
                  <option value="0"></option>
                  <option value="1">OK</option>
                  <option value="2">Belum OK</option>
                </select> 


                <div>
                    <label style="margin-top: 20px;">Approval DES PJM</label>
                </div>

                <select name="" class="form-control form-control-sm" style="width: 100%; font-size: 15pt;" required>
                  <option value="0"></option>
                  <option value="1">OK</option>
                  <option value="2">Belum OK</option>
                </select> 

                <div>
                    <label style="margin-top: 20px;">BASO</label>
                </div>

                <select name="" class="form-control form-control-sm" style="width: 100%; font-size: 15pt;" required>
                  <option value="0"></option>
                  <option value="1">OK</option>
                  <option value="2">Belum OK</option>
                </select> 

                <div>
                    <label style="margin-top: 25px;">Termin/Non Termin</label>
                </div>

                <select id = "ddlPassportTerr" onchange = "ShowHideDivTerr()" name="" class="form-control form-control-sm" style="width: 100%; font-size: 15pt;" required>
                  <option value="0"></option>
                  <option value="1">Termin</option>
                  <option value="2">Non Termin</option>
                </select>

</div>

                <!--  Kalau Termin -->
<div id="dvPassportTerr" style="display: none">
                <div class="form-group">
                    <label style="margin-top: 20px;">Billing NOL</label>
                    <input type="date" class="form-control" name="tanggal" required>
                </div>

                <div class="form-group">
                    <label style="margin-top: 20px;">Asset</label>
                    <input  type="text" class="form-control" placeholder="Masukkan Nomor Asset" name="" required>
                </div>       

                <div>
                    <label style="margin-top: 5px;">Approval SM</label>
                </div>

                <select name="" class="form-control form-control-sm" style="width: 100%; font-size: 15pt;" required>
                  <option value="0"></option>
                  <option value="1">OK</option>
                  <option value="2">Belum OK</option>
                </select> 


                <div>
                    <label style="margin-top: 20px;">Approval UBC</label>
                </div>

                <select name="" class="form-control form-control-sm" style="width: 100%; font-size: 15pt;" required>
                  <option value="0"></option>
                  <option value="1">OK</option>
                  <option value="2">Belum OK</option>
                </select> 

                <div>
                    <label style="margin-top: 20px;">Billing Complete</label>
                    <input type="date" class="form-control" name="tanggal" required>
                </div>

                <div class="form-group">
                    <label style="margin-top: 20px;" for="exampleFormControlTextarea1">Kendala</label>
                    <textarea class="form-control" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" required></textarea>
                </div>
        </div>

                <!-- Kalau Non Termin -->
<div id="dvPassportTerr2" style="display: none">
                <div>
                    <label style="margin-top: 20px;">Billing Complete</label>
                    <input type="date" class="form-control" name="tanggal" required>
                </div>

                <div class="form-group">
                    <label style="margin-top: 20px;" for="exampleFormControlTextarea1">Kendala</label>
                    <textarea class="form-control" placeholder="Masukkan Kendala..." id="exampleFormControlTextarea1" rows="3" required></textarea>
                </div>
</div>


                <!-- End -->



                <!-- <h3 style="margin-top: 30px; margin-bottom: 30px; color: red;">No Agreement Berakhir</h3>

 -->
                

                <button value = "" style="margin-top: 40px; margin-bottom: 30px;" type="submit" class="btn btn-primary">Selesai</button>

            
        </form>
            </div>


  


</body>

</html>