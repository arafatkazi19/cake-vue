<?php
//echo '<pre>';
//var_dump($note); exit();
?>

<div id="note_view">
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
            <button type="button" class="btn btn-warning" onclick='window.location.href="/notes"'>Go Back</button>
        </table>
    </div>
</div>

<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>

<script>
    var noteId = "<?php echo "$note->id"?>";
    //console.log(x);
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
            axios.get(`http://localhost:8765/notes/view/`+noteId).then(response => {
                this.note = response.data.note;
                console.log(response.data.note)
            })
        },


    }).mount('#note_view')
</script>
