<?php
//echo '<pre>';
//var_dump($note); exit();
?>

<div id="app_2">
    <div class="card-body">

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Title</th>
            </tr>
            </thead>
            <tbody>
            <tr>

                <td>{{ note.datetime }}</td>
                <td>{{ note.title }}</td>
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

                note:{
                    id : '',
                    title : '',
                    datetime : ''
                }
            }
        },
        mounted() {
            //console.warn(id);
            axios.get(`http://localhost:8765/notes/view/`+note.id).then(response => {
                this.note = response.data.note;
                console.log(response.data.note)
            })
        },


    }).mount('#app_2')
</script>
