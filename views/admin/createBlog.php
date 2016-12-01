<div class="container">
    <div class="row">
        <h1 class="page-header">Create Blog</h1>        

        <form class="form-horizontal" action="<?= BASEPATH ?>admin/doSaveBlog" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="">Banner</label><br>
                <div class="col-md-12">
                    <input type="file" accept="image/*" id="imgInp" required name="thumbnail">
                </div>
                <div class="col-md-2">
                    <img id="preview" class="img-responsive img-round img-thumbnail">
                </div>
            </div>

            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Short Description</label>
                <input type="text" name="desc" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Keywords</label>
                <input type="text" name="keywords" required class="form-control" placeholder="test,keyword2,...">
            </div>
            <div class="form-group">
                <label for="">Full detail</label>
                <textarea name="detail" id="editor1"></textarea>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <div class="row">
                    <div class="col-md-3">
                        <select class="form-control" name="status_blog">
                            <option value="0" selected>Close</option>
                            <option value="1">Public</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group text-right">
                <button class="btn btn-info btn-lg"><i class="glyphicon glyphicon-save"></i> Create</button>
            </div>
        </form>
    </div>
</div>
<script>
    CKEDITOR.replace('editor1');

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function () {
        readURL(this);
    });
</script>
<?php
if ($this->get('status') == 'success') {
    echo '<script>alert("create blog successfuly")</script>';
} else if ($this->get('status') == 'error') {
    echo '<script>alert("Create Blog Success but not save image please try update blog again")</script>';
}
?>
