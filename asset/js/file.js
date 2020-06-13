const btnFile = document.querySelector('.uploadFile');
const namaFile = document.querySelector('#namaFile');


btnFile.onchange=()=>{
	namaFile.value = btnFile.value;
}