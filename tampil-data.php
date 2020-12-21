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
include 'config/database.php';
?>
  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-user"></i> Dados dos Alunos
          
          <a class="btn btn-success pull-right" href="#" data-target="#modal_tambah" data-toggle="modal">
            <i class="glyphicon glyphicon-plus"></i> Adicionar
          </a>
        </h4>
      </div>

  <?php  
  // fungsi untuk menampilkan pesan
  // jika alert = "" (kosong)
  // tampilkan pesan "" (kosong)
  if (empty($_GET['alert'])) {
    echo "";
  }
  // jika alert = 1
  // tampilkan pesan Sukses "Mahasiswa baru berhasil disimpan" 
  elseif ($_GET['alert'] == 1) {
	 ?>
     <div class='alert alert-success alert-dismissible' role='alert'>
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		  <span aria-hidden='true'>&times;</span>
		</button>
		<strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Dados do aluno salvos com sucesso.
	  </div>";
  <?php } 
  // jika alert = 2
  // tampilkan pesan Sukses "Mahasiswa berhasil diubah"
  elseif ($_GET['alert'] == 2) {
	 ?> 
     <div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Dados alterados com sucesso!.
          </div>";
  <?php } 
  // jika alert = 3
  // tampilkan pesan Sukses "Mahasiswa berhasil dihapus"
  elseif ($_GET['alert'] == 3) {
	  ?>
    <div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Dados excluídos com sucesso!.
          </div>";
  <?php }
  // jika alert = 4
  // tampilkan pesan Gagal "NIM sudah ada"
  elseif ($_GET['alert'] == 4) {
	?>  
		<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-remove-circle'></i> Gagal!</strong> Id. $_GET[nim] ja existe.
          </div>";
  <?php }
  // jika alert = 5
  // tampilkan pesan Upload Gagal "Pastikan file yang diupload sudah benar"
  elseif ($_GET['alert'] == 5) {
	  ?>
		<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-remove-circle'></i> Upload Gagal!</strong> Verifique se o arquivo enviado está correto.
          </div>";
  <?php }
  // jika alert = 6
  // tampilkan pesan Upload Gagal "Pastikan ukuran file foto tidak lebih dari 1MB"
  elseif ($_GET['alert'] == 6) {
	 ?>
		<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-remove-circle'></i> Upload Gagal!</strong> Certifique-se de que o tamanho do arquivo não seja maior que 1 MB.
          </div>";
  <?php }
  // jika alert = 7
  // tampilkan pesan Upload Gagal "Pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG"
  elseif ($_GET['alert'] == 7) {
?>
		<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-remove-circle'></i> Upload Gagal!</strong> Certifique-se de que o arquivo enviado é do tipo *.JPG, *.JPEG, *.PNG.
          </div>";
  <?php }?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Dados dos Alunos</h3>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>No.</th>
                <th>Foto</th>
                <th>Id.</th>
                <th>Nome</th>
                <th>Local, Data de Nascimento</th>
                <th>Genero</th>
                <th>Religião</th>
                <th>Residencia</th>
                <th>Telefone</th>
                <th></th>
              </tr>
            </thead>   

            <tbody>
            <?php
			require 'config/database.php';
            try {
              $no = 1;

              // sql statement untuk menampilkan semua data dari tabel is_mahasiswa
              $query = "SELECT * FROM is_mahasiswa ORDER BY nim DESC";
              // membuat prepared statements
              $stmt = $pdo->prepare($query);

              // eksekusi query
              $stmt->execute();

              // tampilkan data
              while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {

                $tanggal        = $data['tanggal_lahir'];
                $tgl            = explode('-',$tanggal);
                $tanggal_lahir  = $tgl[2]."-".$tgl[1]."-".$tgl[0];
				?>
					<tr>	
                        <td width='50' class='center'><?php echo $no?></td>
					<?php
                        if ($data['foto']=="") { ?>
                          <td><img class='img-mahasiswa' src='foto/default_user.png' width='45'></td>
                        <?php
                        } else { ?>
                          <td><img class='img-mahasiswa' src='foto/<?php echo $data['foto']; ?>' width='45'></td>
                        <?php
                        }

                echo "  <td width='60'>$data[nim]</td>
                        <td width='150'>$data[nama]</td>
                        <td width='180'>$data[tempat_lahir], $tanggal_lahir</td>
                        <td width='120'>$data[jenis_kelamin]</td>
                        <td width='100'>$data[agama]</td>
                        <td width='250'>$data[alamat]</td>
                        <td width='80'>$data[telepon]</td>

                        <td width='100'>
                          <div class=''>
                            <a href='#' data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-success btn-sm open_modal' id='$data[nim]' >
                              <i class='glyphicon glyphicon-edit'></i>
                            </a>";
                ?>
                            <a href="#" onclick="confirm_modal('proses-hapus.php?&nim=<?php echo $data['nim']; ?>');" data-nim="<?php echo $data['nim']; ?>" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm">
                              <i class="glyphicon glyphicon-trash"></i>
                            </a>
              <?php
                echo "
                          </div>
                        </td>
                      </tr>";
                $no++;
              }

              // tutup koneksi database
              $pdo = null;
            } catch (PDOException $e) {
              // tampilkan pesan kesalahan
              echo "ada kesalahan pada query : ".$e->getMessage();
            }
            ?>
            </tbody>           
          </table>
        </div>
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
  
  <!-- Modal Popup untuk tambah--> 
  <div id="modal_tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myModalLabel">
            <i class="glyphicon glyphicon-edit"></i> 
            Entrada de Dados do Aluno
          </h4>
        </div>

        <div class="modal-body">
          <form action="proses-simpan.php" method="POST" name="modal_popup" enctype="multipart/form-data">
            
            <div class="form-group">
              <label>Id.</label>
              <input type="text" class="form-control" name="nim" autocomplete="off" maxlength="10" required/>
            </div>

            <div class="form-group">
              <label>Nome do Aluno</label>
              <input type="text" class="form-control" name="nama" autocomplete="off" required/>
            </div>

            <div class="form-group">
              <label>Local de Nascimento</label>
              <input type="text" class="form-control" name="tempat_lahir" autocomplete="off" required/>
            </div>

            <div class="form-group">
              <label>Data de Nascimento</label>
              <div class="input-group">
                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_lahir" autocomplete="off" required>
                <span class="input-group-addon">
                  <i class="glyphicon glyphicon-calendar"></i>
                </span>
              </div>
            </div>

            <div class="form-group">
              <label>Genero</label>
              <div class="radio">
                <label class="radio-inline">
                  <input type="radio" name="jenis_kelamin" value="Laki-laki"> Homens
                </label>

                <label class="radio-inline">
                  <input type="radio" name="jenis_kelamin" value="Perempuan"> Mulheres
                </label>
              </div>
            </div>

            <div class="form-group">
              <label>Religiao</label>
              <select class="form-control" name="agama" placeholder="Pilih Agama" required>
                <option value=""></option>
                <option value="Islam">Islam</option>
                <option value="Kristen Protestan">Protestante Cristão</option>
                <option value="Kristen Katolik">Protestante Catolico</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
              </select>
            </div>

            <div class="form-group">
              <label>Residencia</label>
              <textarea class="form-control" name="alamat" rows="3" required></textarea>
            </div>

            <div class="form-group">
              <label>Telefone</label>
              <input type="text" class="form-control" name="telepon" autocomplete="off" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)" required>
            </div>

            <div class="form-group">
              <label>Foto</label>
              <input type="file" name="foto" required>
              <p class="help-block">
                <small>Catatan :</small> <br>
                <small>- Certifique-se de que o arquivo seja do tipo *.JPG ou *.PNG</small> <br>
                <small>- Tamanho Maximo do arquivo 1 Mb</small>
              </p>
            </div>

            <div class="modal-footer">
              <input type="submit" class="btn btn-success btn-submit" name="Salvar" value="Simpan">
              <button type="reset" class="btn btn-danger btn-reset" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Popup untuk ubah--> 
  <div id="modal_ubah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  </div>

  <!-- Modal Popup untuk hapus -->
  <div class="modal fade" id="modal_hapus">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i style="margin-right:7px" class="glyphicon glyphicon-trash"></i> Deseja excluir os dados do aluno ?</h4>
        </div>
        <div class="modal-footer">
          <a href="#" type="button" class="btn btn-danger btn-submit" id="link_hapus">Excluir</a>
          <button type="button" class="btn btn-default btn-reset" data-dismiss="modal">Cancelar</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->