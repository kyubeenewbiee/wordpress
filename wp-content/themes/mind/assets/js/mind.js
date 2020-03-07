window.onload = function () {
	
	// Menu opening and closing process.
	document.getElementById("menu_open").onclick = function () {
		var menulist = document.getElementById("header-nav");
		menulist.style.right = '0';
		var overlay = document.getElementById("overlay");
		overlay.style.display = 'block';
		return false;
	};
	document.getElementById("menu_close").onclick = function () {
		var menulist = document.getElementById("header-nav");
		menulist.style.right = '-100%';
		var overlay = document.getElementById("overlay");
		overlay.style.display = 'none';
		return false;
	};
};
