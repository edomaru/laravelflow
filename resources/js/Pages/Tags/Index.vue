<script setup>
import { reactive } from "vue";
import AppLayout from '../../Layouts/AppLayout.vue';
import TagCard from '../../Components/Tag/TagCard.vue';
import Pagination from '../../Components/Pagination.vue';
import CreateTagForm from '../../Components/Tag/CreateTagForm.vue';
import useModal from '../../Composables/useModal';

defineProps({
    tags: {
        type: Object,
        required: true
    }
})

const { showModal, hideModal, modalTitle, Modal } = useModal('#tag-modal')

const tag = reactive({
    id: null,
    name: null,
    description: null
})

const createTag = () => {
    modalTitle.value = "Add new tag"

    showModal()
}
</script>

<template>
    <AppLayout>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="page-header">Tags</h1>
                <button class="btn btn-success" @click="createTag">Add Tag</button>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
                <TagCard v-for="tag in tags.data" :tag="tag" :key="tag.id" />
            </div>
            <Pagination :meta="tags.meta" position="right" />
        </div>

        <Modal id="tag-modal" :title="modalTitle">
            <CreateTagForm :tag="tag" @success="hideModal" />
        </Modal>
    </AppLayout>
</template>