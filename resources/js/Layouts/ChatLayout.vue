<script setup lang="ts">
import { ref } from 'vue';

</script>

<template>
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full">
                <main class="">
                    <div class="flex">
                        <div class="w-20 border-r-2 border-black dark:border-gray-700"></div>
                        <div class="flex-none w-full md:w-1/4 h-screen border-r-2 border-black dark:border-gray-700">
                            <slot name="list" />
                        </div>
                        <div class="flex-initial w-full md:w-3/4 hidden md:block h-screen">
                            <slot name="message" />
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>
