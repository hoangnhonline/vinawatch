<div class="row">
	<div class="col-md-12">
		<div class="box-header">
            <h3 class="box-title">Import Excel</h3>
        </div><!-- /.box-header -->
		<form enctype="multipart/form-data"  action="index.php?mod=excel&act=save" method="post">
		 <div class="form-group">
            <label>File Excel</label>
            <input type="file" name="file" />
        </div>    
		<input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
		<div class="button">
            <button class="btn btn-primary btnSave" type="submit" >Import</button>            
        </div>		  
	 	</form>
 	</div>
 </div>