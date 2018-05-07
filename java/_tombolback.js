$(document).keydown(function (e){
	if (e.which == '8')  {
		var pratid = e.target.id;
		var prattag = e.target.tagName;
		var pratread=e.target.readOnly;
		if ((prattag=="TEXTAREA" || prattag=="INPUT") && pratread==false){
			return true;
		}
		window.event.keyCode=0;
		return false;
	}
});
function caps(element){
	element.value = element.value.toUpperCase();
}
function cekDateTime(v){
   re = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;
   if(v.value != ''){
      if(regs = v.value.match(re)){
         if(regs[1] < 1 || regs[1] > 31){
            alert("Nilai tidak valid untuk hari: " + regs[1]);
            v.focus();
            return false;
         }
         if(regs[2] < 1 || regs[2] > 12){
            alert("Nilai tidak valid untuk bulan: " + regs[2]);
            v.focus();
            return false;
         }
         if(regs[3] < 1930 || regs[3] > (new Date()).getFullYear()){
            alert("Nilai tidak valid untuk tahun: " + regs[3] + " - must be between 1930 and " + (new Date()).getFullYear());
            v.focus();
            return false;
         }
      } else {
            alert("Format tanggal tidak valid: " + v.value);
            v.focus();
            return false;
	  }
   }
   return true;
}