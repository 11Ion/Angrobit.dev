export class SendServer {
    constructor(url) {
        this.url = url;
        this.formData = new FormData();
    }

    // Метод для добавления данных в FormData
    addData(name, value) {
        this.formData.append(name, value);
    }

    // Метод для отправки данных на сервер
    send() {
        return new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', this.url, true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        resolve(xhr.responseText); // Успешный ответ
                    } else {
                        reject(`Error: ${xhr.status}`); // Обработка ошибок
                    }
                }
            };

            xhr.send(this.formData);
        });
    }
}