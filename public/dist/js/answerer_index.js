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

        location.href = 'answer-quiz/questioner-secondary-id' + location.pathname + '/answerer-user-id/' + result.data.id
    })
}

