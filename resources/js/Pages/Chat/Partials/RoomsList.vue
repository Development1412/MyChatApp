<script setup lang="ts">

defineProps<{
    rooms: Array<RoomsProps>
}>();
const emit = defineEmits(['changeRoom'])

</script>

<template>
    <div class="p-2 border-b-2 border-black dark:border-gray-800 pt-6">
        <h1 class="font-semibold text-3xl">Messages</h1>
    </div>
    <div v-for="room in $props.rooms" :key="room.id">
        <div class="flex p-2 flex-col cursor-pointer  hover:bg-green-500 hover:text-white" @click="$emit('changeRoom', room.id)">
            <h6>{{ room.name }}</h6>
            <p></p>
        </div>
    </div>
</template>