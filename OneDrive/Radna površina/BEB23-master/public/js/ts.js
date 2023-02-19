function myFunction3() {
	const name = document.getElementById('addcourse');
    const nam = document.getElementById('ctn');
	name.hidden=false;
    nam.hidden=true;
};

function DodajPrikaziMaterijal(csid){
	const dodajcid = document.getElementById('course_id');
    dodajcid.value=csid;
	const dodajm = document.getElementById('dm');
    dodajm.hidden=false;
}

 function myVr(){
   return document.getElementById('course_id').value;
}

function myFuncE(){
	const name1 = document.getElementById('addexams');
    const nam1 = document.getElementById('ctn1');
    name1.hidden=false;
    nam1.hidden=true;
}

function DodajP(exid){
    const name2 = document.getElementById('addquestion');
    const name3 = document.getElementById('exam_id');
    name3.value=exid;
    name2.hidden=false;
}