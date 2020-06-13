const loginclick = document.querySelector('#login');
const loginAwal = document.querySelector('.login-awal');
const slideUp = document.querySelector('.login');
const tengah = document.querySelector('.tengah');
const loginTitle = document.querySelector('.login .form-title');
const selamatDatang = document.querySelector('.login-awal h2');
const paragraf = document.querySelector('.login-awal p');
const keluar = document.querySelector('.keluar');
const hiddenData = document.querySelector('.hidden').value;


if (hiddenData != " "){
	keLogin();
}
function keLogin() {
	slideUp.style.marginTop = '100px';
	slideUp.style.borderRadius='0px';
	slideUp.style.height='500px';
	tengah.style.pointerEvents='all';
	loginTitle.style.marginLeft = '40%';
	loginTitle.style.top='70px';
	loginTitle.style.fontSize='30px';
	loginTitle.style.color='#07047D';
	selamatDatang.style.top='30px';
	selamatDatang.style.fontSize ='20px';
	selamatDatang.style.left='87px';
	slideUp.style.pointerEvents='none';
	selamatDatang.style.pointerEvents='all';
	paragraf.style.opacity='0';
	keluar.style.opacity='0';
}


function keInfo() {
	slideUp.style.marginTop = '470px';
	slideUp.style.borderRadius='160px';
	slideUp.style.height='400px';
	tengah.style.pointerEvents='none';
	loginTitle.style.marginLeft = '40%';
	loginTitle.style.top='20px';
	loginTitle.style.fontSize='18px';
	loginTitle.style.color='black';
	selamatDatang.style.top='90px';
	selamatDatang.style.fontSize ='35px';
	selamatDatang.style.left='0px';
	selamatDatang.style.pointerEvents='none';
	slideUp.style.pointerEvents='all';
	paragraf.style.opacity='1';
}


slideUp.addEventListener('click',()=>{
	keLogin()
})

selamatDatang.addEventListener('click',()=>{
	keInfo();
})

console.log('test');