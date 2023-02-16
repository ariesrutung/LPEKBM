<?php
if(!$this->session->userdata('id')) {
	redirect(base_url().'admin/login');
}
?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Portfolio</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/portfolio" class="btn btn-primary btn-sm">View All</a>
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

			<?php echo form_open_multipart(base_url().'admin/portfolio/edit/'.$portfolio['id'],array('class' => 'form-horizontal')); ?>
				<div class="box box-info">
					<div class="box-body">
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Name *</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="name" value="<?php echo $portfolio['name']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Short Content *</label>
							<div class="col-sm-8">
								<textarea class="form-control" name="short_content" style="height:100px;"><?php echo $portfolio['short_content']; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Content *</label>
							<div class="col-sm-8">
								<textarea class="form-control editor" name="content"><?php echo $portfolio['content']; ?></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Client Name</label>
							<div class="col-sm-4">
								<input type="text" autocomplete="off" class="form-control" name="client_name" value="<?php echo $portfolio['client_name']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Client Company</label>
							<div class="col-sm-4">
								<input type="text" autocomplete="off" class="form-control" name="client_company" value="<?php echo $portfolio['client_company']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Start Date</label>
							<div class="col-sm-4">
								<input type="text" name="start_date" class="form-control" id="datepicker" value="<?php echo $portfolio['start_date']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">End Date</label>
							<div class="col-sm-4">
								<input type="text" name="end_date" class="form-control" id="datepicker1" value="<?php echo $portfolio['end_date']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Website</label>
							<div class="col-sm-4">
								<input type="text" autocomplete="off" class="form-control" name="website" value="<?php echo $portfolio['website']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Cost</label>
							<div class="col-sm-4">
								<input type="text" autocomplete="off" class="form-control" name="cost" value="<?php echo $portfolio['cost']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Client Comment</label>
							<div class="col-sm-8">
								<textarea class="form-control" name="client_comment" style="height:250px;"><?php echo $portfolio['client_comment']; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Select Category *</label>
							<div class="col-sm-4">
								<select name="category_id" class="form-control select2">
									<?php
									foreach ($all_photo_category as $row) {
										?>
										<option value="<?php echo $row['category_id']; ?>" <?php if($row['category_id'] == $portfolio['category_id']) {echo 'selected';} ?>><?php echo $row['category_name']; ?></option>
										<?php
									}
									?>	
								</select>
							</div>
						</div>
						<h3 class="seo-info">Featured Photo</h3>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Existing Featuerd Photo</label>
							<div class="col-sm-9" style="padding-top:5px">
								<img src="<?php echo base_url(); ?>public/uploads/<?php echo $portfolio['photo']; ?>" alt="" style="width:120px;">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Change Featuerd Photo</label>
							<div class="col-sm-9" style="padding-top:5px">
								<input type="file" name="photo">(Only jpg, jpeg, gif and png are allowed)
							</div>
						</div>
						<h3 class="seo-info">Other Photos</h3>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Existing Other Photos</label>
							<div class="col-sm-6" style="padding-top:5px">
								<table class="table table-bordered">
									<?php
									foreach ($all_photos_by_id as $row) {
										?>
										<tr>
											<td>
												<img src="<?php echo base_url(); ?>public/uploads/portfolio_photos/<?php echo $row['photo']; ?>" alt="" style="width:120px;">
											</td>
											<td>
												<a href="<?php echo base_url(); ?>admin/portfolio/single-photo-delete/<?php echo $row['id']; ?>/<?php echo $portfolio['id']; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');">Delete</a>
											</td>
										</tr>
										<?php
									}
									?>
								</table>								
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Add Other Photos</label>
							<div class="col-sm-6" style="padding-top:5px">
								<table id="PhotosTable" style="width:100%;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="upload-btn">
                                                    <input type="file" name="photos[]">
                                                </div>
                                            </td>
                                            <td style="width:28px;"><a href="javascript:void()" class="Delete btn btn-danger btn-xs">X</a></td>
                                        </tr>
                                    </tbody>
                                </table>
							</div>
							<div class="col-sm-2" style="padding-top:5px">
                                <input type="button" id="btnAddNew" value="Add Item" style="margin-bottom:10px;border:0;color: #fff;font-size: 14px;border-radius:3px;" class="btn btn-warning btn-xs">
                            </div>
						</div>
						<h3 class="seo-info">SEO Information</h3>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Meta Title</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="meta_title" value="<?php echo $portfolio['meta_title']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Meta Keyword</label>
							<div class="col-sm-8">
								<textarea class="form-control" name="meta_keyword" style="height:100px;"><?php echo $portfolio['meta_keyword']; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Meta Description</label>
							<div class="col-sm-8">
								<textarea class="form-control" name="meta_description" style="height:100px;"><?php echo $portfolio['meta_description']; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Language </label>
							<div class="col-sm-2">
								<select name="lang_id" class="form-control select2">
									<?php
									foreach($all_lang as $row)
									{
										?><option value="<?php echo $row['lang_id']; ?>" <?php if($portfolio['lang_id'] == $row['lang_id']) {echo 'selected';} ?>><?php echo $row['lang_name']; ?></option><?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Update</button>
							</div>
						</div>

					</div>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>

</section>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete this item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>