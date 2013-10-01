function sdmenu(layer){
    var Layer = document.getElementById(layer);
    if(Layer.style.display=="none"){
        Layer.style.display="block";
        //document.getElementBy("menu3").style.color="#4599de";
        //document.getElementById("menu3").style.fontWeight="bold";
    } else {
        Layer.style.display="none";
        //document.getElementById("menu3").style.color="#08273C";
        //document.getElementById("menu3").style.fontWeight="normal";
    }
}