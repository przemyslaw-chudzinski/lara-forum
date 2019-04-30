<template>

    <v-toolbar>

        <v-toolbar-side-icon></v-toolbar-side-icon>

        <v-toolbar-title class="mr-5">Lara Forum</v-toolbar-title>

        <v-text-field
            solo-inverted
            flat
            label="Search"
            prepend-icon="search"
        ></v-text-field>

        <v-spacer></v-spacer>

        <v-toolbar-items class="hidden-sm-and-down">

            <v-btn v-for="(link, index) in navLinks" v-bind:key="index" v-if="link.visible" flat>{{ link.label }}</v-btn>

        </v-toolbar-items>

    </v-toolbar>

</template>

<script>

    import {navLinks} from '../navLinks';

    export default {
        data: () => ({
            navLinks
        })
    }
</script>

<style>

    .v-input .v-input__slot {
        margin: 0;
    }

</style>
