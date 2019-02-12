<head>
<Title>Bits and Bytez</Title><link rel="shortcut icon" href="favicon.ico"/><meta charset="UFT-8"><link rel="stylesheet" href="http://bitsandbytez.co.uk/css/screen2.css">
<meta name="viewport" content="user-scalable=no" /><meta name="Description" content="Create a profile today on Bits and Bytez's social network for nerds.">
<meta name="Keywords" content="technology,computing,learn,history of the computer,individuals important to computing, facebook, twitter, google, computers, quantum, myspace">
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
<!--

//LCD Clock script- by javascriptkit.com
//Visit JavaScript Kit (http://javascriptkit.com) for script
//Credit must stay intact for use

var alternate=0
var standardbrowser=!document.all&&!document.getElementById

if (standardbrowser)
document.write('<form name="tick"><input type="text" name="tock" size="11"></form>')

function show(){
if (!standardbrowser)
var clockobj=document.getElementById? document.getElementById("digitalclock") : document.all.digitalclock
var Digital=new Date()
var hours=Digital.getHours()
var minutes=Digital.getMinutes()
var dn="AM"

if (hours==12) dn="PM" 
if (hours>12){
dn="PM"
hours=hours-12
}
if (hours==0) hours=12
if (hours.toString().length==1)
hours="0"+hours
if (minutes<=9)
minutes="0"+minutes

if (standardbrowser){
if (alternate==0)
document.tick.tock.value=hours+" : "+minutes+" "+dn
else
document.tick.tock.value=hours+"   "+minutes+" "+dn
}
else{
if (alternate==0)
clockobj.innerHTML=hours+" : "+minutes+" "+"<sup style='font-size:70%'>"+dn+"</sup>"
else
clockobj.innerHTML=hours+" : "+minutes+" "+"<sup style='font-size:70%'>"+dn+"</sup>"
}
alternate=(alternate==0)? 1 : 0
setTimeout("show()",1000)
}
window.onload=show

</script>
</head>

