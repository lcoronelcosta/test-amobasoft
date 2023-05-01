<!-- eslint-disable vue/multi-word-component-names -->
<template>

    <div class="col-span-2 rounded-3xl bg-cyan-500">
        <ul class="menu max-h-full py-52 text-white text-xl space-y-5 space-x-5">
            <li class="hover:text-white hover:font-bold pl-5">
                <div class="flex">
                    <font-awesome-icon icon="fa-solid fa-dashboard" class="fa-lg" />
                    <router-link to="/">Dashboard</router-link>
                </div>
            </li>
            <li class="hover:text-white hover:font-bold">
                <div class="flex">
                    <font-awesome-icon icon="fa-solid fa-tags" class="fa-lg" />
                    <router-link to="/">Transaction</router-link>
                </div>
            </li>
            <li class="hover:text-white hover:font-bold">
                <div class="flex">
                    <font-awesome-icon icon="fa-regular fa-calendar" class="fa-lg" />
                    <router-link to="/">Schedules</router-link>
                </div>
            </li>
            <li class="hover:text-white hover:font-bold">
                <div class="flex">
                    <font-awesome-icon icon="fa-regular fa-user" class="fa-lg" />
                    <router-link to="/">Users</router-link>
                </div>
            </li>
            <li class="hover:text-white hover:font-bold">
                <div class="flex">
                    <font-awesome-icon icon="fa-solid fa-gear" class="fa-lg"/>
                    <router-link to="/">Settings</router-link>
                </div>
            </li>
            
        </ul>

        <ul class="flex-col text-white text-xl space-y-5 flex pb-8" >
            <li>Help</li>
            <li>Contact Us</li>
        </ul>
    </div>
    
</template>