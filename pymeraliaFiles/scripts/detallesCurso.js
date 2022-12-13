let id = id => document.getElementById(id)

let btn = id('btn-add-user')
let form = id('addUserForm')
let addElementToCategory = new bootstrap.Modal(id('addElementToCategory'))
let modalDocument = new bootstrap.Modal(id('addDocument'))
let actualCategoryId

let modal = new bootstrap.Modal(id('addUser'))
let editModal = new bootstrap.Modal(id('edit-user-modal'))

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
            successToast.show()
        } else {
            errorToast.show()
        }

    }
}

async function deleteCourse() {
    let courseID = +id('courseId').innerText

    console.log(courseID)

    let response = await fetch('../PHP/borrarRecursURL.php', {
        method: 'POST',
        body: JSON.stringify({
            courseID
        }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
}

function showEditModal(resourceId, type) {
    let primary = id('resource-primary-' + type + '-' + resourceId)
    let secondary = id('resource-secondary-' + type + '-' + resourceId)

    id('edit-user-modal-primary').value = primary.innerText
    id('edit-user-modal-secondary').value = secondary.innerText

    id('edit-user-modal-id').value = resourceId
    id('edit-user-modal-type').value = type

    id('edit-user-modal-secondary-label').innerText = (type == 'text') ? 'Descripció' : 'Ubicació'

    editModal.show()
}

function showAddElementToCategoryModal(idCategory) {
    actualCategoryId = idCategory
    addElementToCategory.show()
}

function addDocument(type) {
    
    id('addDocumentLabel').innerText = (type == 'text') ? 'Añadir Texto' : 'Añadir URL'
    id("add-recurs-type").value = type
    id("add-id-category").value = actualCategoryId

    addElementToCategory.hide()
    modalDocument.show()
}

async function deleteCategory(idCategory) {
    let response = await fetch('../PHP/deleteCategory.php', {
        method: 'POST',
        body: JSON.stringify({
            idCategory
        }),
        headers: {
            'Content-Type': 'application/json'
        }
    })

    if (response.ok) {
        let result = await response.json()
        if (result.ok) {
            id('category-' + idCategory).remove()
        }
    }

}

const successToast = new bootstrap.Toast(id('successToast'))
const errorToast = new bootstrap.Toast(id('errorToast'))