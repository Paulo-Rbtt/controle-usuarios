<template>
    <layout>
        <div>
            <h1>Perfil de {{ tempName }}</h1>

            <div>
                <label for="name">Nome:</label>
                <input type="text" id="name" v-model="user.name">
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" v-model="user.email">
            </div>

            <button @click="updateProfile">Atualizar Perfil</button>
        </div>
    </layout>
</template>

<script>
import Layout from '../Layout.vue';
import axios from 'axios';

export default {
    components: { Layout },
    props: {
        user: Object,
    },
    data() {
        return {
            tempName: this.user.name,
        };
    },
    methods: {
        updateProfile() {
            const userID = this.user.id;
            const data = {
                name: this.user.name,
                email: this.user.email,
            };
            axios
                .post(`/perfil/${userID}`, data)
                .then((response) => {
                    window.location.href = "/";
                })
                .catch((error) => {
                    if (error.response && error.response.data) {
                        console.log(error.response.data);
                    }
                });
        },
    },
};
</script>