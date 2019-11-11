<template>
  <form action="/notes/edit" method="post" enctype="multipart/form-data">
    <textarea class="memo-area" rows="5">{{ contents }}</textarea>
  </form>
</template>

<script>
  export default {
    props: ['contents'],
    mounted() {
        console.log('Component mounted inouchi.');
    }
  }
</script>
