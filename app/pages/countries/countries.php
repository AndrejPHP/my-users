<?php if(!defined("APP_URL")) exit(); ?>
<?php $all_countries = $countries->getCountries(); ?>
<h1>Countries</h1>
<hr/>
<form class="form-inline" method="post" action="<?php echo APP_URL; ?>add-country">
    <div class="form-group">
        <label>Code</label>
        <input type="text" name="code" class="form-control" maxlength="2" placeholder="Country Code (XY)">
    </div>
    <div class="form-group">
        <label>Country</label>
        <input type="text" name="country" class="form-control" placeholder="Country Name">
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>
<br />

<div class="row">
    <div class="col-xs-6 text-left">
        <input type="button" class="btn btn-primary" id="reset-countries" value="Reset Countries" />
        <br />
        This will delete all existing countries in the database and insert the countries defined in app/db/Country.php.<br />Users' country will also be affected by this action.<br />Confirmation is required.
    </div>
    <div class="col-xs-6 text-right">
        <?php if(!empty($all_countries)): ?>
        <input type="button" class="btn btn-danger" id="delete-all-countries" value="Delete All Countries" />
        <br />
        This will delete all existing countries in the database.<br />Users' country will also be affected by this action.<br />Confirmation is required.
        <?php endif; ?>
    </div>
</div>
<br />
<?php
if(isset($_GET["added"]))
{
    if(isset($_SERVER["HTTP_REFERER"]) && strpos($_SERVER["HTTP_REFERER"], APP_URL."countries") !== false)
    {
        switch((int)htmlentities($_GET["added"]))
        {
            case 1:
                echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Country was added successfully.</div>";
                break;

            case 0:
                echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>There was a problem adding the country. Both country code and name are required. Please try again.</div>";
                break;

            default:
                break;
        }
    }
}
?>
<table class="table table-bordered table-hover">
    <thead>
    <tr class="bg-primary">
        <th>Code</th>
        <th style="width: 60%;">Country</th>
        <th style="text-align: center;">Edit</th>
    </tr>
    </thead>
    <tbody class="bg-white">
    <?php if(count($all_countries) > 0) { ?>
        <?php foreach($all_countries as $country) { ?>
            <tr id="<?php echo htmlspecialchars($country["id"]); ?>">
                <td><input type="text" class="form-control code" name="code" value="<?php echo htmlspecialchars($country["code"]); ?>" maxlength="2" /></td>
                <td><input type="text" class="form-control country" name="country" value="<?php echo htmlspecialchars($country["country"]); ?>" /></td>
                <td style="text-align: center;"><input type="button" class="btn btn-primary btn-update-country" value="Update" /> <input type="button" class="btn btn-danger btn-delete-country" value="X" /><div class="country-edit-info"></div></td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td colspan="3">There are no countries in the database at the moment.</td>
        </tr>
    <?php } ?>
    </tbody>
</table>
