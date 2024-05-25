<script setup lang="ts">
import ChatLayout from '@/Layouts/ChatLayout.vue';
import RoomsList from "@/Pages/Chat/Partials/RoomsList.vue";
import MessageContainer from "@/Pages/Chat/Partials/MessageContainer.vue";
import { Head } from '@inertiajs/vue3';
import { onMounted, ref, watchEffect } from 'vue';

const props = defineProps<{
    mustVerifyEmail?: boolean;
    status?: string;
    rooms: Array<RoomsProps>;
}>();

const currentRoom = ref<RoomsProps>();
const messages = ref();

const changeRoom = (roomId: any) => {
    currentRoom.value = props.rooms.find(value => roomId == value.id)
    fetch(route('message.fetch', [roomId]))
        .then(response => response.json())
        .then(result => {
            messages.value = result?.messages;
        });

}

const getInitials = (name: String) => {
    const parts = name.split(" ")
    return parts.length > 1
        ? parts[0].charAt(0) + parts[parts.length - 1].charAt(0)
        : parts[0].charAt(0)
}

const roomName = currentRoom.value?.name || "No Name";

const colors = [
    { light: "#ff9999", dark: "#780000" },
    { light: "#6699ff", dark: "#002878" },
    { light: "#66ff99", dark: "#005e1f" },
    { light: "#ffff99", dark: "#7e7e00" },
    { light: "#ff99ff", dark: "#7f007f" },
];

const letterIndex = roomName.toUpperCase().charCodeAt(0) - 65;
const colorIndex = Math.floor(letterIndex / 5) % colors.length;
const { light, dark } = colors[colorIndex];

const connectWebSocket = () => {
    window.Echo.channel('chatroom')
        .listen('MessageSent', async (e: any) => {
            console.log("MessageSent", e);
        });
};

watchEffect(() => {
    // connectWebSocket();
    console.log("watchEffect")
});

onMounted(() => {
    console.log("onMounted")
    connectWebSocket();
})

</script>

<template>

    <Head title="Profile" />

    <ChatLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Profile</h2>
        </template>
        <template #list>
            <RoomsList :rooms="$props.rooms" @change-room="changeRoom" />
        </template>

        <template #message v-if="currentRoom">
            <MessageContainer :name="currentRoom?.name" :light="light" :dark="dark"
                :avtar="getInitials(currentRoom.name)" :currentRoom="currentRoom" :messages="messages" />
        </template>
    </ChatLayout>
</template>
