<template>
    <div class="c__wrapper">
        <h2 class="c__title-01 sec-03__title">axiosを使用した操作</h2>
        <div class="sec-04__block">
            <div class="c__card">
                <div class="c__card-header">タスク登録</div>
                <div class="c__card-body">
                    <form>
                        <table class="c__table">
                            <tr>
                                <th width="50%">件名</th>
                                <td><input type="text" v-model="postTitle" placeholder="件名"></td>
                            </tr>
                            <tr>
                                <th width="50%">メモ</th>
                                <td><textarea v-model="postMemo" placeholder="メモ"></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button class="sec-04__btn" v-on:click.once="onPost">
                                        登録
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>
            </div>
        </div>
        <div class="sec-04__block">
            <div class="c__card">
                <div class="c__card-header">タスク一覧</div>
                <div class="c__card-body">
                    <table class="c__table">
                        <tr>
                            <th width="50%">件名</th>
                            <th width="50%">メモ</th>
                            <th width="50%">削除</th>
                        </tr>
                        <tr v-for="task in tasks" :key="task.id">
                            <td>{{ task.title }}</td>
                            <td>{{ task.memo }}</td>
                            <td>
                                <form>
                                    <button class="c__btn-delete" v-on:click.once="onDelete(task.id)">
                                        削除
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            tasks: {},
            postTitle: "",
            postMemo: "",
        }
    },
    methods: {
        getUser() {
            axios.get('/tasklist')
                .then((response) => {
                    this.tasks = response.data.tasks
                })
        },
        onPost: function () {
            console.log(this.postTitle);
            console.log(this.postMemo);
            axios.post('/taskpost', {
                title: this.postTitle,
                memo: this.postMemo,
            }).then((response) => {
                // 送信できたか確認
                console.log(response);
            }).catch((err) => {
                console.log(err);
            });
        },
        onDelete: function (taskId) {
            axios.post('/taskdelete', {
                id: taskId,
            }).then((response) => {
                // 送信できたか確認
                console.log(response);
            }).catch((err) => {
                console.log(err);
            });
        },
        mounted() {
            axios.get('/tasklist').then((response) => {
                this.tasks = response.data.tasks
            });
        },
    },
    created() {
        this.getUser()
    }
}
</script>
