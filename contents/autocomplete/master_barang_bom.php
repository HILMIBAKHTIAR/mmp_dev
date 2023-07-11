<?php
$acomplete["query"] = "
SELECT
a.*,
a.nomor AS nomormhbarang,
a.nama AS nama_bahan_baku,
a.lebar AS lebar,
a.panjang AS meter,
a.`ketebalan` AS micron,
a.`berat_jenis` AS density,
a.stok_maximum as stok,
b.nama AS categori,
a.kode as kode_barang,
c.nama as satuanrnd,
a.nomormhbarangkategori
FROM
mhbarang a
JOIN mhbarangkategori b ON a.`nomormhbarangkategori` = b.nomor
join mhsatuan c on a.nomormhsatuanqtyrnd = c.nomor
WHERE a.status_aktif = 1 ?";
$acomplete["query_order"] = "a.kode";
$acomplete["query_search"] = array("a.kode");
$acomplete["items"] = array(
	"nomor||true",
	"nama_bahan_baku",
	"lebar",
	"meter",
	"micron",
	"density",
	"categori",
	"stok",
	"kode_barang",
	"satuanrnd",
	"nomormhsatuanqtyrnd",
	"nomormhbarangkategori||true"
);
$acomplete["items_visible"] = array("kode_barang", "nama");
$acomplete["items_selected"] = array("nama");
$acomplete["param_input"] = array(
	"a.nomormhbarangkategori|nomormhbarangkategori",
);
$acomplete["debug"] = 1;
