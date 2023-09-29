<template>
    <layout>
        <div class="mt-5">
            <h2>Usuários</h2>
            <div class="list-group mt-3">
                <a :href="'/perfil/' + user.id" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" v-for="user in users">
                    {{ user.name }}
                    <span class="badge bg-primary rounded-pill">{{ user.email }}</span>
                </a>
            </div>
        </div>
    </layout>
</template>

<script>
import Layout from '../Layout.vue'

export default {
    components: { Layout },
    props: {
        users: Array
    },
    mounted() {
        console.log(this.users);
    }
}
</script>