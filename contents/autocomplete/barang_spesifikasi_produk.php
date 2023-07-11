<?php

$acomplete["query"] = "
	Select
		CONCAT(d.kode_custom, ' | ', b.produk) as nama,
		(
			SELECT
				GROUP_CONCAT(
					DISTINCT CONCAT(
						' ',
						c.warna
					) SEPARATOR ' / '
				)
				FROM tdspesifikasiproduk c
				WHERE c.nomorthspesifikasiproduk=d.nomor AND c.status_aktif > 0
				ORDER BY c.nomor ASC
		) AS warna,
		d.struktur_packaging as komposisi,
		0 as size,
		IFNULL(d.minimun_order, 0) as moq,
		d.harga as harga,
		0 as jumlah,
		d.nomor as nomorthspesifikasiproduk
	FROM thpermintaananalisasample a
	JOIN tdpermintaananalisasample b ON b.nomorthpermintaananalisasample = a.nomor AND a.status_disetujui = 1 AND b.status_aktif = 1
	JOIN thhasilanalisasample c ON c.nomortdpermintaananalisasample = b.nomor AND c.status_disetujui = 1
	JOIN thspesifikasiproduk d ON d.nomorthhasilanalisasample = c.nomor AND d.status_disetujui = 1 AND d.is_masuk_penawaran =  0 ?
					";
$acomplete["query_order"] = "a.nomor";
$acomplete["query_search"] = array("a.nama");
$acomplete["items"] = array("nomor","kode_custom","nama", "warna", "komposisi", "size", "moq", "harga", "jumlah", "nomorthspesifikasiproduk");
$acomplete["items_visible"] = array("kode_custom", "nama");
$acomplete["items_selected"] = array("nama");
$acomplete["param_input"] = array();
$acomplete["debug"] = 1;
?>



