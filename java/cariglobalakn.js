$(document).ready(function(){$("#formsearch").submit(function(){return $("#prog").progressbar({value:0}),$.ajax({type:"POST",url:linkcaridata,data:$(this).serialize(),beforeSend:function(){$("#loading").show()},success:function(o){$("#divPageAkun").html(o),$("#loading").hide(),console.log("YAYE!",arguments[0])},progress:function(o){if(o.lengthComputable){var r=o.loaded/o.total*100;$("#prog").progressbar("option","value",r).children(".ui-progressbar-value").html(r.toPrecision(3)+"%").css("display","block")}else console.warn("Content Length not reported!")},error:function(o,r,e){alert("Error: "+o.status||" - "||e),$("#loading").hide()}}),!1})}),$(function(){$("#prog").progressbar({value:0})});