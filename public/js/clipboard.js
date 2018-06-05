function copy2Clipboard(id2Copy, id2Indicate=null){
    document.getElementById(id2Copy).select(); //select id-ed value
    
    document.execCommand("copy"); //copy the value
    
    if(id2Indicate == null) return;
    
    setMsgBox(id2Indicate, 'Copied');
}

function setMsgBox(id2Indicate, msg){
    var msgBox = document.getElementById(id2Indicate);
    msgBox.innerHTML = msg;
}