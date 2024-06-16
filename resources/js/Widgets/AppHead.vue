<!-- AppHead.vue -->

<template>
    <Head :title="title ? `${title} - Medical` : 'Medical'">
        <slot/>
    </Head>
</template>

<script>
import { Head } from '@inertiajs/vue3'

export default {
    components: {
        Head,
    },
    props: {
        title: String,
    },
}
</script>