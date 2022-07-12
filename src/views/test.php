<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>
        <h1></h1>
        <div class="container">
            <div class="card card-body">
                <h2 id="card-title"></h2>
                <?php 
                echo '<pre>';
                print_r( $_SESSION[ 'formflash' ]['values'] ?? '' );
                echo '</pre>'
                ?>
                <form method="POST" action="/form/submit" class="dj-form-validate">
                    <?= $title ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="text" name="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="name@example.com" value="<?= dVal('email') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="<?= dVal('name') ?>" placeholder="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Mobile no</label>
                        <input type="text" name="mobile_no" class="form-control" value="<?= dVal('mobile_no') ?>" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Url</label>
                        <input type="text" name="url" class="form-control" value="<?= dVal('url') ?>" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"> <?= dVal('description') ?> </textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
        </script>

    </body>
</html>