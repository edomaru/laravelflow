<script setup>
import Multiselect from 'vue-multiselect';
import 'vue-multiselect/dist/vue-multiselect.css';
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    question: {
        type: Object,
        required: true
    },
    method: String,
    action: {
        type: String,
        required: true
    },
    options: {
        type: Array,
        required: true
    }
})

const formData = {
    title: props.question.title,
    body: props.question.body,
    id: props.question.id,
    tags: props.question.tags
}

if (props.method) {
    formData._method = props.method
}

const form = useForm(formData)

const emit = defineEmits(['success'])

const submit = () => {
    form.post(props.action, {
        onSuccess: () => {
            form.reset()
            emit('success')
        }
    })
}

</script>
<template>
    <form @submit.prevent="submit">
        <div class="row mb-3">
            <div class="col-7">
                <label for="question-title" class="form-label">Question title</label>
                <input type="text" class="form-control" :class="{ 'is-invalid': form.errors.title }" v-model="form.title" name="title" id="question-title">
                <div class="invalid-feedback" v-if="form.errors.title">{{ form.errors.title }}</div>
            </div>
            <div class="col-5">
                <label for="question-tags" class="form-label">Tags</label>
                <Multiselect id="question-tags" :class="{ 'is-invalid': form.errors.tags }" v-model="form.tags" multiple :options="options" />
                <div class="invalid-feedback" v-if="form.errors.tags">{{ form.errors.tags }}</div>
            </div>
        </div>
        <div class="mb-3">
            <label for="question-body" class="form-label">Explain your question</label>
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#write" type="button"
                                role="tab" href="#">Write</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#preview" type="button"
                                role="tab">Preview</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="write" role="tabpanel" aria-labelledby="write-tab"
                            tabindex="0">
                            <textarea rows="7" class="form-control" :class="{ 'is-invalid': form.errors.body }" v-model="form.body" name="body"></textarea>
                            <div class="invalid-feedback" v-if="form.errors.body">{{ form.errors.body }}</div>
                        </div>
                        <div class="tab-pane fade show" id="preview" role="tabpanel" aria-labelledby="preivew-tab"
                            tabindex="0">
                            <div class="preview-body">
                                hi there
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-outline-secondary me-2" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">{{ question.id ? "Update" : "Post" }}</button>
        </div>
    </form>
</template>