<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
	function autocomplete_barang(element) {
		// SETTING DATA AUTOCOMPLETE

		$(element).on('keyup', function(e) {
			if (e.which === 113) {
				// FUNCTION BELUM DIPERLUKAN
				// browse_master_barang_divisi_reloadopen();
			}
		});
		return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_barang', 'master_barang', 'tipe_stok|tipe_stok', '');
		// END SETTING DATA AUTOCOMPLETE
	}

	function autocomplete_satuan_purchasing(element) {
		$(element).on('keyup', function(e) {
			if (e.which === 113)
				browse_grid_master_satuan_purchasing_reloadopen();
		});
		return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_satuan_purchasing', 'master_satuan_purchasing', '', '');
	}


	function autocomplete_merk(element) {
		$(element).on('keyup', function(e) {
			if (e.which === 113)
				browse_grid_mdbarangmerk_reloadopen();
		});
		return autocomplete_grid_<?= $grid_id ?>(element, 0, 'mdbarangmerk', 'mdbarangmerk', '', '');
	}

	function autocomplete_alias(element) {
		var nomormhbarang = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', <?= $grid_id ?>_editing_rowid, 'nomormhbarang');

		if (nomormhbarang != '') {
			$('#grid_aktif_nomormhbarang').val(nomormhbarang);

			$(element).on('keyup', function(e) {
				if (e.which === 113)
					browse_master_barang_satuan_reloadopen();
			});
			return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_barang_alias', 'master_barang_alias', 'nomormhbarang|grid_aktif_nomormhbarang', '');
		} else
			return false;
	}

	function autocomplete_from_jumlah_pesan_<?= $grid_id ?>(rowid, cellname) {
		console.log('jumlah pesan aktif');
		var satuan_bayar = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'satuan_bayar');
		var satuan_pesan = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'satuan_pesan');

		var jumlah_pesan = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_pesan'))

		if (satuan_pesan == satuan_bayar) {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah_bayar', jumlah_pesan);

		}

		var jumlah_bayar = 0;
		var harga_satuan = 0;

		var jumlah_bayar = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_bayar');
		var harga_satuan = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'harga_satuan');
		var total = jumlah_bayar * harga_satuan;
		var diskon = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'diskon');
		var subtotal = 0;
		var nominal_diskon = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'nominal_diskon');
		subtotal = total;
		subtotal = total * ((100 - diskon) / 100);
		subtotal = subtotal - nominal_diskon;
		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'subtotal', subtotal);
		// sum_subtotal_<?= $grid_id ?>();

		sum_subtotal_<?= $grid_id ?>();

	}

	function autocomplete_from_jumlah_pesan_<?= $grid_id ?>(rowid, cellname) {
		console.log('jumlah pesan aktif');
		var satuan_bayar = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'satuan_bayar');
		var satuan_pesan = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'satuan_pesan');

		var jumlah_pesan = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_pesan'))

		if (satuan_pesan == satuan_bayar) {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah_bayar', jumlah_pesan);

		}

		var jumlah_bayar = 0;
		var harga_satuan = 0;

		var jumlah_bayar = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_bayar');
		var harga_satuan = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'harga_satuan');
		var total = jumlah_bayar * harga_satuan;
		var diskon = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'diskon');
		var subtotal = 0;
		var nominal_diskon = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'nominal_diskon');
		subtotal = total;
		subtotal = total * ((100 - diskon) / 100);
		subtotal = subtotal - nominal_diskon;
		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'subtotal', subtotal);
		// sum_subtotal_<?= $grid_id ?>();

		sum_subtotal_<?= $grid_id ?>();

	}

	function autocomplete_from_jumlah_bayar_<?= $grid_id ?>(rowid, cellname) {
		var satuan_bayar = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'satuan_bayar');
		var satuan_pesan = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'satuan_pesan');

		var jumlah_bayar = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_bayar'))
		if (satuan_pesan == satuan_bayar) {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah_pesan', jumlah_bayar);

		}

		var jumlah_bayar = 0;
		var harga_satuan = 0;

		var jumlah_bayar = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_bayar');
		var harga_satuan = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'harga_satuan');
		var total = jumlah_bayar * harga_satuan;
		var diskon = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'diskon');
		var subtotal = 0;
		var nominal_diskon = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'nominal_diskon');
		subtotal = total;
		subtotal = total * ((100 - diskon) / 100);
		subtotal = subtotal - nominal_diskon;
		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'subtotal', subtotal);
		// sum_subtotal_<?= $grid_id ?>();

		sum_subtotal_<?= $grid_id ?>();

	}

	// ----------------------------------------test-------------------------------------
	
	function autocomplete_master_relasi(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_grid_master_relasi_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_relasi', 'master_relasi', '', '');
    }



	function after_complete_<?= $grid_id ?>(rowid, cellname) {

		if (cellname == 'barang') {
			if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_barang) {
				// SETTING OTHER FIELD
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhbarang', <?= $grid_id ?>_selected_suggest.master_barang.nomor);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nama_nomormhsatuan', <?= $grid_id ?>_selected_suggest.master_barang.namanomormhsatuan);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhsatuan', <?= $grid_id ?>_selected_suggest.master_barang.nomormhsatuan);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nama_satuan_pesan', <?= $grid_id ?>_selected_suggest.master_barang.nama_satuan_pesan);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'satuan_pesan', <?= $grid_id ?>_selected_suggest.master_barang.satuan_pesan);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nama_satuan_stok', <?= $grid_id ?>_selected_suggest.master_barang.nama_satuan_stok);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'satuan_stok', <?= $grid_id ?>_selected_suggest.master_barang.satuan_stok);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nama_satuan_bayar', <?= $grid_id ?>_selected_suggest.master_barang.nama_satuan_bayar);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'satuan_bayar', <?= $grid_id ?>_selected_suggest.master_barang.satuan_bayar);



			}

		}
		if (cellname == 'alias') {
			if (<?= $grid_id ?>_selected_suggest) {
				// SETTING OTHER FIELD
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormdbarangalias', <?= $grid_id ?>_selected_suggest.master_barang_alias.nomor);

			}

		}
		if (cellname == 'nama_satuan_pesan') {
			if (<?= $grid_id ?>_selected_suggest) {
				// SETTING OTHER FIELD
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'satuan_pesan', <?= $grid_id ?>_selected_suggest.master_barang_satuan.nomor);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah_konversi', <?= $grid_id ?>_selected_suggest.master_barang_satuan.jumlah_konversi);


			}

		}
		if (cellname == 'nama_satuan_bayar') {
			if (<?= $grid_id ?>_selected_suggest) {
				// SETTING OTHER FIELD
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'satuan_bayar', <?= $grid_id ?>_selected_suggest.master_barang_satuan.nomor);

			}

		}

		if (cellname == 'satuan_purchasing') {
			if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_satuan_purchasing) {
				const nomormhsatuan_purchasing = <?= $grid_id ?>_selected_suggest.master_satuan_purchasing.nomor
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhsatuan_purchasing', nomormhsatuan_purchasing);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'satuan_purchasing', <?= $grid_id ?>_selected_suggest.master_satuan_purchasing.nama);
			}
		}


		if (cellname == 'merk') {
			if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.mdbarangmerk) {
				const nomormdbarangmerek = <?= $grid_id ?>_selected_suggest.mdbarangmerk.nomor
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormdbarangmerk', nomormdbarangmerek);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'merk', <?= $grid_id ?>_selected_suggest.mdbarangmerk.nama);
			} else {
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormdbarangmerk', 0);
			}
		}

		// ------------------------test-------------------------
		if (cellname == 'supplier') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_relasi) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhrelasi', <?= $grid_id ?>_selected_suggest.master_relasi.nomor);
            }       
        }



		<?= $grid_id ?>_selected_suggest = false;


	}

	function grid_complete_<?= $grid_id ?>() {
		// NO FUNCTION
		sum_subtotal_<?= $grid_id ?>();
	}

	function sum_subtotal_<?= $grid_id ?>() {
		var subtotal = jQuery(<?= $grid_id ?>_element).jqGrid('getCol', 'subtotal', false, 'sum');
		$('#sum_subtotal_<?= $grid_id ?>').val(subtotal);
		$('#total').val(subtotal);
		calculate_summary('<?= $grid_str[0] ?>');
	}

	function after_save_cell_<?= $grid_id ?>(rowid, cellname) {
		// NO FUNCTION
		var ppn = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'ppn');
		var status_ppn = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'status_ppn');

		if (cellname == 'ppn') {

			if (ppn === 1) {
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'status_ppn', 'Include', {
					editable: true
				});
			} else {
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'status_ppn', 'Exclude', {
					editable: false
				});
			}
		}

		if (cellname == 'status_ppn') {
			if (ppn == 0 && status_ppn == 'Include') {
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'status_ppn', 'Exclude');
				alert('Kolom Status PPN harus diisi dengan "Exclude" Jika Kolom PPN == Non PPN');
			}
		}

		//untuk pengecekan qty 
		var konversi_persatuan = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'konversi_persatuan'));
		var konversi_pertotal = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'konversi_pertotal'));
		var jumlah_pembelian = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_beli'));
		var qty_permintaan = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'qty_permintaan'));

		var total_jumlah_terkonversi = konversi_persatuan * jumlah_pembelian;

		console.log({
			total_jumlah_terkonversi,
			konversi_pertotal
		})

		
		if (total_jumlah_terkonversi > konversi_pertotal) {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah_beli', qty_permintaan / konversi_persatuan);
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah_terkonversi', qty_permintaan);
			alert(`Jumlah beli (${jumlah_pembelian} = ${total_jumlah_terkonversi}) tidak boleh lebih dari jumlah permintaan (${qty_permintaan})`);
		} else {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah_terkonversi', total_jumlah_terkonversi);
		}


		// var qty_permintaan = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'qty_permintaan'));
		// var jumlah_beli = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'jumlah_beli'));

		// if (jumlah_beli > qty_permintaan) {
		// jQuery(<?= $grid_id ?>_element).jqGrid('setCell',rowid,'jumlah_beli',qty_permintaan);
		// alert("Jumlah beli tidak boleh lebih dari jumlah permintaan");		
		// }


		var jumlah_beli = 0;
		var harga = 0;

		var jumlah_beli = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'qty');
		var harga = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'harga');

		// var jumlah_pesan=0;

		// var jumlah_pesan = jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'jumlah_pesan');
		// var jumlah_konversi = jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'jumlah_konversi');
		// var jumlah = jumlah_konversi*jumlah_pesan;
		// jQuery(<?= $grid_id ?>_element).jqGrid('setCell',rowid,'jumlah',jumlah);

		// var total = jumlah_bayar * harga_satuan;
		// var diskon=jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'diskon');

		// var nominal_diskon=jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'nominal_diskon');
		// subtotal=total;
		// subtotal=total*((100-diskon)/100);
		// subtotal=subtotal-nominal_diskon;
		// jQuery(<?= $grid_id ?>_element).jqGrid('setCell',rowid,'subtotal',subtotal);


		var subtotal = 0;
		var diskon_1 = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'diskon_1');
		var diskon_2 = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'diskon_2');
		var nominal_diskon_1 = (harga * diskon_1) / 100;
		var nominal_diskon_2 = (harga * diskon_2) / 100;

		console.log(diskon_1);
		console.log(diskon_2);

		var diskon = 0;

		var diskon = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'total_diskon');

		subtotal = (harga - diskon) * jumlah_beli;
		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'subtotal', subtotal);



		sum_subtotal_<?= $grid_id ?>();

		toggle_pph21_23();

		if (cellname == 'jumlah_pesan') {
			autocomplete_from_jumlah_pesan_<?= $grid_id ?>(rowid, cellname);
		}
		if (cellname == 'jumlah_bayar') {
			autocomplete_from_jumlah_bayar_<?= $grid_id ?>(rowid, cellname);
		}
	}

	function after_delete_<?= $grid_id ?>() {
		// NO FUNCTION
		sum_subtotal_<?= $grid_id ?>();
	}

	function row_validation_<?= $grid_id ?>(rowid) {
		// SETTING ROW VALIDATION
		var cells = [];

		var check_failed = checkValueCells_<?= $grid_id ?>(rowid, cells);

		if (check_failed != '') {
			return check_failed;
		} else {
			return true;
		}

		// END SETTING ROW VALIDATION
	}



	
</script>