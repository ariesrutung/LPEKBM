<?php
if(!$this->session->userdata('id')) {
	redirect(base_url().'admin');
}
?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Add Slider</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/slider" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>


<section class="content">

	<div class="row">
		<div class="col-md-12">

			<?php
	        if($this->session->flashdata('error')) {
	            ?>
				<div class="callout callout-danger">
					<p><?php echo $this->session->flashdata('error'); ?></p>
				</div>
	            <?php
	        }
	        if($this->session->flashdata('success')) {
	            ?>
				<div class="callout callout-success">
					<p><?php echo $this->session->flashdata('success'); ?></p>
				</div>
	            <?php
	        }
	        ?>
			
			<?php echo form_open_multipart(base_url().'admin/slider/add',array('class' => 'form-horizontal'));?>
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Photo <span>*</span></label>
							<div class="col-sm-9" style="padding-top:5px">
								<input type="file" name="photo">(Only jpg, jpeg, gif and png are allowed)
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Heading </label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="heading" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Content </label>
							<div class="col-sm-6">
								<textarea class="form-control" name="content" style="height:140px;"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Button1 Text </label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="button1_text" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Button1 URL </label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="button1_url" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Button2 Text </label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="button2_text" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Button2 URL </label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="button2_url" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Position </label>
							<div class="col-sm-2">
								<select name="position" class="form-control select2">
									<option value="Left">Left</option>
									<option value="Right">Right</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Language </label>
							<div class="col-sm-2">
								<select name="lang_id" class="form-control select2">
									<?php
									foreach($all_lang as $row)
									{
										?><option value="<?php echo $row['lang_id']; ?>"><?php echo $row['lang_name']; ?></option><?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>

</section>