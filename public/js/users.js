
document.getElementById('card_new-user').addEventListener('click', e => {
    if (e.target.classList == e.target.classList[0]) {
        e.target.classList.toggle('new-user-active')
    }
})
function showFormNewUser() {
    document.getElementById('card_new-user').classList.toggle('new-user-active')
}
function confirmAction(id) {
    response = confirm('Tem certeza?')
    if (response) {
        window.location.href = "users/deleteUser/" + id
    }
}