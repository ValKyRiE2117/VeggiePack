<tr class="row-keranjang">
	<td class="nama_barang">
		<?= $this->input->post('nama_barang') ?>
		<input type="hidden" name="nama_barang_hidden[]" value="<?= $this->input->post('nama_barang') ?>">
	</td>
	<td class="jumlah">
		<?= $this->input->post('jumlah') ?>
		<input type="hidden" name="jumlah_hidden[]" value="<?= $this->input->post('jumlah') ?>">
	</td>
	<td class="total_harga">
		<?= $this->input->post('sub_total ') ?>
		<input type="hidden" name="sub_total_hidden[]" value="<?= $this->input->post('sub_total ') ?>">
    </td>
</td>

	<td class="aksi">
		<button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama-barang="<?= $this->input->post('nama_barang') ?>"><i class="fa fa-trash"></i></button>
	</td>
</tr>

