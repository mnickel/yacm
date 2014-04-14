
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

// scope out a quick workspace
window.yacm = {};

// newest version of jquery doesn't support the "live" method anymore
// $(document).on is now the proper way to lazily attach event handlers 
// to DOM objects that are transient 
$( document ).on( "click", ".removeContactAction", function( e ) {
	// remove the Contact that was clicked
	deleteContact(e.target.id);
}); 

$(document).on("click", "#contactGrid tbody tr", function( e ) {
    if ( $(this).hasClass('row_selected') ) {
        $(this).removeClass('row_selected');
    }
    else {
        window.yacm.contactGrid.$('tr.row_selected').removeClass('row_selected');
        $(this).addClass('row_selected');
    }
});



$(document).ready( function() {

	// wire behaviour when a user clicks the Add or Edit buttons
	$("#modal_submit").click( function() {

		fn = $("#inputFirstName").val();
		ln = $("#inputLastName").val();
		e = $("#inputEmail").val();
		mn = $("#inputMobileNumber").val();
		url = "";

		//see if a row was selected.  Assume that user has clicked the "Add Contact" button if
		//no row is selected
		row = window.yacm.contactGrid.$('tr.row_selected');
		if(row && row.length > 0) {
			cid = $(row).find('.contactId .removeContactAction')[0].id;
			url = "/api/updateContact.php?contact_id="+cid+"&first_name="+fn+"&last_name="+ln+"&email="+e+"&mobile_nbr="+mn;

		} else {
			url = "/api/addContact.php?first_name="+fn+"&last_name="+ln+"&email="+e+"&mobile_nbr="+mn;
		}


		$.ajax({
            url: url,
            type: "GET",
            success: function(data){
            	console.log(data);

        		$.ajax({
					url: "/api/listContacts.php",
					type: "GET",
					dataType: "json",
					success: function(data) {
						window.yacm.contactGrid.fnDestroy();
						loadContactGrid();
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

	// behavior for the Edit Button
	$("#edit_button").click( function() {
		row = window.yacm.contactGrid.$('tr.row_selected');
		if(row && row.length > 0) {
			fn = $(row).find('.firstName').html();
			ln = $(row).find('.lastName').html();
			e = $(row).find('.email').html();
			mn = $(row).find('.mobileNbr').html();

			$("#inputFirstName").val(fn);
			$("#inputLastName").val(ln);
			$("#inputEmail").val(e);
			$("#inputMobileNumber").val(mn);

			$("#basicModal").modal('show');

		} else {
			alert("You need to select a row to edit");
		}
	});

	// behavior for when the Delete button is clicked
	$("#delete_button").click( function() {
		// delete selected row
		row = window.yacm.contactGrid.$('tr.row_selected');
		if(row && row.length > 0) {
			contactId = $(row).find(".contactId .removeContactAction")[0].id
			deleteContact(contactId);
		} else {
			alert("You need to select a row to edit");
		}

	});

	loadContactGrid();
});


function loadContactGrid() {
	window.yacm["contactGrid"] = $("#contactGrid").dataTable({
    	"sPaginationType": "full_numbers",
    	"sScrollY": "280px",
    	"bAutoWidth": false,
    	"sAjaxSource": '/api/listContacts.php?listAction=true',
		"aoColumns": [
	        {"sClass": "contactId", "mDataProp": "contactId"},  
            {"sClass": "firstName", "mDataProp": "firstName"},
            {"sClass": "lastName", "mDataProp": "lastName"},
            {"sClass": "email", "mDataProp": "email"},
            {"sClass": "mobileNbr", "mDataProp": "mobileNbr"}
        ],
        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
        	// wire in a button "x" to remove the contact clicked
    		var cid = $(nRow).find(".contactId");
    		var cidButton = $("<button type='button' class='removeContactAction' id='" + aData.contactId + "'>&times;</button>");
    		cid.html(cidButton);
    		return nRow;
        }
    });
}

function deleteContact(cid) {
	$.ajax({
		url: "/api/removeContact.php?contact_id=" + cid,
		type: "GET",
		success: function( data ) {
			if( data.status ) {
				window.yacm.contactGrid.fnDestroy();
				loadContactGrid();
			}
		}
	})
}





