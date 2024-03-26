<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";
import Pagination from "@/Components/Pagination.vue";

defineProps({
    posts: Object
})

</script>

<template>
    <AppLayout title="posts">
        <Container>
            <ul>
                <li v-for="post in posts.data" :key="post.id">
                    {{ post.title }}
                </li>
            </ul>

            <Pagination :meta="posts.meta"></Pagination>
        </Container>
    </AppLayout>
</template>

<style scoped>

</style>
