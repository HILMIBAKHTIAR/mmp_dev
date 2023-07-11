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
				browse_grid_master_satuan_reloadopen();
		});
		return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_satuan', 'master_satuan', '', '');
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


	}

	function autocomplete_from_jumlah_pesan_<?= $grid_id ?>(rowid, cellname) {
		console.log('jumlah pesan aktif');
		var satuan_bayar = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'satuan_bayar');
		var satuan_pesan = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'satuan_pesan');

		var jumlah_pesan = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_pesan'))

		if (satuan_pesan == satuan_bayar) {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah_bayar', jumlah_pesan);

		}

	}

	function autocomplete_from_jumlah_bayar_<?= $grid_id ?>(rowid, cellname) {
		var satuan_bayar = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'satuan_bayar');
		var satuan_pesan = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'satuan_pesan');

		var jumlah_bayar = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_bayar'))
		if (satuan_pesan == satuan_bayar) {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah_pesan', jumlah_bayar);

		}


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
			if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_satuan) {
				const nomormhsatuan_purchasing = <?= $grid_id ?>_selected_suggest.master_satuan.nomor
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhsatuan', nomormhsatuan_purchasing);
				// jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'satuan_purchasing', <?= $grid_id ?>_selected_suggest.master_satuan.nama);
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


	

		if (ppn) {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'status_ppn', 'Exclude', {
				editable: true
			});
		} else {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'status_ppn', 'Exclude', {
				editable: false
			});
		}
	

	
		var jumlah_unit = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_unit'));
		var jumlah_konversi = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_konversi'));
		var jumlah = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah'));

		var total_jumlah_terkonversi = jumlah_unit * jumlah_konversi;


		if (total_jumlah_terkonversi) {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah', total_jumlah_terkonversi);
		} else {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah', jumlah_unit);
		}

		var qty_permintaan = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'qty_permintaan'));
		// var jumlah_beli = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'jumlah_beli'));

		if (jumlah_unit > qty_permintaan) {
		jQuery(<?= $grid_id ?>_element).jqGrid('setCell',rowid,'jumlah_beli',qty_permintaan);
		alert(`Jumlah beli (${jumlah_unit}) tidak boleh lebih dari jumlah permintaan (${qty_permintaan})`);		
		}


		var jumlah_beli = 0;
		var harga = 0;

		var jumlah_beli = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah');
		var harga = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'harga_satuan');



		var diskon = 0;

		var diskon1 = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'diskon_1');
		var diskon2 = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'diskon_2');
		
		var diskon_persen1 = (harga * diskon1) / 100;
		var diskon_persen2 = (harga * diskon2) / 100;

		subtotal = (harga - diskon_persen1 - diskon_persen2) * jumlah_beli;
		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'subtotal', subtotal);
		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'diskon_1_nominal', diskon_persen1);

		
		// -----------------------------satuan---------------------------------
		// var satuan_permintaan = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'satuan_permintaan');
		// var satuan_purchasing = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'satuan_purchasing');

		// if (satuan_permintaan) {
		// 	jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'satuan_purchasing', satuan_permintaan);
		// }
		// else if (satuan_purchasing) {
		// 	jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'satuan_purchasing', satuan_purchasing);
		// } 
		// else {
		// 	jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'satuan_purchasing', satuan_permintaan);
		// }

		// -----------------------------end satuan---------------------------------




		sum_subtotal_<?= $grid_id ?>();

		toggle_pph21_23();

		if (cellname == 'jumlah_pesan') {
			autocomplete_from_jumlah_pesan_<?= $grid_id ?>(rowid, cellname);
		}
		if (cellname == 'jumlah_bayar') {
			autocomplete_from_jumlah_bayar_<?= $grid_id ?>(rowid, cellname);
		}


	sum_subtotal_<?=$grid_id?>();
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