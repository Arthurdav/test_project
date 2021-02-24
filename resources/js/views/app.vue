<template>
    <div>
        <table-list :data="data" :range="range" ></table-list>
    </div>
</template>
<script>
    import  TableList from "../components/TableList"


    export default {
        props: ['data','range'],
        components:{
            TableList
        },
    };
</script>