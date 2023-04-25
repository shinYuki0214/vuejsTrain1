<template>
    <div class="c__wrapper">
        <h2 class="c__title-01 sec-03__title">axiosを使用したCRUD操作</h2>
        <div class="sec-04__block">
            <div class="c__card">
                <div class="c__card-header">編集</div>
                <div class="c__card-body">
                    <form>
                        <table class="c__table">
                            <tr>
                                <th width="50%">件名</th>
                                <td><input type="text" v-model="taskTitle" placeholder="件名"></td>
                            </tr>
                            <tr>
                                <th width="50%">メモ</th>
                                <td><textarea v-model="taskMemo" placeholder="メモ"></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button class="sec-04__btn" v-on:click.once="onUpdate">
                                        登録
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    {{ taskId }}
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            taskTitle: "aa",
            taskMemo: "bb",
            taskId: 'idを入れたい',
        }
    },
    methods: {
        getIdTask() {
            axios.get('/taskedit/').then((response) => {
                this.taskTitle = response.data.task.title;
                this.taskMemo = response.data.task.memo;
                this.taskId = this.$route.path;
            })
        },
        onUpdate: function () {
            axios.post('/taskupdate', {
                title: this.taskTitle,
                memo: this.taskMemo,
            }).then((response) => {
                // 送信できたか確認
                console.log(response);
            }).catch((err) => {
                console.log(err);
            });
        },
        mounted() {
            axios.get('/taskedit/').then((response) => {
                this.taskTitle = response.data.task.title;
                this.taskMemo = response.data.task.memo;
            })
        },
    },
    created() {
        this.getIdTask();
    }
}
</script>
