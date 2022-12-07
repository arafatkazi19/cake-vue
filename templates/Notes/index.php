<div id="app">
    <div class="container">
        <div class="row">
            <div class="card-body">
                <a class="btn btn-success" href="/NotesCake/notes/add">Add Note</a>
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(note, index) in notes">
                        <td>{{ note.datetime }}</td>
                        <td>{{ note.title }}</td>
                        <td>
                            <button class="btn btn-primary me-1" @click='singleItem(note.id)'>View</button>
                            <button class="btn btn-warning me-1" @click='editItem(note.id)'>Edit</button>
                            <button class="btn btn-danger" @click='deleteItem(note.id)'>Delete</button>
                        </td>
                        <td>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
<script src="https://unpkg.com/vuejs-paginate@latest"></script>
<script>
    const { createApp } = Vue;
    const url = 'http://localhost/NotesCake/notes';

    createApp({
        data() {
            return {
                // message: 'Hello Vue!'

                notes:[]
            }
        },
        mounted() {
            axios.get(url).then(response => {
                this.notes = response.data.notes;
                console.log(response.data)
            })
        },

        methods: {
            singleItem(id) {
                console.log(id);
                axios.get(url+'/view/'+id)
                    .then(response => {
                        this.notes = response.data.note;
                        window.location.href = url +'/view/'+id;
                        console.log(response)
                    })
            },

            editItem(id) {
                console.log(id);
                axios.put(url+'/edit/'+id)
                    .then(response => {
                        this.notes = response.data.note;
                        window.location.href = url+'/edit/'+id;
                        console.log(response)
                    })
            },

            deleteItem(id) {
                axios.delete(url+"/delete/" + id).then((res) => {
                   // console.log(res);
                    this.notes = res.data.notes;
                    window.location.href = url;
                })
            }
        },


    }).mount('#app')
</script>
