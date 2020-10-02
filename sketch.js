function setup(){
	noCanvas();
    window.addEventListener("scroll", function (){
		if(window.scrollY + window.innerHeight >= document.documentElement.scrollHeight){
			loadImages();
		}
	});
	loadImages();
}

function loadImages(){
	var url="http://api.giphy.com/v1/gifs/random?api_key=dc6zaTOxFJmzC";
	var i=0;
	while(i<10){
		loadJSON(url,getData);
		i++;
	}
}

function getData(giphy){
	var container=document.getElementById("container");
	var img=document.createElement("IMG");
	img.setAttribute("src",giphy.data.images.downsized_large.url);
	container.appendChild(img);
}