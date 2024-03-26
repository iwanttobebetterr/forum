<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";

defineProps({
    posts: Array
})

</script>

<template>
    <AppLayout title="posts">
        <Container>
            <ul>
                <li v-for="post in posts" :key="post.id">
                    {{ post.title }}
                </li>
            </ul>
        </Container>
    </AppLayout>
</template>

<style scoped>

</style>
