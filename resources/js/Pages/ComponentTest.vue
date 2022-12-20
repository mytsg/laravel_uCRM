<script setup>
import GusetLayout from '@/Layouts/Guest.vue'
import Label from '@/Components/Label.vue'
import Input from '@/Components/Input.vue'

const emitTest = e => console.log(e)

</script>

<template>
<GusetLayout>
    <Label value="件名"></Label>
    <Input modelValue="初期値が入ります"
    @update:modelValue="emitTest"
    ></Input>
</GusetLayout>
</template>