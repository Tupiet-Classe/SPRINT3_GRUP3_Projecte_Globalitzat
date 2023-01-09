let id = id => document.getElementById(id)

let btn = id('btn-add-user')
let form = id('addUserForm')
let addElementToCategory = new bootstrap.Modal(id('addElementToCategory'))
let modalDocument = new bootstrap.Modal(id('addDocument'))
let addActivityModal = new bootstrap.Modal(id('addActivity'))
let actualCategoryId

let modal = new bootstrap.Modal(id('addUser'))
let editModal = new bootstrap.Modal(id('edit-user-modal'))
let editCourseModal = new bootstrap.Modal(id('edit-course-modal'))
let editCategoryModal = new bootstrap.Modal(id('edit-category-modal'))

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

function showEditCategoryModal(idCategory) {
    // Guardem la id de la categoria en una variable global
    actualCategoryId = idCategory
    // Mostrem el nom actual de la categoria
    id('edit-category-modal-primary').value = id('heading-' + idCategory).children[0].innerText
    // Mostrem el diàleg
    editCategoryModal.show()
}

function showEditCourseModal() {
    // Mostrem el nom actual del curs
    id('edit-course-modal-primary').value = id('course-title').innerText
    id('edit-course-modal-secondary').value = id('course-description').innerText
    // Mostrem el diàleg
    editCourseModal.show()
}

function addDocument(type) {
    
    id('addDocumentLabel').innerText = (type == 'text') ? 'Añadir Texto' : 'Añadir URL'
    id("add-recurs-type").value = type
    id("add-id-category").value = actualCategoryId
    id("category_id_create_activity").value = actualCategoryId
    id('descripcionURL').type = (type == 'file') ? 'file' : 'text'

    addElementToCategory.hide()
    type == 'activity' ? addActivityModal.show() : modalDocument.show()
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
async function editCategory() {
    let idCategory = actualCategoryId
    let newName = id('edit-category-modal-primary').value
    let response = await fetch('../PHP/editCategory.php', {
        method: 'POST',
        body: JSON.stringify({
            idCategory,
            newName
        }),
        headers: {
            'Content-Type': 'application/json'
        }
    })

    if (response.ok) {
        let result = await response.json()
        if (result.ok) {
            id('heading-' + idCategory).children[0].innerText = newName
            editCategoryModal.hide()
        }
    }
}

async function editCourse() {
    let idCourse = +id('edit-course-id-modal').value
    let newName = id('edit-course-modal-primary').value
    let newDescription = id('edit-course-modal-secondary').value
    let response = await fetch('../PHP/editCourse.php', {
        method: 'POST',
        body: JSON.stringify({
            idCourse,
            newName,
            newDescription
        }),
        headers: {
            'Content-Type': 'application/json'
        }
    })

    if (response.ok) {
        let result = await response.json()
        if (result.ok) {
            id('course-title').innerText = newName
            id('course-description').innerText = newDescription
            editCourseModal.hide()
        }
    }
}

async function deleteCourse() {
    let idCourse = +id('delete-course-id-modal').value
    let response = await fetch('../PHP/deleteCourse.php', {
        method: 'POST',
        body: JSON.stringify({
            idCourse,
        }),
        headers: {
            'Content-Type': 'application/json'
        }
    })

    if (response.ok) {
        let result = await response.json()
        if (result.ok) {
            location.href = 'cursos.php'
        }
    }
}

const successToast = new bootstrap.Toast(id('successToast'))
const errorToast = new bootstrap.Toast(id('errorToast'))