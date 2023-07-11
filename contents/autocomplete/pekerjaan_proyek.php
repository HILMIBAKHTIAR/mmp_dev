<?php
$acomplete["query"] 			= "
SELECT
	* 
FROM
	(
	SELECT
		a.nomor AS 'nomor',
		a.kode AS 'kode',
		a.nama AS 'nama',
		b.nomor AS 'nomormdkontrakpekerjaan',
		c.nomor AS 'nomorthjualkontrak',
		c.kode AS 'kode_kontrak_pekerjaan',
		d.nomor nomor_mhproyek,
		a.nomor nomor_mhpekerjaan 
	FROM
		mhpekerjaan a
		JOIN mdkontrakpekerjaan b ON b.nomormhpekerjaan = a.nomor
		JOIN thjualkontrak c ON c.nomor = b.nomorthjualkontrak
		JOIN mhproyek d ON d.nomor = c.nomormhproyek 
	WHERE
		a.status_aktif = 1 
    ?
	ORDER BY
		c.tanggal 
	) z 
  GROUP BY
    nomor_mhproyek,
    nomor_mhpekerjaan
";

$acomplete["query_order"] 		= "z.nama";
$acomplete["query_search"] 		= array("a.nama", "a.kode");
$acomplete["items"] 			= array(
  "nomor",
  "nama",
  "nomorthjualkontrak",
  "kode_kontrak_pekerjaan",
  "nomormdkontrakpekerjaan"
);
$acomplete["items_visible"] 	= array("kode", "nama");
$acomplete["items_selected"]	= array("kode", "nama");
$acomplete["param_input"] 		= array("d.nomor|nomor");
$acomplete["debug"] 			= 1;
?>