
var global_page = 0;
var global_max_page = 24;

var global_template = [
	'<div class="text-region">',
		'{{html tmpltext}}',
	'</div>'
].join('');

// grab the querystring
var vars = null, hash;
var q = document.URL.split('?')[1];
if(q != undefined) {
	vars = {};
    q = q.split('&');
    for(var i = 0; i < q.length; i++){
        hash = q[i].split('=');
        //vars.push(hash);
        vars[hash[0]] = hash[1];
    }
}

/*
$(".next-button").bind("click", function() {
	global_page++;
	if( global_page >= global_max_page ) {
		global_page = global_max_page - 1;
	}
	$("#page-image").attr('src','images/pages/' + global_page + ".jpg");
	updatePageText();
});

$(".previous-button").bind("click", function() {
	global_page--;
	if( global_page < 0 ) {
		global_page = 0;
	}
	$("#page-image").attr('src','images/pages/' + global_page + ".jpg");
	updatePageText();


});
*/

// a little eye candy
$(".previous-button").hover( 
	function() {
		$(this).addClass("button-on")
	},
	function() {
		$(this).removeClass("button-on");
	}
);

$(".next-button").hover( 
	function() {
		$(this).addClass("button-on")
	},
	function() {
		$(this).removeClass("button-on");
	}
);

// one-time load
(function () {
    updatePageText();
}());






function updatePageText() {

	if(vars) {
		$("#page-image").attr('src','images/pages/' + parseInt(vars.page) + ".jpg");
		/*
		var pg = "p" + global_page;
		var t = {
			tmpltext: "<h3>" + window.AdData[pg].title + "</h3>" + 
						window.AdData[pg].text + 
						"<p></p> Page " + (global_page + 1)
		};

		$(".page-text").empty();
		$.tmpl(global_template, t).appendTo( $(".page-text") );
		*/
	}
};
