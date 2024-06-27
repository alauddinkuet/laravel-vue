<script setup>
import {Head, Link} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Items from './Items.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import HiddenInput from '@/Components/HiddenInput.vue';
import TextareaInput from '@/Components/TextareaInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import {useForm, usePage} from '@inertiajs/vue3';
import {router} from '@inertiajs/vue3'

defineProps({
    post: {
        type: Object,
    }
});
const postData = usePage().props.post;
const form = useForm(postData);
/*const form = useForm({
    id: postData.id,
    title: postData.title,
    body: postData.body
});*/

function submit() {
    router.post(route('post.save'), form, {
        onSuccess: () => {
            return Promise.all([

            ])
        }
    });
}
</script>

<template>
    <Head title="Profile"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Posts</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <form @submit.prevent="submit" class="mt-6 space-y-6">
                        <HiddenInput
                            id="post-id"
                            v-model="form.id"
                        />
                        <InputLabel for="title" value="Post Title"/>
                        <TextInput
                            id="title"
                            type="text"
                            class="form-control"
                            required
                            autofocus
                            v-model="form.title"
                            autocomplete="title"
                            placeholder="Post Title"
                        />
                        <InputLabel for="body" value="Body"/>
                        <TextareaInput
                            id="title"
                            type="text"
                            class="form-control"
                            required
                            autofocus
                            v-model="form.body"
                            placeholder="Write you post"
                        />
                        <div class="flex items-center gap-4">
                            <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                            <Transition
                                enter-active-class="transition ease-in-out"
                                enter-from-class="opacity-0"
                                leave-active-class="transition ease-in-out"
                                leave-to-class="opacity-0"
                            >
                                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                            </Transition>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
