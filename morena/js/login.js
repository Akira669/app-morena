'use strict';

let box = document.getElementById('button-paint');
let cont=0;
let button = '';
while(cont<20){
	button+= `<button id="${cont}">button-${cont}</button>`;
	
	cont++;
}
box.innerHTML = button;


box
 				.addEventListener("click", (e) => {
           if (e.target.nodeName == 'BUTTON'){
               alert(e.target.id);
           }
       });

       
      

