
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

	$("#add_submit").click( function() {

		fn = $("#inputFirstName").val();
		ln = $("#inputLastName").val();
		e = $("#inputEmail").val();
		mn = $("#inputMobileNumber").val()

		//console.log(fn + "-" + ln + "-" + e + "-" + mn);
		$.ajax({
            url: "http://localhost:8888/api/addContact.php?first_name="+fn+"&last_name="+ln+"&email="+e+"&mobile_nbr="+mn,
            type: "GET",
            success: function(data){
            	console.log(data);

        		$.ajax({
					url: "/api/listContacts.php",
					type: "GET",
					dataType: "json",
					success: function(data) {
						console.log(data);
						//$("#stuff").empty();
						$("#stuff").html(JSON.stringify(data));
						$("#basicModal").modal('hide');
					}
				})
            },
            error: function(xhr, status, thrown) {
            	console.log(xhr);
            	console.log(status);
            	console.log(thrown);
            }
		});
	});

});





