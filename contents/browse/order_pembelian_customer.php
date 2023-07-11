<?php // watched
$browse["id"]               = "order_pembelian_customer";
$browse["caption"]          = "Browse Relasi";
$browse["query"]            = " SELECT
                                    a.*,
                                    CONCAT(m.kode,' - ',m.nama) AS supplier,
                                    t2.kode as kode_permintaan,
                                    m2.nama as nama_barang,
                                    t.harga_satuan,
                                    m3.nama as satuan,
                                    t.diskon_nominal_1,
                                    t.subtotal,
                                    t.keterangan,
                                    a.ppn,
                                    a.top 
                                    FROM
                                    thbeliorder a
                                    join mhrelasi m on m.nomor = a.nomormhrelasi and m.nomormhrelasikelompok = 1
                                    join tdbeliorder t on t.nomorthbeliorder = a.nomor 
                                    left join mhbarang m2 on m2.nomor = t.nomormhbarang 
                                    left join thbelipermintaan t2 on t2.nomor = t.nomorthbelipermintaan
                                    left join mhsatuan m3 on m3.nomor = t.nomormhsatuanqty 
                                WHERE
                                a.status_aktif = 1 ?
                                group by a.kode 
                                    
                                     ";
$browse["query_order"]      = "a.kode";
$browse["query_search"]     = array(
    "a.kode",
    "m.nama"
);
// $browse["param_input"] 		= array("m.nomor|nomor");
$browse["param_output"]     = array();
$browse["items"]            = array(
    "nomor||true",
	"tanggal||true",
    "kode",
    "nomormhrelasi||true",
    "supplier",
    "nama_barang||true",
    "harga_satuan||true",
    "satuan||true",
    "diskon1_nominal||true",
    "subtotal||true",
    "keterangan||true",
    "ppn||true",
    "status_ppn||true",
    "top||true",
);
$browse["items_visible"]    = array(
    "kode",
    "nama"
);
$browse["items_selected"]   = array(
    "kode"
);
$browse["selected_url"]     = "?m=order_pembelian_data&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"]          = "?m=order_pembelian_data&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"]             = "";
$browse["grid_editing"]     = "";
$browse["grid_val"]         = "";
$browse["grid_values"]      = array();
$browse["call_function"]    = "";
$browse["custom_function"]  = "";
$browse["debug"]            = 1;
?>
