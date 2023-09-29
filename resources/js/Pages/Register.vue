<template>
    <layout>
        <div>
            <h2 class="mt-3 mb-4">Cadastrar Novo Usuário</h2>
            <div class="mb-3">
                <div class="col-md-4 mb-1 list-group-item list-group-item-danger" v-for="errorMessage in errorMessages"
                    :key="errorMessage">Error - {{ errorMessage[0] }}</div>
            </div>
            <form @submit.prevent="handleForm">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome:</label>
                    <input type="text" id="name" class="form-control" v-model="form.name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" class="form-control" v-model="form.email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha:</label>
                    <input type="password" id="password" class="form-control" v-model="form.password">
                </div>
                <button class="btn btn-primary mb-4" type="submit">Cadastrar</button>
            </form>
        </div>
    </layout>
</template>
  
<script>
import Layout from '../Layout.vue';
import axios from 'axios';
export default {
    components: { Layout },
    props: {},
    data: () => {
        return {
            form: {
                name: null,
                email: null,
                password: null,
            },
            errorMessages: [],
        };
    },
    methods: {
        handleForm() {
            const self = this;

            axios.post("/register", this.form)
                .then(function () {
                    window.location.href = "/";
                })
                .catch(function (error) {
                    if (error.response && error.response.data && error.response.data.errors) {
                        self.errorMessages = error.response.data.errors;
                    }
                });
        },
    },
};
</script>