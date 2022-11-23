let id = id => document.getElementById(id)

let btn = id('btn-add-user')
let form = id('addUserForm')
let modal = new bootstrap.Modal(id('addUser'))

form.addEventListener('submit', (e) => {
    e.preventDefault()
    asignCourse()
})

btn.addEventListener('click', (e) => {
    e.preventDefault()
    asignCourse()
})

async function asignCourse() {
    let user = id('userToAdd').value
    let courseID = +id('courseId').innerText

    console.log(user, courseID)

    let response = await fetch('../PHP/asignarCurso.php', {
        method: 'POST',
        body: JSON.stringify({
            courseID,
            user
        }),
        headers: {
            'Content-Type': 'application/json'
        }
    })

    if (response.ok) {
        let data = await response.json()
        if (data.ok) {
            modal.hide()
            location.reload()
            sessionStorage.setItem('showToast', 'success')
            sessionStorage.setItem('messageToast', 'El usuario se ha añadido correctamente')
        } else {
            id('errorToastMessage').innerText = 'El usuario no existe'
            errorToast.show()
        }

    }
}

async function expulsar(userID) {
    let courseID = +id('courseId').innerText
    let response = await fetch('../PHP/expulsarUsuario.php', {
        method: 'POST',
        body: JSON.stringify({
            courseID,
            userID
        }),
        headers: {
            'Content-Type': 'application/json'
        }
    })

    if (response.ok) {
        location.reload()
        sessionStorage.setItem('showToast', 'success')
        sessionStorage.setItem('messageToast', 'El usuario se ha expulsado correctamente')
    } else {
        location.reload()
        sessionStorage.setItem('showToast', 'error')
        sessionStorage.setItem('messageToast', 'El usuario no se ha expulsado correctamente')
    }
}

window.onload = () => {
    let showToast = sessionStorage.getItem('showToast')
    if (showToast == 'success') {
        sessionStorage.removeItem('showToast')
        id('successToastMessage').innerText = sessionStorage.getItem('messageToast') ?? 'Correcto'
        sessionStorage.removeItem('messageToast')
        successToast.show()
    } else if (showToast == 'error') {
        sionStorage.removeItem('showToast')
        id('errorToastMessage').innerText = sessionStorage.getItem('messageToast') ?? 'Erro'
        sessionStorage.removeItem('messageToast')
        errorToast.show()
    }
}

const successToast = new bootstrap.Toast(id('successToast'))
const errorToast = new bootstrap.Toast(id('errorToast'))