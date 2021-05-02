<!-- Delete Modal Start-->
<div class="modal fade" id="deleteAccModal<?php echo $row['accommodation_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">     
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete Accommodation</h4></center>
            </div>
                <div class="modal-body">
                     <div class="container-fluid">
		                <p>Are you sure to delete the information? </p> 
                        <p>This action cannot be undone. </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="delete_accommodation_conn.php?id=<?php echo $row['accommodation_id']; ?>" class="btn btn-danger">Delete</a>
                </div>
        </div>
    </div>
</div>
<!-- Delete Modal End-->

<!-- Edit Modal Start-->
<div id="edit<?php echo $row['accommodation_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--This is the header of the modal-->
            <div class="modal-header">
                <h4 class="modal-title" id="accDetailModalLabel">Accommodation Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            
            <!--This is the body of the modal-->
            <div class="modal-body">

            <?php
				$edit=$conn->query("SELECT * FROM accommodation WHERE accommodation_id='".$row['accommodation_id']."'");
				$erow=$edit->fetch_array();		
			?>

            <form method="POST" action="edit_accommodation_conn.php?id=<?php echo $erow['accommodation_id']; ?>">
                <!--Here to input House Name-->
                <div class="form-group row">
                    <label class="col-md-3 text-left control-label col-form-label">House Name</label>
                    <div class="col-md-9">
                        <input type="text" name="house_name" class="form-control" id="house_u" placeholder="House Name" 
                        value="<?php echo $erow['house_name']; ?>">
                    </div>
                </div>
                
                <!--Here to input description-->
                <div class="form-group row">
                    <label class="col-md-3 text-left control-label col-form-label">Description</label>
                    <div class="col-md-9">
                    <textarea name="description" class="form-control" rows="5" id="description_u" 
                    value=""><?php echo $erow['description']; ?></textarea>
                    </div>
                </div>
                <br>
                <!--Here to input price-->
                <div class="form-group row">
                    <label class="col-md-3 text-left control-label col-form-label">Price</label>
                    <div class="col-md-9">
                        <span name="price" class="input-group-text col-md-9">$<input type="text" class="form-control col-md-9" 
                        id="price_u" placeholder="Price" value="<?php echo $erow['price']; ?>"></span>
                    </div>
                </div>
                <!--Here to input how many rooms-->
                <div class="form-group row">
                    <label class="col-md-3 text-left control-label col-form-label">Number of Room</label>
                    <div class="col-md-9">
                        <input type="text" name="number_of_room" class="form-control" id="room_u" placeholder="Number of Room"
                        value="<?php echo $erow['number_of_room']; ?>">
                    </div>
                </div>

                <!--Here to input how many bathrooms-->
                <div class="form-group row">
                    <label class="col-md-3 text-left control-label col-form-label">Number of Bathroom</label>
                    <div class="col-md-9">
                        <input type="text" name="number_of_bathroom" class="form-control" id="bath_u" placeholder="Number of Bathroom"
                        value="<?php echo $erow['number_of_bathroom']; ?>">
                    </div>
                </div>
                <!--Here to input Max Guests Allowed-->
                <div class="form-group row">
                    <label class="col-md-3 text-left control-label col-form-label">Max Guests Allowed</label>
                    <div class="col-md-9">
                        <input type="text" name="max_guests_allowed" class="form-control" id="maxguests_u" placeholder="Max Guests Allowed"
                        value="<?php echo $erow['max_guests_allowed']; ?>">
                    </div>
                </div>
                <br>
                <!--Here to choose facilities-->
                <div class="form-group row">
                    <!--Weather smoke allowed?-->
                    <div class="col-md-3">
                        <input type="checkbox" name="smoke_allowed" id="smoke_u" class="material-inputs chk-col-light-blue"
                        value="<?php echo $erow['smoke_allowed']; ?>">
                        <label for="smoke_allowed">Smoke Allowed</label>
                    </div>
                    <!--Any garage?-->
                    <div class="col-md-3">
                        <input type="checkbox" name="garage" id="garage_u" class="material-inputs chk-col-light-blue" 
                        value="<?php echo $erow['garage']; ?>">
                        <label for="garage">Garage</label>
                    </div>
                    <!--Pet friendly?-->
                    <div class="col-md-3">
                        <input type="checkbox" name="pet_friendly" id="pet_u" class="material-inputs chk-col-light-blue"
                        value="<?php echo $erow['pet_friendly']; ?>">
                        <label for="pet_friendly">Pet Friendly</label>
                    </div>
                    <!--Internet provided?-->
                    <div class="col-md-3">
                        <input type="checkbox" name="smoke_allowed" id="internet_U" class="material-inputs chk-col-light-blue"
                        value="<?php echo $erow['smoke_allowed']; ?>">
                        <label for="internet_provided">Internet Provided</label>
                    </div>
                </div>
                <br>
                <!--Choose check in time-->
                <div class="form-group row">
                    <label for="check_in_time" class="col-md-3 col-form-label">Date Check In</label>
                    <div class="col-md-9">
                        <input class="form-control" type="date" value="2021-04-01"
                            id="checkin_u" name="check_in_time"
                            value="<?php echo $erow['check_in_time']; ?>">
                    </div>
                </div>
                <!--Choose check out time-->
                <div class="form-group row">
                    <label for="check_out_time" class="col-md-3 col-form-label">Date Check Out</label>
                    <div class="col-md-9">
                        <input class="form-control" type="date" value="2021-04-05"
                            id="checkout_u" name="check_out_time"
                            value="<?php echo $erow['check_out_time']; ?>">
                    </div>
                </div>
                <!--Here to input Address-->
                <div class="form-group row">
                    <label class="col-md-3 text-left control-label col-form-label">Address</label>
                    <div class="col-md-9">
                        <input type="text" name="address" class="form-control" id="address_u" placeholder="Address"
                        value="<?php echo $erow['address']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <!--Here to input City-->
                    <label class="col-md-1 text-left control-label col-form-label">City</label>
                    <div class="col-md-3">
                        <input type="text" name="city" class="form-control" id="city_u" placeholder="City"
                        value="<?php echo $erow['city']; ?>">
                    </div>
                    <!--Here to input Postal Code-->
                    <label class="col-md-1 text-left control-label col-form-label">Postal Code</label>
                    <div class="col-md-3">
                        <input type="text" name="postal_code" class="form-control" id="postal_U" placeholder="Postal Code"
                        value="<?php echo $erow['postal_code']; ?>">
                    </div>
                    <!--Here to input State-->
                    <label class="col-md-1 text-left control-label col-form-label">State</label>
                    <div class="col-md-3">
                        <input type="text" name="state" class="form-control" id="state_u" placeholder="State"
                        value="<?php echo $erow['state']; ?>">
                    </div>
                </div>
                <!--Here to upload image-->
                <div class="form-group row">
                    <label class="col-md-6 text-left control-label col-form-label">&nbsp Image upload</label>
                    <div class="col-md-6">
                    <input type="file" class="form-control" id="image_u" name="image" aria-describedby="fileHelp"
                    value="<?php echo $erow['image']; ?>">
                    </div>
                </div>
            </div>
                <br>
            
            <!--This is the footer of the modal, to close the modal or save changes-->
            <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Save changes</button>
            </div>
		    </form>
        </div>
    </div>
</div>
<!-- Edit Modal End-->