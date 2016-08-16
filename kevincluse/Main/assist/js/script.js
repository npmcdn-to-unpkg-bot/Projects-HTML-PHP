$(document).ready(function(e) {
    $("#geneva-box-menu").click(function(e) {
		$("#menu-view-show").toggle();
        $("#geneva-box-menu").toggleClass("new-menu-class")
    })
	
	$("#menu-view-show").click(function(e) {
        $("#geneva-list-menu").toggle('slow');
    });
	
var url = document.URL
var last_url=url.substr(url.lastIndexOf('#') + 1);
console.log(last_url);	
if(last_url != '!/main' ){
	location.href='http://fahrschule-ginter.de/index.html#!/main';
	}
});
