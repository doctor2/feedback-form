<template>
    <form action="/" method="POST">
        <input type="hidden" name="token" v-model="form.token">
        <div v-if="isSuccess" class="alert alert-success" role="alert">
            Запрос отправлен успешно!!!
        </div>
        <div v-if="isError" class="alert alert-danger" role="alert" v-html="errorMessage">
        </div>
        <div class="form-group">
            <label for="name">Имя</label>
            <input v-model="form.name" name="name" type="text" class="form-control" id="name" placeholder="Петр">
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input v-model="form.phone"  name="phone" type="text"
                   class="form-control" id="phone" placeholder="">
        </div>
        <div class="form-group">
            <label for="content">Текст заявки:</label>
            <textarea v-model="form.content" name="content" class="form-control" id="content" rows="3"></textarea>
        </div>
        <button @click.prevent="onSubmit" type="submit" class="btn btn-primary mb-2">Отправить</button>
    </form>
</template>

<script>
    export default {
        props: ['token'],
        data() {
            return {
                form: {
                    name: '',
                    phone: '',
                    content: '',
                    token: this.token
                },
                isSuccess: false,
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

                this.$axios
                    .post(this.endpoint, formData)
                    .then(response => {
                        if (response.data.status === 'ok') {
                            this.resetFrom();

                            this.isSuccess = true;

                            setTimeout(() => (this.isSuccess = false), 5000);
                        } else {
                            this.showError(response.data.errors.join(',<br>'));
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
            showError(errorMessage) {
                this.errorMessage = errorMessage;

                this.isError = true;

                setTimeout(() => (this.isError = false), 5000);
            }
        }
    }
</script>