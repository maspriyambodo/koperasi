function getthedate(){var e=new Date,t=e.getYear();1e3>t&&(t+=1900);var a=e.getDay(),n=e.getMonth(),r=e.getDate();10>r&&(r="0"+r);var u=e.getHours(),o=e.getMinutes(),m=e.getSeconds(),d="AM";u>=12&&(d="PM"),u>12&&(u-=12),0==u&&(u=12),9>=o&&(o="0"+o),9>=m&&(m="0"+m);var g=dayarray[a]+", "+r+" "+montharray[n]+" "+t+" "+u+":"+o+":"+m+" "+d;document.all?document.all.clock.innerHTML=g:document.getElementById?document.getElementById("clock").innerHTML=g:document.write(g)}function goforit(){(document.all||document.getElementById)&&setInterval("getthedate()",1e3)}var dayarray=new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"),montharray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");document.all||document.getElementById||getthedate();