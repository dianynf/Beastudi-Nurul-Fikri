    <!-- Footer -->
    <footer class="sticky-footer bg-white">
    	<div class="container my-auto">
    		<div class="copyright text-center my-auto">
    			<span>Copyright &copy; STT Terpadu Nurul Fikri <?= date('Y'); ?></span>
    		</div>
    	</div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
    	<i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
    				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">×</span>
    				</button>
    			</div>
    			<div class="modal-body">
    				Pilih <b>Keluar</b> di bawah ini jika Anda siap untuk mengakhiri</div>
    			<div class="modal-footer">
    				<button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
    				<a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Keluar</a>
    			</div>
    		</div>
    	</div>
    </div>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/myscript.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

    <script src="<?php echo base_url('assets/js/jQuery-2.1.4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>

    <script>
    	$(document).ready(function() {
    		$('.datepicker').datepicker({
    			format: 'dd-mm-yyyy',
    			autoclose: true,
    			todayHighlight: true,
    		});
    	});
    </script>

    <script>
    	$('.custom-file-input').on('change', function() {
    		let fileName = $(this).val().split('\\').pop();
    		$(this).next('.custom-file-label').addClass('selected').html(fileName);
    	});

    	//ambil data terlebih dahulu
    	$('.form-check-input').on('click', function() {
    		const menuId = $(this).data('menu');
    		const roleId = $(this).data('role');

    		$.ajax({
    			url: "<?= base_url('admin/changeaccess'); ?>",
    			type: 'post',
    			data: {
    				menuId: menuId,
    				roleId: roleId
    			},
    			success: function() {
    				document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
    			}
    		});
    	});
    </script>

    <!-- untuk input uang -->
    <script>
    	var rupiah = document.getElementById("rupiah");
    	rupiah.addEventListener("keyup", function(e) {
    		// tambahkan 'Rp.' pada saat form di ketik
    		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    		rupiah.value = formatRupiah(this.value, " ");
    	});

    	/* Fungsi formatRupiah */
    	function formatRupiah(angka, prefix) {
    		var number_string = angka.replace(/[^,\d]/g, "").toString(),
    			split = number_string.split(","),
    			sisa = split[0].length % 3,
    			rupiah = split[0].substr(0, sisa),
    			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    		// tambahkan titik jika yang di input sudah menjadi angka ribuan
    		if (ribuan) {
    			separator = sisa ? "." : "";
    			rupiah += separator + ribuan.join(".");
    		}

    		rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    		return prefix == undefined ? rupiah : rupiah ? " " + rupiah : "";
    	}
    </script>

    <script>
    	$(document).ready(function() {
    		$("#input-b9").fileinput({
    			showPreview: false,
    			showUpload: false,
    			elErrorContainer: '#kartik-file-errors',
    			allowedFileExtensions: ["jpg", "png", "gif"]
    			//uploadUrl: '/site/file-upload-single'
    		});
    	});
    </script>

    <!-- multi -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>


    <script type="text/javascript">
    	$(document).ready(function() {
    		$(".mul-select").select2({
    			placeholder: "  Pilih Kontribusi", //placeholder
    			tags: true,
    			tokenSeparators: ['/', ',', ';', " "]
    		});


    		//GET UPDATE
    		// $('.update-record').on('click', function() {
    		// 	var beastudi_id = $(this).data('beastudi_id');
    		// 	var beastudi_name = $(this).data('beastudi_name');
    		// 	$(".strings").val('');
    		// 	$('#UpdateModal').modal('show');
    		// 	$('[name="edit_id"]').val(beastudi_id);
    		// 	$('[name="beastudi_edit"]').val(beastudi_name);
    		// 	//AJAX REQUEST TO GET SELECTED PRODUCT
    		// 	$.ajax({
    		// 		url: "<?php echo site_url('beastudi/get_kontribusi_by_beastudi'); ?>",
    		// 		method: "POST",
    		// 		data: {
    		// 			beastudi_id: beastudi_id
    		// 		},
    		// 		cache: false,
    		// 		success: function(data) {
    		// 			var item = data;
    		// 			var val1 = item.replace("[", "");
    		// 			var val2 = val1.replace("]", "");
    		// 			var values = val2;
    		// 			$.each(values.split(","), function(i, e) {
    		// 				$(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
    		// 				$(".strings").selectpicker('refresh');

    		// 			});
    		// 		}

    		// 	});
    		// 	return false;
    		// });

    		// $('.detail-record').on('click', function() {
    		// 	var beastudi_id = $(this).data('beastudi_id');
    		// 	var beastudi_name = $(this).data('beastudi_name');
    		// 	$(".strings").val('');
    		// 	$('#DetailModal').modal('show');
    		// 	$('[name="edit_id"]').val(beastudi_id);
    		// 	$('[name="beastudi_edit"]').val(beastudi_name);
    		// 	//AJAX REQUEST TO GET SELECTED PRODUCT
    		// 	$.ajax({
    		// 		url: "<?php echo site_url('beastudi/get_kontribusi_by_beastudi'); ?>",
    		// 		method: "POST",
    		// 		data: {
    		// 			beastudi_id: beastudi_id
    		// 		},
    		// 		cache: false,
    		// 		success: function(data) {
    		// 			var item = data;
    		// 			var val1 = item.replace("[", "");
    		// 			var val2 = val1.replace("]", "");
    		// 			var values = val2;
    		// 			$.each(values.split(","), function(i, e) {
    		// 				$(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
    		// 				$(".strings").selectpicker('refresh');

    		// 			});
    		// 		}

    		// 	});
    		// 	return false;
    		// });

    		// //GET CONFIRM DELETE
    		// $('.delete-record').on('click', function() {
    		// 	var beastudi_id = $(this).data('beastudi_id');
    		// 	$('#DeleteModal').modal('show');
    		// 	$('[name="delete_id"]').val(beastudi_id);
    		// });

    	});
    </script>
    <!-- update 17 nov 2020 -->


    <script>
    	$(document).ready(function() {
    		// Sembunyikan alert validasi kosong
    		$("#kosong").hide();
    	});
    </script>

    </body>

    </html>
