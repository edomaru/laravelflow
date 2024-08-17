<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    tag: {
        type: Object,
        required: true
    }
})
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
        </div>
    </div>
</template>