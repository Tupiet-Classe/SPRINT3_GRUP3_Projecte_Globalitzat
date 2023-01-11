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
        let res = await response.json()
        if (res.ok) {
            modal.hide()
            $('#table').bootstrapTable('refresh')
            id('successToastMessage').innerText = 'El usuario se ha añadido correctamente'
            successToast.show()
        } else {
            $('#table').bootstrapTable('refresh')
            id('errorToastMessage').innerText = 'El usuario no existe o ya está asignado al curso'
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
        let res = await response.json()
        if (res.ok) {
            $('#table').bootstrapTable('refresh')
            id('successToastMessage').innerText = 'Se ha dado de baja al usuario'
            successToast.show()
        } else {
            $('#table').bootstrapTable('refresh')
            id('errorToastMessage').innerText = 'Se ha producido un error'
            errorToast.show()
        }
    }
}

const successToast = new bootstrap.Toast(id('successToast'))
const errorToast = new bootstrap.Toast(id('errorToast'))