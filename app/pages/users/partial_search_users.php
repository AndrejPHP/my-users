<?php if(!defined("APP_URL")) exit(); ?>
<h1>Users</h1>
<hr/>
<div class="panel panel-default" id="search-users-wrapper">
    <div class="panel-heading">
        <h3 id="search-users-toggle"><img src="images/search.png" alt="Search" title="Search" /> Search Users</h3>
    </div>
    <div class="panel-body" id="search-users-body">
        <form method="get" id="searchUsersForm">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?php echo isset($_GET["first_name"]) ? htmlentities($_GET["first_name"]) : ""; ?>" />
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php echo isset($_GET["last_name"]) ? htmlentities($_GET["last_name"]) : ""; ?>" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email Address" value="<?php echo isset($_GET["email"]) ? htmlentities($_GET["email"]) : ""; ?>" />
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo isset($_GET["address"]) ? htmlentities($_GET["address"]) : ""; ?>" />
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo isset($_GET["city"]) ? htmlentities($_GET["city"]) : ""; ?>" />
            </div>
            <div class="form-group">
                <label>Zip</label>
                <input type="text" class="form-control" name="zip" placeholder="Zip" value="<?php echo isset($_GET["zip"]) ? htmlentities($_GET["zip"]) : ""; ?>" />
            </div>
            <div class="form-group">
                <label>Country</label>
                <select name="country_id" class="form-control">
                    <option value="all">All</option>
                    <?php foreach($countries->getCountries() as $country) { ?>
                        <option value="<?php echo $country["id"]; ?>" <?php if(isset($_GET["country_id"]) && $_GET["country_id"] == $country["id"]) { ?> selected <?php } ?>><?php echo $country["country"]; ?></option>
                    <?php } ?>
                </select>
            </div>
            <?php if($p == "all-users") : ?>
            <div class="form-group">
                <label>User is active</label>
                <select name="active" class="form-control">
                    <option value="all" <?php if(isset($_GET["active"]) && $_GET["active"] == "all") { ?> selected <?php } ?>>All</option>
                    <option value="1" <?php if(isset($_GET["active"]) && $_GET["active"] == "1") { ?> selected <?php } ?>>Yes</option>
                    <option value="0" <?php if(isset($_GET["active"]) && $_GET["active"] == "0") { ?> selected <?php } ?>>No</option>
                </select>
            </div>
            <?php endif; ?>
            <div class="form-group">
                <label>Search Type</label>
                <select name="search_type" class="form-control">
                    <option value="exclusive" <?php if(isset($_GET["search_type"]) && $_GET["search_type"] == "exclusive") { ?> selected <?php } ?>>Exclusive</option>
                    <option value="inclusive" <?php if(isset($_GET["search_type"]) && $_GET["search_type"] == "inclusive") { ?> selected <?php } ?>>Inclusive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Search</button>
            <button type="reset" class="btn btn-danger btn-lg" id="clear-search-users-form">Clear</button>
            <input type="hidden" name="q" value="" />
        </form>
    </div>
</div>