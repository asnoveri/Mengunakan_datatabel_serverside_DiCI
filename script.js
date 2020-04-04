// untuk memulai jquery
$(function () {

	//list sekretaris tabel
	$(function () {
		$('#tabl_sekre').DataTable({
			"pageLength": 10,
			"serverSide": true,
			"order": [
				[0, "asc"]
			],
			"ajax": {
				url: 'http://localhost/disposisi/User_Managemen/get_op',
				type: 'POST'
			},
		});
	});
});