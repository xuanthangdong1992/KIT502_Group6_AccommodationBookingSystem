$(function() {
//The function is to select the user
function checkall(clickchk, relChkbox) {

		var checker = $('#' + clickchk);
		var multichk = $('.' + relChkbox);


		checker.click(function () {
				multichk.prop('checked', $(this).prop('checked'));
		});    
}

//The function is to select all the rows
	checkall('user-check-all', 'user-chkbox');
//For searching users
	$('#input-search').on('keyup', function() {
		var rex = new RegExp($(this).val(), 'i');
			$('.search-table .search-items:not(.header-item)').hide();
			$('.search-table .search-items:not(.header-item)').filter(function() {
					return rex.test($(this).text());
			}).show();
	});

//When click the button "Add User"
function addUser() {
	
	$('#btn-add-user').on('click', function(event) {
		$('#addUserModal').modal('show');
	});
}
addUser();

//When click the button "Edit User"
function editUser() {
	
	$("#btn-edit-user").on('click', function(event) {
		//the button "Add" is shown istead of "Save", and the modal of add user is shown	
		$('#editUserModal').modal('show');
	});
}
editUser();

//This function is to delete the user
function deleteUser() {
	$(".delete").on('click', function(event) {
		event.preventDefault();
		//when click on delete, the row of user will be removed 
		$(this).parents('.search-items').remove();
	});
}
deleteUser();

//For deleting multiple accommodations. When checked multiple rows and click "Delete Row", all the rows selected will be delete.
$(".delete-multiple").on("click", function() {
		var inboxCheckboxParents = $(".user-chkbox:checked").parents('.search-items');   
			inboxCheckboxParents.remove();
});


})


