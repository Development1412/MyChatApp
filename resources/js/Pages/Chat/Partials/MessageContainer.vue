<script setup type="ts">
import Header from '@/Pages/Chat/Partials/Header.vue';
import Middel from '@/Pages/Chat/Partials/Middel.vue';
import Bottom from '@/Pages/Chat/Partials/Bottom.vue';

const props = defineProps({
    name: String | undefined,
    avtar: String | undefined,
    light: String,
    dark: String,
    currentRoom: Object
})
</script>
<template>
    <div class="h-full flex flex-col scrollbar-hidden">
        <Header :name="$props.name" :avtar="$props.avtar" :light="$props.light" :dark="$props.dark" />
        <Middel />

        <Bottom  :currentRoom="$props.currentRoom"/>
    </div>
</template>