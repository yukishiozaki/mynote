<template>
  <textarea class="memo-area" rows="5" v-model="contents" v-on:change="postMemo"></textarea>
</template>

<script>

  export default {
    props: ["note_id"],
    data: function() {
        return {
          contents: $("#note-" + this.note_id).val()
        }
    },
    mounted: function () {
      console.log(this.note_id);
    },
    methods: {
      postMemo: function (event) {
            console.log(this.contents);
        var contents = event.target.value.replace(/\r|\n|\r\n/g, ' ')
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
