let locationsBtn = document.getElementById('locations__btn');
console.log(locationsBtn);
document.getElementById('locations__btn').onclick  = function(){

	let input1 = document.getElementById('input1').value;
	let input2 = document.getElementById('input2').value;
	let input3 = document.getElementById('input3').value;

	document.querySelector('.outInput1').innerHTML = input1;
	document.querySelector('.outInput2').innerHTML = input2;
	document.querySelector('.outInput3').innerHTML = input3;
	
	if(input1 == ''||input2 == ''||input3 == '') {
		alert ('Вы ввели не все данные. Проверьте еще раз.');
		document.getElementById("input1").value = "";
		document.getElementById("input2").value = "";
		document.getElementById("input3").value = "";
		document.querySelector('.outInput1').innerHTML = "";
		document.querySelector('.outInput2').innerHTML = "";
		document.querySelector('.outInput3').innerHTML = "";
	}
};

let addLocationsBtn = document.getElementById('add-locations__btn');

addLocationsBtn.onclick = function() {
	let element = document.getElementById('locations-box');
	let addLocationsBox = document.createElement('div');

	let outInput1 =  document.querySelector('.outInput1').innerHTML;
	let outInput2 =  document.querySelector('.outInput2').innerHTML;
	let outInput3 =  document.querySelector('.outInput3').innerHTML;

	addLocationsBox.innerHTML = 'Название: ' + outInput1 + ', ' + 'Долгота: ' + outInput2 + ', ' + 'Ширина :' + outInput3;
	/*addLocationsBox.innerHTML = outInput2;
	addLocationsBox.innerHTML = outInput3;*/
	//let child = element.appendChild(child);
	element.appendChild(addLocationsBox);
}
