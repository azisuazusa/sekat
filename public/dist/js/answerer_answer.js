var countQuestion = 1;
var questions = [];
var answers = [];
var currentIndex = 0;

$(document).ready(function() {
    $("#countQuestion").text("Pertanyaan ke-" + countQuestion);
    $.ajax({
        type: "GET",
        url: "/questions/secondary-id/" + location.pathname.split('/')[3],
    }).then((response) => {
        const result = JSON.parse(response);

        if (result.success != 1) {
            alert("Terjadi Kesalahan!");
            return
        }

        questions = result.data;
        showQuestion();
    })

});

function showQuestion() {
    const question = questions[currentIndex];
    $("#countQuestion").text("Pertanyaan ke-" + countQuestion);
    $("#correct_answer_a").val(question.answer_a);
    $("#correct_answer_b").val(question.answer_b);
    $("#correct_answer_c").val(question.answer_c);
    $("#correct_answer_d").val(question.answer_d);
    $("#answer_a").val(question.answer_a);
    $("#answer_b").val(question.answer_b);
    $("#answer_c").val(question.answer_c);
    $("#answer_d").val(question.answer_d);
    $("#question").val(question.question);
}

function validateInputs() {
    if ($("input[name=correct_radio]:checked").val() == null) return "Jawaban harus dipilih!";

    return ""
}

function onNext() {
    const validate = validateInputs()
    if (validate != "") {
        alert(validate);
        return
    }

    const answer = $("input[name=correct_radio]:checked").val();
    const data = {
        answer: answer,
        answerer_user_id: location.pathname.split('/')[5],
        question_id: questions[currentIndex].id,
    }
    $.ajax({
        type: "POST",
        url: "/histories/answer",
        data: data
    }).then((response) => {
        const result = JSON.parse(response);

        if (result.success != 1) {
            alert("Terjadi Kesalahan!");
            return
        }

        answers.push(answer);

        if (questions.length - 1 == currentIndex) {
            location.href = '/answer-quiz/score/questioner-secondary-id/' + location.pathname.split('/')[3] + "/answerer-user-id/" + location.pathname.split('/')[5];
            return
        }

        currentIndex++;
        countQuestion++;
        showQuestion();
    })

}
