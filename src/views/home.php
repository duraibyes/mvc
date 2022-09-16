<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
      this is home page
      <?php 
                // echo '<pre>';
                // print_r( $_SESSION );
                // print_r( $_SESSION[ 'formflash' ]['values'] ?? '' );
                // echo '</pre>'
                ?>
      <form method="POST" action="/contact/submit">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="text" name="email" class="form-control" id="exampleFormControlInput1"
                placeholder="name@example.com" value="<?= past('email') ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="<?= past('name') ?>" placeholder="name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mobile no</label>
            <input type="text" name="mobile_no" class="form-control" value="<?= past('mobile_no') ?>" id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Url</label>
            <input type="text" name="url" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"><?= past('description') ?></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
    </body>
</html>