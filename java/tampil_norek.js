$(function(){
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
function blurFunction() {
	var text1= $("#text1").val();
	var text2= $("#text2").val();
	var text3= $("#text3").val();
	dataString='text1='+text1+'&text2='+text2+'&text3='+text3;
	$.ajax({
		type: 'GET',
		dataType: 'json',
		url : 'onblur_norek.php',
		data: dataString,
		beforeSend: function (){
			$('#loading').show();
		},
		success: function (data){
			if(data.pesan=='Sukses'){
				$("#text1").val(data.branch);
				$("#text2").val(data.nonas);
				$("#text3").val(data.sufix);
			}
			$('#loading').hide();
		}
	});
	return false;
}