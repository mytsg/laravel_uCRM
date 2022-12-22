<script setup>
</script>

<template>
    <div v-if="$page.props.flash.status === 'success'" class="text-white bg-blue-300 p-4">
        {{ $page.props.flash.message }}
    </div>
    <div v-if="$page.props.flash.status === 'danger'" class="text-white bg-red-300 p-4">
        {{ $page.props.flash.message }}
    </div>
</template>