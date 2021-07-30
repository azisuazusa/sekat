<!DOCTYPE html>
<head>
        <title>Sekat - Seberapa Dekat</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="/dist/css/style.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
</head>
<body>
    <div class="container d-flex align-items-center fix-container">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <h1 class="display-1 text-center">Link Kuis<h1>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col text-center">
                    <div class="input-group text-center">
                    <input type="text" id="link" class="form-control input-common" value="<?php echo $data ?>" aria-label="Link" readonly>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col text-center d-grid">
                    <button type="button" class="btn btn-primary btn-common" data-clipboard-target="#link">Salin</button>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="/dist/js/questioner.js"></script>
</body>
</html>

