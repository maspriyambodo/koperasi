$(function(){
	$('#blunas').priceFormat({prefix:'',centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	$('#bungakk').priceFormat({prefix:'',centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	$('#saldoa').priceFormat({prefix:'',centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	$('#alunas').priceFormat({prefix:'',centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	$('#flunas').priceFormat({prefix:'',centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	$('#jumlah').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#saldoa').on('keyup', function() {
		var inp = $(this).val().replace(/\./g, '');
		var alunas = new Number($("#alunas").val().replace(/\./g, ''));
		var blunas = new Number($("#blunas").val().replace(/\./g, ''));
		var flunas = new Number($("#flunas").val().replace(/\./g, ''));
		var bungakk = new Number($("#bungakk").val().replace(/\./g, ''));
		saldoa = new Number(inp);
		xjum21=new Number(blunas+bungakk+saldoa+flunas+alunas);
		$('#jumlah').val(formatAngka(xjum21));
	});
	$('#blunas').on('keyup', function() {
		var inp = $(this).val().replace(/\./g, '');
		var saldoa = new Number($("#saldoa").val().replace(/\./g, ''));
		var flunas = new Number($("#flunas").val().replace(/\./g, ''));
		var bungakk = new Number($("#bungakk").val().replace(/\./g, ''));
		var alunas = new Number($("#alunas").val().replace(/\./g, ''));
		blunas = new Number(inp);
		xjum21=new Number(blunas+bungakk+saldoa+flunas+alunas);
		$('#jumlah').val(formatAngka(xjum21));
	});
	$('#alunas').on('keyup', function() {
		var inp = $(this).val().replace(/\./g, '');
		var saldoa = new Number($("#saldoa").val().replace(/\./g, ''));
		var blunas = new Number($("#blunas").val().replace(/\./g, ''));
		var flunas = new Number($("#flunas").val().replace(/\./g, ''));
		var bungakk = new Number($("#bungakk").val().replace(/\./g, ''));
		alunas = new Number(inp);
		xjum21=new Number(blunas+bungakk+saldoa+flunas+alunas);
		$('#jumlah').val(formatAngka(xjum21));
	});
	$('#bungakk').on('keyup', function() {
		var inp = $(this).val().replace(/\./g, '');
		var saldoa = new Number($("#saldoa").val().replace(/\./g, ''));
		var blunas = new Number($("#blunas").val().replace(/\./g, ''));
		var alunas = new Number($("#alunas").val().replace(/\./g, ''));
		var flunas = new Number($("#flunas").val().replace(/\./g, ''));
		bungakk = new Number(inp);
		xjum21=new Number(blunas+bungakk+saldoa+flunas+alunas);
		$('#jumlah').val(formatAngka(xjum21));
	});
	$('#flunas').on('keyup', function() {
		var inp = $(this).val().replace(/\./g, '');
		var saldoa = new Number($("#saldoa").val().replace(/\./g, ''));
		var blunas = new Number($("#blunas").val().replace(/\./g, ''));
		var bungakk = new Number($("#bungakk").val().replace(/\./g, ''));
		var alunas = new Number($("#alunas").val().replace(/\./g, ''));
		flunas = new Number(inp);
		xjum21=new Number(blunas+bungakk+saldoa+flunas+alunas);
		$('#jumlah').val(formatAngka(xjum21));
	});
});