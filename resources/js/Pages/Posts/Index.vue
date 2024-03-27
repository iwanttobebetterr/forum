<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";
import Pagination from "@/Components/Pagination.vue";
import {Head, Link, router, usePage} from '@inertiajs/vue3';

defineProps({
    posts: Object
})

</script>

<template>
    <AppLayout title="posts">
        <Container>
            <ul class="divide-y">
                <li v-for="post in posts.data" :key="post.id" class="px-2 py-4">
                    <Link :href="route('posts.show', post.id)">
                        <span class="font-bold text-lg">{{ post.title }}</span>
                    </Link>

                </li>
            </ul>

            <Pagination :meta="posts.meta"></Pagination>
        </Container>
    </AppLayout>
</template>

<style scoped>

</style>
