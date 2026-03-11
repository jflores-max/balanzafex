
var text = document.querySelector('.keyer').value;
var qr = QRCode.generatePNG(text, {
  ecclevel: "M",
  format: "html",
  fillcolor: "#CCCCCC00",
  textcolor: "#000000",
  margin: 0,
  modulesize: 8
});
/*var qr = QRCode.generateSVG(text, {
  ecclevel: "M",
  fillcolor: "#F2F2F200",
  textcolor: "#000000",
  margin: 0,
  modulesize: 4
});*/
document.querySelector(".qrcode").src=qr;

getSrc();

async function getSrc(){
	if(document.querySelector('.qrcode').getAttribute('src')==''){
		setTimeout(getSrc,500);
	}else{
		document.body.innerHTML+=document.querySelector('.bordered').outerHTML;
		document.querySelectorAll('.blocker')[1].style.top='50%';
		setTimeout(function(){
      window.print();
      window.close();
    },1000);
	}
}
//console.log(document.querySelectorAll('.qrcode')[0].innerHTML);
//document.querySelectorAll('.qrcode')[1].innerHTML=document.querySelectorAll('.qrcode')[0].innerHTML;
//console.log(document.querySelector('.bordered').outerHTML);