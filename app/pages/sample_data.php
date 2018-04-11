<?php if(!defined("APP_URL")) exit(); ?>
<style>
    .table td {
        background: #fff;
    }
</style>
<h1>Sample Data</h1>
<br />
<form method="post">
<div class="row">
    <div class="col-xs-12">
        <label>Enter number of users you wish to insert (between 1 and 100)</label>
        <input type="text" name="users" class="form-control" min="1" max="100" placeholder="Number of users" />
        <br />
        <button type="submit" class="btn btn-primary">Insert Sample Data</button>
    </div>
</div>
</form>
<?php
if(isset($_POST["users"]))
{
    $users_count = htmlentities($_POST["users"]);
    $country_ids = $countries->getCountriesIDs();
    if(empty($country_ids)) $country_ids[] = 0;
    if(filter_var($users_count, FILTER_VALIDATE_INT) !== false)
    {
        if($users_count >= 1 && $users_count <= 100) {
            require "vendor/autoload.php";
            $users = array();
            $user = new User();
            $faker = Faker\Factory::create();

            for($i = 0; $i < $users_count; $i++) {
                $random_country_id = array_rand($country_ids, 1);
                $random_country = $country_ids[$random_country_id];

                $data = array(
                    ":first_name" => $faker->firstName,
                    ":last_name" => $faker->lastName,
                    ":email" => $faker->email,
                    ":address" => $faker->streetAddress,
                    ":city" => $faker->city,
                    ":zip" => $faker->postcode,
                    ":country_id" => $random_country,
                    ":dob" => $faker->dateTimeThisCentury->format("Y-m-d"),
                    ":active" => 1
                );
                $users[] = $data;
                $user->addUser($data);
            }
            ?>
            <hr/>
            <div class="alert alert-success">
                The following sample data was inserted successfully.
            </div>
            <table class="table table-hover table-bordered table-striped">
                <tr>
                    <th class="bg-primary"></th>
                    <th class="bg-primary">First Name</th>
                    <th class="bg-primary">Last Name</th>
                    <th class="bg-primary">Email</th>
                    <th class="bg-primary">Address</th>
                    <th class="bg-primary">City</th>
                    <th class="bg-primary">Zip</th>
                    <th class="bg-primary">Country</th>
                    <th class="bg-primary">Date of birth</th>
                </tr>
                <?php
                $i = 1;
                foreach($users as $user)
                {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $user[":first_name"]; ?></td>
                        <td><?php echo $user[":last_name"]; ?></td>
                        <td><?php echo $user[":email"]; ?></td>
                        <td><?php echo $user[":address"]; ?></td>
                        <td><?php echo $user[":city"]; ?></td>
                        <td><?php echo $user[":zip"]; ?></td>
                        <td><?php echo $countries->getCountryByID($user[":country_id"]); ?></td>
                        <td><?php echo $user[":dob"]; ?></td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </table>
            <?php
        }
        else
        { ?>
            <div class="alert alert-danger">
                Number of users must be between 1 and 100.
            </div>
            <?php
        }
    }
    else
    {
        ?>
<div class="alert alert-danger">
    Number of users must be an integer.
</div>
<?php
    }
}
