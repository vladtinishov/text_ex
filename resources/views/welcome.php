<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello, world</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="app.css">
</head>
<body>

<div id="app">
    <div v-if="formKey" class="modal_window">
        <div class="form">
            <i @click="closeFrom" class="fa fa-times-circle" aria-hidden="true"></i>
            <input id="value" type="text">
            <br>
            <button @click="search" type="button" class="btn btn-primary">Искать</button>
            <div class="filter_list">
                <button type="button" class="btn btn-success" @click="setExp('>')">></button>
                <button type="button" class="btn btn-danger" @click="setExp('=')">=</button>
                <button type="button" class="btn btn-warning" @click="setExp('<')"><</button>
            </div>
        </div>
    </div>
    <div v-if="createFilter" class="create_filter">
        <div class="inner_create_filter">
            <div @click="closeCreateFilter" class="close_create_filter">x</div>
            <ul>
                <li v-for="value, key in filterData">
                    {{key}}
                    <select v-bind:value="value.exp" @click="setExpC(key)" class="exp_list" v-bind:id="key + '_sel'">
                        <option value="no">нет</option>
                        <option value=">">больше</option>
                        <option value="=">равно</option>
                        <option value="<">меньше</option>
                    </select>
                    <input v-bind:value="filterData[key].val" v-if="inputKey[key]" type="text" v-bind:id="key + '_in'">
                </li>
            </ul>
            <button class="btn btn-primary to-main" @click="setValue">Искать</button>
            <ul>
                <li v-for="value, key in allFilters">
                    <span class="deleteFilter" @click="deleteFilter(key)">
                        x
                    </span> 
                    <span class="filter_data">{{key}} {{value.exp}} {{value.val}}</span>
                </li>
            </ul>
        </div>
    </div>
    <span class="create_filter_span" @click="openCreateFilter">
        Создать фильтр 
        <i class="fa fa-filter" aria-hidden="true"></i>
    </span>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
            <th scope="col">
                <i @click="openForm('id')" class="fa fa-filter" aria-hidden="true"></i>
                id
            </th>
            <th scope="col">
                <i @click="openForm('product_name')" class="fa fa-filter" aria-hidden="true"></i>
                Наименование
            </th>
            <th scope="col">
                <i @click="openForm('articul')" class="fa fa-filter" aria-hidden="true"></i>
                Артикул
            </th>
            <th scope="col">
                <i @click="openForm('category')" class="fa fa-filter" aria-hidden="true"></i>
                Категория
            </th>
            <th scope="col">
                <i @click="openForm('weight')" class="fa fa-filter" aria-hidden="true"></i>
                Вес
            </th>
            <th scope="col">
                <i @click="openForm('price')" class="fa fa-filter" aria-hidden="true"></i>
                Себестоимость
            </th>
            <th scope="col">
                <i @click="openForm('status')" class="fa fa-filter" aria-hidden="true"></i>
                Состояние продукта
            </th>
            <th scope="col">
                <i @click="openForm('created_at')" class="fa fa-filter" aria-hidden="true"></i>
                Дата добавления
            </th>
            </tr>
        </thead>
        <tbody v-if="allProductsKey">
            <tr v-for="product in products">
            <th scope="row">{{product.id}}</th>
            <td>{{product.product_name}}</td>
            <td>{{product.articul}}</td>
            <td>{{product.category}}</td>
            <td>{{product.weight}}</td>
            <td>{{product.price}}</td>
            <td>{{product.status}}</td>
            <td>{{product.created_at | data}}</td>
            </tr>
        </tbody>
        <tbody v-if="searchingProductsKey">
            <tr v-for="product in pageList">
                <th scope="row">{{product.id}}</th>
                <td>{{product.product_name}}</td>
                <td>{{product.articul}}</td>
                <td>{{product.category}}</td>
                <td>{{product.weight}}</td>
                <td>{{product.price}}</td>
                <td>{{product.status}}</td>
                <td>{{product.created_at }}</td>
            </tr>
        </tbody>
    </table>
    <div class="nav_buttons">
        <button class="btn btn-primary to-main" @click="toBack" v-if="searchingProductsKey"><-</button>
        <button class="btn btn-primary to-main" @click="toNext" v-if="searchingProductsKey">-></button>
    </div>
    <br>
    <button v-if="backKey" @click="back" type="button" class="btn btn-primary to-main">На главную</button>
</div>

<script src="/js/app.js"></script>
</body>
</html>