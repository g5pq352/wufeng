<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    $(function () {
    	$("textarea.tiny").each(function (i, el) {
    		CKEDITOR.replace(el, {
    		    filebrowserBrowseUrl : '../filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=<?= md5('ryderawesome') ?>',
    		    filebrowserUploadUrl: 'upload.php?type=Files',

                // filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
                // filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

    		    filebrowserImageUploadUrl: 'upload.php?type=Images',
                filemanager_access_key: '<?= md5('ryderawesome') ?>'
    		});
    	})
    });
</script>