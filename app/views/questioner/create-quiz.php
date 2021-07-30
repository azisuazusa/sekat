<!DOCTYPE html>
<html>
        <title>Sekat - Seberapa Dekat</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="/dist/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex align-items-center fix-container">
        <div class="container">
            <div class="row mb-4">
                <h3 id="countQuestion" class="text-center">Pertanyaan ke-1</h3>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col text-center">
                    <div class="input-group text-center">
                        <input type="text" id="question" class="form-control input-common" placeholder="Pertanyaan">
                    </div>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col text-center">
                    <div class="input-group">
                        <div class="input-group-text">
                            <input id="correct_answer_a" class="form-check-input mt-0" type="radio" name="correct_radio" value="">
                        </div>
                        <input type="text" id="answer_a" class="form-control input-common" placeholder="Jawaban A" onchange="onChangeAnswerA(this.value)">
                    </div>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col text-center">
                    <div class="input-group">
                        <div class="input-group-text">
                            <input id="correct_answer_b" class="form-check-input mt-0" type="radio" name="correct_radio" value="">
                        </div>
                        <input type="text" id="answer_b" class="form-control input-common" placeholder="Jawaban B" onchange="onChangeAnswerB(this.value)">
                    </div>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col text-center">
                    <div class="input-group">
                        <div class="input-group-text">
                            <input id="correct_answer_c" class="form-check-input mt-0" type="radio" name="correct_radio" value="">
                        </div>
                        <input type="text" id="answer_c" class="form-control input-common" placeholder="Jawaban C" onchange="onChangeAnswerC(this.value)">
                    </div>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col text-center">
                    <div class="input-group">
                        <div class="input-group-text">
                            <input id="correct_answer_d" class="form-check-input mt-0" type="radio" name="correct_radio" value="">
                        </div>
                        <input type="text" id="answer_d" class="form-control input-common" placeholder="Jawaban D" onchange="onChangeAnswerD(this.value)">
                    </div>
                </div>
            </div>
            <div id="buttonNext" class="row mt-4 mb-4">
                <div class="col text-center d-grid">
                    <button type="button" class="btn btn-primary btn-common" onclick="onNext()">Selanjutnya</button>
                </div>
            </div>
            <div id="buttonFinish" class="row mt-4 mb-4">
                <div class="col text-center d-grid">
                    <button type="button" class="btn btn-danger btn-common" onclick="onNext(true)">Simpan dan Selesai</button>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="/dist/js/questioner.js"></script>
</body>
</html>

