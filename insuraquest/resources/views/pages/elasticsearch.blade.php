<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>ElasticSearch</title>
  </head>
  <body>
    <h1>ElasticSearch - first result</h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->

    <form method="get" action="/estest">
@csrf

                <div class="container my-4">

            <p class="font-weight-bold">Bootstrap dropdown checkbox is a component which combines dropdown and checkbox. See the working example below.</p>

            <p><strong>Detailed documentation and more examples you can find in our <a href="https://mdbootstrap.com/docs/jquery/forms/checkbox/"
                                                                                      target="_blank">Bootstrap Checkbox Docs</a> </p>

            <hr>

            <p class="font-weight-bold">Basic example</p>

            <!-- Basic dropdown -->
            <button class="btn btn-primary dropdown-toggle mr-4" type="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Basic dropdown</button>

            <div class="dropdown-menu" name="drop">
              <a class="dropdown-item">
                <!-- Default unchecked -->
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="checkbox1" name="cb1">
                  <label class="custom-control-label" for="checkbox1">Check me</label>
                </div>
              </a>
              <a class="dropdown-item" href="#">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="checkbox2" name="cb2">
                  <label class="custom-control-label" for="checkbox2">Check me</label>
                </div>
              </a>
              <a class="dropdown-item" href="#">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="checkbox3" name="cb3">
                  <label class="custom-control-label" for="checkbox3">Check me</label>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="checkbox4" name="cb4">
                  <label class="custom-control-label" for="checkbox4">Check me</label>
                </div>
              </a>
            </div>
            <!-- Basic dropdown -->

            </div>


            <div class="container my-4">

<p class="font-weight-bold">Bootstrap dropdown checkbox is a component which combines dropdown and checkbox. See the working example below.</p>

<p><strong>Detailed documentation and more examples you can find in our <a href="https://mdbootstrap.com/docs/jquery/forms/checkbox/"
                                                                          target="_blank">Bootstrap Checkbox Docs</a> </p>

<hr>

<p class="font-weight-bold">Basic example</p>

<!-- Basic dropdown -->
<button class="btn btn-primary dropdown-toggle mr-4" type="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">Basic dropdown</button>

<div class="dropdown-menu" name="dropx">
  <a class="dropdown-item">
    <!-- Default unchecked -->
    <div class="custom-control custom-checkbox">
      <input type="checkbox" class="custom-control-input" id="checkbox5" name="cb5">
      <label class="custom-control-label" for="checkbox1">Check me</label>
    </div>
  </a>
  <a class="dropdown-item" href="#">
    <div class="custom-control custom-checkbox">
      <input type="checkbox" class="custom-control-input" id="checkbox6" name="cb6">
      <label class="custom-control-label" for="checkbox2">Check me</label>
    </div>
  </a>
</div>
<!-- Basic dropdown -->

</div>


            <button type="submit">Get it boy!</button>
      </form>
  </body>
</html>