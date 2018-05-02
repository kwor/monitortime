function click() { 
����if (event.button==2) { // event.button==1 ��� 

	if(!confirm("?")){
		return false;
	} else {
		window.print();
	}
	} 
} 
document.onmousedown=click 

function forbid_key(){ 
    if(event.keyCode==116){
        event.keyCode=0;
        event.returnValue=false;
    }
    
    if(event.shiftKey){
        event.returnValue=false;
    }
    //��ֹshift
    
    if(event.altKey){
        event.returnValue=false;
    }
    //��ֹalt
    
    if(event.ctrlKey){
        event.returnValue=false;
    }
    //��ֹctrl
    return true;
}

document.onkeydown=forbid_key;