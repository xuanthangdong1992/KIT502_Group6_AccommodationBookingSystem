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
	$('#btn-add-user').on('click', function(event) {
		//the button "Add" is shown istead of "Save", and the modal of add user is shown
		$('#addUserModal #btn-add').show();
		$('#addUserModal #btn-edit').hide();
		$('#addUserModal').modal('show');
	})

//This function is to delete the user
function deleteUser() {
	$(".delete").on('click', function(event) {
		event.preventDefault();
		//when click on delete, the row of user will be removed 
		$(this).parents('.search-items').remove();
	});
}

//This fuction is to add user. I tried to biding some data here. When click on the button "Add User", the information of registeration will be record and send to the list.
function addUser() {
	$("#btn-add").click(function() {
        // Get Parent
		var getParent = $(this).parents('.modal-content');

		// Get List Item 
		var $_first_name = getParent.find('#first_name');
		var $_last_name = getParent.find('#last_name');
		var $_email = getParent.find('#email');
		var $_phone_number = getParent.find('#phone_number');
		var $_user_id = getParent.find('#user_id');
		var $_password = getParent.find('#password');
		var $_postal_address = getParent.find('#postal_address');

        // Get value
		var $_first_nameValue = $_first_name.val();
		var $_last_nameValue = $_last_name.val();
		var $_emailValue = $_email.val();
		var $_phone_numberValue = $_phone_number.val();
		var $_user_idValue = $_user_id.val();
		var $_postal_addressValue = $_postal_address.val();



        //To fill the new user's information into the list
		$html = '<tr class="search-items">' +
						'<td>' +
							'<div class="n-chk align-self-center text-center">' +
								'<div class="checkbox checkbox-info">' +
									'<input type="checkbox" class="material-inputs user-chkbox" id="">' +
									'<label class="custom-control-label" for=""></label>' +
								'</div>' +
							'</div>' +
						'</td>' +
						'<td>' +
                                '<span class="user_user_id" data_user_id='+ $_user_idValue +'>' + $_user_idValue +'</span>' +
                        '</td>' +
						'<td>' +
                                '<span class="user_first_name" data_first_name='+ $_first_nameValue +'>' + $_first_nameValue +'</span>' +
                        '</td>' +
						'<td>' +
                                '<span class="user_last_name" data_last_name='+ $_last_nameValue +'>' + $_last_nameValue +'</span>' +
                        '</td>' +
						'<td>' +
                                '<span class="user_email" data_email='+ $_emailValue +'>' + $_emailValue +'</span>' +
                        '</td>' +
                        '<td>' +
                                '<span class="user_phone_number" data_phone_number='+ $_phone_numberValue +'>' + $_phone_numberValue +'</span>' +
                        '</td>' +
                                    
                        '<td class="text-center">' +
                                '<div class="action-btn">' +
                                    '<a href="javascript:void(0)" class="text-info edit"><i class="mdi mdi-account-edit font-20"></i></a>' +
                                    '<a href="javascript:void(0)" class="text-dark delete ml-2"><i class="mdi mdi-delete font-20"></i></a>' +
                                '</div>' +
                        '</td>' +
					'</tr>';

			$(".search-table > tbody").before($html);
			$('#addUserModal').modal('hide');
            //When the modal for add new user is hide, the data will be erased
			var $_setFirstNameValueEmpty = $_first_name.val('');
			var $_setLastNameValueEmpty = $_last_name.val('');
			var $_setEmailValueEmpty = $_email.val('');
			var $_setPhoneNumberValueEmpty = $_phone_number.val('');
			var $_setUserIdValueEmpty = $_user_id.val('');
			var $_setPasswordEmpty = $_password.val('');
			var $_setPostalAddressValueEmpty = $_postal_address.val('');
      
		deleteUser();
		editUser();
		checkall('user-check-all', 'user-chkbox');
		
	});  
}

$('#addUserModal').on('hidden.bs.modal', function (e) {
		var $_first_name = document.getElementById('first_name');
		var $_last_name = document.getElementById('last_name');
		var $_email = document.getElementById('email');
		var $_phone_number = document.getElementById('phone_number');
		var $_user_id = document.getElementById('user_id');
		var $_password = document.getElementById('user_password');
		var $_postal_address = document.getElementById('postal_address');
		
		var $_setFirstNameValueEmpty = $_first_name.value == '';
		var $_setLastNameValueEmpty = $_last_name.value == '';
		var $_setEmailValueEmpty = $_email.value == '';
		var $_setPhoneNumberValueEmpty = $_phone_number.value == '';
		var $_setUserIdValueEmpty = $_user_id.value == '';
		var $_setPasswordEmpty = $_password.value == '';
		var $_setPostalAddressValueEmpty = $_postal_address.value == '';


})

//When click "edit" button after each user, the modal of edit user will show. Then you can edit all the information and save it.
function editUser() {
	$('.edit').on('click', function(event) {

		$('#addUserModal #btn-add').hide();
		$('#addUserModal #btn-edit').show();

		// Get Parents
		var getParentItem = $(this).parents('.search-items');
		var getModal = $('#addUserModal');

		// Get List Item 
		var $_first_name = getParentItem.find('.user_first_name');
		var $_last_name = getParentItem.find('.user_last_name');
		var $_email = getParentItem.find('.user_email');
		var $_phone_number = getParentItem.find('.user_phone_number');
		var $_user_id = getParentItem.find('.user_user_id');
		var $_password = getParentItem.find('.user_password');
		var $_postal_address = getParentItem.find('.user_postal_address');
		

		// Get Attributes
		var $_first_nameAttrValue = $_first_name.attr('data_first_name');
		var $_last_nameAttrValue = $_last_name.attr('data_last_name');
		var $_emailAttrValue = $_email.attr('data_email');
		var $_phone_numberAttrValue = $_phone_number.attr('data_phone_number');
		var $_user_idAttrValue = $_user_id.attr('data_user_id');
		var $_passwordAttrValue = $_password.attr('data_password');
		var $_postal_addressAttrValue = $_postal_address.attr('data_postal_address');

		// Get Modal Attributes
		var $_getModalFirstNameInput = getModal.find('#first_name');
		var $_getModalLastNameInput = getModal.find('#last_name');
		var $_getModalEmailInput = getModal.find('#email');
		var $_getModalPhoneNumberInput = getModal.find('#phone_number');
		var $_getModalUserIdInput = getModal.find('#user_id');
		var $_getModalPasswordInput = getModal.find('#password');
		var $_getModalPostalAddressInput = getModal.find('#postal_address');

		// Set Modal Field's Value
		var $_setModalFirstNameValue = $_getModalFirstNameInput.val($_first_nameAttrValue);
		var $_setModalLastNameValue = $_getModalLastNameInput.val($_last_nameAttrValue);
		var $_setModalEmailValue = $_getModalEmailInput.val($_emailAttrValue);
		var $_setModalPhoneNumberValue = $_getModalPhoneNumberInput.val($_phone_numberAttrValue);
		var $_setModalUserIdValue = $_getModalUserIdInput.val($_user_idAttrValue);
		var $_setModalPasswordValue = $_getModalPasswordInput.val($_passwordAttrValue);
		var $_setModalPostalAddressValue = $_getModalPostalAddressInput.val($_postal_addressAttrValue);

		$('#addUserModal').modal('show');
        
		$("#btn-edit").click(function(){
            // Get Parents
			var getParent = $(this).parents('.modal-content');

            // Get List Item 
			var $_getInputFirstName = getParent.find('#first_name');
			var $_getInputLastName = getParent.find('#last_name');
			var $_getInputEmail = getParent.find('#email');
			var $_getInputPhoneNumber = getParent.find('#phone_number');
			var $_getInputUserId = getParent.find('#user_id');
			var $_getInputPassword = getParent.find('#password');
			var $_getInputPostalAddress = getParent.find('#postal_address');

            //Get Input value
			var $_first_nameValue = $_getInputFirstName.val();
			var $_last_nameValue = $_getInputLastName.val();
			var $_emailValue = $_getInputEmail.val();
			var $_phone_numberValue = $_getInputPhoneNumber.val();
			var $_user_idValue = $_getInputUserId.val();
			var $_passwordValue = $_getInputPassword.val();
			var $_postal_addressValue = $_getInputPostalAddress.val();
            
			//Set Input value
			var  setUpdatedFirstNameValue = $_first_name.text($_first_nameValue);
			var  setUpdatedLastNameValue = $_last_name.text($_last_nameValue);
			var  setUpdatedEmailValue = $_email.text($_emailValue);
			var  setUpdatedPhoneNumberValue = $_phone_number.text($_phone_numberValue);
			var  setUpdatedUserIdValue = $_user_id.text($_user_idValue);
			var  setUpdatedPasswordValue = $_password.text($_passwordValue);
			var  setUpdatedPostalAddressValue = $_postal_address.text($_postal_addressValue);
            
			// Set Attributes
			var  setUpdatedAttrFirstNameValue = $_first_name.attr('data_first_name', $_first_nameValue);
			var  setUpdatedAttrLastNameValue = $_last_name.attr('data_last_name', $_last_nameValue);
			var  setUpdatedAttrEmailValue = $_email.attr('data_email', $_emailValue);
			var  setUpdatedAttrPhoneNumberValue = $_phone_number.attr('data_phone_number', $_phone_numberValue);
			var  setUpdatedAttrUserIdValue = $_user_id.attr('data_user_id', $_user_idValue);
			var  setUpdatedAttrPasswordValue = $_password.attr('data_password', $_passwordValue);
			var  setUpdatedAttrPostalAddressValue = $_postal_address.attr('data_postal_address', $_postal_addressValue);
			$('#addUserModal').modal('hide');
		});
	})
}

//For deleting multiple accommodations. When checked multiple rows and click "Delete Row", all the rows selected will be delete.
$(".delete-multiple").on("click", function() {
		var inboxCheckboxParents = $(".user-chkbox:checked").parents('.search-items');   
			inboxCheckboxParents.remove();
});

deleteUser();
addUser();
editUser();

})


