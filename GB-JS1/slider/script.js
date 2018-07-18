function init(){
    var images = document.getElementsByTagName("img");
    for (var i = 0; i < images.length; i++) {
        images[i].onclick = changeBigPicture;
    }
}
function changeBigPicture(eventObj){
    var appDiv = document.getElementById("big_picture");
    appDiv.innerHTML = "";
    var eventElement = eventObj.target;
    var imageNameParts = eventElement.id.split("_");
    var src = "./img/big/" + imageNameParts[1] + ".jpg";
    var imageDomElement = document.createElement("img");
    imageDomElement.src = src;
    appDiv.appendChild(imageDomElement);
    appDiv.onerror = function() {
        alert("Увеличенное изображение не найдено!")
    }
}
window.onload = init;

var btn_prev = document.getElementsByClassName('prev');
var btn_next = document.getElementsByClassName('next');
var images = document.getElementsByClassName('galleryItem');
var i=0;

btn_prev.onclick = function () {
    images[i].style.display = 'none';
    i--;

    if(i == -1) {
        i = images.length-1;
    }
    images[i].style.display = 'block';
}
btn_next.onclick = function () {
    images[i].style.display = 'none';
    i++;

    if(i >= images.length) {
        i = 0;
    }
    images[i].style.display = 'block';
}
