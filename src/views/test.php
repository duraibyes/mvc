<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- <link href="<?= asset_path() ?>assets/css/main.css" rel="stylesheet"> -->
        <link href="<?= asset_path('css/main.css') ?>" rel="stylesheet">
    </head>
    <body>
        <h1></h1>
        <div class="container">
            <div class="card card-body main">
                <h2 id="card-title"></h2>
                <?php 
                echo '<pre>';
                print_r( $_SESSION[ 'formflash' ]['values'] ?? '' );
                echo '</pre>'
                ?>
                <form method="POST" action="/form/submit" class="dj-form-validate" enctype="multipart/form-data">
                    <?= $title ?>
                    <div class="mb-3 main">
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
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"> <?= dVal('description') ?> </textarea>
                    </div>
                    <div ng-controller="InputController">
                        <input ng-bind="message"/>   
                        <input ng-bind="message"/>   
                        <button onclick="onButtonClick()">Click!</button>
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
        <script>
            /* Framework code */
            (function () {
            var controllers = {};
            var addController = function (name, constructor) {
                // Store controller constructor
                controllers[name] = {
                factory: constructor,
                instances: []
                };

                // Look for elements using the controller 
                var element = document.querySelector('[ng-controller=' + name + ']');
                if (!element){   
                return;
                }

                // Create a new instance and save it
                var ctrl = new controllers[name].factory();
                controllers[name].instances.push(ctrl);

                // Get elements bound to properties
                var bindings = {};
                Array.prototype.slice.call(element.querySelectorAll('[ng-bind]'))
                .map(function (element) {
                    var boundValue = element.getAttribute('ng-bind');

                    if (!bindings[boundValue]) {
                        bindings[boundValue] = {
                        boundValue: boundValue,
                        elements: []
                        }
                    }

                    bindings[boundValue].elements.push(element);
                });    

                // Update DOM element bound when controller property is set
                var proxy = new Proxy (ctrl, {
                    set: function (target, prop, value) {    
                        var bind = bindings[prop];
                        if (bind) {  
                        bind.elements.forEach(function (element) {
                            element.value = value;
                            element.setAttribute('value', value);
                        });
                        }
                        return Reflect.set(target, prop, value);
                    }
                });

                // Listen DOM element update to set the controller property
                Object.keys(bindings).forEach(function (boundValue) {
                    var bind = bindings[boundValue];
                    bind.elements.forEach(function (element) {
                        element.addEventListener('input', function (event) {
                        proxy[bind.boundValue] = event.target.value;
                        });
                    })  
                });

                // Fill proxy with ctrl properties
                // and return proxy, not the ctrl !
                Object.assign(proxy, ctrl);
                return proxy;
            }

            // Export framework in window
            this.bytes = {
                controller: addController
            }
            })();
            
            /* User code */
            function InputController () {
            this.message = 'Hello World!';
            }

            var myInputController = bytes.controller('InputController', InputController);

            function onButtonClick () {
            myInputController.message = 'Clicked!';   
            }
            
        </script>
    </body>
</html>