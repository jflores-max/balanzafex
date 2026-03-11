document.querySelectorAll('.unike').forEach(function(ele,index,arr){
	let key=ele.getAttribute('key');
	if(document.querySelectorAll(`[key="${key}"]`).length>1){
		ele.remove();
	}
});
document.querySelectorAll('.main').forEach(function(ele,index,arr){
	let key=ele.getAttribute('unike');
	console.log(key);
	ele.querySelector('.total-b').innerHTML=`${ele.querySelectorAll(`tr[unike="${key}"]`).length}`;
});