<div>

    <form @submit.prevent="addNote">
        <div class="mb-3">
            <label for="title" class="form-label">Note Title</label>
            <input v-model="formItem.title" type="text" class="form-control" id="title" placeholder="">
        </div>

        <div class="mb-3">
            <label for="date_time" class="form-label">Date time</label>
            <input v-model="formItem.date_time" type="datetime-local" class="form-control" id="date_time"
                   placeholder="">
        </div>

        <button type="submit" class="btn btn-info mx-1 text-white">Save</button>
    </form>
</div>


<script type="module">


    export default {
        name: 'App',
        data() {
            return {
                item_data: {},
                successMessage: "",
                errorMessage: ""

            };
        },

        methods: {
            addNote() {
                this.axios.post('http://localhost:8765/notes/add')
                    .then((res) => {
                        console.log(res);
                        if (res.status === 200 && res.data.code === 200) {
                            this.successMessage = res.data.message;

                            //  this.$router.push("/notes");
                        } else {
                            this.errorMessage = res.data.message;
                        }
                    });
            },
        },

    }
</script>
