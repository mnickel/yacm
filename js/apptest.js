
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



$(document).ready( function() {

	//console.log(fn + "-" + ln + "-" + e + "-" + mn);
	fn = "Mark";
	ln = "Nickel";
	e = "foobar.com";
	mn = "999.999.9999";
	$.ajax({
        url: "/api/addContact.php?first_name="+fn+"&last_name="+ln+"&email="+e+"&mobile_nbr="+mn,
        type: "GET",
        dataType: "json",
        success: function(data){
        	console.log(data);

        },
        error: function(xhr, status, thrown) {
        	console.log(xhr);
        	console.log(status);
        	console.log(thrown);
        }
	});

});





