<template>
    <div>

        <div class="mb-3">
            <label for="note_number" class="form-label">Note number</label>
            <input v-model="formItem.note_number" type="text" class="form-control" id="note_number" placeholder="">

        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Note Title</label>
            <input v-model="formItem.title" type="text" class="form-control" id="title" placeholder="">
        </div>

        <div class="mb-3">
            <label for="date_time" class="form-label">Date time</label>
            <input v-model="formItem.date_time" type="datetime-local" class="form-control" id="date_time" placeholder="">
        </div>
    </div>
</template>
<script>
    export default {
        name: "NoteForm",
        props: ["item"], // declare the props
        computed: {
            formItem() {
                return this.item;
            }
        }

    }
</script>