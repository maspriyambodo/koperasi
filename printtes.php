<script type="text/javascript" src="java/jzebra.js"></script>
<body onLoad="detectPrinter()">
<table width="75%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr> <td colspan="2" bgcolor="#fefab1"><span id="printerStatusBar">Loading...</span></td></tr>
<tr> <td width="47%"><form name="form1" method="post" >
String untuk dicetak<br>
<textarea name="struk" cols="50" rows="7" id="struk"></textarea>
<br><input name="button" type=button onClick="printStruk(form1.struk.value)" value="Test Cetak">
<input name="button2" type=button onClick="print64()" value="Test Cetak (Base64)">
<input type="reset" name="Reset" value="Reset"></form></td>
<td width="53%">
<applet name="jZebra" code="jzebra.RawPrintApplet.class" archive="js/jzebra.jar" width="100" height="100">
<param name="printer" value="zebra">
<param name="sleep" value="200"></applet></td></tr></table>

<script>
function detectPrinter(){
	var applet = document.jZebra;
	if (applet != null){
		applet.findPrinter("zebra");
		while (!applet.isDoneFinding()){
		// Wait
		}
		var ps = applet.getPrintService();
		if (ps == null) var info="Printer belum siap";
		else var info="Printer \"" + ps.getName() + "\" siap";
	}else{
		var info="Java Runtime belum siap!";
		document.getElementById("printerStatusBar").innerHTML=info;
		window.setTimeout('detectPrinter()',5000);
	}
}

function printStruk(str){
	var applet = document.jZebra;
	if (applet != null){
		// Plain Text
		str=returnEnter(str);
		applet.append(str);
		// Send to the printer
		applet.print();
		while (!applet.isDonePrinting()){
		// Wait
		}
		var e = applet.getException();
		if (e == null) var info="Printed Successfully";
		else var info="Error: " + e.getLocalizedMessage();
	}else{
		var info="Printer belum siap";
	}
	document.getElementById("printerStatusBar").innerHTML=info;
}

function returnEnter(dataStr){
	return dataStr.replace(/(\r\n|\r|\n)/g, "\n");
}
</script>