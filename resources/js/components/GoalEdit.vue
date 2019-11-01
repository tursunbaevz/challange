<template>
    <div>

        <div class="card">
            <div class="card-body">
                <div class="add-goal-button">
                    <router-link :to="{ name: 'goalIndex' }"  class="btn btn-info">Назад</router-link>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                <div class="title text-center">
                    <h3 class="desk-title">Редактирование целей</h3>
                </div>
            </div>
        </div>


        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="/api/v1/goals" method="PATCH" @submit.prevent="addGoal()">
                        <div v-for="(input,k) in soul_titles" :key="k">
                            <div class="row">
                                <div class="col-10">
                                    <div class="form-group input-center">
                                        <input type="text" name="soul_titles" v-model="input.soul_title" placeholder="Духовное" class="form-control"  required/>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <button type="button"  @click="removeSoul(k)" v-show="k || ( !k && soul_titles.length > 1)" name="removeIntellect" id="removeSoul" class="btn btn-danger"><span class="fa fa-minus"></span></button>
                                </div>

                                <div class="col-1">
                                    <button type="button" @click="addSoul(k)" v-show="k == soul_titles.length-1" name="addSoul" id="addSoul" class="btn btn-primary"><span class="fa fa-plus"></span></button>
                                </div>
                            </div>
                        </div>

                        <div v-for="(input,k) in intellect_titles" :key="'a' + k">
                            <div class="row">
                                <div class="col-10">
                                    <div class="form-group input-center">
                                        <input type="text" name="intellect_titles" v-model="input.intellect_title"  placeholder="Интеллект" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-1">
                                    <button type="button"  @click="removeIntellect(k)" v-show="k || ( !k && intellect_titles.length > 1)" name="removeIntellect" id="removeIntellect" class="btn btn-danger "><span class="fa fa-minus"></span></button>
                                </div>
                                <div class="col-1">
                                    <button type="button" @click="addIntellect(k)" v-show="k == intellect_titles.length-1" name="addIntellect" id="addIntellect" class="btn btn-warning"><span class="fa fa-plus"></span></button>
                                </div>
                            </div>
                        </div>

                        <div v-for="(input,k) in sport_titles" :key="'b' + k">
                            <div class="row">
                                <div class="col-10">
                                    <div class="form-group input-center">
                                        <input type="text" name="sport_titles" v-model="input.sport_title"  placeholder="Спорт" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-1">
                                    <button type="button"  @click="removeSport(k)" v-show="k || ( !k && sport_titles.length > 1)" name="removeSport" id="removeSport" class="btn btn-danger "><span class="fa fa-minus"></span></button>
                                </div>
                                <div class="col-1">
                                    <button type="button" @click="addSport(k)" v-show="k == sport_titles.length-1" name="addSport" id="addSport" class="btn btn-info"><span class="fa fa-plus"></span></button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea  name="description"  v-model="description" class="form-control" cols="20" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        mounted() {
            var app = this;
            let id = app.$route.params.id;
            axios.get('/api/v1/goals/' + id)
                .then(function (resp) {
                    app.goals = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load goals");
                });
        },

        data() {

            return {

                soul_titles: [
                    {
                        soul_title: '',
                    }
                ],


                intellect_titles: [
                    {
                        intellect_title: ''
                    }
                ],


                sport_titles: [
                    {
                        sport_title: ''
                    }
                ],
                description: '',
            };
        },

        methods: {
            addGoal() {
                let app = this;
                axios.patch('/api/v1/goals/' +  app.$route.params.id, {
                    soul_titles:this.soul_titles,
                    intellect_titles:this.intellect_titles,
                    sport_titles:this.sport_titles,
                    description:this.description,
                })

                // .then(function (resp) {
                //     app.$router.replace('/goals');
                // })

                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not create your goal");
                });
            },

            addSoul(index) {
                this.soul_titles.push({ soul_title: '' });
            },

            removeSoul(index) {
                this.soul_titles.splice(index, 1);
            },

            addIntellect(index) {
                this.intellect_titles.push({ intellect_title: '' });
            },

            removeIntellect(index) {
                this.intellect_titles.splice(index, 1);
            },

            addSport(index) {
                this.sport_titles.push({ sport_title: '' });
            },

            removeSport(index) {
                this.sport_titles.splice(index, 1);
            }
        }
    }
</script>

