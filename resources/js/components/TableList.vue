<template>
    <div>
        <search-inputs-component @SearchQuery="searchRequest($event)" :range="range"></search-inputs-component>
        <el-table
                :data="tableData"
                style="width: 100%">
            <el-table-column
                    prop="name"
                    sortable
                    label="Name">
                <template slot-scope="scope">
                    {{ scope.row.name }}
                </template>
            </el-table-column>


            <el-table-column
                    prop="bedrooms"
                    sortable
                    label="Bedrooms">
                <template slot-scope="scope">
                    {{ scope.row.bedrooms }}
                </template>
            </el-table-column>

            <el-table-column
                    prop="bathrooms"
                    sortable
                    label="Bathrooms">
                <template slot-scope="scope">
                    {{ scope.row.bathrooms }}
                </template>
            </el-table-column>

            <el-table-column
                    prop="storeys"
                    sortable
                    label="Storeys">
                <template slot-scope="scope">
                    {{ scope.row.storeys }}
                </template>
            </el-table-column>

            <el-table-column
                    prop="garages"
                    sortable
                    label="Garages">
                <template slot-scope="scope">
                    {{ scope.row.garages }}
                </template>
            </el-table-column>

            <el-table-column
                    prop="price"
                    sortable
                    label="Price">
                <template slot-scope="scope">
                    {{ scope.row.price }}
                </template>
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
    import SearchInputsComponent from "../components/SearchInputsComponent"
    import axios from "axios"

    export default {
        props: {
            data: {
                type: Array,
                require: true
            },
            range: {
                type: Object,
                require: true
            }
        },
        components: {
            SearchInputsComponent
        },
        data() {
            return {
                tableData: []
            }
        },
        mounted() {
            this.tableData = this.data

        },
        methods: {
            async searchRequest(obj) {
                const url = '/api/search';
                const data = `?name=${obj.name}&bathrooms=${obj.bathrooms}&bedrooms=${obj.bedrooms}&garages=${obj.garages}&storeys=${obj.storeys}&minPrice=${obj.price.min}&maxPrice=${obj.price.max}`;
                axios
                    .get(`${url}${data}`)
                    .then(res => {
                        this.tableData=res.data;
                    }).catch(err => {
                    console.log(err)
                })


            }

        }
    }
</script>