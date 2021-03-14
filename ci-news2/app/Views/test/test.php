test html
<!DOCTYPE html>
<html>
<head>
    <title>Codeigniter 4 Image upload example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <br>
    <div class="row">
        <div class="col-md-4">
          <?php if (session('msg')) : ?>
              <div class="alert alert-success alert-dismissible">
                <?= session('msg') ?>
                  <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
              </div>
          <?php endif ?>
            <form action="<?php echo base_url('contact/upload');?>" name="ajax_form" id="ajax_form" method="post" accept-charset="utf-8" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="formGroupExampleInput">Name</label>
                    <input type="file" name="file" class="form-control" id="file" style="height:35px;">
                </div>

                <div class="form-group">
                    <button type="submit" id="send_form" class="btn btn-success">Submit</button>
                </div>

            </form>
        </div>

    </div>

</div>
</body>
