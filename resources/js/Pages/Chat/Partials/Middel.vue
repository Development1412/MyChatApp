<script setup lang="ts">
import { Ref, onMounted, ref } from 'vue';


const props = defineProps({
    name: String,
    avtar: String,
    light: String,
    dark: String,
})

const container: Ref<HTMLElement | null> = ref(null);
    
// scroll messages to bottom.
onMounted(() => {
  (container.value as HTMLElement).scrollTop = (
    container.value as HTMLElement
  ).scrollHeight;
});
</script>

<template>
    <div
    ref="container"
    class="grow px-5 py-5 flex flex-col overflow-y-scroll scrollbar-hidden"
  >
    <div>
        <div v-for="index in 50" :key="index">
            <h5>Message {{ index }}</h5><hr />
        </div>
    </div>
  </div>
</template>