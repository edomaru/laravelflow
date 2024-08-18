<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    tag: {
        type: Object,
        required: true
    }
})

const emit = defineEmits(['edit', 'remove'])
</script>

<template>
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <Link :href="route('questions.tagged', tag.name)" class="tag">{{ tag.name }}</Link>
                    <small class="text-muted">{{ tag.questions_count }} questions</small>
                </div>
                <p class="card-text">{{ tag.description }}</p>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button @click="emit('edit', tag)" class="btn btn-sm btn-info text-white me-2">Edit</button>
                <button @click="emit('remove', tag)" class="btn btn-sm btn-danger">Delete</button>
            </div>
        </div>
    </div>
</template>