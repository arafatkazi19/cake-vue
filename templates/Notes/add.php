<div id="create_note_app">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form @submit.prevent="addForm" method="post" class="p-2">
                            <div class="form-group">
                                <label>Title</label>
                                <input v-model="notes.title" type="text" class="form-control" name="title"
                                       placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <label>Datetime</label>
                                <input v-model="notes.datetime" type="datetime" class="form-control" name="datetime"
                                       placeholder="Enter Datetime">
                            </div>

                            <div class="row">
                                <div class="mx-auto">
                                    <br>
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    <a class="btn btn-warning" href="/NotesCake/notes">Go back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
<script>
    const {createApp} = Vue;
    const url = 'http://localhost/NotesCake/notes';

    createApp({
        data() {
            return {
                notes: {
                    title: null,
                    datetime: null,
                }
            }
        },
        methods: {
            addForm() {
                axios.post(url+'/add', this.notes)
                    .then((res) => {
                        if (res.status === 200) {
                            console.log(res);
                            window.location.href = url;
                            // this.$router.push("/notes");
                        }
                    });
            }
        }


    }).mount('#create_note_app')
</script>

