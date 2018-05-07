var url = "./maintance/pengkinian_kredit.php";
$(document).ready(function(){
	var xgaji,xpbank,xplain,xself1;
	$('#simpan').click(function(){
		var r = confirm("Anda yakin data di simpan?");
		if (r == false) {
			return false;
		}
		$.ajax({
			type: 'POST',
			url : './maintance/pengkinian_kredits.php',
			data: $('#masuk').serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				alert(data);
				var text=data
				$.notiflat(text,{animateIn: 'fade', animateOut: 'slide' });
				var n = data.search("Sukses");
				if(n==0){
					goKembali();
				}
				$('#loading').hide();
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert('Error: ' + xhr.status || ' - ' || thrownError);
			}
		});
		return false;
	});
	jQuery(function($) {
		$("#tglahirw").mask("99-99-9999");
		$("#tgl_lahir").mask("99-99-9999");
		$("#tgtran").mask("99-99-9999");
		$("#tglahir").mask("99-99-9999");
		$("#tgsk").mask("99-99-9999");
		$("#tgpjk").mask("99-99-9999");
		$("#tgstnk").mask("99-99-9999");
		$("#tgmati").mask("99-99-9999");
		$("#tgklaim").mask("99-99-9999");
		$("#tktprekom").mask("99-99-9999");
	});
	$("#lookupkota").lookupbox({
		title: 'Daftar Kabupaten',
		url: 'lookup/lookup_kota.php?chars=',
		imgLoader: '<img src="./images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=brekom]').val(data.kode);
			$('#nmkota').html(data.desc1);
		},
		tableHeader: ['Kode','Kabupaten','Propinsi']
	});
	$('#gaji').on('keyup', function() {
		variabell();
		var inp=$(this).val().replace(/\./g, '');
		xgaji=new Number(inp);
		xjum11=new Number(xgaji+xself1);
		$('#self2').val(formatAngka(xjum11));
	});
	$('#pbank').on('keyup', function() {
		variabell();
		var inp=$(this).val().replace(/\./g, '');
		xpbank=new Number(inp);
		xjum21=new Number(xpbank+xplain);
		$('#self3').val(formatAngka(xjum21));
	});
	$('#plain').on('keyup', function() {
		variabell();
		var inp=$(this).val().replace(/\./g, '');
		xplain=new Number(inp);
		xjum21=new Number(xpbank+xplain);
		$('#self3').val(formatAngka(xjum21));
	});
	$('#self1').on('keyup', function() {
		variabell();
		var inp=$(this).val().replace(/\./g, '');
		xself1=new Number(inp);
		xjum11=new Number(xgaji+xself1);
		$('#self2').val(formatAngka(xjum11));
	});
	function variabell(){
		xgaji=new Number($("#gaji").val().replace(/\./g, ''));
		xpbank=new Number($("#pbank").val().replace(/\./g, ''));
		xplain=new Number($("#plain").val().replace(/\./g, ''));
		xself1=new Number($("#self1").val().replace(/\./g, ''));
	}
});
function editsaldo() {
	$("#koreksisaldo").dialog({
		title:"Koreksi Saldo Nominatif",
		height: 450,
		width: 800,
		modal: true ,
		buttons: { 
			Simpan: function() {
				$.ajax({
					type: 'POST',
					url : './maintance/pengkinian_kredit11.php',
					data: $('#editmasuk').serialize(),
					beforeSend: function () {
						$('#loading').show();
					},
					success: function (data) {
						$('#loading').hide();
						alert(data);
					}
				});
				$(this).dialog('close');
			},
			close: function() {
				$(this).dialog('close'); 
			} 
		} 
	})
	return false;
}
$(function(){
	$('#gaji').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#self1').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#self2').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#self3').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#plain').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#pbank').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#tbunga').priceFormat({prefix: '', centsSeparator: '.', thousandsSeparator: ',', centsLimit: 2});
	$('#flunas').priceFormat({prefix: '', centsSeparator: '.', thousandsSeparator: ',', centsLimit: 2});
	$('#saldoawal').priceFormat({prefix:'',centsSeparator: ',',thousandsSeparator: '.', centsLimit: 0});
	$('#mutdebet').priceFormat({prefix: '', centsSeparator: ',',thousandsSeparator: '.', centsLimit: 0});
	$('#mutkredit').priceFormat({prefix: '', centsSeparator: ',',thousandsSeparator: '.',centsLimit: 0});
	$('#memdebet').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.',centsLimit: 0});
	$('#memkredit').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator:'.',centsLimit: 0});
	$('#saldoakhir').priceFormat({prefix: '',centsSeparator: ',',thousandsSeparator:'.', centsLimit: 0});
});
function goKembali() {
	$('#innertub').load(url);
}
function formatAngka(angka){
	if (typeof(angka) != 'string') angka = angka.toString();
	var reg = new RegExp('([0-9]+)([0-9]{3})');
	while(reg.test(angka)) angka = angka.replace(reg, '$1.$2');
	return angka;
}