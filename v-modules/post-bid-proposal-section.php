<?php
	//checking for bid id is set or not
	if(!isset($bid)) {
?>

<div class="post_bid_section_outline">
    <h4 class="post_bid_text">Describe Your Proposal</h4>
    <form <?php echo $form_action; ?> method="post" enctype="multipart/form-data">
        <textarea rows="20" name="bid_pro" class="form-control post_bid_textarea"></textarea>
        <p>Cost</p>
        <input type="text" name="bid_price" placeholder="Only write the amount" class="form-control post_bid_textbox post_bid_smltext" />
        <p>Time Required</p>
        <select name="time_range" class="form-control post_bid_textbox">
        	<option value="1 Day">1 Day</option>
            <option value="3 Days">3 Days</option>
            <option value="5 Days">5 Days</option>
            <option value="1 Week">1 Week</option>
            <option value="2 Weeks">2 Weeks</option>
            <option value="1 Month">1 Month</option>
            <option value="2 Months">2 Months</option>
            <option value="Above 2 Months">Above 2 Months</option>
        </select>
        <p>Attach File</p>
        <input type="file" name="file" class="post_bid_textbox"/>
        <?php if(!isset($warning)){ ?>
        <input type="hidden" name="pid" value="<?php echo $pid ?>" />
        <input type="hidden" name="fn" value="<?php echo md5('insert_bid'); ?>" />
        <input type="submit" class="btn btn-success btn-lg pull-right" value="SUBMIT"/>
        <?php } ?>
        <div class="clearfix"></div>
    </form>
</div>

<?php } else { ?>

<div class="post_bid_section_outline">
    <h4 class="post_bid_text">Describe Your Proposal</h4>
    <form <?php echo $form_action; ?> method="post" enctype="multipart/form-data">
        <?Php
			//getting the old bid details by the user
			$manageContent->updateProjectPost($bid);
		?>
        <?php if(!isset($warning)){ ?>
        <input type="hidden" name="bid" value="<?php echo $bid ?>" />
        <input type="hidden" name="fn" value="<?php echo md5('update_bid') ?>"/>
        <input type="submit" class="btn btn-success btn-lg pull-right" value="UPDATE"/>
        <?php } ?>
        <div class="clearfix"></div>
    </form>
</div>

<?php } ?>