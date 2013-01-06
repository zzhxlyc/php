
function find(s){
	var patrn = /[,]/;
	if (patrn.exec(s)){
		alert('不能含有,字符');
	}
}