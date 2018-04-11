<?php $user = (isset($user) && is_array($user)) ? $user : ""; ?>
<div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?php if($user != "") echo $user["first_name"]; ?>" />
</div>
<div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php if($user != "") echo $user["last_name"]; ?>" />
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php if($user != "") echo $user["email"]; ?>" />
</div>
<div class="form-group">
    <label>Address</label>
    <input type="text" class="form-control" name="address" placeholder="Address" value="<?php if($user != "") echo $user["address"]; ?>" />
</div>
<div class="form-group">
    <label>City</label>
    <input type="text" class="form-control" name="city" placeholder="City" value="<?php if($user != "") echo $user["city"]; ?>" />
</div>
<div class="form-group">
    <label>Zip</label>
    <input type="text" class="form-control" name="zip" placeholder="Zip" value="<?php if($user != "") echo $user["zip"]; ?>" />
</div>
<div class="form-group">
    <label>Country</label>
    <select name="country_id" class="form-control">
        <option value=""></option>
        <?php foreach($all_countries as $country) { ?>
            <option value="<?php echo $country["id"]; ?>" <?php if($user != "" && $user["country_id"] == $country["id"]) { ?> selected <?php } ?>><?php echo $country["country"]; ?></option>
        <?php } ?>
    </select>
</div>
<div class="form-group">
    <label>Date of birth</label>
    <input type="text" class="form-control dob" name="dob" placeholder="Date of birth" value="<?php if($user != "") echo $user["dob"]; ?>" />
</div>
<div class="form-group">
    <label>Active user</label>
    <select name="active" class="form-control">
        <option value="1" <?php if($user != "" && $user["active"] == 1) { ?> selected <?php } ?>>Yes</option>
        <option value="0" <?php if($user != "" && $user["active"] == 0) { ?> selected <?php } ?>>No</option>
    </select>
</div>