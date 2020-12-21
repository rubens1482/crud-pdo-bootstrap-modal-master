<!-- Aplikasi CRUD dengan PDO dan Bootstrap Modal
**************************************************
* Developer    : Indra Styawantoro
* Company      : Indra Studio
* Release Date : 13 Mei 2017
* Website      : www.indrasatya.com
* E-mail       : indra.setyawantoro@gmail.com
* Phone / WA   : +62-856-6991-9769
--> 

<?php
require_once "config/database.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Aplica��o CRUD</title>
    
    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/datepicker.min.css" rel="stylesheet">
    <link href="assets/js/dataTables/css/dataTables.bootstrap.css" rel="stylesheet">
    
    <!-- styles -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Fungsi untuk membatasi karakter yang diinputkan -->
    <script language="javascript">
      function getkey(e)
      {
        if (window.event)
          return window.event.keyCode;
        else if (e)
          return e.which;
        else
          return null;
      }

      function goodchars(e, goods, field)
      {
        var key, keychar;
        key = getkey(e);
        if (key == null) return true;
       
        keychar = String.fromCharCode(key);
        keychar = keychar.toLowerCase();
        goods = goods.toLowerCase();
       
        // check goodkeys
        if (goods.indexOf(keychar) != -1)
            return true;
        // control keys
        if ( key==null || key==0 || key==8 || key==9 || key==27 )
          return true;
          
        if (key == 13) {
            var i;
            for (i = 0; i < field.form.elements.length; i++)
                if (field == field.form.elements[i])
                    break;
            i = (i + 1) % field.form.elements.length;
            field.form.elements[i].focus();
            return false;
            };
        // else return false
        return false;
    }
    </script>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand -->
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">
            <i class="glyphicon glyphicon-check"></i>
            Aplicacao CRUD PHP Data Object (PDO) com Bootstrap Modal
          </a>
        </div>
      </div> <!-- /.container-fluid -->
    </nav>

    <div class="container-fluid">
      <?php
      include "tampil-data.php";
      ?>
    </div> <!-- /.container-fluid -->
    
    <footer class="footer">
      <div class="container-fluid">
        <p class="text-muted pull-left">&copy; 2017 <a href="http://www.indrasatya.com/">www.indrasatya.com</a></p>
        <p class="text-muted pull-right ">Theme by <a href="http://www.getbootstrap.com" target="_blank">Bootstrap</a></p>
      </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.min.js"></script>
    <!-- DataTables -->
    <script src="assets/js/dataTables/js/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/js/dataTables.bootstrap.js"></script>

    <script type="text/javascript">
      $(function () {

        //datepicker plugin
        $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        });

        // toolip
        $('[data-toggle="tooltip"]').tooltip();

        // datatables
        $('#dataTables-example').dataTable( {
            "lengthMenu": [[2,10, 25, 50, -1], [2,10, 25, 50, "All"]],
            "pageLength": 10,
			"pagingType": "full_numbers",
			 "order": [[ 3, "desc" ]],
			 "info":     true,
			  "order": [[ 3, "desc" ]]
        } );
		
		// datatables
			$('#tb_home').dataTable( {
				"dom": '<"top"fp<"clear">>rt<"bottom"il<"clear">>',
				"lengthMenu": [[4, 7, 10, 12, 15, 25, -1], [4, 7, 10, 12, 15, 25, "All"]],
				"pageLength": 7,
				"pagingType": "full_numbers",
				"paging": true,
				"ordering": true,
				"info":     true,
				"language": {
					"lengthMenu": "Mostrando _MENU_ registros por pagina",
					"zeroRecords": "Sem Registros!",
					"info": "Mostrando pagina _PAGE_ de _PAGES_ paginas.",
					"infoEmpty": "Sem Dados!",
					"infoFiltered": "(filtrado de _MAX_ total registros!)"
				}
			} );
      })
    </script>

    <!-- Javascript untuk popup modal Edit--> 
    <script type="text/javascript">
       $(document).ready(function () {
       $(".open_modal").click(function(e) {
          var id = $(this).attr("id");
           $.ajax({
                 url: "form-ubah.php",
                 type: "GET",
                 data : {nim: id},
                 success: function (ajaxData){
                   $("#modal_ubah").html(ajaxData);
                   $("#modal_ubah").modal('show',{backdrop: 'true'});
                 }
               });
            });
          });
    </script>

    <!-- Javascript untuk popup modal Delete--> 
    <script type="text/javascript">
        function confirm_modal(delete_url)
        {
          $('#modal_hapus').modal('show', {backdrop: 'static'});
          document.getElementById('link_hapus').setAttribute('href' , delete_url);
        }
    </script>
  </body>
</html>