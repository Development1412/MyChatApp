<script setup lang="ts">
import { Ref, onMounted, ref } from 'vue';
import Message from '@/Pages/Chat/Partials/Message.vue';


const props = defineProps({
    name: String,
    avtar: String,
    light: String,
    dark: String,
    messages: Object,
})

const container: Ref<HTMLElement | null> = ref(null);
    
// scroll messages to bottom.
onMounted(() => {
  (container.value as HTMLElement).scrollTop = (
    container.value as HTMLElement
  ).scrollHeight;
});
console.log(props.messages)
</script>

<template>
    <div
    ref="container"
    class="grow px-5 py-5 flex flex-col overflow-y-scroll scrollbar-hidden"
  >
    <div>
        <div v-for="(data, index) in $props.messages" :key="index">
            <Message :message="data"/>
        </div>
    </div>
  </div>
</template>