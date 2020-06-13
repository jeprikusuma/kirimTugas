const	jt = document.querySelector('#jenisTugas'),
		kk = document.querySelector('#kl'),
		con= document.querySelector('#con'),
		ind= document.querySelector('#ind'),
		kel= document.querySelector('#kel');

jt.addEventListener('click', ()=>{
	if (jt.value == 'kelompok'){
		kk.classList.add('show');
		kk.classList.remove('hide');
	}else{
		kk.classList.add('hide');
		kk.classList.remove('show');
	}
})
con.addEventListener('click', ()=>{
	if (jt.value == 'kelompok'){
		kk.classList.add('show');
		kk.classList.remove('hide');
	}else{
		kk.classList.add('hide');
		kk.classList.remove('show');
	}
})
ind.addEventListener('click', ()=>{
	if (jt.value == 'kelompok'){
		kk.classList.add('show');
		kk.classList.remove('hide');
	}else{
		kk.classList.add('hide');
		kk.classList.remove('show');
	}
})
kel.addEventListener('click', ()=>{
	if (jt.value == 'kelompok'){
		kk.classList.add('show');
		kk.classList.remove('hide');
	}else{
		kk.classList.add('hide');
		kk.classList.remove('show');
	}
})


console.log(kel);