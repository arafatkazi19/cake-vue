<div id="app">
    <div class="card-body">

        <table class="table table-hover" >
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
                    <button @click='singleItem(note.id)'>View</button>
                </td>

            </tr>
            </tbody>
        </table>
    </div>
</div>

<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
<script>
    const { createApp } = Vue;

    createApp({
        data() {
            return {
                // message: 'Hello Vue!'

                notes:[]
            }
        },
        mounted() {
            axios.get('http://localhost:8765/notes').then(response => {
                this.notes = response.data.notes;
                console.log(response.data)
            })
        },

        methods: {
            singleItem(id) {
                console.log(id);
                axios.get('http://localhost:8765/notes/view/'+id)
                    .then(response => {
                        this.notes = response.data.note;
                        window.location.href = 'http://localhost:8765/notes/view/'+id;
                        console.log(response)
                    })
            },
        },


    }).mount('#app')
</script>
