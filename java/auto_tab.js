$(function() {
	$(".norek").autocomplete({
		minLength:2,
		source:'tampilmtr.php',
		select:function(event, ui){
			$('#text1').val(ui.item.branch);
			$('#text3').val(ui.item.sufix);
		}
	});	
	$(".cabang").autocomplete({
		//minLength:2,
		//source:'tampil_cabang.php',
		//select:function(event, ui){
		//	$('#text1').val(ui.item.branch);
		//}
	});		
	$.autotab({ tabOnSelect: true });
	$('.number').autotab('filter', 'number');
	$('.text').autotab('filter', 'text');	
	$('#function').autotab('filter', function (value, element) {
		var parsedValue = parseInt(value, 10);
		if (!value || parsedValue != value) {
			return '';
		}
		var newValue = element.value + value;
		if (newValue > 12) {
			$.autotab.next();
			return 2;
		}else if (element.value.length == 0 && value > 1) {
			$.autotab.next();
			return value;
		}else if (element.value.length == 1 && parsedValue === 0 && newValue != 10) {
			$.autotab.next();
			return 1;
		}
		return value;
	});
});