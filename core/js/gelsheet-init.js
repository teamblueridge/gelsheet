var Gelsheet = {
	
	config: {},
	
	defaultSize: {
		height: 100,
		width: 100
	},
	
	init: function (config){
		this.config = config ;
		var container = document.getElementById("gelsheet-container") || false ;
		if (container) {
			var iframe = document.createElement("iframe");
			var h = config.height || container.offsetHeight || this.defaultSize.height ; 
			var w = config.width || container.offsetWidth || this.defaultSize.width ; 
			iframe.height = h ;
			iframe.style.height = h ;
			iframe.style.width = w ;
			iframe.width = w ;
			iframe.src = config.iframeSrc || "core/index.php";
			container.appendChild(iframe);
		}else{
			alert("It Fails !");
		}
	}
}