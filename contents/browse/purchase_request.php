<?php 

$edit["string_code"] = "kode_permintaan_pembelian";
$a = formatting_code($con, $edit["string_code"]);
echo $a;

$browse["id"]               = "purchase_request";
$browse["caption"]          = "Browse Relasi Silinder";
$browse["query"]            = "SELECT
                                    a.*,
                                    '$a' as kode_variabel,
                                    CONCAT(a.kode, ' - ', CHAR(64 + sub.row_num)) AS generated_kode,
                                    (SELECT GROUP_CONCAT(DISTINCT CONCAT('&#x25C8;&nbsp;', x.kode) SEPARATOR '<br>') 
                                    FROM tdbelipermintaan a1 join mhbarang x on x.nomor = a1.nomormhbarang WHERE a1.nomorthbelipermintaan = a.nomor AND a1.status_aktif>0) kode_barang,
                                    (SELECT GROUP_CONCAT(DISTINCT CONCAT('&#x25C8;&nbsp;', x.nama) SEPARATOR '<br>') 
                                    FROM tdbelipermintaan a1 join mhbarang x on x.nomor = a1.nomormhbarang WHERE a1.nomorthbelipermintaan = a.nomor AND a1.status_aktif>0) nama_barang,
                                    (SELECT GROUP_CONCAT(DISTINCT CONCAT('&#x25C8;&nbsp;', format(a1.jumlah, 0)) SEPARATOR '<br>') 
                                    FROM tdbelipermintaan a1 WHERE a1.nomorthbelipermintaan = a.nomor AND a1.status_aktif>0) qty
                                FROM
                                thbelipermintaan a
                                JOIN (
                                    SELECT
                                        kode,
                                        (@row_number:=IF(@prev_kode=kode, @row_number+1, 1)) AS row_num,
                                        (@prev_kode:=kode) AS prev_kode
                                    FROM
                                        thbelipermintaan,
                                        (SELECT @row_number:=0, @prev_kode:='') AS x
                                    WHERE
                                        nomorthbelipermintaan IS NULL
                                        AND status_aktif = 1
                                    ) AS sub ON a.kode = sub.kode
                                WHERE a.nomorthbelipermintaan is null and
                                a.status_aktif = 1 ?
                                ";
$browse["query_order"]      = "a.nomor";
$browse["query_search"]     = array(
    "a.nomor",
    "a.kode"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array();
$browse["items"]            = array(
    "nomor||true",
    "generated_kode||true",
    "kode_variabel||true",
    "kode|Purchase Request",
    "kode_barang|Kode Barang",
    "nama_barang|Nama Barang",
    "qty"
);
$browse["items_visible"]    = array(
    "nomor",
    "kode"
);
$browse["items_selected"]   = array(
    "kode"
);
$browse["selected_url"]     = "?m=permintaan_pembelian&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"]          = "?m=permintaan_pembelian&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"]             = "";
$browse["grid_editing"]     = "";
$browse["grid_val"]         = "";
$browse["grid_values"]      = array();
$browse["call_function"]    = "";
$browse["custom_function"]  = "";
$browse["debug"]            = 1;
?>
