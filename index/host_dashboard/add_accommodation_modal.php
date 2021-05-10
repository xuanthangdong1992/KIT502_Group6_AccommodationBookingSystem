<!-- add new accommodation Modal -->
<!-- Modal -->
<div class="modal fade" id="createAccModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h3>Create new Accommodation</h3>
            <!-- Form action to php-->
            <form action="add_accommodation_conn.php" method="POST">
            <!--accommodation details-->
                <div class="form-group">
                    <label>House name: </label>
                    <input required="required" type="text" class="form-control" id="house_name" name="house_name">
                </div>
                <div class="form-group">
                    <label>Description: </label>
                    <textarea required="required" type="text" rows="4" class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="row">
                    <div class="form-group col-3">
                        <label>Price (AUD):</label>
                        <input required="required" type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="form-group col-4">
                        <label>Number of room: </label>
                        <input required="required" type="text" class="form-control col-3" id="number_of_room" name="number_of_room">
                    </div>
                    <div class="form-group col-5">
                        <label>Number of bathroom: </label>
                        <input required="required" type="text" class="form-control col-3" id="number_of_bathroom" name="number_of_bathroom">
                    </div>
                </div>
                <div class="form-inline row">
                    <div class="form-group col-6">
                        <label>Smoke allowed: </label>
                        <input class="form-control" type="checkbox" name="smoke_allowed"> 
                    </div>
                    <div class="form-group col-6">
                        <label>Garage: </label>
                        <input class="form-control" type="checkbox" name="garage"> 
                    </div>
                </div>
                <div class="form-inline row">
                    <div class="form-group col-6">
                        <label>Pet friendly: </label>
                        <input class="form-control" type="checkbox" name="pet_friendly"> 
                    </div>
                    <div class="form-group col-6">
                        <label>Internet: </label>
                        <input class="form-control" type="checkbox" name="internet_provided"> 
                    </div>
                    
                </div>
                <div class="form-inline row">
                    <div class="form-group col-6">
                        <label for="checkin">Check in time: </label>
                        <input required="required" type="time" id="check_in_time" name="check_in_time">
                    </div>
                    <div class="form-group col-6">
                        <label for="checkout">Check out time: </label>
                        <input required="required" type="time" id="check_out_time" name="check_out_time">
                    </div>
                </div>
                <div class="form-group">
                    <label>Address: </label>
                    <input required="required" type="text" class="form-control" id="address" name="address">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>City</label>
                        <input required="required" type="text" class="form-control" id="city" name="city">
                    </div>
                    <div class="form-group col-md-4">
                        <label>State</label>
                        <select required="required" id="state" class="form-control" name="state">
                            <option>ACT</option>
                            <option>NSW</option>
                            <option>NT</option>
                            <option>QLD</option>
                            <option>SA</option>
                            <option selected>TAS</option>
                            <option>VIC</option>
                            <option>WA</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Postal</label>
                        <input required="required" type="text" class="form-control" id="postal_code" name="postal_code">
                    </div>
                </div>
                <div class="form-group">
                    <label>Number of guests: </label>
                    <input required="required" type="text" class="form-control" id="max_guests_allowed" name="max_guests_allowed">
                </div>
                <!--host id-->
                <div class="form-group">
                        <label>Host_ID</label>
                        <select required="required" id="host_id" class="form-control" name="host_id">
                            <option selected>host</option>
                        </select>
                </div>
                <!--Here to upload image-->
                <div class="form-group row">
                    <label class="col-md-6 text-left control-label col-form-label">&nbsp Image upload</label>
                    <div class="col-md-6">
                    <input type="file" class="form-control" id="image" name="image" aria-describedby="fileHelp">
                    </div>
                </div>
                <!--save and cancel button-->
                <div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
      
    </div>
  </div>
 <!-- add new accommodation Modal end--> 