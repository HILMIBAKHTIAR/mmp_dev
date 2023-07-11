<script type="text/javascript" src="../../assets_custom/js/jquery.min.js"></script>
<style>
    @media print {
        @page {
            size: potrait;
            size: 17.78cm 21.6cm !important;
/*            size: 21.6cm 17.78cm!important;*/
            margin: 5px 0px 0px 45px!important;
        }
    }
    @media all {
        .page-break { display: none; }
    }
        
    @media print {
        .page-break { display: block; page-break-before: always; }
    }
    {
        font-family: arial;
    }

    table {
        border-collapse: collapse;
    }

    .table-detail {
        border-top: 1px solid black;
        border-bottom: 1px solid black;
    }

    .table-detail td{
        border-left: 1px solid black;
        border-right: 1px solid black;
    }

    .myheader {
        vertical-align: top;
        padding: 5px 0 0 15px;
    }

    .text-small {
        font-size: 10px;
    }

    .text-medium {
        font-size: 12px;
    }

    .garis {
        border-top: 1px solid black;
    }

</style>

<?php
	include "../../config/config.php";
	include "../../config/database.php";
	include "../../".$config["webspira"]."config/connection.php";

	$conn_header = new mysqli($mysql["server"], $mysql["username"], $mysql["password"], $mysql["database"]);
	if ($conn_header->connect_error) { die("Connection failed: " . $conn_header->connect_error); }

	$sql = "
	SELECT 
	a.*,
	m.nama as supplier,
	m.alamat,
	m3.nama category,
	m4.nama attn,
	DATE_FORMAT(a.dibuat_pada,'" . $_SESSION["setting"]["date_sql"] . "') as dibuat_pada,
	DATE_FORMAT(a.disetujui_pada,'" . $_SESSION["setting"]["date_sql"] . "') as disetujui_pada
	from thbeliorder a
	join mhrelasi m on m.nomor = a.nomormhrelasi 
	join thbelipraorder t on t.nomor = a.nomorthbelipraorder 
	join tdbelipraorder t2 on t2.nomorthbelipraorder = t.nomor 
	join mhbarang m2 on m2.nomor = t2.nomormhbarang 
	join mhbarangkelompok m3 on m3.nomor = m2.nomormhbarangkelompok 
	left join mhadmin m4 on m4.nomor = a.disetujui_oleh 
	WHERE a.nomor = ".$_GET["no"];
	$result = $conn_header->query($sql);
	$row = $result->fetch_all(MYSQLI_ASSOC);
	date_default_timezone_set('Asia/Jakarta');

	$index_nomor = 0;
	$index_halaman = 1;
	$batas_data = 12;
	$jumlah_data = count($row);
	$jumlah_page = ceil($jumlah_data/$batas_data);
	$format_header = "";

	$title = "Purchase Order";
	$keterangan = $row[0]['keterangan'];
	$total_nota = $row[0]['total'];

	for ($x = 0; $x < $jumlah_page; $x++){

		$format_header = $format_header."


			<table class='table' width='90%' style='height:70px;margin-top: 5px; margin-left: 45px;'>
				<tr>
					<td width='50%' style='vertical-align: top; padding: 0;'>
						<table style='border:none;'>
							<tr>
								<td width='30%' class='myheader text-medium'>
								<img style='width: 25rem;' src='https://dev72.inspiraworld.com/mmp_dev/uploads/logo.jpg' class='card-img-top' alt='...'>
								<br>
									<font size='4'><strong> To: ".$row[0]['supplier']."</strong></font><br>
									<br>
									<font size='2'>".$row[0]['alamat']."</font><br>
									<br>
									<font size='2'><strong>Attn</strong> ".$row[0]['attn']."</font><br>
								</td>
							</tr>
						</table>
					</td>


					<br>

					
					<td width='18%' class='myheader' style='vertical-align: top; padding-top: 0;'>
					<br><br>
						
						<table class='text-medium'>

							<tr>
								<td> 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<font size='1'>Revisi : 03</font></td>
							</tr>


							<tr>
								<td> 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<font size='1'>Halaman : 1/1</font></td>
							</tr>


							<tr>
								<td> 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<font size='1'>Tanggal Terbit : ".$row[0]['tanggal']." </font></td>
							</tr>

						</table>
						<table class='myheader text-medium' style='border: 1px solid black;' width='100%'>

							<tr>
								<td>
								<br>
								<font size='4'><strong>".$title."</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
								</td>
							</tr>

							<tr>
								<td>No Po</td>
								<td>:</td>
								<td>".$row[0]['kode']."</td> 
							</tr>

							<tr>
								<td>Date Issued</td>
								<td>:</td>
								<td>".$row[0]['tanggal']."</td>
							</tr>

							<tr>
								<td>Category</td>
								<td>:</td>
								<td>".$row[0]['category']."</td>
							</tr>
				
						</table>
					</td>
				</tr>
			</table>";
		$format_header = $format_header."<table class='table-detail' width='90%' style='margin-top: 5px; margin-left: 45px;'>";
		$format_header .= "
			<tr class='text-medium'>
				<td align='center' width='15%' style='border-bottom: 1px solid black;'><strong>Account No.</strong></td>
				<td align='center' width='35%' style='border-bottom: 1px solid black;'><strong>Account Name</strong></td>
				<td align='center' width='15%' style='border-bottom: 1px solid black;'><strong>Amount</strong></td>
				<td align='center' width='35%' style='border-bottom: 1px solid black;'><strong>Memo</strong></td>
			</tr>
		";
		for ($y = 0; $y < $batas_data; $y++){
			if ($index_nomor < $jumlah_data){
				$array = (array) $row[$index_nomor];
				$format_header = $format_header."
					<tr>
					<td><font size='2'>".$array['kode_akun_detail']."</font></td>
					<td><font size='2'>".$array['nama_akun_detail']."</font></td>
					<td align='right'><font size='2'>".number_formatting($array['total_detail'],'int')."</font></td>
					<td><font size='2'>".$array['keterangan_detail']."</font></td>
					</tr>";
				$index_nomor++;
			}
			else{
				$format_header = $format_header."
					<tr style='height:20px;'>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					</tr>";
			}
		}

		$format_header = $format_header."</table>";
		if ($x < $jumlah_page-1) {
			$hal = $x + 1;
			$format_header .= "<div class='text-small' style='margin-top: 10px; margin-left: 45px;'>".date("d-m-Y H:i:s")." ".$hal ."/".$jumlah_page."</div>";
			$format_header .= "<div class='page-break'></div>";
		}
	}

	$format_header .= "
		<table class='table text-medium' width='91%' style='margin-top: 5px; margin-left: 45px;'>
			<tr>
				<td colspan=5 width='68%' style='border: 1px solid black;'>Say : ".ucwords(generate_terbilang($total_nota))." Rupiah</td>
				<td width='3%'>
				</td>
				<td width='12%' style='border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black;'>
					Total Payment
				</td>
				<td width='1%' style='border-top: 1px solid black; border-bottom: 1px solid black;'>
					:
				</td>
				<td align='right' width='13%' style='padding: 5px; border-top: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;'>
					".number_formatting($total_nota,'money')."
				</td>
				<td align='right' width='3%'>
				</td>
			</tr>
		</table>
		<table class='table text-medium' width='91%' style='margin-top: 5px; margin-left: 45px;'>
			<tr>
				<td colspan=5 rowspan=2 width='68%' style='border: 1px solid black;'>Memo : ".strtoupper($keterangan)."</td>
				<td width='32%' colspan=5>
					&nbsp;
				</td>
			</tr>
		</table>
		<table class='tg' style='margin-top: 5px; margin-left: 25px;'>
			<tr>
				<td width='1%'></td>

				<td width='5%' >
					<font size='2'>Prepared By<br>
					<!-- ttd by db -->
					<br><br><br>
					<hr>
					<font size='2'>".$row[0]['dibuat_pada']."<br> 
					</font> 
					
				</td>

				<td width='1%'></td>

				<td width='5%' >
					<font size='2'>Approved By<br>
					<!-- ttd by db -->
					<br><br><br>
					<hr>
					<font size='2'>".$row[0]['disetujui_pada']."<br> 
					</font> 
					
				</td>

				<td width='1%'></td>
				
				<td width='5%' >
					<font size='2'> Supplier <br>
					<!-- ttd by db -->
					<br><br><br>
					<hr>
					Date: 
					</font> 
					
				</td>

				<td width='20%'></td>

			</tr>
		</table>
	";

	echo $format_header;
?>

<script type="text/javascript">
// INT UNTUK GENERATE BARCODE
$(document).ready(function (){
    
});
</script>