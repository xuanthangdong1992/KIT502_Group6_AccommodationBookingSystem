$(function() {
    //The function is to select the accommodation
    function checkall(clickchk, relChkbox) {
    
            var checker = $('#' + clickchk);
            var multichk = $('.' + relChkbox);
    
    
            checker.click(function () {
                    multichk.prop('checked', $(this).prop('checked'));
            });    
    }
    
    //The function is to select all the rows
        checkall('user-check-all', 'user-chkbox');

    //For searching accommodations
        $('#input-search').on('keyup', function() {
            var rex = new RegExp($(this).val(), 'i');
                $('.search-table .search-items:not(.header-item)').hide();
                $('.search-table .search-items:not(.header-item)').filter(function() {
                        return rex.test($(this).text());
                }).show();
        });
    
    //For deleting multiple accommodations. When checked multiple rows and click "Delete Row", all the rows selected will be delete.
    $(".delete-multiple").on("click", function() {
            var inboxCheckboxParents = $(".user-chkbox:checked").parents('.search-items');   
                inboxCheckboxParents.remove();
    });

    //This function is to delete the user
    function deleteAccommodation() {
	$(".delete").on('click', function(event) {
		event.preventDefault();
		//when click on delete, the row of user will be removed 
		$(this).parents('.search-items').remove();
	});
}
    deleteAccommodation();
    
    //This function is for page "Accommodation Management-Client Review". When click on the trash icon, the review will be removed.
    function removeReview() {
        $(".remove-review").off('click').on('click', function(event) {
          event.stopPropagation();
          $(this).parents('.single-review').remove();
        });
    }
    removeReview();

    //This function to edit accommodation, when click on the edit button, the modal of accomodation detail will show.
    function editAccommodation() {
        $(".edit").on('click', function(){
          $("#accommodation_detail_modal").modal("show");
        });
    }
    editAccommodation();
    
    })
    