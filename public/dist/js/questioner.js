var countQuestion = 1;

$(document).ready(function() {
    new ClipboardJS('.btn');
    $("#countQuestion").text("Pertanyaan ke-" + countQuestion);

    if (countQuestion < 2) {
        $("#buttonFinish").hide();
    }
});

function createUser() {
    const data = {
        name: $("#name").val()
    }
    $.ajax({
        type: "POST",
        url: "users",
        data: data
    }).then((response) => {
        const result = JSON.parse(response);

        if (result.success != 1) {
            alert("Terjadi Kesalahan!");
            return
        }

        location.href = 'create-quiz/' + result.data.id;
    })
}

function onChangeAnswerA(val) {
    $("#correct_answer_a").val(val);
}

function onChangeAnswerB(val) {
    $("#correct_answer_b").val(val);
}

function onChangeAnswerC(val) {
    $("#correct_answer_c").val(val);
}

function onChangeAnswerD(val) {
    $("#correct_answer_d").val(val);
}

function validateInputs() {
    if ($("#question").val() == "") return "Pertanyaan harus diisi!";
    if ($("#answer_a").val() == "") return "Jawaban A harus diisi!";
    if ($("#answer_b").val() == "") return "Jawaban B harus diisi!";
    if ($("#answer_c").val() == "") return "Jawaban C harus diisi!";
    if ($("#answer_d").val() == "") return "Jawaban D harus diisi!";
    if ($("input[name=correct_radio]:checked").val() == null) return "Jawaban Benar harus dipilih!";

    return ""
}

function onNext(isFinish = false) {
    const validate = validateInputs()
    if (validate != "") {
        alert(validate);
        return
    }

    const data = {
        user_id: location.pathname.split('/')[2],
        question: $("#question").val(),
        answer_a: $("#answer_a").val(),
        answer_b: $("#answer_b").val(),
        answer_c: $("#answer_c").val(),
        answer_d: $("#answer_d").val(),
        correct_answer: $("input[name=correct_radio]:checked").val()
    }

    $.ajax({
        type: "POST",
        url: "/questions",
        data: data
    }).then((response) => {
        const result = JSON.parse(response);

        if (result.success != 1) {
            alert("Terjadi Kesalahan!");
            return
        }

        if (isFinish) {
            location.href = '/finish/' + data.user_id;
            return
        }

        $("#question").val("");
        $("#answer_a").val("");
        $("#answer_b").val("");
        $("#answer_c").val("");
        $("#answer_d").val("");
        $("input[name=correct_radio]:checked").prop("checked", false);

        countQuestion++;
        $("#countQuestion").text("Pertanyaan ke-" + countQuestion);
        if (countQuestion < 2) {
            $("#buttonFinish").hide();
        } else {
            $("#buttonFinish").show();
        }
    })
}
