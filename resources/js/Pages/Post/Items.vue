<script setup>
import {Link, useForm, usePage} from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
    posts: {
        type: Array,
    }
});

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
});
</script>

<template>
    <section>
        <header>
            <div class="row">
                <div class="col-12">
                    <h2 class="float-start fs-4">Posts</h2>
                    <Link class="btn btn-sm btn-dark float-end clearfix mb-2" :href="route('post.form', { id: null })">
                        New Post
                    </Link>
                </div>
            </div>
        </header>
        <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6 w-100">
            <div class="table-responsive w-100 clearfix">
                <table class="table table-striped border">
                    <thead class="thead-dark">
                    <tr class="bg-dark">
                        <th class="bg-light">Title</th>
                        <th class="bg-light">Body</th>
                        <th class="bg-light">Created By</th>
                        <th class="bg-light">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in posts">
                        <td>{{ item.title }}</td>
                        <td>{{ item.body }}</td>
                        <td>{{ item.name }}</td>
                        <td>
                            <Link class="btn btn-sm btn-dark" :href="route('post.form', { id: item.id })">
                                Edit
                            </Link>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </section>
</template>
