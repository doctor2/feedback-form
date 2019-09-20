Vue.component('feedback-form', {
    props: ['token'],
    data() {
        return {
            form: {
                name: '',
                phone: '',
                content: '',
                token: this.token
            },
            isSuccessed: false,
            isError: false,
            endpoint: '/',
            errorMessage: ''
        }
    },
    methods: {
        onSubmit() {

            let formData = new FormData();
            for (let field in this.form) {
                formData.set(field, this.form[field]);
            }

            axios
                .post(this.endpoint, formData)
                .then(response => {
                    if (response.data.status === 'error') {
                        this.showError(response.data.errors.join(',<br>'));

                    } else {
                        this.resetFrom();

                        this.isSuccessed = true;

                        setTimeout(() => (this.isSuccessed = false), 5000);

                    }
                })
                .catch(error => {

                    console.log(error.response.data.error);

                    this.showError('Ошибка отправки формы!');
                });
        },
        resetFrom() {
            this.form.name = '';
            this.form.phone = '';
            this.form.content = '';
        },
        showError(errorMessage){
            this.errorMessage = errorMessage;

            this.isError = true;

            setTimeout(() => (this.isError = false), 5000);
        }
    },
    template: '<form action="/" method="POST">\n' +
        '        <input type="hidden" name="token" v-model="form.token">\n' +
        '        <div v-if="isSuccessed" class="alert alert-success" role="alert">\n' +
        '  Запрос отправлен успешно!!!\n' +
        '</div>\n' +
        '<div v-if="isError" class="alert alert-danger" role="alert" v-html="errorMessage">\n' +
        '  ' +
        '</div>\n' +
        '        <div class="form-group">\n' +
        '            <label for="name">Имя</label>\n' +
        '            <input v-model="form.name" name="name" type="text" class="form-control" id="name" placeholder="Петр">\n' +
        '        </div>\n' +
        '        <div class="form-group">\n' +
        '            <label for="phone">Телефон</label>\n' +
        '            <input v-model="form.phone"  @keyup="form.phone = this.event.target.value;" name="phone" type="text" class="form-control" id="phone" placeholder="">\n' +
        '        </div>\n' +
        '        <div class="form-group">\n' +
        '            <label for="content">Текст заявки:</label>\n' +
        '            <textarea v-model="form.content" name="content" class="form-control" id="content" rows="3"></textarea>\n' +
        '        </div>\n' +
        '        <button @click.prevent="onSubmit" type="submit" class="btn btn-primary mb-2">Отправить</button>\n' +
        '    </form>'
});

const app = new Vue({
    el: '#app',
});

window.addEventListener('load', function () {
    $('#phone').inputmask("+9(999) 999-9999");
});
