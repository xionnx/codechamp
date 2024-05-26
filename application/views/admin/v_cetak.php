<!DOCTYPE html>
<html>
<head>
	<title>Cetak Hasil Pengerjaan </title>
</head>
<body>
	<div class="container">
		<div class="content-wrapper">
			<img src="assets/dist/img/codechamplogo.png" style="width: 35px; height: auto; position: absolute;">
        
	        <table style="width: 100%;">
	            <tr>
	                <td align="center">
	                    <span> CODECHAMP <br> Layanan Kursus Online</span>
	                    <hr>                    
	                </td>
	            </tr>
	        </table>
			<section class="content-header">
				<h3 align="center">Laporan Hasil Pengerjaan</h3>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<table border="1" cellpadding="5px" cellspacing="0px" style="font-size:11;" width="100%">
							<thead align="center" style="background-color:#D3D3D3">
								<tr>
									<th width="1%">No</th>
		                            <th>Nama Pengguna</th>
		                            <th>Materi</th>
		                            <th>Benar</th>
		                            <th>Salah</th>
		                            <th>Skor</th>
								</tr>
							</thead>
							<tbody style="font-size:9;">
								<?php
								$no = 1;
								foreach($cetak as $d){
								?>
								<tr align="center">
									<td><?php echo $no++; ?></td>
	                                <td><?php echo $d->nama_user; ?></td>
	                                <td><?php echo $d->nama_materi; ?></td>
	                                <td>
	                                    <?php
	                                    if($d->benar == ''){
	                                        echo "<span class='btn btn-xs btn-warning'>Belum Dikerjakan</span>";
	                                    }else {
	                                        echo $d->benar;
	                                    }
	                                    ?>
	                                </td>                                
	                                <td>
	                                    <?php
	                                    if($d->salah == ''){
	                                        echo "<span class='btn btn-xs btn-warning'>Belum Dikerjakan</span>";
	                                    }else {
	                                        echo $d->salah;
	                                    }
	                                    ?>
	                                </td>
	                                <td>
	                                    <?php
	                                    if($d->skor == ''){
	                                        echo "<span class='btn btn-xs btn-warning'>Belum Dikerjakan</span>";
	                                    }else {
	                                        echo $d->skor;
	                                    }
	                                    ?>
	                                </td>
								</tr>
								<?php }	?>
							</tbody>							
						</table>						
					</div>
				</div>
			</section><br><br><br>
			<div align="center">
				<?php 
				$date = Date("d/m/Y");
				$jam = Date("H:i:s");
				echo "Laporan dicetak pada tanggal $date Jam $jam"; 
				?>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>