function myFunction() {
	const name = document.getElementById('adnews');
	name.hidden=false;
};

const nname = document.getElementById('nname');
const nameError = document.getElementById('enname');

const detail = document.getElementById('detail');
const detailError = document.getElementById('edetail');

const handleSSubmit = e => {
    let valid = true;
    if(nname.value==""){
        nameError.hidden = false;
    }else{
		nameError.hidden = true;
        valid=false;
    }
	if(detail.value==""){
        detailError.hidden = false;
    }else{
        detailError.hidden = true;
        valid=false;
    }  
    if(!valid) {
        e.preventDefault();
    }
}

function myFunction1() {
	const name = document.getElementById('editcontact');
    const nam = document.getElementById('ctn');
	name.hidden=false;
    nam.hidden=true;
};
