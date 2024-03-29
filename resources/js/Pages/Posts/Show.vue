<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";
import Pagination from "@/Components/Pagination.vue";
import {computed} from "vue";
import {formatDistance, parseISO} from "date-fns";
import {Link, useForm} from "@inertiajs/vue3";
import {relativeDate} from "@/Utilities/date.js";
import Comment from "@/Components/Comment.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    post: Object,
    comments: Object,
})

const commentForm = useForm({
    body: '',
})

const addComment = () => commentForm.post(route('posts.comments.store', props.post.id), {
    preserveScroll: true,
    onSuccess: () => commentForm.reset(),
})

</script>

<template>
    <AppLayout :title="post.title">
        <Container>
            <h1 class="text-2xl font-bold">{{ post.title }}</h1>
            <span class="block mt-1 text-sm text-gray-600">{{ relativeDate(post.created_at) }} ago by {{post.user.name}}</span>
            <article class="mt-6"><pre class="whitespace-pre-wrap font-sans">{{ post.body }}</pre></article>

            <div class="mt-4">
                <h2 class="text-xl font-semibold">Comments</h2>

                <form class="mt-4" @submit.prevent="addComment">
                    <div>
                        <InputLabel for="body" value="Comment" class="sr-only"/>
                        <TextInput id="body" v-model="commentForm.body" placeholder="Add your comment"/>
                    </div>

                    <PrimaryButton class="mt-2">Add Comment</PrimaryButton>
                </form>

                <ul class="divide-y mt-4">
                    <li v-for="comment in comments.data" :key="comment.id" class="px-2 py-4">
                        <Comment :comment="comment" />
                    </li>
                </ul>

                <Pagination :meta="comments.meta" :only="['comments']"></Pagination>
            </div>
        </Container>
    </AppLayout>
</template>
