<template>
    <div>

    <div class="search-input-container">
        <el-input
                class="custom-input"
                placeholder="Type name"
                suffix-icon="el-icon-search"
                v-model="searchValues.name"

        >
        </el-input>

        <el-input

                type="number"
                class="custom-input"
                placeholder="Type  bedrooms"
                suffix-icon="el-icon-search"
                v-model="searchValues.bedrooms">
        </el-input>

        <el-input

                type="number"
                class="custom-input"
                placeholder="Type bathrooms"
                suffix-icon="el-icon-search"
                v-model="searchValues.bathrooms">
        </el-input>

        <el-input

                type="number"
                class="custom-input"
                placeholder="Type storeys"
                suffix-icon="el-icon-search"
                v-model="searchValues.storeys">
        </el-input>

        <el-input

                type="number"
                class="custom-input"
                placeholder="Type garages"
                suffix-icon="el-icon-search"
                v-model="searchValues.garages" >
        </el-input>

        </div>
        <div class="slider-button-container">
            <div class="slider-container">
                <span>Price</span>
                <el-slider
                        class="el-slider-custom"
                        v-model="price"
                        range
                        show-stops
                        :min="range.min"
                        :step="1000"
                        :max="range.max">
                </el-slider>
            </div>

            <div class="button-container">

                <el-button type="success" @click="searchData">SEARCH</el-button>
            </div>
        </div>

    </div>

</template>
<script>
    export default {
        props:{
            range:{
                type:Object,
                require:true
            }
        },
        data(){
            return{
                searchValues:{
                    name:"",
                    bedrooms:"",
                    bathrooms:"",
                    storeys:"",
                    garages:"",
                    price:{
                        min:0,
                        max:0
                    }
                },
                price:[]

            }
        },
        methods:{
            searchData(){
                this.searchValues.price={
                    min:this.price[0],
                    max:this.price[1],
                };
                this.$emit('SearchQuery',this.searchValues)
            }
        },
        mounted(){
           this.price = [this.range.min,this.range.max]

        },
    }
</script>

<style lang="scss">
    .search-input-container{
        display: flex;
        margin: 50px 0;
    }
    .slider-button-container{
        display: flex;
        align-items: center;

    }
    .slider-container{
        flex: 1;
        display: flex;
        justify-content: flex-end;
        align-items: center;

    }
    .button-container{
        flex: 1;
        display: flex;
        justify-content: flex-end;
        align-items: center;

    }
    .el-slider-custom{
        flex: 1;
        margin-left: 20px;
    }
    .custom-input{
        padding: 0 5px ;
    }
</style>