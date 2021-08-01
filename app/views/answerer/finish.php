<!DOCTYPE html>
<head>
        <title>Sekat - Seberapa Dekat</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="/dist/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex align-items-center">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                <h1 class="display-4 text-center">Seberapa dekat kamu dengan <?php echo $data['questioner_name'] ?>?<h1>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col text-center">
                    <h1><?php echo $data['score'] ?>/<small>100</small</h1>
                </div>
            </div>

            <?php foreach($data['questions'] as $key => $value): ?>

            <div class="row"></div>
            <div class="row mt-4">
                <div class="col">
                    <span><?php echo $key + 1 . ". " . $value['question'] ?></span><br>
                    <span><?php echo ($value['is_correct'] == "1" ? "&#9989" : "&#10060") . " &nbsp;" . $value['answerer_answer'] ?></span><br>
                    <span><?php echo "&#9989 &nbsp;" . $value['correct_answer'] ?></span>
                </div>
            </div>

            <?php endforeach; ?>

            <div class="row"></div>
            <div class="row mt-4">
                <div class="col"><h3>Papan Skor</h3></div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <table width="100%">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Skor</th>
                        </tr>
                        <?php foreach($data['score_board'] as $key => $value): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['score'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="/dist/js/answerer_index.js"></script>
</body>
</html>

