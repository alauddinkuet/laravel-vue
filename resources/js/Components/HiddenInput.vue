<script setup>
import {onMounted, ref} from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

defineExpose({focus: () => input.value.focus()});
</script>

<template>
    <input
        type="hidden"
        v-model="model"
        ref="input"
    />
</template>
