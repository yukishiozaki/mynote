<template>
  <form>
    <input type="hidden" name="note_id" :value="note_id">
    <textarea class="memo-area" rows="5" v-on:change="postMemo">{{ contents }}</textarea>
  </form>
</template>

<script>

  export default {
    props: ['note_id', 'contents'],
    methods: {
      postMemo: function (event) {
        var memo = {
            'id': this.note_id,
            'contents': event.target.value
        };

        axios.post('/notes/edit/', memo).then(res => {
            console.log("memo edit done");
        });
      }
    }
  }
</script>
