<script setup lang="ts">

const props = defineProps({
    name: String,
    avtar: String,
    light: String,
    dark: String,
})
</script>

<template>
    <div class="p-3 flex items-center gap-5 border-b-2 border-black dark:border-gray-800 ">
        <div className="initials-background" class="w-8 md:w-14 h-8 md:h-14 rounded-full flex content-center flex-wrap justify-center" :style="{ background: $props.light }">
            <p className="initials fw-bolder" class="text-center text" :style="{ color: $props.dark }">{{ $props.avtar }}</p>
        </div>
        <!-- <img :src="$props.avtar" class="w-10 md:w-16 h-10 md:h-16 border-emerald-500 rounded-full" /> -->
        <h1 class="text-lg md:text-2xl ">{{ $props.name }}</h1>
    </div>
</template>