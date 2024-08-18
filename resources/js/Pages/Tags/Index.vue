<script setup>
import { reactive, ref } from "vue";
import AppLayout from '../../Layouts/AppLayout.vue';
import TagCard from '../../Components/Tag/TagCard.vue';
import Pagination from '../../Components/Pagination.vue';
import CreateTagForm from '../../Components/Tag/CreateTagForm.vue';
import EditTagForm from '../../Components/Tag/EditTagForm.vue';
import useModal from '../../Composables/useModal';

const editing = ref(false)

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
    editing.value = false
    modalTitle.value = "Add new tag"

    showModal()
}

const editTag = (data) => {
    editing.value = true
    modalTitle.value = "Edit tag"

    tag.id = data.id
    tag.name = data.name
    tag.description = data.description

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
                <TagCard 
                    v-for="tag in tags.data" 
                    :tag="tag" 
                    :key="tag.id" 
                    @edit="editTag"
                />
            </div>
            <Pagination :meta="tags.meta" position="right" />
        </div>

        <Modal id="tag-modal" :title="modalTitle" @hidden="editing = false">
            <component :is="editing ? EditTagForm : CreateTagForm" :tag="tag" @success="hideModal" />
        </Modal>
    </AppLayout>
</template>