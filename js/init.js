
document.addEventListener('DOMContentLoaded', function() {
	var elems = document.querySelectorAll('.sidenav');
	var instances = M.Sidenav.init(elems);
	append('body','<div id="addend" class="extra" style="height: 100vh;display:none;width: 100vw; position: fixed; top: 0; left: 0; text-align: center; z-index:9999;"></div>');
});
function checke(ele){
	if(typeof ele == 'string'){
		return querySelector(ele)!=null;
	}else{
		return ele!=null;
	}
}
function queryLast(selector){
	return [...document.querySelectorAll(selector)].pop();
}
function queryIndex(selector,index){
	return document.querySelectorAll(selector)[index];
}
function querySelector(selector){
	if(document.querySelector(selector)==null){
		log(selector+' is undefined');
	}
	return document.querySelector(selector);
}
function querySelectorAll(selector){
	return document.querySelectorAll(selector);
}
function queryForeach(selector,funcion){
	document.querySelectorAll(selector).forEach(funcion);
}
function hideEle(selector){
	if(typeof selector == 'string'){
		queryForeach(selector,el => el.style.display="none");
	}else{
		selector.style.display="none";
	}
}
function showEle(selector){
	if(typeof selector == 'string'){
		queryForeach(selector,el => el.style.display="block");
	}else{
		selector.style.display="block";
	}
}

function append(ele,htmlString){
	querySelector(ele).innerHTML+=htmlString;
}
function addEvents(ele,events,funcion){
	events.forEach(el=>ele.addEventListener(el,funcion));
}
function refresh(){
	if(debug){
		refresher++;
		/*log('refresh : '+refresher);*/
	}
	M.updateTextFields();
	if(querySelectorAll('.extra').length==0){
		
	}
	queryForeach('input.form',function(ele,index,ar){
		addEvents(ele,['keydown','keypress','keyup','paste','input'],function(event){
			this.value=this.value.toUpperCase();
		});
	});
	queryForeach('.uper',function(ele,index,ar){
		ele.classList.remove('uper');
		addEvents(ele,['keydown','keypress','keyup','paste','input'],function(event){
			this.value=this.value.toUpperCase();
		});
	});
	queryForeach('.int',function(ele,index,ar){
		ele.classList.remove('int');
		addEvents(ele,['keydown','keypress','keyup','paste','input'],function(event){
			this.value=this.value.replace(/[^0-9]/g, '');
			var max=this.getAttribute('max');
			if(max!=null&this.value!=''){
				if(parseInt(this.value)>(parseInt(max))){
					this.value=parseInt(max);
				}
			}
		});
	});

	queryForeach('.textt',function(ele,index,ar){
		ele.classList.remove('textt');
		addEvents(ele,['keydown','keypress','keyup','paste','input'],function(event){
			this.value=this.value.toUpperCase();
		});
	});


	queryForeach('.float',function(ele){
		ele.classList.remove('float');
		addEvents(ele,['keydown','keypress','keyup','paste','input'],function(event){
			while ( (this.value.split(".").length - 1) > 1 ) {
				this.value=this.value.slice(0, -1);
				if ( (this.value.split(".").length - 1) > 1 ) {
					continue;
				} else {
					return false;
				}
			}
			this.value=this.value.replace(/[^0-9.]/g, '');
			var int_num_allow = 100;
			var float_num_allow = 100;
			var iof = this.value.indexOf(".");
			if ( iof != -1 ) {
				if ( this.value.substring(0, iof).length > int_num_allow ) {
					this.value='';
					this.getAttribute('placeholder', 'invalid number');
				}
				this.value=this.value.substring(0, iof + float_num_allow + 1);
			} else {
				this.value=this.value.substring(0, int_num_allow);
			}
			var max=this.getAttribute('max');
			if(max!=null&this.value!=''&this.value!=='.'){
				if(parseFloat(this.value)>(parseFloat(max))){
					this.value=parseFloat(max);
				}
			}
			return true;
		});
	});
	querySelectorAll('.form').forEach(function(ele,index,array){

	});
	querySelectorAll('input[type=text]').forEach(function(ele,index,array){

	});

	var instances = M.Modal.init(querySelectorAll('.modal'), {});
	querySelectorAll('img').forEach(function(ele,index,array){
		ele.onerror=function(){
			this.setAttribute('src',this.getAttribute('notfound'));
		}
	});
	var elems = document.querySelectorAll('.datepicker');
	var instances = M.Datepicker.init(elems,{format:'yyyy-mm-dd',i18n:{months:['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Deciembre'],
		monthsShort:['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
		weekdaysShort:['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
		weekdaysAbbrev:['D','L','M','M','J','V','S']} });

	var elems = document.querySelectorAll('.timepicker');
	var instances = M.Timepicker.init(elems, {defaultTime:'now'});
	var elems=[];
	queryForeach('select',function(ele){
		if(ele.parentNode.querySelectorAll('label').length>0){
			if(!ele.parentNode.querySelector('label').classList.contains('active')){
				ele.parentNode.querySelector('label').classList.add('active');
				ele.parentNode.querySelector('label').classList.add('label-select');
			}
		}
	});

	var elems = document.querySelectorAll('select');
	var instances = M.FormSelect.init(elems,{});

	var elems = document.querySelectorAll('.autocomplete');
	var instances = M.Autocomplete.init(elems,{onAutocomplete:function(){}});
	var elems = document.querySelectorAll('.tooltip');
	var instances = M.Tooltip.init(elems, {});
}

async function send(file,data,funcion){
	log(domain+file);
	showProgress();
	var formData = new FormData();
	for(item in data) {
		formData.append(item, data[item]);
	};
	fetch(domain+file, {
		method: 'POST',
		body: formData
	})
	.then(response => response.json()) 
	.then(function(json){
		if(debug){
			log('request=>'+JSON.stringify(data)+"\n"+'response=>'+JSON.stringify(json));
		}
		funcion(json);
	})
	.catch(function(err){ hideProgress(), show('Error la Operación'), log('request=>'+JSON.stringify(data)+"\n"+'error response=>'+JSON.stringify(err)) });
}


function sendAsync(file, data) {
  return new Promise((resolve, reject) => {
    send(file, data, function(json) {
      resolve(json); // Devuelve el resultado al await
    });
  });
}



async function call(file,data,funcion){
	log(file);
	showProgress();
	var formData = new FormData();
	for(item in data) {
		formData.append(item, data[item]);
	};
	fetch(file, {
		method: 'POST',
		body: formData
	})
	.then(response => response.json()) 
	.then(function(json){
		log(file);
		if(debug){
			log('request=>'+JSON.stringify(data)+"\n"+'response=>'+JSON.stringify(json));
		}
		funcion(json);
	})
	.catch(function(err){ hideProgress(), show('Error la Operación'), log('request=>'+JSON.stringify(data)+"\n"+'error response=>'+JSON.stringify(err)) });
}
function local(data,funcion){
	call(localDomain,data,funcion);
}
function setTitle(title){
	querySelector('#title').innerHTML=title;
}
function requestFile(path,type,funcion){
	var xhr = new XMLHttpRequest();
	xhr.open('GET',path, true);
	xhr.responseType = type;

	xhr.onload = function() {
		if (this.status == 200) {
			if (typeof(funcion) === "function") {funcion(this.response)};
		}
	};
	xhr.send();
}
function loadPage(info){
	queryForeach('.material-tooltip',el=>el.remove());
	setTitle(info.title);
	showProgress();
	requestFile(info.path,'text',function(data){
		querySelector('#main').innerHTML=data;
		var arr = querySelector('#main').querySelectorAll('script');
		for (var n = 0; n < arr.length; n++){
			eval(arr[n].innerHTML);
		}
		hideProgress();
	});
}
function loadPageDirt(idcontainer,path){
	queryForeach('.material-tooltip',el=>el.remove());
	showProgress();
	requestFile(path,'text',function(data){
		querySelector('#'+idcontainer).innerHTML=data;
		querySelector('#'+idcontainer).querySelectorAll('script').forEach(function(ele,index,array){
			eval(ele.innerHTML);
			ele.remove();
		});
	});
}
function setProgressMsg(msg){
	querySelector('#msgProgress').innerHTML=msg;
}
function showProgress(msg){
	showEle('#progressShow');
}
function hideProgress(){
	setProgressMsg('');
	hideEle('#progressShow');
}
function loadValues(data){
	for(item in data) {
		let ele=querySelector('#'+item);
		ele.value=data[item];
		if (ele.value!='') {
			ele.parentNode.querySelector('label').classList.add('active');
		}else{
			ele.parentNode.querySelector('label').classList.remove('active');
		}
	};
}
function getVal(ele){
	return querySelector('#'+ele).value;
}
function setVal(ele,value){
	ele=querySelector('#'+ele);
	if(ele.tagName.toLowerCase()=='textarea'|ele.tagName.toLowerCase()=='input') {
		ele.value=value;
		if(ele.getAttribute('type')=='text'|ele.getAttribute('type')=='password'|ele.tagName.toLowerCase()=='textarea'){
			if (value!=''){
				ele.parentNode.querySelector('label').classList.add('active');
			}else{
				ele.parentNode.querySelector('label').classList.remove('active');
			}
		}
		ele.dispatchEvent(new Event('keyup'));
	}else{
		ele.querySelectorAll('option').forEach(ele=>ele.removeAttribute('selected'));
		ele.querySelector(`option[value="${value}"]`).setAttribute('selected', 'selected');
		ele.dispatchEvent(new Event('change'));
	}
}
function show(cad){
	var toastHTML = `<span class="toast-msg">${cad}</span><button class="btn-flat toast-action">Copiar</button>`;
	M.toast({html:toastHTML});
	querySelector('.toast-action').onclick=function(){
		clipBoard(querySelector('.toast-msg').innerHTML);
		show1('Copiado');
	};
}
function show1(cad){
	M.toast({html:cad});
}
function clipBoard(textToCopy) {
	var myTemporaryInputElement = document.createElement("input");
	myTemporaryInputElement.type = "text";
	myTemporaryInputElement.value = textToCopy;
	document.body.appendChild(myTemporaryInputElement);
	myTemporaryInputElement.select();
	document.execCommand("Copy");
	document.body.removeChild(myTemporaryInputElement);
}
function trigger(ele,event){
	if(typeof selector == 'string'){
		querySelector(ele).dispatchEvent(new Event(event));
	}else{
		ele.dispatchEvent(new Event(event));
	}
}
function check(array){
	for(var i=0;i<array.length;i++){
		var cur=querySelector('#'+array[i]).value;
		if(cur.trim()=='' || cur==null){
			show('Complete el campo '+querySelector('#'+array[i]).parentNode.querySelector('label').innerHTML);
			return false;
		}
	}
	return true;
}
function getSelectedText(id){
	return querySelector("#"+id+" option:selected").innerHTML;
}
function loadInputImage(inputId,width,height,onLoad){
	var input = document.getElementById(inputId);
	input.onchange=handleFiles;
	function handleFiles(e) {
		var canvas=document.createElement("canvas");
		var ctx=canvas.getContext("2d");
		var cw=canvas.width;
		var ch=canvas.height;
		var img = new Image;
		img.onload = function() {
			var iw=img.width;
			var ih=img.height;
			var scale=Math.min((width/iw),(height/ih));
			var iwScaled=iw*scale;
			var ihScaled=ih*scale;
			canvas.width=iwScaled;
			canvas.height=ihScaled;
			ctx.drawImage(img,0,0,iwScaled,ihScaled);
			if (typeof(onLoad) === "function") {onLoad(canvas.toDataURL("image/jpeg",0.5))};
		}
		img.src = URL.createObjectURL(e.target.files[0]);
		input.value=null;
	}
}
function loadScript(url){
	var script = document.createElement('script');
	script.src = url;
	script.async=true;
	document.head.appendChild(script);
}
function setSesion(name,value){
	window.localStorage.setItem(name,value);
}
function getSesion(name){
	return window.localStorage.getItem(name);
}
function clearSesion(name){
	window.localStorage.removeItem(name);
}

function localDate(data){
	data=data.split('-');
	return data[2]+'-'+data[1]+'-'+data[0];
}
function localDate1(data){
	data=data.split('-');
	return data[2]+'/'+data[1]+'/'+data[0];
}

function getCurrentDate() {
	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth() + 1;
	var y = date.getFullYear();
	return (d <= 9 ? '0' + d : d)+ '-' + (m<=9 ? '0' + m : m)+'-'+y;
}
function getCurrentDate1() {
	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth() + 1;
	var y = date.getFullYear();
	return '' + y + '-' + (m<=9 ? '0' + m : m) + '-' + (d <= 9 ? '0' + d : d);
}

function getCurrentHour() {
	var date = new Date();
	var a = date.getHours();
	var b = date.getMinutes();
	var c = date.getSeconds();
	return '' + (a <= 9 ? '0' + a : a) + ":" + (b <= 9 ? '0' + b : b) + ":" + (c <= 9 ? '0' + c : c);
}

function getCurrentHour1(){
	var date = new Date();
	var a = date.getHours();
	var b = date.getMinutes();
	b=b < 10 ? `0${b}` : `${b}`;
	var c = date.getSeconds();
	return `${a}${b}`;
}



function openMenu(ele,items,funcion){
	querySelector('.extra').style.display='block';
	var cad='';
	for(var i=0;i<items.length;i++){
		cad+='<li data-index="'+i+'" class="item-menu"><a class="waves-effect">'+items[i]+'</a></li>';
	}
	append('.extra','<div onclick="hideMenu()" class="popover-backdrop" style="position: absolute; top: 0; width: 100vw; height: 100vh; background: rgba(0,0,0,0); z-index: 99999;"><ul class="popover" style="text-align:left;">'+cad+'</ul></div>');
	querySelectorAll('.item-menu').forEach(function(ele,index,ar){
		ele.onclick=function(){
			var index=ele.getAttribute('data-index');
			index=parseInt(index);
			if (typeof(funcion) === "function") funcion(index);
			hideMenu();
		}
	});
	if (typeof(ele) === "string"){
		var left=querySelector(ele).getBoundingClientRect().left;
		var top=querySelector(ele).getBoundingClientRect().top;
		var width=querySelector(ele).offsetWidth;
		var height=querySelector(ele).offsetHeight;
		if (querySelector(ele).classList.contains('is-select')) {
			queryLast('.popover').style.width=querySelector(ele).offsetWidth+'px';
		}
	}else{
		if (ele.classList.contains('is-select')) {
			queryLast('.popover').style.width=ele.offsetWidth+'px';
		}
		var left=ele.getBoundingClientRect().left;
		var top=ele.getBoundingClientRect().top;
		var width=ele.offsetWidth;
		var height=ele.offsetHeight;
	}
	queryLast('.popover').style.display='block';
	var container_width=queryLast('.popover').offsetWidth;
	var container_height=queryLast('.popover').offsetHeight;
	var newleft=(left);
	var newtop=(top);
	var incH=5;
	var incW=-5;
	if((newtop+container_height)>window.innerHeight){
		newtop-=((newtop+container_height)-window.innerHeight);
		incH=-5;
	}
	if((newleft+container_width)>window.innerWidth){
		newleft-=((newleft+container_width)-window.innerWidth);
	}
	queryLast('.popover').style.display='block';
	queryLast('.popover').style.top=(newtop+incH)+'px';
	queryLast('.popover').style.left=(newleft+incW-5)+'px';
	/*queryLast('.popover').classList.add('on-left-bottom');*/
	setTimeout(function(){
		queryLast('.popover').classList.add('modal-in');
	},50);
}
function hideMenu(){
	queryLast('.popover').classList.add('modal-out');
	setTimeout(function(){
		if(checke(queryLast('.popover-backdrop'))){
			queryLast('.popover-backdrop').remove();
		}
		if(querySelector('.extra').innerHTML==''){
			querySelector('.extra').style.display='none'; 
		}
	},300);
}
function push(pila,data){
	pila.push(data);
}
function removePila(pila,index){
	pila.splice(index,1);
}
function pop(pila){
	if(pila.length==0){
		return null;
	}
	var data=pila[pila.length-1];
	removePila(pila,pila.length-1);
	return data;
}
function clearPila(pila){
	stack=[];
}
function removeLast(array){
	removePila(array,array.length-1);
}
function peek(pila){
	if(pila.length==0){
		return null;
	}
	return pila[pila.length-1];
}
function invertPila(pila){
	var a=0;
	var b=pila.length-1;
	while(a<b){
		var aux=pila[a];
		pila[a]=pila[b];
		pila[b]=aux;
		a++;
		b--;
	}
}
function click(ele,funcion){
	$(ele).unbind('click').bind('click',funcion);
}
function showSDialog(title,content,positiveText,before,after,onX){ 
	showDialog(title,content,positiveText,function(){
		$('.dialogo:last').addClass('small');
		before();
	},after,onX); 
}
function showDialog(title,content,positiveText,before,after,onX){
	$('.extra').append('<div class="modal-back" style="display: block;background:rgba(0,0,0,.25);width: 100vw;height: 100vh;position: absolute;top: 0;z-index:9999"></div>');
	$('.extra').append('<div class="view-dialog view calendar calendar-modal dialogo"><div class="mod-header" style="padding: 0px 12px;"><div class="calendar-selected-date left">'+title+'</div></div><div class="mod-content block"><div class="row" style="margin-bottom:0em;">'+content+'</div></div><div class="mod-footer"><a class="backer-button waves-effect btn-flat red-text bold">Cancel</a><a class="modal-ok waves-effect btn-flat blue-text bold">'+positiveText+'</a></div></div>');
	before();
	if(onX!=null){
		$('.backer-button:last').click(onX);
	}else{
		$('.backer-button:last').click(function(){
			hideDialog();
		});
	}
	$('.modal-ok:last').click(after);
	$('.modal-back:last').on('long-press', function(e) {
		e.preventDefault();
		hideDialog();
	});
}
function showPop(title,content,before){
	$('.extra').append('<div class="modal-back" style="display: block;background:rgba(0,0,0,.25);width: 100vw;height: 100vh;position: absolute;top: 0;z-index:9999"></div>');
	$('.extra').append('<div class="popup dialogo" style="display:flex;height:'+window.innerHeight+'px;"><div class="navbar-fixed"><nav><div class="nav-wrapper" style="background: var(--theme-color);width:100%"><a style="left:.5em" class="brand-logo">'+title+'</a><ul class="right"><li><a class="close-pop"><i class="material-icons">close</i></a></li></ul></div></nav></div><div class="row pop-root" style="width: 100%; display: block; overflow: auto; padding: 0em; padding-bottom: 4em; margin-top: 4.5em; margin-bottom: 0em;">'+content+'</div></div>');
	click('.close-pop:last',hideDialog);
	before();
	$('.modal-back:last').on('long-press', function(e) {
		e.preventDefault();
		hideDialog();
	});
}
function prepare(){
	document.body.style.overflow='hidden';
	querySelector('.extra').style.display='block';
	refresh();
	setTimeout(function(){
		$('.dialogo:last').addClass('modal-in');
	},100);
}
function hideDialog(cuantos){
	if(cuantos==null){
		cuantos=0;			
	}
	if($('.dialogo').length==1){
		document.body.style.overflow='auto';
	}
	$('.dialogo:last').addClass('modal-out');
	setTimeout(function(){
		$('.modal-back:last').remove();
		$('.dialogo:last').remove();
		if(querySelector('.extra').innerHTML==''){
			querySelector('.extra').style.display='none'; 
		}
		if(cuantos>0){
			cuantos--;
			hideDialog(cuantos);
		}
	},500);
}
function showConfirm(title,after,onX){
	showSDialog('Confirmar','<b class="left" style="text-align:left;">'+title+'<b>','Aceptar',prepare,after,onX);
}
function showConfirmDelete(title,after,onX){
	showSDialog('Confirmar',`<b class="left-align col s12" style="padding-left:0em;text-align:left;">${title}</b><div class="input-field col s12"><textarea maxlength="99" id="obs" class="materialize-textarea uper"></textarea><label for="obs">Motivo (Maximo 100 caracteres)</label></div>`,'Aceptar',prepare,after,onX);
}
function showErrors(){
	showPop("Errores",`<div class="table-o"> <table> <thead><tr><th>Nº</th><th>Error</th><th>Fecha</th></tr></thead> <tbody id="tbody-o"></tbody> </table> </div> <div class="footer-o"> </div> `,function(){
		setProgressMsg('Cargando...');
		send('server.php',{call:'error',user: getSesion('userPeaje') },function(data){
			querySelector('#tbody-o').innerHTML='';
			var cad='';
			data.forEach(function(item,index,ar){
				cad+=`<tr><td>${item.id}</td><td>${item.error}</td><td>${item.fecha}</td></tr>`;
			});
			querySelector('#tbody-o').innerHTML=cad;
			hideProgress();
			prepare();
		});
	});
}
function to64(string){
	return btoa(string);
}
function locallogin(user,pass){
	
}





function printTicket__(ticket,data){
	if(data==null){
		if(offline){
			execute(`SELECT * FROM balanza where id=${ticket}`,function (data) {
				if(data.length>0){
					printTicket(ticket,data);
					return;
				}
			});
		}else{
			setProgressMsg('Cargando...');
			send('server.php',{call:'getLast',idSesion:getSesion('idSesion'),placa:ticket,sucursal:getSesion('sucursal')},function(data){
				hideProgress();
				printTicket(ticket,data);
				return;
			});
		}
		return;
	}
	var origen='CREDITO';
	var tara=data[0]['U_Tara']!=''?data[0]['U_Tara']+' KG':'';
	var bruto=data[0]['U_Bruto']!=''?data[0]['U_Bruto']+' KG':'';
	var neto=data[0]['U_Neto'];
	var netoQQ=parseFloat(0);
	var segundo='';
	if(data[0]['U_FechaSal']){
		segundo=`<p>SEGUNDO PESAJE : ${localDate(data[0]['U_FechaSal'].split(' ')[0])} ${data[0]['U_HoraSal']<1000?data[0]['U_HoraSal'].slice(0,1):data[0]['U_HoraSal'].slice(0,2)}:${data[0]['U_HoraSal'].slice(-2)}</p>`;
	}
	if(tara!=''&bruto!=''){
		netoQQ=parseFloat(parseFloat(neto)/parseFloat(46)).toFixed(2);
		neto+=' KG';
		netoQQ+=' QQ';
	}else{
		netoQQ='';
		neto='';
	}
	if(data[0]['U_Origen']=='CONTADO'){
		origen="CONTADO";
	}
	if(isApp){
		/*var win =window.open('', '_blank', 'location=yes');
		win.document.write(`<!DOCTYPE html> <html> <head> <meta charset="utf-8" /> <title>Reporte</title> <style type="text/css">@media print {html, body {display: block; font-family: "Calibri";font-weight:bolder; margin: 0; } @page {size: 9.5cm 21.5cm;size: portrait; margin: 0mm 10mm 0mm 10mm; padding-top:4em; } }  p, .no-margin{margin: 0em;font-family: "Calibri"; } .right{text-align: right; } .center{text-align: center; } </style> </head> <body style=""><br><br> <div class="right"> <p>Nº : ${data[0]['U_NroTicket']}</p> <p>USUARIO : ${data[0]['U_Nombre']}</p> <p>PRIMER PESAJE : ${localDate(data[0]['U_Fecha'].split(' ')[0])} ${data[0]['U_Hora']<1000?data[0]['U_Hora'].slice(0,1):data[0]['U_Hora'].slice(0,2)}:${data[0]['U_Hora'].slice(-2)}</p> ${segundo} <p>IMPORTE : ${parseFloat(data[0]['U_TotalFactura']).toFixed(2)} Bs.</p> </div> <div class="center"> <p>BOLETA DE PESAJE (${origen})</p> <p>=========================</p> </div> <div> <p>RAZON SOCIAL : ${data[0]['U_RazonSocial']}</p> <p>NIT CI/L.C. : ${data[0]['U_NIT']}</p><p style="margin-top:.5em;">PLACA : ${data[0]['U_Placa']}</p> </div> <div> <table style="width: -webkit-fill-available;"> <tr><td colspan="6" align="left">MARCA : ${data[0]['U_Marca']}</td><td colspan="6" align="left">COLOR CABINA : ${data[0]['U_Color']}</td></tr><tr><td colspan="6" align="left">CHOFER : ${data[0]['U_NombreChofer']}</td><td colspan="6" align="left">CI. CHOFER : ${data[0]['U_CI_Chofer']}</td></tr> </table> </div><br> <div> <table style="width: -webkit-fill-available;"> <tr><td colspan="3">PESO BRUTO</td><td colspan="3">PESO TARA</td><td colspan="3">PESO NETO(KG)</td><td colspan="3">PESO NETO(QQ)</td></tr> <tr><td colspan="3">${bruto}</td><td colspan="3">${tara}</td><td colspan="3">${neto}</td><td colspan="3">${netoQQ}</td></tr> </table> </div><br> <script src="js/print.js"></script></body> </html>`);*/
		/*var page = `<style>body{border:2px solid black;}</style><body style=""><br><br> <div class="right"> <p>Nº : ${data[0]['U_NroTicket']}</p> <p>USUARIO : ${data[0]['U_Nombre']}</p> <p>PRIMER PESAJE : ${localDate(data[0]['U_Fecha'].split(' ')[0])} ${data[0]['U_Hora']<1000?data[0]['U_Hora'].slice(0,1):data[0]['U_Hora'].slice(0,2)}:${data[0]['U_Hora'].slice(-2)}</p> ${segundo} <p>IMPORTE : ${parseFloat(data[0]['U_TotalFactura']).toFixed(2)} Bs.</p> </div> <div class="center"> <p>BOLETA DE PESAJE (${origen})</p> <p>=========================</p> </div> <div> <p>RAZON SOCIAL : ${data[0]['U_RazonSocial']}</p> <p>NIT CI/L.C. : ${data[0]['U_NIT']}</p><p style="margin-top:.5em;">PLACA : ${data[0]['U_Placa']}</p> </div> <div> <table style="width: 100%"> <tr><td colspan="6" align="left">MARCA : ${data[0]['U_Marca']}</td><td colspan="6" align="left">COLOR CABINA : ${data[0]['U_Color']}</td></tr><tr><td colspan="6" align="left">CHOFER : ${data[0]['U_NombreChofer']}</td><td colspan="6" align="left">CI. CHOFER : ${data[0]['U_CI_Chofer']}</td></tr> </table> </div><br> <div> <table style="width: 100%;"> <tr><td colspan="3">PESO BRUTO</td><td colspan="3">PESO TARA</td><td colspan="3">PESO NETO(KG)</td><td colspan="3">PESO NETO(QQ)</td></tr> <tr><td colspan="3">${bruto}</td><td colspan="3">${tara}</td><td colspan="3">${neto}</td><td colspan="3">${netoQQ}</td></tr> </table> </div><br> <script src="js/print.js"></script></body>`;

		cordova.plugins.printer.print(page);*/
		cordova.plugins.printer.print(`<html><head><meta charset="utf-8" /><style type="text/css">body {display: block; font-family: "Calibri";font-weight:bolder; margin: 0em 2.25em 0em 2.25em;background:red; } @page {size: 9.5cm 21.5cm; }  p, .no-margin{margin: 0em;font-family: "Calibri"; } .right{text-align: right; } .center{text-align: center; } </style> </head> <body style="background-color:black"><div class="right"> <p>Nº : ${data[0]['U_NroTicket']}</p> <p>USUARIO : ${data[0]['U_Nombre']}</p> <p>PRIMER PESAJE : ${localDate(data[0]['U_Fecha'].split(' ')[0])} ${data[0]['U_Hora']<1000?data[0]['U_Hora'].slice(0,1):data[0]['U_Hora'].slice(0,2)}:${data[0]['U_Hora'].slice(-2)}</p> ${segundo} <p>IMPORTE : ${parseFloat(data[0]['U_TotalFactura']).toFixed(2)} Bs.</p> </div> <div class="center"> <p>BOLETA DE PESAJE (${origen})</p> <p>=========================</p> </div> <div> <p>RAZON SOCIAL : ${data[0]['U_RazonSocial']}</p> <p>NIT CI/L.C. : ${data[0]['U_NIT']}</p><p style="margin-top:.5em;">PLACA : ${data[0]['U_Placa']}</p> </div> <div> <table style="width: 100%"> <tr><td colspan="6" align="left">MARCA : ${data[0]['U_Marca']}</td><td colspan="6" align="left">COLOR CABINA : ${data[0]['U_Color']}</td></tr><tr><td colspan="6" align="left">CHOFER : ${data[0]['U_NombreChofer']}</td><td colspan="6" align="left">CI. CHOFER : ${data[0]['U_CI_Chofer']}</td></tr> </table> </div> <div> <table style="width: 100%;"> <tr><td colspan="3">PESO BRUTO</td><td colspan="3">PESO TARA</td><td colspan="3">PESO NETO(KG)</td><td colspan="3">PESO NETO(QQ)</td></tr> <tr><td colspan="3">${bruto}</td><td colspan="3">${tara}</td><td colspan="3">${neto}</td><td colspan="3">${netoQQ}</td></tr> </table> </div></body> </html>`, 'Document.html');
	}else{

 
	
	var plantilla=  `<!DOCTYPE html> <html> <head> <meta charset="utf-8" /> <title>Reporte</title> <style type="text/css">@media print {html, body {display: block; font-family: "Calibri";font-weight:bolder; margin: 0; } @page {size: 9.5cm 21.5cm;size: portrait; margin: 0mm 10mm 0mm 10mm; padding-top:4em; } }  p, .no-margin{margin: 0em;font-family: "Calibri"; } .right{text-align: right; } .center{text-align: center; } </style> </head> <body style=""><br><br> <div class="right"> <p>Nº : ${data[0]['U_NroTicket']}</p> <p>USUARIO : ${data[0]['U_Nombre']}</p> <p>PRIMER PESAJE : ${localDate(data[0]['U_Fecha'].split(' ')[0])} ${data[0]['U_Hora']<1000?data[0]['U_Hora'].slice(0,1):data[0]['U_Hora'].slice(0,2)}:${data[0]['U_Hora'].slice(-2)}</p> ${segundo} <p>IMPORTE : ${parseFloat(data[0]['U_TotalFactura']).toFixed(2)} Bs.</p> </div> <div class="center"> <p>BOLETA DE PESAJE (${origen})</p> <p>=========================</p> </div> <div> <p>RAZON SOCIAL : ${data[0]['U_RazonSocial']}</p> <p>NIT CI/L.C. : ${data[0]['U_NIT']}</p><p style="margin-top:.5em;">PLACA : ${data[0]['U_Placa']}</p> </div> <div> <table style="width: -webkit-fill-available;"> <tr><td colspan="6" align="left">MARCA : ${data[0]['U_Marca']}</td><td colspan="6" align="left">COLOR CABINA : ${data[0]['U_Color']}</td></tr><tr><td colspan="6" align="left">CHOFER : ${data[0]['U_NombreChofer']}</td><td colspan="6" align="left">CI. CHOFER : ${data[0]['U_CI_Chofer']}</td></tr> </table> </div><br> <div> <table style="width: -webkit-fill-available;"> <tr><td colspan="3">PESO BRUTO</td><td colspan="3">PESO TARA</td><td colspan="3">PESO NETO(KG)</td><td colspan="3">PESO NETO(QQ)</td></tr> <tr><td colspan="3">${bruto}</td><td colspan="3">${tara}</td><td colspan="3">${neto}</td><td colspan="3">${netoQQ}</td></tr> </table> </div><br> <script src="js/print.js"></script></body> </html>`;




		   $(plantilla).printThis({
		
		

		    });




	//	var win = window.open('','printwindow',params);
//		win.document.write(`<!DOCTYPE html> <html> <head> <meta charset="utf-8" /> <title>Reporte</title> <style type="text/css">@media print {html, body {display: block; font-family: "Calibri";font-weight:bolder; margin: 0; } @page {size: 9.5cm 21.5cm;size: portrait; margin: 0mm 10mm 0mm 10mm; padding-top:4em; } }  p, .no-margin{margin: 0em;font-family: "Calibri"; } .right{text-align: right; } .center{text-align: center; } </style> </head> <body style=""><br><br> <div class="right"> <p>Nº : ${data[0]['U_NroTicket']}</p> <p>USUARIO : ${data[0]['U_Nombre']}</p> <p>PRIMER PESAJE : ${localDate(data[0]['U_Fecha'].split(' ')[0])} ${data[0]['U_Hora']<1000?data[0]['U_Hora'].slice(0,1):data[0]['U_Hora'].slice(0,2)}:${data[0]['U_Hora'].slice(-2)}</p> ${segundo} <p>IMPORTE : ${parseFloat(data[0]['U_TotalFactura']).toFixed(2)} Bs.</p> </div> <div class="center"> <p>BOLETA DE PESAJE (${origen})</p> <p>=========================</p> </div> <div> <p>RAZON SOCIAL : ${data[0]['U_RazonSocial']}</p> <p>NIT CI/L.C. : ${data[0]['U_NIT']}</p><p style="margin-top:.5em;">PLACA : ${data[0]['U_Placa']}</p> </div> <div> <table style="width: -webkit-fill-available;"> <tr><td colspan="6" align="left">MARCA : ${data[0]['U_Marca']}</td><td colspan="6" align="left">COLOR CABINA : ${data[0]['U_Color']}</td></tr><tr><td colspan="6" align="left">CHOFER : ${data[0]['U_NombreChofer']}</td><td colspan="6" align="left">CI. CHOFER : ${data[0]['U_CI_Chofer']}</td></tr> </table> </div><br> <div> <table style="width: -webkit-fill-available;"> <tr><td colspan="3">PESO BRUTO</td><td colspan="3">PESO TARA</td><td colspan="3">PESO NETO(KG)</td><td colspan="3">PESO NETO(QQ)</td></tr> <tr><td colspan="3">${bruto}</td><td colspan="3">${tara}</td><td colspan="3">${neto}</td><td colspan="3">${netoQQ}</td></tr> </table> </div><br> <script src="js/print.js"></script></body> </html>`);
	}
}





function imprimir(ticket){
	setProgressMsg('Cargando...');
	var ff_direccion='server.php';
	send('server.php',{call:'getLast',idSesion:getSesion('idSesion'),placa:ticket,sucursal:getSesion('sucursal')},function(data){
	console.log('holaa '+JSON.stringify(data));
	var tara=data[0]['U_Tara']!=''?data[0]['U_Tara']+' KG':'';
	var bruto=data[0]['U_Bruto']!=''?data[0]['U_Bruto']+' KG':'';
	var neto=data[0]['U_Neto'];
	var sucursal_origen=data[0]['U_Sucursal'];
	var netoQQ=parseFloat(0);
	var segundo='';
	var detalle_ob='';
	var d_proveedor='';
	var d_transportadora='';
	var d_chata='SIN CHATA';
	var d_producto='';
	var d_tipo='';
	var d_origen='';
	var d_destino='';
	var f3= data[0]['U_TipoOrigen'];
	var var_int_chata=data[0]['U_ID_Chata'];
	
	if(f3==1){
		d_tipo= 'INTERNO';
	}else{
		d_tipo= 'EXTERNO';
	}
	if(data[0]['U_FechaSal']){

//      segundo=`<div>
// 	 <table style="width: -webkit-fill-available;">
// 	  <tr>
	  
// 	   <td colspan="12" align="right">    <p>SEGUNDO PESAJE : ${localDate(data[0]['U_FechaSal'].split(' ')[0])} ${data[0]['U_HoraSal']<1000?data[0]['U_HoraSal'].slice(0,1):data[0]['U_HoraSal'].slice(0,2)}:${data[0]['U_HoraSal'].slice(-2)}</p> </td>
// 	  </tr>
// 	 </table>
//    </div>`;



	 	 segundo=`<p>SEGUNDO PESAJE : ${localDate(data[0]['U_FechaSal'].split(' ')[0])} ${data[0]['U_HoraSal']<1000?data[0]['U_HoraSal'].slice(0,1):data[0]['U_HoraSal'].slice(0,2)}:${data[0]['U_HoraSal'].slice(-2)}</p>`;
	// 	 detalle_ob=`		 <div>
	// 	 <table style="width: -webkit-fill-available;">
	// 	  <tr>
	// 	   <td colspan="6" align="left">OBS. 1: ${data[0]['U_Observaciones']}</td>
	// 	   <td colspan="6" align="left">OBS. 2: ${data[0]['U_Observaciones2']}</td>
	// 	  </tr>
	// 	 </table>
	//    </div>`;

          var gy11=0;
		  var gy22=0;
          var ob11=data[0]['U_Observaciones'];
		  var ob22=data[0]['U_Observaciones2'];
		  if(ob11===null){
              gy11=1;
			  console.log("gy11 "+gy11);
		  }
		  if(ob22===null){
			 gy22=1;
			 console.log("gy22 "+gy22);
		  }
		
		  

	   if(gy11==0 && gy22==0 ){
		detalle_ob=`		 <div>
		<table style="width: -webkit-fill-available;">
		 <tr>
		  <td colspan="6" align="left">OBS. 1: ${data[0]['U_Observaciones']}</td>
		  <td colspan="6" align="left">OBS. 2: ${data[0]['U_Observaciones2']}</td>
		 </tr>
		</table>
	  </div>`;
	   }else{


		if(gy11==0 &&  gy22==1){
			detalle_ob=` <div>
			  <table style="width: -webkit-fill-available;">
			   <tr>
				<td colspan="12" align="left">OBS. 1: ${data[0]['U_Observaciones']}</td>
			   
			   </tr>
			  </table>
			</div>`;
}else{
	if(gy11==1 &&  gy22==0){
		  detalle_ob=` <div>
			  <table style="width: -webkit-fill-available;">
			   <tr>
				<td colspan="12" align="left">OBS. 2: ${data[0]['U_Observaciones2']}</td>
			   
			   </tr>
			  </table>
			</div>`;
}
}

	   }


		}else{
			if(data[0]['U_Observaciones']!=""){
				detalle_ob=`		 <div>
				<table style="width: -webkit-fill-available;">
				 <tr>
				  <td colspan="12" align="left">OBS. 1: ${data[0]['U_Observaciones']}</td>
				 
				 </tr>
				</table>
			  </div>`;
			}

		
		}
		


		console.log('detalle_ob '+detalle_ob);
		if(tara!=''&bruto!=''){
		netoQQ=parseFloat(parseFloat(neto)/parseFloat(46)).toFixed(2);
		neto+=' KG';
		netoQQ+=' QQ';
		}else{
		netoQQ='';
		neto='';
		}

					   send(ff_direccion,{call:'getLast_otros_servicios',placa:ticket,To:f3,Chata:var_int_chata},function(datadd){

						console.log('cc '+JSON.stringify(datadd));
						
						     datadd.forEach(function (valuess) {
						 	 d_proveedor= valuess.PROVEEDOR;
							 d_transportadora= valuess.TRASNPORTADORA;
							 d_origen= valuess.ORIGEN;
							 d_producto= valuess.PRODUCTO;
							 d_destino= valuess.DESTINO;

							 if(valuess.CHATA!=0){
								d_chata=valuess.CHATA;
							 }
						


							 var plan=`<!DOCTYPE html> <html> <head> <meta charset="utf-8" /> <title>Reporte</title>
							 <style type="text/css">@media print {html, body {display: block; font-family: "Calibri";font-weight:bolder; margin: 0; }
							 @page {size: 9.5cm 21.5cm;size: portrait; margin: 0mm 10mm 0mm 10mm; padding-top:4em; } }  p, .no-margin{margin: 0em;font-family: "Calibri"; }
							 .right{text-align: right; } .center{text-align: center; } </style> </head>
							 
							 
							 
							 
							 
							 <body style=""><br><br>
							 
							 <div class="right">
							 <p>USUARIO : ${data[0]['U_Nombre']}</p> 
							 <p>PRIMER PESAJE : ${localDate(data[0]['U_Fecha'].split(' ')[0])} 
							${data[0]['U_Hora']<1000?data[0]['U_Hora'].slice(0,1):data[0]['U_Hora'].slice(0,2)}:${data[0]['U_Hora'].slice(-2)}</p>
							 ${segundo}
							 
							 </div> 
					   
					   
					   
							 <div>
							 <table style="width: -webkit-fill-available;"> 
							 <tr>
								 <td colspan="6" align="left"> <p>BALANZA : ${sucursal_origen}</p>  </td> 
								 <td colspan="6" align="right"> <p>IMPORTE : ${parseFloat(data[0]['U_TotalFactura']).toFixed(2)} Bs.</p> </td>
							</tr> </table> 
							
							 </div> 
					   
							 
							   <div class="center"> <p>BOLETA DE PESAJE (${data[0]['U_Origen']}) - Nº Ticket: ${data[0]['U_NroTicket']}</p> <p>================================================</p> </div>
							 
							 
							 
								 <div>
								   <table style="width: -webkit-fill-available;">
									<tr>
									 <td colspan="6" align="left">CLIENTE : ${data[0]['U_RazonSocial']}</td>
									 <td colspan="6" align="left">PROVEEDOR : `+d_proveedor+`</td>
									</tr>
								   </table>
								 </div>
							 
							 
								 <div>
								   <table style="width: -webkit-fill-available;">
									<tr>
									 <td colspan="6" align="left">TRANSPORTADORA : `+d_transportadora+`</td>
									 <td colspan="6" align="left">PLACA : ${data[0]['U_Placa']}</td>
									 <td colspan="6" align="left">CHATA : `+d_chata+`</td>
									</tr>
								   </table>
								 </div>
							 
							 
							 
								 <div>
								   <table style="width: -webkit-fill-available;">
								   <tr>
									 <td colspan="6" align="left">CHOFER : `+data[0]['U_NombreChofer']+`</td>
									 <td colspan="6" align="left">CI. CHOFER : `+data[0]['U_CI_Chofer']+`</td>
								   </tr>
								   </table>
								  </div>
							 
							 
								 <div>
								   <table style="width: -webkit-fill-available;">
									<tr>
									 <td colspan="6" align="left">PRODUCTO : `+d_producto+`</td>
									 <td colspan="6" align="left">TIPO : `+d_tipo+`</td>
									 <td colspan="6" align="left">ORIGEN : `+d_origen+`</td>
									 <td colspan="6" align="left">DESTINO : `+d_destino+`</td>
									</tr>
							 
								 </table>
								  </div>
								  <br>
							 
							 
							 
							 
							 
							 
								  <div>
									<table style="width: -webkit-fill-available;">
								  <tr>
									<td colspan="3">PESO BRUTO</td><td colspan="3">PESO TARA</td><td colspan="3">PESO NETO(KG)</td>
									<td colspan="3">PESO NETO(QQ)</td></tr> <tr><td colspan="3">${bruto}</td><td colspan="3">${tara}</td>
								  <td colspan="3">${neto}</td><td colspan="3">${netoQQ}</td></tr> </table> 
								  </div>
								  
								  <br>
							 
					
								 ${detalle_ob}
							 
								 </body>
							 
							 
							 
								  </html>`;
							 
							 
								  console.log('plantilla '+plan);
							  hideProgress();
								  $(plan).printThis({  pageTitle: "Balanza",});
				



						  });



						});
	
	   });
	
	
	
	
	
	}

function printTicket(ticket,data){
	if(data==null){
		if(offline){
			execute(`SELECT * FROM balanza where id=${ticket}`,function (data) {
				if(data.length>0){
					printTicket(ticket,data);
					return;
				}
			});
		}else{
			setProgressMsg('Cargando...');
			send('server.php',{call:'getLast',idSesion:getSesion('idSesion'),placa:ticket,sucursal:getSesion('sucursal')},function(data){
				hideProgress();
				printTicket(ticket,data);
				return;
			});
		}
		return;
	}
	var sucursal_origen=data[0]['U_Sucursal'];
	var origen='CREDITO';
	var tara=data[0]['U_Tara']!=''?data[0]['U_Tara']+' KG':'';
	var bruto=data[0]['U_Bruto']!=''?data[0]['U_Bruto']+' KG':'';
	var neto=data[0]['U_Neto'];
	var netoQQ=parseFloat(0);
	var segundo='';
	if(data[0]['U_FechaSal']){



	// 	segundo=`<div>
	// 	<table style="width: -webkit-fill-available;">
	// 	 <tr>
		 
	// 	  <td colspan="12" align="right">    <p>SEGUNDO PESAJE : ${localDate(data[0]['U_FechaSal'].split(' ')[0])} ${data[0]['U_HoraSal']<1000?data[0]['U_HoraSal'].slice(0,1):data[0]['U_HoraSal'].slice(0,2)}:${data[0]['U_HoraSal'].slice(-2)}</p> </td>
	// 	 </tr>
	// 	</table>
	//   </div>`;

		segundo=`<p>SEGUNDO PESAJE : ${localDate(data[0]['U_FechaSal'].split(' ')[0])} ${data[0]['U_HoraSal']<1000?data[0]['U_HoraSal'].slice(0,1):data[0]['U_HoraSal'].slice(0,2)}:${data[0]['U_HoraSal'].slice(-2)}</p>`;
	}else{
	//	segundo=`<br>`;
	}

	if(tara!=''&bruto!=''){
		netoQQ=parseFloat(parseFloat(neto)/parseFloat(46)).toFixed(2);
		neto+=' KG';
		netoQQ+=' QQ';
	}else{
		netoQQ='';
		neto='';
	}
	if(data[0]['U_Origen']=='CONTADO'){
		origen="CONTADO";
	}



	

	var plantilla=  `<!DOCTYPE html> <html> <head> <meta charset="utf-8" /> 
	<title>Reporte</title>
	 <style type="text/css">@media print {html, body {display: block; font-family: "Calibri";font-weight:bolder; margin: 0; } 
	 @page {size: 9.5cm 21.5cm;size: portrait; margin: 0mm 10mm 0mm 10mm; padding-top:4em; } }
	   p, .no-margin{margin: 0em;font-family: "Calibri"; } .right{text-align: right; } .center{text-align: center; } </style>
	    </head>
		 <body style=""><br><br> 
		 

		
	 
	 <div class="right">
	  <p>USUARIO : ${data[0]['U_Nombre']}</p> 
	  <p>PRIMER PESAJE : ${localDate(data[0]['U_Fecha'].split(' ')[0])} 
	 ${data[0]['U_Hora']<1000?data[0]['U_Hora'].slice(0,1):data[0]['U_Hora'].slice(0,2)}:${data[0]['U_Hora'].slice(-2)}</p>
	  ${segundo}
	  
	  </div> 



      <div>
      <table style="width: -webkit-fill-available;"> 
      <tr>
          <td colspan="6" align="left"> <p>BALANZA : ${sucursal_origen}</p>  </td> 
          <td colspan="6" align="right"> <p>IMPORTE : ${parseFloat(data[0]['U_TotalFactura']).toFixed(2)} Bs.</p> </td>
     </tr> </table> 
	 
	  </div> 


		 
		 <div class="center"> 
		 
		 
		 
		 <p>BOLETA DE PESAJE (${origen}) - Nº Ticket: ${data[0]['U_NroTicket']}</p> <p>========================================</p> </div> <div> <p>RAZON SOCIAL : ${data[0]['U_RazonSocial']}</p>
		  <p>NIT CI/L.C. : ${data[0]['U_NIT']}</p><p style="margin-top:.5em;">PLACA : ${data[0]['U_Placa']}</p> </div> <div> <table style="width: -webkit-fill-available;"> <tr><td colspan="6" align="left">MARCA : ${data[0]['U_Marca']}</td><td colspan="6" align="left">COLOR CABINA : ${data[0]['U_Color']}</td></tr><tr><td colspan="6" align="left">CHOFER : ${data[0]['U_NombreChofer']}</td><td colspan="6" align="left">CI. CHOFER : ${data[0]['U_CI_Chofer']}</td></tr> </table> </div><br> <div> <table style="width: -webkit-fill-available;"> <tr><td colspan="3">PESO BRUTO</td><td colspan="3">PESO TARA</td><td colspan="3">PESO NETO(KG)</td><td colspan="3">PESO NETO(QQ)</td></tr> <tr><td colspan="3">${bruto}</td><td colspan="3">${tara}</td><td colspan="3">${neto}</td><td colspan="3">${netoQQ}</td></tr> </table> </div><br> <script src="js/print.js"></script></body> </html>`;




		  var plantilla=  `<!DOCTYPE html>
		  <html>
		  <head>
			  <meta charset="utf-8" />
			  <title>Reporte</title>
			  <style type="text/css">
				  @media print {
					  header {
						  display: none;
					  }
				  }
				  @media print {
					  header {
						  display: none;
					  }
					  html, body {
						  display: block;
						  font-family: "Calibri";
						  font-weight: bolder;
						  margin: 0;
						  padding: 0;
					  }
					  @page {
						  size: 9.5cm 21.5cm;
						  size: portrait;
						  margin: 0mm 10mm 0mm 10mm;
						  padding-top: 4em;
					  }
				  }
				  p,
				  .no-margin {
					  margin: 0em;
					  font-family: "Calibri";
				  }
				  .right {
					  text-align: right;
				  }
				  .center {
					  text-align: center;
				  }
			  </style>
		  </head>
		  <body>
			  <div class="right">
				  <p>USUARIO : ${data[0]['U_Nombre']}</p>
				  <p>PRIMER PESAJE : ${localDate(data[0]['U_Fecha'].split(' ')[0])} 
				  ${data[0]['U_Hora']<1000?data[0]['U_Hora'].slice(0,1):data[0]['U_Hora'].slice(0,2)}:${data[0]['U_Hora'].slice(-2)}</p>
				  ${segundo}
			  </div>
		  
			  <div>
				  <table style="width: -webkit-fill-available;">
					  <tr>
						  <td colspan="6" align="left">
							  <p>BALANZA : ${sucursal_origen}</p>
						  </td>
						  <td colspan="6" align="right">
							  <p>IMPORTE : ${parseFloat(data[0]['U_TotalFactura']).toFixed(2)} Bs.</p>
						  </td>
					  </tr>
				  </table>
			  </div>
		  
			  <div class="center">
				  <p>BOLETA DE PESAJE (${origen}) - Nº Ticket: ${data[0]['U_NroTicket']}</p>
				  <p>========================================</p>
			  </div>
			  <div>
				  <p>RAZON SOCIAL : ${data[0]['U_RazonSocial']}</p>
				  <p>NIT CI/L.C. : ${data[0]['U_NIT']}</p>
				  <p style="margin-top:.5em;">PLACA : ${data[0]['U_Placa']}</p>
			  </div>
			  <div>
				  <table style="width: -webkit-fill-available;">
					  <tr>
						  <td colspan="6" align="left">MARCA : ${data[0]['U_Marca']}</td>
						  <td colspan="6" align="left">COLOR CABINA : ${data[0]['U_Color']}</td>
					  </tr>
					  <tr>
						  <td colspan="6" align="left">CHOFER : ${data[0]['U_NombreChofer']}</td>
						  <td colspan="6" align="left">CI. CHOFER : ${data[0]['U_CI_Chofer']}</td>
					  </tr>
				  </table>
			  </div>
			  <br>
			  <div>
				  <table style="width: -webkit-fill-available;">
					  <tr>
						  <td colspan="3">PESO BRUTO</td>
						  <td colspan="3">PESO TARA</td>
						  <td colspan="3">PESO NETO(KG)</td>
						  <td colspan="3">PESO NETO(QQ)</td>
					  </tr>
					  <tr>
						  <td colspan="3">${bruto}</td>
						  <td colspan="3">${tara}</td>
						  <td colspan="3">${neto}</td>
						  <td colspan="3">${netoQQ}</td>
					  </tr>
				  </table>
			  </div>
			  <script src="js/print.js"></script>
		  </body>
		  </html>
		  `;
		  

  var plantilla=  `<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Reporte</title>
    <style type="text/css">
        @media print {
            html, body {
                display: block;
                font-family: "Calibri";
                font-weight: bolder;
                margin: 0;
                padding: 0;
                height: 100%;
                width: 100%;
				overflow: hidden; /* Evita que el contenido se desborde */
            }

            @page {
                size: 9.5cm 21.5cm;
                margin: 0mm;  /* Elimina todos los márgenes */
            }
        }

        p, .no-margin {
            margin: 0;
            font-family: "Calibri";
        }

        .right {
            text-align: right;
        }

        .center {
            text-align: center;
        }

        table {
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Contenido empieza directamente en la parte superior -->
    <div class="right" style="margin-top: 8mm;">
        <p>USUARIO : ${data[0]['U_Nombre']}</p>
        <p>PRIMER PESAJE : ${localDate(data[0]['U_Fecha'].split(' ')[0])} 
        ${data[0]['U_Hora'] < 1000 ? data[0]['U_Hora'].slice(0, 1) : data[0]['U_Hora'].slice(0, 2)}:${data[0]['U_Hora'].slice(-2)}</p>
        ${segundo}
    </div>

    <div>
        <table>
            <tr>
                <td colspan="6" align="left">
                    <p>BALANZA : ${sucursal_origen}</p>
                </td>
                <td colspan="6" align="right">
                    <p>IMPORTE : ${parseFloat(data[0]['U_TotalFactura']).toFixed(2)} Bs.</p>
                </td>
            </tr>
        </table>
    </div>

    <div class="center">
        <p>BOLETA DE PESAJE (${origen}) - Nº Ticket: ${data[0]['U_NroTicket']}</p>
        <p>========================================</p>
    </div>

    <div>
        <p>RAZON SOCIAL : ${data[0]['U_RazonSocial']}</p>
        <p>NIT CI/L.C. : ${data[0]['U_NIT']}</p>
        <p style="margin-top:.5em;">PLACA : ${data[0]['U_Placa']}</p>
    </div>

    <div>
        <table>
            <tr>
                <td colspan="6" align="left">MARCA : ${data[0]['U_Marca']}</td>
                <td colspan="6" align="left">COLOR CABINA : ${data[0]['U_Color']}</td>
            </tr>
            <tr>
                <td colspan="6" align="left">CHOFER : ${data[0]['U_NombreChofer']}</td>
                <td colspan="6" align="left">CI. CHOFER : ${data[0]['U_CI_Chofer']}</td>
            </tr>
        </table>
    </div>
    <br>

    <div>
        <table>
            <tr>
                <td colspan="3">PESO BRUTO</td>
                <td colspan="3">PESO TARA</td>
                <td colspan="3">PESO NETO(KG)</td>
                <td colspan="3">PESO NETO(QQ)</td>
            </tr>
            <tr>
                <td colspan="3">${bruto}</td>
                <td colspan="3">${tara}</td>
                <td colspan="3">${neto}</td>
                <td colspan="3">${netoQQ}</td>
            </tr>
        </table>
    </div>

    <script src="js/print.js"></script>
</body>
</html>
`;
    console.log(plantilla);
		   $(plantilla).printThis({  pageTitle: "Site Visit Form",});
	
}




function PrintElem(ele)
{
	setProgressMsg('Cargando...');

	send('server.php',{call:'getLast',idSesion:getSesion('idSesion'),placa:ele,sucursal:getSesion('sucursal')},function(data){

		console.log('nunk sabras '+JSON.stringify(data));
		var sucursal_origen=data[0]['U_Sucursal'];
		var ticket_origen=data[0]['U_NroTicket'];
		send('server.php',{call:'buscar_importaciones',ticket:ticket_origen,sucursal:sucursal_origen},function(datab){
			hideProgress();
			  if(datab!=0){
				 var id_boleta=datab[0]['Id'];
                 var URL = "http://app-web-mty/Admin_Importaciones/#/de-boleta?id="+id_boleta;
	             win = window.open(URL,"_blank");
			  }else{
                       alert('Nose puede imprimir Boleta Importaciones');
			  }
	
	
	
			
		});


		
	});




 

}







function getQr(text,onFinish){
	var png = QRCode.generatePNG(text, {
		ecclevel: "M",
		format: "html",
		fillcolor: "#CCCCCC00",
		textcolor: "#000000",
		margin: 0,
		modulesize: 8
	});
	var svg = QRCode.generateSVG(text, {
		ecclevel: "M",
		fillcolor: "#CCCCCC00",
		textcolor: "#000000",
		margin: 0,
		modulesize: 8
	});
	setTimeout(function(){
		onFinish(png,svg.outerHTML);
	},500);
}










function printF(ticket){

	setProgressMsg('Cargando...');
	var DocEntry1="";
	var html_factura456="";
	var folio="";
	var nit="";
	var cod_autorizacion="";
	var sucursal="";
	var punto_venta="";
	var direccion="";
	var telefono="";
	var ciudad="";
	var fecha="";
	var nombrerazonsocial="";
	var codigo_cliente="";
	var nitcicex="";
	var tipocambio="";
	var complemento="";
	var montoTotalMoneda="";
	var montoTotal="";
	var montoTotalSujetoIva="";
var cuff="";



var codigo_producto="";
var cantidad="";
var descripcion="";
var precio_unitario="";
var usuario="";
var descuento="";
var subtotal="";
var leyenda="";




	send('server.php',{call:'getFactData',idSesion:getSesion('idSesion'),placa:ticket},function(data){
	

		
		data.forEach(function(item,index,arr){
			var key=item['NIT Emisor']+'|'+item['Numero de factura']+'|'+item['Numero de Autorizacion']+'|'+localDate1(item['Fecha'].split(' ')[0])+'|'+item['Total BS']+'|'+item['Total BS']+'|'+item['Codigo de Control']+'|'+item['NIT']+'|0.00|0.00|0.00|0.00';
			if(item['Fecha Limite de Emision']==null){
				item['Fecha Limite de Emision']=`${getCurrentDate1()}`;
			}	
             DocEntry1=item['DocEntry'];
                        // alert(DocEntry1);


						   loadPageDirt('app', 'detalle.php?dato='+DocEntry1);


                                                 

									
									
																						   
																						   
										
         });
		

    });

	
}



function printF_credito(ticket){
	setProgressMsg('Cargando...');
	send('server.php',{call:'getFactData',idSesion:getSesion('idSesion'),placa:ticket},function(data){
		hideProgress();
		data.forEach(function(item,index,arr){
			var key=item['NIT Emisor']+'|'+item['Numero de factura']+'|'+item['Numero de Autorizacion']+'|'+localDate1(item['Fecha'].split(' ')[0])+'|'+item['Total BS']+'|'+item['Total BS']+'|'+item['Codigo de Control']+'|'+item['NIT']+'|0.00|0.00|0.00|0.00';
			if(item['Fecha Limite de Emision']==null){
				item['Fecha Limite de Emision']=`${getCurrentDate1()}`;
			}
			/*log(`
				${key}
				${item['Numero de factura']}
				${item['Numero de Autorizacion']}
				${item['Nombre Factura']}
				${item['NIT']}
				${item['Ciudad']+' '+localDate1(item['Fecha'].split(' ')[0])}
				${parseFloat(item['Cantidad']).toFixed(2)+' '+item['UM']}
				${item['Descripcion']}
				${parseFloat(item['Precio']).toFixed(2)}
				${parseFloat(item['Total Lineas USD']).toFixed(2)}
				${item['textTotal'] +' '+item['Total BS'].split('.')[1]+' / 100 BOLIVIANOS'}
				${parseFloat(item['Total USD']).toFixed(2)}
				${item['Codigo de Control']}
				${parseFloat(item['TC']).toFixed(2)}
				${item['Total BS']}
				${item['Fecha Limite de Emision']}
				${item['Vendedor']}
				${item['Ley 453']}`);
				*/			
				getQr(key,function(png,svg){
					if(isApp){
						cordova.plugins.printer.print(`<html><head><meta charset="utf-8" /> <title> Reporte</title> <style type="text/css"> html, body {display: block; font-family: "Calibri";font-size: 12px; margin: 0; } .small-text{font-size: 9px;} table{border-spacing: 0px} @page {size: 8.5in 11.5in;size: portrait; margin: 0mm 10mm 0mm 10mm; padding-top:4em; } p, .no-margin{margin: 0em;font-family: "Calibri"; } .right{text-align: right; } .center{text-align: center; } .bordered{border: 0px solid rgba(0,0,0,.2)} .blocker{position: absolute;height: 50%;width: 100%;} table{border-spacing: 0px} </style> </head> <body>

							<div class="bordered blocker"> <br><br><br> <div class="right"> <p> ${item['Numero de factura']}</p> <p>${item['Numero de Autorizacion']}</p> </div> <br> <br> <br> <br> <br> <div style="padding-top: 0.75em;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="8" align="left"><b> Nombre : </b>${item['Nombre Factura']}</td> <td colspan="4" align="left" style="padding-left:30em;"><b> NIT/CI : </b>${item['NIT']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha : </b>${item['Ciudad']+' '+localDate1(item['Fecha'].split(' ')[0])}</td> <td colspan="4" align="left"></td> </tr> </table> </div> <br><br> <div> <table style="width: -webkit-fill-available;"> <tr> <td colspan="1">${parseFloat(item['Cantidad']).toFixed(2)+' '+item['UM']}</td> <td colspan="3" style="padding-left:10em;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${item['Descripcion']}</td> <td colspan="1" style="padding-left:25em;">${parseFloat(item['Precio']).toFixed(2)}</td> <td colspan="1" style="padding-left:7.5em;">${parseFloat(item['Total Lineas USD']).toFixed(2)}</td> </tr> </table> </div> <div class="bordered" style="position: absolute;bottom: 1.5em;height: 100px;width: 100%;display: inline-flex;"> <div class="bordered" style="padding-left: 10px;width: 100px;height: 100%;padding-top: 10px;"><div style="width:90px;height:90px;">${svg}</div></div> <div class="bordered" style="width: calc(100% - 100px);height: 100%;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="9" align="left"><b> Son : </b>${item['textTotal'] +' '+item['Total BS'].split('.')[1]+' / 100 BOLIVIANOS'}</td> <td colspan="3" align="left"><b> Total USD : </b>${parseFloat(item['Total USD']).toFixed(2)}</td> </tr> <tr> <td colspan="6" align="left"><b> Cod. de control : </b>${item['Codigo de Control']}</td><td colspan="3" align="left"><b> T.C. : </b>${parseFloat(item['TC']).toFixed(2)}</td><td colspan="3" align="left"><b> Total BS : </b>${item['Total BS']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha limite de Emision : </b>${item['Fecha Limite de Emision']}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="8" align="left"><b> Vendedor : </b>${item['Vendedor']}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="12" align="left" class="center small-text">El importe de esta factura deberá ser pagado en dólares americanos o en su equivalente en bolivianos al tipo de cambio vigente en la fecha de pago.<br> <b> "ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS EL USO ILÍCITO DE ESTA SERÁ SANCIONADO DE ACUERDO A LA LEY"</b><br> ${item['Ley 453']}</td></tr> </table> </div> </div> </div>

							<div class="bordered blocker" style="top:50%"> <br><br><br> <div class="right"> <p> ${item['Numero de factura']}</p> <p> ${item['Numero de Autorizacion']}</p> </div> <br> <br> <br> <br> <br> <div style="padding-top: 0.75em;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="8" align="left"><b> Nombre : </b>${item['Nombre Factura']}</td> <td colspan="4" align="left" style="padding-left:30em;"><b> NIT/CI : </b>${item['NIT']}</td> </tr><tr> <td colspan="8" align="left"><b> Fecha : </b>${item['Ciudad']+' '+localDate1(item['Fecha'].split(' ')[0])}</td> <td colspan="4" align="left"></td> </tr> </table> </div> <br><br> <div> <table style="width: -webkit-fill-available;"> <tr> <td colspan="1">${parseFloat(item['Cantidad']).toFixed(2)+' '+item['UM']}</td> <td colspan="3" style="padding-left:10em;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${item['Descripcion']}</td> <td colspan="1" style="padding-left:25em;">${parseFloat(item['Precio']).toFixed(2)}</td> <td colspan="1" style="padding-left:7.5em;">${parseFloat(item['Total Lineas USD']).toFixed(2)}</td> </tr> </table> </div> <div class="bordered" style="position: absolute;bottom: 1.5em;height: 100px;width: 100%;display: inline-flex;"> <div class="bordered" style="padding-left: 10px;width: 100px;height: 100%;padding-top: 10px;"><div style="width:90px;height:90px;">${svg}</div></div> <div class="bordered" style="width: calc(100% - 100px);height: 100%;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="9" align="left"><b> Son : </b>${item['textTotal'] +' '+item['Total BS'].split('.')[1]+' / 100 BOLIVIANOS'}</td> <td colspan="3" align="left"><b> Total USD : </b>${parseFloat(item['Total USD']).toFixed(2)}</td> </tr> <tr> <td colspan="6" align="left"><b> Cod. de control : </b>${item['Codigo de Control']}</td><td colspan="3" align="left"><b> T.C. : </b>${parseFloat(item['TC']).toFixed(2)}</td><td colspan="3" align="left"><b> Total BS : </b>${item['Total BS']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha limite de Emision : </b>${item['Fecha Limite de Emision']}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="8" align="left"><b> Vendedor : </b>${item['Vendedor']}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="12" align="left" class="center small-text">El importe de esta factura deberá ser pagado en dólares americanos o en su equivalente en bolivianos al tipo de cambio vigente en la fecha de pago.<br> <b> "ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS EL USO ILÍCITO DE ESTA SERÁ SANCIONADO DE ACUERDO A LA LEY"</b><br> ${item['Ley 453']}</td></tr> </table> </div> </div> </div>

							</body> </html>`);
return;
}
var win = window.open('','printwindow',params);
win.document.write(`<!DOCTYPE html> <html> <head> <meta charset="utf-8" /> <title> Reporte</title> <style type="text/css"> @media print {html, body {display: block; font-family: "Calibri";font-size: 12px; margin: 0; } .small-text{font-size: 9px;} table{border-spacing: 0px} @page {size: letter; margin: 0mm 10mm 0mm 10mm; padding-top:4em; } } p, .no-margin{margin: 0em;font-family: "Calibri"; } .right{text-align: right; } .center{text-align: center; } .bordered{border: 0px solid rgba(0,0,0,.2)} .blocker{position: absolute;height: 50%;width: 100%;} table{border-spacing: 0px} </style> </head> <body>

	<div class="bordered blocker"> <br><br><br> <div class="right"> <p> ${item['Numero de factura']}</p> <p> ${item['Numero de Autorizacion']}</p> </div> <br> <br> <br> <br> <br> <div style="padding-top: 0.75em;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="8" align="left"><b> Nombre : </b>${item['Nombre Factura']}</td> <td colspan="4" align="left"><b> NIT/CI : </b>${item['NIT']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha : </b>${item['Ciudad']+' '+localDate1(item['Fecha'].split(' ')[0])}</td> <td colspan="4" align="left"></td> </tr> </table> </div> <br><br> <div> <table style="width: -webkit-fill-available;"> <tr> <td colspan="1">${parseFloat(item['Cantidad']).toFixed(2)+' '+item['UM']}</td> <td colspan="3">${item['Descripcion']}</td> <td colspan="1">${parseFloat(item['Precio']).toFixed(2)}</td> <td colspan="1">${parseFloat(item['Total Lineas USD']).toFixed(2)}</td> </tr> </table> </div> <div class="bordered" style="position: absolute;bottom: 1.5em;height: 100px;width: 100%;display: inline-flex;"> <div class="bordered" style="padding-left: 10px;width: 100px;height: 100%;padding-top: 10px;"><img class="qrcode" style="width:80px;height:80px;" src="${png}"></div> <div class="bordered" style="width: calc(100% - 100px);height: 100%;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="9" align="left"><b> Son : </b>${item['textTotal'] +' '+item['Total BS'].split('.')[1]+' / 100 BOLIVIANOS'}</td> <td colspan="3" align="left"><b> Total USD : </b>${parseFloat(item['Total USD']).toFixed(2)}</td> </tr> <tr> <td colspan="6" align="left"><b> Cod. de control : </b>${item['Codigo de Control']}</td><td colspan="3" align="left"><b> T.C. : </b>${parseFloat(item['TC']).toFixed(2)}</td><td colspan="3" align="left"><b> Total BS : </b>${item['Total BS']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha limite de Emision : </b>${localDate1(item['Fecha Limite de Emision'].split(' ')[0])}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="8" align="left"><b> Vendedor : </b>${item['Vendedor']}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="12" align="left" class="center small-text">El importe de esta factura deberá ser pagado en dólares americanos o en su equivalente en bolivianos al tipo de cambio vigente en la fecha de pago.<br> <b> "ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS EL USO ILÍCITO DE ESTA SERÁ SANCIONADO DE ACUERDO A LA LEY"</b><br> ${item['Ley 453']}</td></tr> </table> </div> </div> </div>

	<div class="bordered blocker" style="top:50%"> <br><br><br> <div class="right"> <p> ${item['Numero de factura']}</p> <p> ${item['Numero de Autorizacion']}</p> </div> <br> <br> <br> <br> <br> <div style="padding-top: 0.75em;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="8" align="left"><b> Nombre : </b>${item['Nombre Factura']}</td> <td colspan="4" align="left"><b> NIT/CI : </b>${item['NIT']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha : </b>${item['Ciudad']+' '+localDate1(item['Fecha'].split(' ')[0])}</td> <td colspan="4" align="left"></td> </tr> </table> </div> <br><br> <div> <table style="width: -webkit-fill-available;"> <tr> <td colspan="1">${parseFloat(item['Cantidad']).toFixed(2)+' '+item['UM']}</td> <td colspan="3">${item['Descripcion']}</td> <td colspan="1">${parseFloat(item['Precio']).toFixed(2)}</td> <td colspan="1">${parseFloat(item['Total Lineas USD']).toFixed(2)}</td> </tr> </table> </div> <div class="bordered" style="position: absolute;bottom: 1.5em;height: 100px;width: 100%;display: inline-flex;"> <div class="bordered" style="padding-left: 10px;width: 100px;height: 100%;padding-top: 10px;"><img class="qrcode" style="width:80px;height:80px;" src="${png}"></div> <div class="bordered" style="width: calc(100% - 100px);height: 100%;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="9" align="left"><b> Son : </b>${item['textTotal'] +' '+item['Total BS'].split('.')[1]+' / 100 BOLIVIANOS'}</td> <td colspan="3" align="left"><b> Total USD : </b>${parseFloat(item['Total USD']).toFixed(2)}</td> </tr> <tr> <td colspan="6" align="left"><b> Cod. de control : </b>${item['Codigo de Control']}</td><td colspan="3" align="left"><b> T.C. : </b>${parseFloat(item['TC']).toFixed(2)}</td><td colspan="3" align="left"><b> Total BS : </b>${item['Total BS']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha limite de Emision : </b>${localDate1(item['Fecha Limite de Emision'].split(' ')[0])}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="8" align="left"><b> Vendedor : </b>${item['Vendedor']}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="12" align="left" class="center small-text">El importe de esta factura deberá ser pagado en dólares americanos o en su equivalente en bolivianos al tipo de cambio vigente en la fecha de pago.<br> <b> "ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS EL USO ILÍCITO DE ESTA SERÁ SANCIONADO DE ACUERDO A LA LEY"</b><br> ${item['Ley 453']}</td></tr> </table> </div> </div> </div>
	</body> </html>`);
setTimeout(function(){
	win.print();
	setTimeout(function(){
		win.close();
	},500);
},500);
});
});
});
}






// function PrintElem(elem)
// {
//     var mywindow = window.open('', 'PRINT', 'height=400,width=600');

//     mywindow.document.write('<html><head><title>holaa</title>');
//     mywindow.document.write('</head><body >');
//     mywindow.document.write('<h1>jhkjcnlkdsnc</h1>');
//   //  mywindow.document.write(document.getElementById(elem).innerHTML);
//     mywindow.document.write('</body></html>');

//     mywindow.document.close(); // necessary for IE >= 10
//     mywindow.focus(); // necessary for IE >= 10*/

//     mywindow.print();
//     mywindow.close();

//     return true;
// }













function Unidades(num){

    switch(num)
    {
        case 1: return "UN";
        case 2: return "DOS";
        case 3: return "TRES";
        case 4: return "CUATRO";
        case 5: return "CINCO";
        case 6: return "SEIS";
        case 7: return "SIETE";
        case 8: return "OCHO";
        case 9: return "NUEVE";
    }

    return "";
}//Unidades()

function Decenas(num){

    decena = Math.floor(num/10);
    unidad = num - (decena * 10);

    switch(decena)
    {
        case 1:
            switch(unidad)
            {
                case 0: return "DIEZ";
                case 1: return "ONCE";
                case 2: return "DOCE";
                case 3: return "TRECE";
                case 4: return "CATORCE";
                case 5: return "QUINCE";
                default: return "DIECI" + Unidades(unidad);
            }
        case 2:
            switch(unidad)
            {
                case 0: return "VEINTE";
                default: return "VEINTI" + Unidades(unidad);
            }
        case 3: return DecenasY("TREINTA", unidad);
        case 4: return DecenasY("CUARENTA", unidad);
        case 5: return DecenasY("CINCUENTA", unidad);
        case 6: return DecenasY("SESENTA", unidad);
        case 7: return DecenasY("SETENTA", unidad);
        case 8: return DecenasY("OCHENTA", unidad);
        case 9: return DecenasY("NOVENTA", unidad);
        case 0: return Unidades(unidad);
    }
}//Unidades()

function DecenasY(strSin, numUnidades) {
    if (numUnidades > 0)
    return strSin + " Y " + Unidades(numUnidades)

    return strSin;
}//DecenasY()

function Centenas(num) {
    centenas = Math.floor(num / 100);
    decenas = num - (centenas * 100);

    switch(centenas)
    {
        case 1:
            if (decenas > 0)
                return "CIENTO " + Decenas(decenas);
            return "CIEN";
        case 2: return "DOSCIENTOS " + Decenas(decenas);
        case 3: return "TRESCIENTOS " + Decenas(decenas);
        case 4: return "CUATROCIENTOS " + Decenas(decenas);
        case 5: return "QUINIENTOS " + Decenas(decenas);
        case 6: return "SEISCIENTOS " + Decenas(decenas);
        case 7: return "SETECIENTOS " + Decenas(decenas);
        case 8: return "OCHOCIENTOS " + Decenas(decenas);
        case 9: return "NOVECIENTOS " + Decenas(decenas);
    }

    return Decenas(decenas);
}//Centenas()

function Seccion(num, divisor, strSingular, strPlural) {
    cientos = Math.floor(num / divisor)
    resto = num - (cientos * divisor)

    letras = "";

    if (cientos > 0)
        if (cientos > 1)
            letras = Centenas(cientos) + " " + strPlural;
        else
            letras = strSingular;

    if (resto > 0)
        letras += "";

    return letras;
}//Seccion()

function Miles(num) {
    divisor = 1000;
    cientos = Math.floor(num / divisor)
    resto = num - (cientos * divisor)

    strMiles = Seccion(num, divisor, "UN MIL", "MIL");
    strCentenas = Centenas(resto);

    if(strMiles == "")
        return strCentenas;

    return strMiles + " " + strCentenas;
}//Miles()

function Millones(num) {
    divisor = 1000000;
    cientos = Math.floor(num / divisor)
    resto = num - (cientos * divisor)

    strMillones = Seccion(num, divisor, "UN MILLON DE", "MILLONES DE");
    strMiles = Miles(resto);

    if(strMillones == "")
        return strMiles;

    return strMillones + " " + strMiles;
}//Millones()

function NumeroALetras(num) {
    var data = {
        numero: num,
        enteros: Math.floor(num),
        centavos:0
       
    };
//console.log('rt v'+JSON.stringify(data));
   

 
    if (data.enteros == 1)
        return Millones(data.enteros) ;
    else
        return Millones(data.enteros) ;
}//NumeroALetras()








function convertDateFormat(string) {
  var info = string.split('-');
  return info[2] + '/' + info[1] + '/' + info[0];
}





function printFvn(ticket){
	setProgressMsg('Cargando...');
	send('server.php',{call:'getFactData',idSesion:getSesion('idSesion'),placa:ticket},function(data){
		hideProgress();
		data.forEach(function(item,index,arr){
			var key=item['NIT Emisor']+'|'+item['Numero de factura']+'|'+item['Numero de Autorizacion']+'|'+localDate1(item['Fecha'].split(' ')[0])+'|'+item['Total BS']+'|'+item['Total BS']+'|'+item['Codigo de Control']+'|'+item['NIT']+'|0.00|0.00|0.00|0.00';
			if(item['Fecha Limite de Emision']==null){
				item['Fecha Limite de Emision']=`${getCurrentDate1()}`;
			}	
				getQr(key,function(png,svg){
					if(isApp){
						cordova.plugins.printer.print(`<html><head><meta charset="utf-8" /> <title> Reporte</title> <style type="text/css"> html, body {display: block; font-family: "Calibri";font-size: 12px; margin: 0; } .small-text{font-size: 9px;} table{border-spacing: 0px} @page {size: 8.5in 11.5in;size: portrait; margin: 0mm 10mm 0mm 10mm; padding-top:4em; } p, .no-margin{margin: 0em;font-family: "Calibri"; } .right{text-align: right; } .center{text-align: center; } .bordered{border: 0px solid rgba(0,0,0,.2)} .blocker{position: absolute;height: 50%;width: 100%;} table{border-spacing: 0px} </style> </head> <body>

                            <div class="bordered blocker"> <br><br><br> <div class="right"> <p> ${item['Numero de factura']}</p> <p>${item['Numero de Autorizacion']}</p> </div> <br> <br> <br> <br> <br> <div style="padding-top: 0.75em;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="8" align="left"><b> Nombre : </b>${item['Nombre Factura']}</td> <td colspan="4" align="left" style="padding-left:30em;"><b> NIT/CI : </b>${item['NIT']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha : </b>${item['Ciudad']+' '+localDate1(item['Fecha'].split(' ')[0])}</td> <td colspan="4" align="left"></td> </tr> </table> </div> <br><br> <div> <table style="width: -webkit-fill-available;"> <tr> <td colspan="1">${parseFloat(item['Cantidad']).toFixed(2)+' '+item['UM']}</td> <td colspan="3" style="padding-left:10em;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${item['Descripcion']}</td> <td colspan="1" style="padding-left:25em;">${parseFloat(item['Precio']).toFixed(2)}</td> <td colspan="1" style="padding-left:7.5em;">${parseFloat(item['Total Lineas USD']).toFixed(2)}</td> </tr> </table> </div> <div class="bordered" style="position: absolute;bottom: 1.5em;height: 100px;width: 100%;display: inline-flex;"> <div class="bordered" style="padding-left: 10px;width: 100px;height: 100%;padding-top: 10px;"><div style="width:90px;height:90px;">${svg}</div></div> <div class="bordered" style="width: calc(100% - 100px);height: 100%;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="9" align="left"><b> Son : </b>${item['textTotal'] +' '+item['Total BS'].split('.')[1]+' / 100 BOLIVIANOS'}</td> <td colspan="3" align="left"><b> Total USD : </b>${parseFloat(item['Total USD']).toFixed(2)}</td> </tr> <tr> <td colspan="6" align="left"><b> Cod. de control : </b>${item['Codigo de Control']}</td><td colspan="3" align="left"><b> T.C. : </b>${parseFloat(item['TC']).toFixed(2)}</td><td colspan="3" align="left"><b> Total BS : </b>${item['Total BS']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha limite de Emision : </b>${item['Fecha Limite de Emision']}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="8" align="left"><b> Vendedor : </b>${item['Vendedor']}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="12" align="left" class="center small-text">El importe de esta factura deberá ser pagado en dólares americanos o en su equivalente en bolivianos al tipo de cambio vigente en la fecha de pago.<br> <b> "ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS EL USO ILÍCITO DE ESTA SERÁ SANCIONADO DE ACUERDO A LA LEY"</b><br> ${item['Ley 453']}</td></tr> </table> </div> </div> </div>

							<div class="bordered blocker" style="top:50%"> <br><br><br> <div class="right"> <p> ${item['Numero de factura']}</p> <p> ${item['Numero de Autorizacion']}</p> </div> <br> <br> <br> <br> <br> <div style="padding-top: 0.75em;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="8" align="left"><b> Nombre : </b>${item['Nombre Factura']}</td> <td colspan="4" align="left" style="padding-left:30em;"><b> NIT/CI : </b>${item['NIT']}</td> </tr><tr> <td colspan="8" align="left"><b> Fecha : </b>${item['Ciudad']+' '+localDate1(item['Fecha'].split(' ')[0])}</td> <td colspan="4" align="left"></td> </tr> </table> </div> <br><br> <div> <table style="width: -webkit-fill-available;"> <tr> <td colspan="1">${parseFloat(item['Cantidad']).toFixed(2)+' '+item['UM']}</td> <td colspan="3" style="padding-left:10em;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${item['Descripcion']}</td> <td colspan="1" style="padding-left:25em;">${parseFloat(item['Precio']).toFixed(2)}</td> <td colspan="1" style="padding-left:7.5em;">${parseFloat(item['Total Lineas USD']).toFixed(2)}</td> </tr> </table> </div> <div class="bordered" style="position: absolute;bottom: 1.5em;height: 100px;width: 100%;display: inline-flex;"> <div class="bordered" style="padding-left: 10px;width: 100px;height: 100%;padding-top: 10px;"><div style="width:90px;height:90px;">${svg}</div></div> <div class="bordered" style="width: calc(100% - 100px);height: 100%;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="9" align="left"><b> Son : </b>${item['textTotal'] +' '+item['Total BS'].split('.')[1]+' / 100 BOLIVIANOS'}</td> <td colspan="3" align="left"><b> Total USD : </b>${parseFloat(item['Total USD']).toFixed(2)}</td> </tr> <tr> <td colspan="6" align="left"><b> Cod. de control : </b>${item['Codigo de Control']}</td><td colspan="3" align="left"><b> T.C. : </b>${parseFloat(item['TC']).toFixed(2)}</td><td colspan="3" align="left"><b> Total BS : </b>${item['Total BS']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha limite de Emision : </b>${item['Fecha Limite de Emision']}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="8" align="left"><b> Vendedor : </b>${item['Vendedor']}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="12" align="left" class="center small-text">El importe de esta factura deberá ser pagado en dólares americanos o en su equivalente en bolivianos al tipo de cambio vigente en la fecha de pago.<br> <b> "ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS EL USO ILÍCITO DE ESTA SERÁ SANCIONADO DE ACUERDO A LA LEY"</b><br> ${item['Ley 453']}</td></tr> </table> </div> </div> </div>

							</body> </html>`);
return;
}
var win = window.open('','printwindow',params);
win.document.write(`<!DOCTYPE html> <html> <head> <meta charset="utf-8" /> <title> Reporte</title> <style type="text/css"> @media print {html, body {display: block; font-family: "Calibri";font-size: 12px; margin: 0; } .small-text{font-size: 9px;} table{border-spacing: 0px} @page {size: letter; margin: 0mm 10mm 0mm 10mm; padding-top:4em; } } p, .no-margin{margin: 0em;font-family: "Calibri"; } .right{text-align: right; } .center{text-align: center; } .bordered{border: 0px solid rgba(0,0,0,.2)} .blocker{position: absolute;height: 50%;width: 100%;} table{border-spacing: 0px} </style> </head> <body>

	<div class="bordered blocker"> <br><br><br> <div class="right"> <p> ${item['Numero de factura']}</p> <p> ${item['Numero de Autorizacion']}</p> </div> <br> <br> <br> <br> <br> <div style="padding-top: 0.75em;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="8" align="left"><b> Nombre : </b>${item['Nombre Factura']}</td> <td colspan="4" align="left"><b> NIT/CI : </b>${item['NIT']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha : </b>${item['Ciudad']+' '+localDate1(item['Fecha'].split(' ')[0])}</td> <td colspan="4" align="left"></td> </tr> </table> </div> <br><br> <div> <table style="width: -webkit-fill-available;"> <tr> <td colspan="1">${parseFloat(item['Cantidad']).toFixed(2)+' '+item['UM']}</td> <td colspan="3">${item['Descripcion']}</td> <td colspan="1">${parseFloat(item['Precio']).toFixed(2)}</td> <td colspan="1">${parseFloat(item['Total Lineas USD']).toFixed(2)}</td> </tr> </table> </div> <div class="bordered" style="position: absolute;bottom: 1.5em;height: 100px;width: 100%;display: inline-flex;"> <div class="bordered" style="padding-left: 10px;width: 100px;height: 100%;padding-top: 10px;"><img class="qrcode" style="width:80px;height:80px;" src="${png}"></div> <div class="bordered" style="width: calc(100% - 100px);height: 100%;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="9" align="left"><b> Son : </b>${item['textTotal'] +' '+item['Total BS'].split('.')[1]+' / 100 BOLIVIANOS'}</td> <td colspan="3" align="left"><b> Total USD : </b>${parseFloat(item['Total USD']).toFixed(2)}</td> </tr> <tr> <td colspan="6" align="left"><b> Cod. de control : </b>${item['Codigo de Control']}</td><td colspan="3" align="left"><b> T.C. : </b>${parseFloat(item['TC']).toFixed(2)}</td><td colspan="3" align="left"><b> Total BS : </b>${item['Total BS']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha limite de Emision : </b>${localDate1(item['Fecha Limite de Emision'].split(' ')[0])}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="8" align="left"><b> Vendedor : </b>${item['Vendedor']}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="12" align="left" class="center small-text">El importe de esta factura deberá ser pagado en dólares americanos o en su equivalente en bolivianos al tipo de cambio vigente en la fecha de pago.<br> <b> "ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS EL USO ILÍCITO DE ESTA SERÁ SANCIONADO DE ACUERDO A LA LEY"</b><br> ${item['Ley 453']}</td></tr> </table> </div> </div> </div>

	<div class="bordered blocker" style="top:50%"> <br><br><br> <div class="right"> <p> ${item['Numero de factura']}</p> <p> ${item['Numero de Autorizacion']}</p> </div> <br> <br> <br> <br> <br> <div style="padding-top: 0.75em;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="8" align="left"><b> Nombre : </b>${item['Nombre Factura']}</td> <td colspan="4" align="left"><b> NIT/CI : </b>${item['NIT']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha : </b>${item['Ciudad']+' '+localDate1(item['Fecha'].split(' ')[0])}</td> <td colspan="4" align="left"></td> </tr> </table> </div> <br><br> <div> <table style="width: -webkit-fill-available;"> <tr> <td colspan="1">${parseFloat(item['Cantidad']).toFixed(2)+' '+item['UM']}</td> <td colspan="3">${item['Descripcion']}</td> <td colspan="1">${parseFloat(item['Precio']).toFixed(2)}</td> <td colspan="1">${parseFloat(item['Total Lineas USD']).toFixed(2)}</td> </tr> </table> </div> <div class="bordered" style="position: absolute;bottom: 1.5em;height: 100px;width: 100%;display: inline-flex;"> <div class="bordered" style="padding-left: 10px;width: 100px;height: 100%;padding-top: 10px;"><img class="qrcode" style="width:80px;height:80px;" src="${png}"></div> <div class="bordered" style="width: calc(100% - 100px);height: 100%;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="9" align="left"><b> Son : </b>${item['textTotal'] +' '+item['Total BS'].split('.')[1]+' / 100 BOLIVIANOS'}</td> <td colspan="3" align="left"><b> Total USD : </b>${parseFloat(item['Total USD']).toFixed(2)}</td> </tr> <tr> <td colspan="6" align="left"><b> Cod. de control : </b>${item['Codigo de Control']}</td><td colspan="3" align="left"><b> T.C. : </b>${parseFloat(item['TC']).toFixed(2)}</td><td colspan="3" align="left"><b> Total BS : </b>${item['Total BS']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha limite de Emision : </b>${localDate1(item['Fecha Limite de Emision'].split(' ')[0])}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="8" align="left"><b> Vendedor : </b>${item['Vendedor']}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="12" align="left" class="center small-text">El importe de esta factura deberá ser pagado en dólares americanos o en su equivalente en bolivianos al tipo de cambio vigente en la fecha de pago.<br> <b> "ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS EL USO ILÍCITO DE ESTA SERÁ SANCIONADO DE ACUERDO A LA LEY"</b><br> ${item['Ley 453']}</td></tr> </table> </div> </div> </div>
	</body> </html>`);



setTimeout(function(){
	win.print();
	setTimeout(function(){
		win.close();
	},500);
},500);

});




});
});
}





function printFvn1(ticket){
	setProgressMsg('Cargando...');
	send('server.php',{call:'getFactData',idSesion:getSesion('idSesion'),placa:ticket},function(data){
		hideProgress();
		data.forEach(function(item,index,arr){
			var key=item['NIT Emisor']+'|'+item['Numero de factura']+'|'+item['Numero de Autorizacion']+'|'+localDate1(item['Fecha'].split(' ')[0])+'|'+item['Total BS']+'|'+item['Total BS']+'|'+item['Codigo de Control']+'|'+item['NIT']+'|0.00|0.00|0.00|0.00';
			if(item['Fecha Limite de Emision']==null){
				item['Fecha Limite de Emision']=`${getCurrentDate1()}`;
			}	
				getQr(key,function(png,svg){
					if(isApp){
						cordova.plugins.printer.print(`<html><head><meta charset="utf-8" /> <title> Reporte</title> <style type="text/css"> html, body {display: block; font-family: "Calibri";font-size: 12px; margin: 0; } .small-text{font-size: 9px;} table{border-spacing: 0px} @page {size: 8.5in 11.5in;size: portrait; margin: 0mm 10mm 0mm 10mm; padding-top:4em; } p, .no-margin{margin: 0em;font-family: "Calibri"; } .right{text-align: right; } .center{text-align: center; } .bordered{border: 0px solid rgba(0,0,0,.2)} .blocker{position: absolute;height: 50%;width: 100%;} table{border-spacing: 0px} </style> </head> <body>

                            <div class="bordered blocker"> <br><br><br> <div class="right"> <p> ${item['Numero de factura']}</p> <p>${item['Numero de Autorizacion']}</p> </div> <br> <br> <br> <br> <br> <div style="padding-top: 0.75em;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="8" align="left"><b> Nombre : </b>${item['Nombre Factura']}</td> <td colspan="4" align="left" style="padding-left:30em;"><b> NIT/CI : </b>${item['NIT']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha : </b>${item['Ciudad']+' '+localDate1(item['Fecha'].split(' ')[0])}</td> <td colspan="4" align="left"></td> </tr> </table> </div> <br><br> <div> <table style="width: -webkit-fill-available;"> <tr> <td colspan="1">${parseFloat(item['Cantidad']).toFixed(2)+' '+item['UM']}</td> <td colspan="3" style="padding-left:10em;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${item['Descripcion']}</td> <td colspan="1" style="padding-left:25em;">${parseFloat(item['Precio']).toFixed(2)}</td> <td colspan="1" style="padding-left:7.5em;">${parseFloat(item['Total Lineas USD']).toFixed(2)}</td> </tr> </table> </div> <div class="bordered" style="position: absolute;bottom: 1.5em;height: 100px;width: 100%;display: inline-flex;"> <div class="bordered" style="padding-left: 10px;width: 100px;height: 100%;padding-top: 10px;"><div style="width:90px;height:90px;">${svg}</div></div> <div class="bordered" style="width: calc(100% - 100px);height: 100%;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="9" align="left"><b> Son : </b>${item['textTotal'] +' '+item['Total BS'].split('.')[1]+' / 100 BOLIVIANOS'}</td> <td colspan="3" align="left"><b> Total USD : </b>${parseFloat(item['Total USD']).toFixed(2)}</td> </tr> <tr> <td colspan="6" align="left"><b> Cod. de control : </b>${item['Codigo de Control']}</td><td colspan="3" align="left"><b> T.C. : </b>${parseFloat(item['TC']).toFixed(2)}</td><td colspan="3" align="left"><b> Total BS : </b>${item['Total BS']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha limite de Emision : </b>${item['Fecha Limite de Emision']}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="8" align="left"><b> Vendedor : </b>${item['Vendedor']}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="12" align="left" class="center small-text">El importe de esta factura deberá ser pagado en dólares americanos o en su equivalente en bolivianos al tipo de cambio vigente en la fecha de pago.<br> <b> "ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS EL USO ILÍCITO DE ESTA SERÁ SANCIONADO DE ACUERDO A LA LEY"</b><br> ${item['Ley 453']}</td></tr> </table> </div> </div> </div>

							<div class="bordered blocker" style="top:50%"> <br><br><br> <div class="right"> <p> ${item['Numero de factura']}</p> <p> ${item['Numero de Autorizacion']}</p> </div> <br> <br> <br> <br> <br> <div style="padding-top: 0.75em;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="8" align="left"><b> Nombre : </b>${item['Nombre Factura']}</td> <td colspan="4" align="left" style="padding-left:30em;"><b> NIT/CI : </b>${item['NIT']}</td> </tr><tr> <td colspan="8" align="left"><b> Fecha : </b>${item['Ciudad']+' '+localDate1(item['Fecha'].split(' ')[0])}</td> <td colspan="4" align="left"></td> </tr> </table> </div> <br><br> <div> <table style="width: -webkit-fill-available;"> <tr> <td colspan="1">${parseFloat(item['Cantidad']).toFixed(2)+' '+item['UM']}</td> <td colspan="3" style="padding-left:10em;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${item['Descripcion']}</td> <td colspan="1" style="padding-left:25em;">${parseFloat(item['Precio']).toFixed(2)}</td> <td colspan="1" style="padding-left:7.5em;">${parseFloat(item['Total Lineas USD']).toFixed(2)}</td> </tr> </table> </div> <div class="bordered" style="position: absolute;bottom: 1.5em;height: 100px;width: 100%;display: inline-flex;"> <div class="bordered" style="padding-left: 10px;width: 100px;height: 100%;padding-top: 10px;"><div style="width:90px;height:90px;">${svg}</div></div> <div class="bordered" style="width: calc(100% - 100px);height: 100%;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="9" align="left"><b> Son : </b>${item['textTotal'] +' '+item['Total BS'].split('.')[1]+' / 100 BOLIVIANOS'}</td> <td colspan="3" align="left"><b> Total USD : </b>${parseFloat(item['Total USD']).toFixed(2)}</td> </tr> <tr> <td colspan="6" align="left"><b> Cod. de control : </b>${item['Codigo de Control']}</td><td colspan="3" align="left"><b> T.C. : </b>${parseFloat(item['TC']).toFixed(2)}</td><td colspan="3" align="left"><b> Total BS : </b>${item['Total BS']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha limite de Emision : </b>${item['Fecha Limite de Emision']}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="8" align="left"><b> Vendedor : </b>${item['Vendedor']}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="12" align="left" class="center small-text">El importe de esta factura deberá ser pagado en dólares americanos o en su equivalente en bolivianos al tipo de cambio vigente en la fecha de pago.<br> <b> "ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS EL USO ILÍCITO DE ESTA SERÁ SANCIONADO DE ACUERDO A LA LEY"</b><br> ${item['Ley 453']}</td></tr> </table> </div> </div> </div>

							</body> </html>`);
return;
}
var win = window.open('','printwindow',params);
win.document.write(`<!DOCTYPE html> <html> 
                 <head> <meta charset="utf-8" />
				  <title> Reporte</title>
				  <style type="text/css"> @media print {html, body {display: block; font-family: "Calibri";font-size: 12px; margin: 0; } 
				  .small-text{font-size: 9px;} table{border-spacing: 0px} @page {size: letter; margin: 0mm 10mm 0mm 10mm; padding-top:4em; } }
				   p, .no-margin{margin: 0em;font-family: "Calibri"; } .right{text-align: right; } .center{text-align: center; } 
				   .bordered{border: 0px solid rgba(0,0,0,.2)} .blocker{position: absolute;height: 50%;width: 100%;} table{border-spacing: 0px} </style> </head> <body>

               	<div class="bordered blocker"> <br><br><br> <div class="right"> <p> ${item['Numero de factura']}</p> <p> ${item['Numero de Autorizacion']}</p> </div> <br> <br> <br> <br> <br> <div style="padding-top: 0.75em;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="8" align="left"><b> Nombre : </b>${item['Nombre Factura']}</td> <td colspan="4" align="left"><b> NIT/CI : </b>${item['NIT']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha : </b>${item['Ciudad']+' '+localDate1(item['Fecha'].split(' ')[0])}</td> <td colspan="4" align="left"></td> </tr> </table> </div> <br><br> <div> <table style="width: -webkit-fill-available;"> <tr> <td colspan="1">${parseFloat(item['Cantidad']).toFixed(2)+' '+item['UM']}</td> <td colspan="3">${item['Descripcion']}</td> <td colspan="1">${parseFloat(item['Precio']).toFixed(2)}</td> <td colspan="1">${parseFloat(item['Total Lineas USD']).toFixed(2)}</td> </tr> </table> </div> <div class="bordered" style="position: absolute;bottom: 1.5em;height: 100px;width: 100%;display: inline-flex;"> <div class="bordered" style="padding-left: 10px;width: 100px;height: 100%;padding-top: 10px;"><img class="qrcode" style="width:80px;height:80px;" src="${png}"></div> <div class="bordered" style="width: calc(100% - 100px);height: 100%;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="9" align="left"><b> Son : </b>${item['textTotal'] +' '+item['Total BS'].split('.')[1]+' / 100 BOLIVIANOS'}</td> <td colspan="3" align="left"><b> Total USD : </b>${parseFloat(item['Total USD']).toFixed(2)}</td> </tr> <tr> <td colspan="6" align="left"><b> Cod. de control : </b>${item['Codigo de Control']}</td><td colspan="3" align="left"><b> T.C. : </b>${parseFloat(item['TC']).toFixed(2)}</td><td colspan="3" align="left"><b> Total BS : </b>${item['Total BS']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha limite de Emision : </b>${localDate1(item['Fecha Limite de Emision'].split(' ')[0])}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="8" align="left"><b> Vendedor : </b>${item['Vendedor']}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="12" align="left" class="center small-text">El importe de esta factura deberá ser pagado en dólares americanos o en su equivalente en bolivianos al tipo de cambio vigente en la fecha de pago.<br> <b> "ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS EL USO ILÍCITO DE ESTA SERÁ SANCIONADO DE ACUERDO A LA LEY"</b><br> ${item['Ley 453']}</td></tr> </table> </div> </div> </div>

            	<div class="bordered blocker" style="top:50%"> <br><br><br> <div class="right"> <p> ${item['Numero de factura']}</p> <p> ${item['Numero de Autorizacion']}</p> </div> <br> <br> <br> <br> <br> <div style="padding-top: 0.75em;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="8" align="left"><b> Nombre : </b>${item['Nombre Factura']}</td> <td colspan="4" align="left"><b> NIT/CI : </b>${item['NIT']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha : </b>${item['Ciudad']+' '+localDate1(item['Fecha'].split(' ')[0])}</td> <td colspan="4" align="left"></td> </tr> </table> </div> <br><br> <div> <table style="width: -webkit-fill-available;"> <tr> <td colspan="1">${parseFloat(item['Cantidad']).toFixed(2)+' '+item['UM']}</td> <td colspan="3">${item['Descripcion']}</td> <td colspan="1">${parseFloat(item['Precio']).toFixed(2)}</td> <td colspan="1">${parseFloat(item['Total Lineas USD']).toFixed(2)}</td> </tr> </table> </div> <div class="bordered" style="position: absolute;bottom: 1.5em;height: 100px;width: 100%;display: inline-flex;"> <div class="bordered" style="padding-left: 10px;width: 100px;height: 100%;padding-top: 10px;"><img class="qrcode" style="width:80px;height:80px;" src="${png}"></div> <div class="bordered" style="width: calc(100% - 100px);height: 100%;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="9" align="left"><b> Son : </b>${item['textTotal'] +' '+item['Total BS'].split('.')[1]+' / 100 BOLIVIANOS'}</td> <td colspan="3" align="left"><b> Total USD : </b>${parseFloat(item['Total USD']).toFixed(2)}</td> </tr> <tr> <td colspan="6" align="left"><b> Cod. de control : </b>${item['Codigo de Control']}</td><td colspan="3" align="left"><b> T.C. : </b>${parseFloat(item['TC']).toFixed(2)}</td><td colspan="3" align="left"><b> Total BS : </b>${item['Total BS']}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha limite de Emision : </b>${localDate1(item['Fecha Limite de Emision'].split(' ')[0])}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="8" align="left"><b> Vendedor : </b>${item['Vendedor']}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="12" align="left" class="center small-text">El importe de esta factura deberá ser pagado en dólares americanos o en su equivalente en bolivianos al tipo de cambio vigente en la fecha de pago.<br> <b> "ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS EL USO ILÍCITO DE ESTA SERÁ SANCIONADO DE ACUERDO A LA LEY"</b><br> ${item['Ley 453']}</td></tr> </table> </div> </div> </div>
	</body> </html>`);



setTimeout(function(){
	win.print();
	setTimeout(function(){
		win.close();
	},500);
},500);

});




});
});
}















function printInfo(ticket,dataFact,dataDoc){
	if(dataFact==null){
		if(offline){
			execute(`select * from balanza where`,function(dataFact){});
		}else{
			setProgressMsg('Cargando...');
			send('server.php',{call:'getLast',idSesion:getSesion('idSesion'),placa:ticket,sucursal:getSesion('sucursal')},function(dataFact){
				printInfo(ticket,dataFact,null);
			});
		}
		return;
	}else if(dataDoc==null){
		if(offline){
			execute(`SELECT * FROM balanza1 where U_Nro_Ticket='${ticket}'`,function (dataDoc) {
				printInfo(ticket,dataFact,dataDoc);
			});
		}else{
			setProgressMsg('Cargando...');
			send('server.php',{call:'getDoc',ticket:dataFact[0]['Code'],idSesion:getSesion('idSesion')},function(dataDoc){
				printInfo(ticket,dataFact,dataDoc);
			});
		}
		return;
	}
	hideProgress();
	let docdocs='';
	let docs=``;
	if(dataDoc.length>0){
		var pesoTotal=parseFloat(0);
		dataDoc.forEach(function(item,index,ar){
			docs+=`<tr><td>${(index+1)}</td><td>${item['U_Tipo_Doc']}</td><td>${item['U_Nro_Orden']}</td><td>${parseFloat(item['U_Peso_Total']).toFixed(2)}</td><td>${item['U_Cliente']}</td><td>${item['U_Despachador']?item['U_Despachador']:""}</td><td>${item['U_Observacion']}</td></tr>`;
			pesoTotal+=parseFloat(item['U_Peso_Total']);
		});
		var resto='';
		var dif=Math.abs(pesoTotal-parseFloat(dataFact[0]['U_Neto']));
		dif=dif.toFixed(2);
		pesoTotal=pesoTotal.toFixed(2);
		if(pesoTotal>parseFloat(dataFact[0]['U_Neto'])){
			resto=`Faltante : <span class="blue-text">${dif}</span>`;
		}else if(pesoTotal<parseFloat(dataFact[0]['U_Neto'])){
			resto=`Sobrepeso : <span class="red-text">${dif}</span>`;
		}else{

		}
		docdocs=`<b>Total : <span>${pesoTotal}</span></b><br><b>${resto}</b>`;
		docs=`
		<span class="card-title col s12">DOCUMENTOS</span>
		<div class="table-o">
		<table>
		<thead><tr><th>Nº</th><th>Tipo</th><th>Nº Documento</th><th>Peso Total(Kg)</th><th>Razon Social</th><th>Despachador</th><th>Observación</th></tr></thead>
		<tbody id="tbody-o">${docs}</tbody>
		</table>
		</div>
		<div class="footer-o center">
		${docdocs}
		</div>`;
	}
	var cad='';
	dataFact.forEach(function(item,index,array){
		let factura='';
		let creditor='';
		if(item['U_Origen']=='CONTADO'){
			factura=`<div class="input-field col s4"><input value="${item['U_NroDocFactura']}" type="text"><label class="label active">Nº FACTURA</label></div>`;
		}else{
			factura=`<div class="input-field col s8"><input value="${item['U_RazonSocial']}" type="text" maxlength="50"><label class="label active">RAZON SOCIAL</label></div>`;
			creditor='hide';
		}
		let segundaF='<input value="NO DEFINIDO" type="text"><label class="label active">SEGUNDO PESAJE</label>';
		if(item['U_Estado']=='2'){
			segundaF=`<input value="${localDate(item['U_FechaSal'].split(' ')[0])} ${item['U_HoraSal']<1000?item['U_HoraSal'].slice(0,1):item['U_HoraSal'].slice(0,2)}:${item['U_HoraSal'].slice(-2)}" type="text"><label class="label active">SEGUNDO PESAJE</label>`;
		}
		cad+=`<main>
		<div class="row" style="padding-bottom: 4em;">
		<div class="row" style="padding: .5em">
		<div class="col s6">
		<div class="input-field col s6"><input value="${localDate(item['U_Fecha'].split(' ')[0])} ${item['U_Hora']<1000?item['U_Hora'].slice(0,1):item['U_Hora'].slice(0,2)}:${item['U_Hora'].slice(-2)}" type="text"><label class="label active">PRIMER PESAJE</label></div>
		<div class="input-field col s6">${segundaF}</div>
		<div class="input-field col s6"><input value="${item['U_Nombre']}" type="text"><label class="label active">USUARIO</label></div>
		</div>
		<div class="col s6">
		<div class="input-field col s6"><input value="${item['U_Sucursal']}" type="text"><label class="label active">SUCURSAL</label></div>
		<div class="input-field col s6"><input value="${item['U_Estado']=='1'?'INICIAL':'FINALIZADO'}" type="text"><label class="label active">ESTADO</label></div>
		<div class="input-field col s6"></div>
		<div class="input-field col s6"><input value="${item['U_NroTicket']}" type="text"><label class="label active">TICKET</label></div>
		</div>
		<div class="col s12" style="height: 1px;background: rgba(0,0,0,.14);"></div>

		<div class="col s12 card">
		<span class="card-title col s12">SERVICIO</span>
		<div class="input-field col s4"><input value="${item['U_Origen']}" type="text"><label class="label active">TIPO DE SERVICIO</label></div>
		${factura}
		</div>

		<div class="col s12 card">
		<span class="card-title col s12">VEHICULO</span>
		<div class="input-field col s4"><input value="${item['U_Placa']}" type="text"><label class="label active">PLACA</label></div>
		<div class="input-field col s4"><input value="${item['U_Marca']}" type="text"><label class="label active">MARCA</label></div>
		<div class="input-field col s4"><input value="${item['U_Color']}" type="text"><label class="label active">COLOR</label></div>
		<div class="input-field col s7"><input value="${item['U_NombreChofer']}" type="text"><label class="label active">CONDUCTOR</label></div>
		<div class="input-field col s3"><input value="${item['U_CI_Chofer']}" type="text"><label class="label active">CI</label></div>
		<div class="input-field col s2"><input value="${item['U_OrigenDoc']}" type="text"><label class="label active">EXP.</label></div>
		</div>

		<div class="col s12 card ${creditor}">
		<span class="card-title col s12">FACTURA</span>
		<div class="input-field col s3"><input value="${item['U_NIT']}" type="text" maxlength="20"><label class="label active">NIT</label></div>
		<div class="input-field col s9"><input value="${item['U_RazonSocial']}" type="text" maxlength="50"><label class="label active">RAZON SOCIAL</label></div>
		</div>

		<div class="col s12 card">
		<span class="card-title col s12">PESAJE</span>
		</div>
		<div class="col s4">
		<div class="input-field col s12"><input value="${item['U_Tara']}" type="text"><label class="label active">PESO TARA (KG)</label></div>
		</div>
		<div class="col s4">
		<div class="input-field col s12"><input value="${item['U_Bruto']}" type="text"><label class="label active">PESO BRUTO (KG)</label></div>
		</div>
		<div class="col s4">
		<div class="input-field col s12"><input value="${item['U_Neto']}" type="text"><label class="label active">NETO (KG)</label></div>
		</div>
		<div class="col s12 card">
		${docs}
		</div>
		</div>
		</div>
		</main> `;
		/*}*/
	});
if(isApp){
	requestFile('css/style.css','text',function(css1){
		requestFile('css/print.css','text',function(css2){
			cordova.plugins.printer.print(`<html> <head> <meta charset="utf-8" /><style>${css1}${css2}</style><title>Reporte</title>
				<link rel="stylesheet" href="css/print.css"></head> <body style="">${cad}</body> </html>`);
		/*cordova.plugins.printer.print(`<html> <head> <meta charset="utf-8" /><style>th,td{text-align:left;}table{width:100%;}</style><title>Reporte</title>
		<link rel="stylesheet" href="css/print.css"></head> <body style="">${cad}</body> </html>`);*/
	});
	});
	return;
}


requestFile('css/style.css','text',function(css1){
	requestFile('css/print.css','text',function(css2){
		

		// cordova.plugins.printer.print(`<html> <head> <meta charset="utf-8" /><style>${css1}${css2}</style><title>Reporte</title>
		// 	<link rel="stylesheet" href="css/print.css"></head> <body style="">${cad}</body> </html>`);

			var plantilla=`<html> <head> <meta charset="utf-8" /> <style>${css1}${css2}</style><title>Reporte</title>
			<link rel="stylesheet" href="css/print.css"></head> <body style="">${cad}</body> </html>`;
			console.log(plantilla);
			
			$(plantilla).printThis({
					
					
			
			});

	/*cordova.plugins.printer.print(`<html> <head> <meta charset="utf-8" /><style>th,td{text-align:left;}table{width:100%;}</style><title>Reporte</title>
	<link rel="stylesheet" href="css/print.css"></head> <body style="">${cad}</body> </html>`);*/

});
});



// var win = window.open('','printwindow',params);
// win.document.write(`<!DOCTYPE html> <html> <head> <meta charset="utf-8" /> <title>Reporte</title><link rel="stylesheet" href="css/style.css">
// 	<link rel="stylesheet" href="css/print.css"></head> <body style="">${cad}<script src="js/print.js"></script></body> </html>`);


}















function printInforme(tipo,ini,end){
	let cad='';
	setProgressMsg('Cargando...');
	send('server.php',{call:'reporte',idSesion:getSesion('idSesion'),fecha_i:ini,fecha_f:end,tipo:tipo,sucursal:getSesion('sucursal')},function(data){
		if(tipo=='CONTADO'){
			let rows='';
			let total=0;
			data.forEach(function(item,index,ar){
				rows+=`<tr><td>${item['TICKET']}</td><td>${item['RAZON']}</td><td>${localDate(item['FECHA'].split(' ')[0])} ${item['FECHA'].split(' ')[1]}</td><td>${item['FACTURA']}</td><td>${parseInt(item['IMPORTE'])}.00</td><td>${item['PLACA']}</td></tr>`;
				total+=parseInt(item['IMPORTE']);
			});
			cad=`
			<diV class="row" style="padding:.5em;"><div class="card" style="padding:.5em;"> <div class="table-o"> <table> <thead><tr><th>TICKET</th><th>RAZON SOCIAL/CLIENTE</th><th>FECHA REGISTRO</th><th>FACTURA</th><th>IMPORTE</th><th>PLACA</th></tr></thead> <tbody id="tbody-o">${rows}</tbody> </table></div>
			<div class="row" style="margin-bottom:0em;padding-left:1em;"><b>TOTAL BOLETAS : ${data.length}</b> <b class="right">IMPORTE TOTAL : ${parseFloat(total).toFixed(2)} Bs</b></div></div>`;
		}else{
			let rows={};
			data.forEach(function(item,index,ar){
				let estado=item['ESTADO']=='2'?'FINALIZADO':'INICIAL';
				let tipoDOC=item['TIPODOC'];
				if(tipoDOC==null){
					tipoDOC='SIN DOCUMENTO';
				}
				if(rows[tipoDOC]==null){
					rows[tipoDOC]=`<tr unike="${tipoDOC}"><td>${item['TICKET']}</td><td>${item['RAZON']}</td><td>${localDate(item['FECHA'].split(' ')[0])} ${item['FECHA'].split(' ')[1]}</td><td>${item['PLACA']}</td><td>${item['DOCNUMBER']==null?'SIN DOCUMENTO':item['DOCNUMBER']}</td><td>${item['CLIENTE']==null?'SIN DOCUMENTO':item['CLIENTE']}</td><td>${estado}</td></tr>`;
				}else{
					rows[tipoDOC]+=`<tr unike="${tipoDOC}"><td>${item['TICKET']}</td><td>${item['RAZON']}</td><td>${localDate(item['FECHA'].split(' ')[0])} ${item['FECHA'].split(' ')[1]}</td><td>${item['PLACA']}</td><td>${item['DOCNUMBER']==null?'SIN DOCUMENTO':item['DOCNUMBER']}</td><td>${item['CLIENTE']==null?'SIN DOCUMENTO':item['CLIENTE']}</td><td>${estado}</td></tr>`;
				}
			});
			for(item in rows) {
				cad+=`<div class="main" unike="${item}">
				<div class="row" style="margin-bottom:0em;padding-left:1em;"><b>TIPO DE DOCUMENTO : </b>${item}</div>
				<div class="row" style="padding:.5em;"><div class="card" style="padding:.5em;"> <div class="table-o"> <table> <thead><tr><th>TICKET</th><th>RAZON SOCIAL</th><th>FECHA REGISTRO</th><th>PLACA</th><th>Nº DOC.</th><th>CLIENTE</th><th>ESTADO</th></tr></thead> <tbody id="tbody-o">${rows[item]}</tbody> </table>
				</div>
				<div class="row" style="margin-bottom:0em;padding-left:1em;"><b>TOTAL BOLETAS : <span class="total-b"></span></b></div>
				</div></div>
				</div>`;
			};
		}
		hideProgress();
		//alert(isApp);
		if(isApp){
			// requestFile('css/style.css','text',function(css1){
			// 	requestFile('css/print.css','text',function(css2){
			// 		cordova.plugins.printer.print(`<html> <head> <meta charset="utf-8" /><style>${css1}${css2}</style><style>td, th {padding: 2px 2px;font-size: 12px; }</style>
			// 			<link rel="stylesheet" href="css/print.css"></head><body style=""><div class="row center" style="margin-bottom:0em;"><b>REPORTE DE BOLETAS (${tipo})</b></div><div class="row center" style="margin-bottom:0em;">DESDE <b>${localDate(ini)}</b> HASTA <b>${localDate(end)}</b></div><div class="row" style="margin-bottom:0em;padding-left:0em;"><div class="col s6"><b>USUARIO ACTUAL : </b>${getSesion('owner')}</div><div class="col s6"><b>SUCURSAL : </b>${getSesion('sucursal')}</div></div>${cad}<script src="js/crediter.js"></script><script src="js/print.js"></script></body> </html>`);
			// 	});
			// });
			// return;
		}

      var plantilla=`<!DOCTYPE html> <html> <head> <meta charset="utf-8" /> <title>Reporte</title><link rel="stylesheet" href="css/style.css">
	  <link rel="stylesheet" href="css/print.css"><style>td, th {padding: 2px 2px;font-size: 12px; }</style></head> <body style=""><div class="row center" style="margin-bottom:0em;"><b>REPORTE DE BOLETAS (${tipo})</b></div><div class="row center" style="margin-bottom:0em;">DESDE <b>${localDate(ini)}</b> HASTA <b>${localDate(end)}</b></div><div class="row" style="margin-bottom:0em;padding-left:0em;"><div class="col s6"><b>USUARIO ACTUAL : </b>${getSesion('owner')}</div><div class="col s6"><b>SUCURSAL : </b>${getSesion('sucursal')}</div></div>${cad}<script src="js/crediter.js"></script><script src="js/print.js"></script></body> </html>`;

  
	  $(plantilla).printThis({});

	});
}



function printRazon(razonEntry,ini,end){
	let cad='';
	setProgressMsg('Cargando...');
	send('server.php',{call:'reporte',idSesion:getSesion('idSesion'),fecha_i:ini,fecha_f:end,tipo:'CREDITO',sucursal:getSesion('sucursal')},function(data){
		let total=0;
		let rows={};
		data.forEach(function(item,index,ar){
			let estado=item['ESTADO'];
			let razon=item['RAZON'];
			if(rows[razon]==null){
				rows[razon]=`<tr class="unike" key="${item['TICKET']}" unike="${razon}"><td>${item['TICKET']}</td><td>${item['RAZON']}</td><td>${localDate(item['FECHA'].split(' ')[0])} ${item['FECHA'].split(' ')[1]}</td><td>${item['PLACA']}</td><td>${estado=='1'?'INICIAL':'FINALIZADO'}</td></tr>`;
			}else{
				rows[razon]+=`<tr class="unike" key="${item['TICKET']}" unike="${razon}"><td>${item['TICKET']}</td><td>${item['RAZON']}</td><td>${localDate(item['FECHA'].split(' ')[0])} ${item['FECHA'].split(' ')[1]}</td><td>${item['PLACA']}</td><td>${estado=='1'?'INICIAL':'FINALIZADO'}</td></tr>`;
			}
		});
		for(item in rows) {
			if(razonEntry=='TODOS'){
				cad+=`<div class="main" unike="${item}">
				<div class="row" style="margin-bottom:0em;padding-left:1em;"><b>RAZON SOCIAL : </b>${item}</div>
				<div class="row" style="padding:.5em;"><div class="card" style="padding:.5em;"> <div class="table-o"> <table> <thead><tr><th>TICKET</th><th>RAZON SOCIAL</th><th>FECHA REGISTRO</th><th>PLACA</th><th>ESTADO</th></tr></thead> <tbody id="tbody-o">${rows[item]}</table></div>
				<div class="row" style="margin-bottom:0em;padding-left:1em;"><b>TOTAL BOLETAS : <span class="total-b"></span></b></div>
				</div></div>
				</div>`;
			}else if(item==razonEntry){
				cad+=`<div class="main" unike="${item}">
				<div class="row" style="margin-bottom:0em;padding-left:1em;"><b>RAZON SOCIAL : </b>${item}</div>
				<div class="row" style="padding:.5em;"><div class="card" style="padding:.5em;"> <div class="table-o"> <table> <thead><tr><th>TICKET</th><th>RAZON SOCIAL</th><th>FECHA REGISTRO</th><th>PLACA</th><th>ESTADO</th></tr></thead> <tbody id="tbody-o">${rows[item]}</table></div>
				<div class="row" style="margin-bottom:0em;padding-left:1em;"><b>TOTAL BOLETAS : <span class="total-b"></span></b></div>
				</div></div>
				</div>`;
			}
		};
		hideProgress();
		if(isApp){
			requestFile('css/style.css','text',function(css1){
				requestFile('css/print.css','text',function(css2){
					cordova.plugins.printer.print(`<html> <head> <meta charset="utf-8" /><style>${css1}${css2}</style><style>td, th {padding: 2px 2px;font-size: 12px; }</style></head> <body style=""><div class="row center" style="margin-bottom:0em;"><b>REPORTE DE BOLETAS (CREDITO)</b></div>
						<div class="row center" style="margin-bottom:0em;">DESDE <b>${localDate(ini)}</b> HASTA <b>${localDate(end)}</b></div>
						<div class="row" style="margin-bottom:0em;padding-left:0em;"><div class="col s6"><b>USUARIO ACTUAL : </b>${getSesion('owner')}</div><div class="col s6"><b>SUCURSAL : </b>${getSesion('sucursal')}</div></div>${cad}</body> </html>`);
				});
			});
			return;
		}
		var win = window.open('','printwindow',params);
		win.document.write(`<!DOCTYPE html> <html> <head> <meta charset="utf-8" /> <title>Reporte</title><link rel="stylesheet" href="css/style.css">
			<link rel="stylesheet" href="css/print.css"><style>td, th {padding: 2px 2px;font-size: 12px; }</style></head> <body style=""><div class="row center" style="margin-bottom:0em;"><b>REPORTE DE BOLETAS (CREDITO)</b></div>
			<div class="row center" style="margin-bottom:0em;">DESDE <b>${localDate(ini)}</b> HASTA <b>${localDate(end)}</b></div>
			<div class="row" style="margin-bottom:0em;padding-left:0em;"><div class="col s6"><b>USUARIO ACTUAL : </b>${getSesion('owner')}</div><div class="col s6"><b>SUCURSAL : </b>${getSesion('sucursal')}</div></div>${cad}<script src="js/crediter.js"></script><script src="js/print.js"></script></body> </html>`);
	});
}



