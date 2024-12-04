<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-3">


        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 text-primary">
                <h3>Voer een nieuwe achtbaan in:</h3>
            </div>
            <div class="col-3"></div>
        </div>


        <div class="row mt-3">
            <div class="col-3"></div>
            <div class="col-6">

                <form>
                    <div class="mb-3">
                        <label for="naamAchtbaan" class="form-label">Naam Achtbaan</label>
                        <input type="text" class="form-control" id="naamAchtbaan" aria-describedby="achtbaanHelp">
                    </div>
                    <div class="mb-3">
                        <label for="naamPretpark" class="form-label">Naam Pretpark</label>
                        <input type="text" class="form-control" id="naamPretpark" aria-describedby="pretparkHelp">
                    </div>
                    <div class="mb-3">
                        <label for="naamLand" class="form-label">Land</label>
                        <input type="text" class="form-control" id="naamLand" aria-describedby="landHelp">
                    </div>
                    <div class="mb-3">
                        <label for="topsnelheid" class="form-label">Topsnelheid</label>
                        <input type="number" min="0" max="255" class="form-control" id="topsnelheid" aria-describedby="landHelp">
                    </div>
                    <div class="mb-3">
                        <label for="naamHoogte" class="form-label">Hoogte</label>
                        <input type="number" min="0" max="255" class="form-control" id="naamHoogte" aria-describedby="hoogteHelp">
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg mt-3">Verzenden</button>
                    </div>
                </form>
            </div>
            <div class="col-3"></div>
        </div>


        




    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>