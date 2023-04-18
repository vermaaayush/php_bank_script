<?php include('header.php'); ?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="dashboard.php">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">Forms</a>

					</li>

				</ul>

			</div>

			

			<div class="row-fluid sortable">

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2><i class="icon-edit"></i> Manage Pages</h2>

						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

						<a href="viewpages.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">View Pages</a>

							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->

							<!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->

						</div>

					</div>

					<div class="box-content">

						<form class="form-horizontal">

						  <fieldset>

							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->

							<div class="control-group">

							  <label class="control-label" for="typeahead">Drop Down </label>

							  <div class="controls">

								  <select id="selectError3">

									<option>Option 1</option>

									<option>Option 2</option>

									<option>Option 3</option>

									<option>Option 4</option>

									<option>Option 5</option>

								  </select>

								</div>

							</div>

							<div class="control-group">

							  <label class="control-label" for="date01">Date input</label>

							  <div class="controls">

								<input type="text" class="input-xlarge datepicker" id="date01" value="02/16/12">

							  </div>

							</div>

							

							<div class="control-group">

							  <label class="control-label" for="date01">Normal Text Field</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="">

								</div>

							</div>	

							

							<div class="control-group">

							  <label class="control-label" for="date01">Check Box</label>

							 <div class="controls">

								  <label class="checkbox inline">

									<input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1

								  </label>

								  <label class="checkbox inline">

									<input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2

								  </label>

								  <label class="checkbox inline">

									<input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3

								  </label>

								</div>

							</div>	

							

							<div class="control-group">

							  <label class="control-label" for="date01">Radio Button</label>

							 <div class="controls">

								  <label class="radio">

									<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">

									Option one is this and that—be sure to include why it's great

								  </label>

								  <div style="clear:both"></div>

								  <label class="radio">

									<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">

									Option two can be something else and selecting it will deselect option one

								  </label>

								</div>

							</div>	

							

							<div class="control-group">

							  <label class="control-label" for="date01">Text Area</label>

							 <div class="controls">

								  <textarea class="autogrow"></textarea>

								</div>

							</div>			

							



							<div class="control-group">

							  <label class="control-label" for="fileInput">File input</label>

							  <div class="controls">

								<input class="input-file uniform_on" id="fileInput" type="file">

							  </div>

							</div>          

							<div class="control-group">

							  <label class="control-label" for="textarea2">Textarea WYSIWYG</label>

							  <div class="controls">

								<textarea class="cleditor" id="textarea2" rows="3"></textarea>

							  </div>

							</div>

							<div class="control-group">

							  <label class="control-label" for="textarea2">Status</label>

							  <div class="controls">

								<input data-no-uniform="true" type="checkbox" class="iphone-toggle">

							  </div>

							</div>

							

							<div class="form-actions">

							  <button type="submit" class="btn btn-primary">Save changes</button>

							  <button type="reset" class="btn">Cancel</button>

							</div>

						  </fieldset>

						</form>   



					</div>

				</div><!--/span-->



			</div><!--/row-->







    

<?php include('footer.php'); ?>

