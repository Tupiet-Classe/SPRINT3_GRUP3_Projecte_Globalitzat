let id = id => document.getElementById(id)

function updateStar() {

    Array.from({length: 5}, (_, i) => i + 1).forEach((value) => {
        try {
            id('feedback-' + value).classList.remove('checked')
        } catch {}
    })

    let selected = document.querySelector('input[name="feedback"]:checked').value;

    let array = Array.from({length: selected}, (_, i) => i + 1)
    array.forEach((value) => {
        id('feedback-' + value).classList.add('checked')
    })

}