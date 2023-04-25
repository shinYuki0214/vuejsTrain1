<template>
    <div class="c__wrapper">
        <h2 class="c__title-01 sec-03__title">DB表示</h2>
        <div class="c__card">
            <div class="c__card-header">ユーザー</div>

            <div class="c__card-body">
                <table class="c__table">
                    <tr>
                        <th width="50%">Name</th>
                        <th width="50%">Email</th>
                    </tr>
                    <tr v-for="user in users" :key="user.id">
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            users: {},
        }
    },
    methods: {
        getUser() {
            axios.get('/list')
                .then((response) => {
                    this.users = response.data.users
                })
        }
    },
    created() {
        this.getUser()
    }
}
</script> 