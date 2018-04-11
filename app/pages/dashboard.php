<?php if(!defined("APP_URL")) exit(); ?>
<!-- top tiles -->
<div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
        <div class="count"><?php echo $users->total(); ?></div>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-sticky-note"></i> Total Notes</span>
        <div class="count"><?php echo $notes->total(); ?></div>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-flag"></i> Total Countries</span>
        <div class="count"><?php echo $countries->total(); ?></div>
    </div>
</div>
<!-- /top tiles -->

