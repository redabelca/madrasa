<template>
    <div v-html="row.img_path_link"></div>
</template>


<script>
    export default {
        props: ['row'],
    }
</script>
