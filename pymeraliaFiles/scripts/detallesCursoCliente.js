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

async function sendFeedback(courseID) {
    let rating = document.querySelector('input[name="feedback"]:checked').value,
        feedback = id('feedback-textarea').value

    let response = await fetch('../PHP/sendFeedback.php', {
        method: 'POST',
        body: JSON.stringify({
            rating,
            feedback,
            courseID
        }),
        headers: {
            'Content-Type': 'application/json'
        }
    })

    let res = await response.json()
    console.log(res)
}

function showConfetti() {
    party.confetti(id('course-finished'), {
        count: party.variation.range(20, 40)
    });
}