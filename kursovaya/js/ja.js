
function submitEditForm() {
    var medcartId = $("#medcart").val();
    var newDoctor = $("#editDoctor").val();

    fetch("EditMeDscarts.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "id=" + medcartId + "&doctor=" + newDoctor
    })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            // Закрываем модальное окно после успешного редактирования
            document.querySelector("#editModal").classList.remove("show");
            document.querySelector("#editModal").style.display = "none";
            document.querySelector(".modal-backdrop").remove();
            // Можете добавить здесь обновление данных на странице, если необходимо
            location.reload(); // Обновление страницы
        })
        .catch(error => {
            console.error("Error during fetch request:", error);
            // Обработка ошибок при отправке данных на сервер
        });
}


document.addEventListener('click', function(event) {
    if (event.target.classList.contains('delete-btn')) {
        // Получаем идентификатор медкарты из атрибута data
        var medcartId = event.target.dataset.medcartId;

        // Вызываем fetch для удаления
        fetch("DeleteMedcart.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "id=" + medcartId
        })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                // По желанию, можно перезагрузить страницу или обновить интерфейс здесь
                location.reload(); // Обновление страницы
            })
            .catch(error => {
                console.error("Error during fetch request:", error);
                // Обработка ошибок, если это необходимо
            });
    }
});


    function toggleButtonText(button) {
    // Получаем текущий текст кнопки
    var buttonText = button.innerText;

    // Меняем текст в зависимости от текущего состояния
    if (buttonText.trim() === 'Развернуть') {
    button.innerText = 'Свернуть';
} else {
    button.innerText = 'Развернуть';
}
}

