<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import TagCard from '../../Components/Tag/TagCard.vue';
import Pagination from '../../Components/Pagination.vue';

defineProps({
    tags: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <AppLayout>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="page-header">Tags</h1>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#new-tag-modal">Add Tag</button>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
                <TagCard v-for="tag in tags.data" :tag="tag" :key="tag.id" />
            </div>
            <Pagination :meta="tags.meta" position="right" />
        </div>
    </AppLayout>
</template>