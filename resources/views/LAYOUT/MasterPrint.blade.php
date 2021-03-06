
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>atlas copie </title>

<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
     <!-- Google Font: Source Sans Pro -->
     <link rel="stylesheet" href="../../../../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
      <link rel="icon" type="image/png" href="../../../../../../dist/img/atlascopie3.png" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../../../../../../plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="../../../../../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
          <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="../../../../../../dist/css/adminlte.min.css">
      <!-- summernote -->
      <link rel="stylesheet" href="../../../../../../plugins/summernote/summernote-bs4.min.css">
      <!-- CodeMirror -->
      <link rel="stylesheet" href="../../../../../../plugins/codemirror/codemirror.css">
      <link rel="stylesheet" href="../../../../../../plugins/codemirror/theme/monokai.css">
        <link rel="stylesheet" href="../../../../../../plugins/toastr/toastr.min.css">
      <!-- SimpleMDE -->
      <link rel="stylesheet" href="../../../../../../plugins/simplemde/simplemde.min.css">
      <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
      
      

  </head>

@php

    $txt="";

    $txt_Error="";

@endphp

@if(Session::has('success'))

  @php($txt=Session::get('success'))

@endif

 
@if(Session::has('Error'))

  @php($txt_Error=Session::get('Error'))

@endif
<!-- Created by Hamza WALED -->

    <body class="control-sidebar-slide-open layout-fixed layout-footer-fixed text-sm layout-navbar-fixed layout-footer-fixed text-sm" style="background-color: white;">
  <!-- Site wrapper -->         
      <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            

          

          </ul>

          <!-- Right navbar links -->
          <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
              <!-- <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
              </a> -->
              <div class="navbar-search-block">
                <form class="form-inline">
                  <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                      <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                      <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
              <!-- <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
              </a> -->
              
            </li>
            <!-- Notifications Dropdown Menu -->
          
            <li class="nav-item">
              <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
              </a>
            </li>
            <!--<li class="nav-item">
              <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
              </a>
            </li>-->
          </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4" style="background-color: white;"  >
          <!-- Brand Logo -->

          <a href="#" class="brand-link">

            <img src="../../../../../../dist/img/atlascopie2.png" alt="AdminLTE Logo" width="100%">
            
          </a>
          
          <br><br> <br>

          <!-- Sidebar -->
          <div class="sidebar">
            <div style="border: 1px solid #8c8c8c;"></div>
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

              <div class="image">
                
                <img src="../../../../../../dist/img/daddd.jpg" class="img-circle elevation-2" alt="User Image" width="50%">
              </div>
              <div class="info">

                <a href="#" class="d-block"> <b style=" font-size: 17px;  ">{{Auth::user()->FirstName}} {{Auth::user()->LastName}}</b> </a>
              </div>

            </div>
            <div style="border: 1px solid #8c8c8c;"></div>

            

            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                     
                   
                  
                   <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p style="color: black;">
                      Facture
                          <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{ route('CreateBill') }}" class="nav-link">
                            <i class="fas fa-pencil-alt"></i>
                            <p style="color: black;">Ajouter une Facture</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{route('ShowBill')}}" class="nav-link">
                            <i class="fas fa-print"></i>
                            <p style="color: black;">La Liste des Factures</p>
                          </a>
                        </li>
                      </ul>
              </li>

                 <li class="nav-item">
                  <a href="https://www.ilovepdf.com/fr/pdf_en_word" class="nav-link" target="_blank">
                    <i class="nav-icon fas fa-copy"></i>
                    <p style="color: black;">
                      Convertir PDF to Word 
                           
                    </p>
                  </a>
                      
              </li>
                  </ul>

                    </li>


                  </ul>
                    
                
            </nav>
            <!-- /.sidebar-menu -->

          </div>
          <div  >
     
                        <a href="/logout" class="btn btn-primary btn-lg">
                            <i class="fas fa-sign-out-alt"></i> htr

                         </a>
                              
                    </div>   
          <div id="bottom" >
     
                        <a href="/logout" class="btn btn-primary btn-lg">
                            <i class="fas fa-sign-out-alt"></i> Se d??connecter

                         </a>
                              
                    </div>   
          <!-- /.sidebar -->
        </aside>

@yield('content')

       

        <!-- Control Sidebar 
        <aside class="control-sidebar control-sidebar-dark">
         Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->
      <style>
      .frm{
         width: 75%;
          padding-left: 200px;
        }
        #bottom {
                position:absolute;                 
                bottom:0;                         
                left:0; 
                padding: 5%;                        
        }
        

      }
      </style>
      <!-- jQuery -->
      <script src="../../../../../../plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="../../../../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- AdminLTE App -->
      <script src="../../../../../../dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../../../../../../dist/js/demo.js"></script>


      <!-- Summernote -->
      <script src="../../../../../../plugins/summernote/summernote-bs4.min.js"></script>
      <!-- CodeMirror -->
      <script src="../../../../../../plugins/codemirror/codemirror.js"></script>
      <script src="../../../../../../plugins/codemirror/mode/css/css.js"></script>
      <script src="../../../../../../plugins/codemirror/mode/xml/xml.js"></script>
      <script src="../../../../../../plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../../../../../../dist/js/demo.js"></script>
<!-- Toastr -->
<script src="../../../../../../plugins/toastr/toastr.min.js"></script>



<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../../../../../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- Dashboard -->
<script src="dist/js/pages/dashboard2.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- end Dashboard -->
<!-- end new -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>

      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script>
        $(function () {
          // Summernote
          $('#summernote').summernote()

          // CodeMirror
          /*CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
          });*/
        })
          function REMOVE(url) {
    // body...
          swal({
          title: "Etes-vous s??r de vouloir supprimer?",
          text: "Une fois supprim??es, vous ne pourrez plus r??cup??rer ces donn??es !",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {

            window.location.href=url;
            
          }else{
            return false;
          } 
      });
  }
  var valid = "{{$txt}}";

var erreur = "{{$txt_Error}}";

if(valid!=""){

  swal("Op??ration r??ussie !", valid, "success");//"success" IS THE IMAGE, "Operation done successfully !" IS THE MESSAGE DISPLAYED , valid
          

}

if(erreur!=""){

   swal("Impossible de supprimer!", valid, "error");

}
$('.duallistbox').bootstrapDualListbox()

    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

      </script>
      @yield('script')
  </body>
</html>
  