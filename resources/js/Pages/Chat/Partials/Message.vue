<script setup lang="ts">
import { Ref, onMounted, ref } from 'vue';
defineProps({
    message: Object,
})
</script>
<template>
    <h4>{{ $props.message?.text }}</h4>
</template>