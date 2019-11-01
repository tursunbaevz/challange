<template>
<div>

        <div class="card">
            <div class="card-body">
                <div class="add-goal-button">
                    <router-link :to="{name: 'goalCreate'}" class="btn btn-success">Добавить цель</router-link>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                <div class="title text-center">
                    <h3 class="desk-title">Доска целей</h3>
                </div>
            </div>
        </div>

       <!--<div v-for="goal, index in goals">-->
           <!--<p>souls</p>-->
           <!--<div v-for="soul, index in goal.souls">-->
               <!--{{soul.title}}-->
               <!--{{soul.goal_id}}-->
           <!--</div>-->

           <!--<hr>-->
           <!--<p>intellect</p>-->
           <!--<div v-for="intellect, index in goal.intellects">-->
               <!--{{intellect.title}}-->
               <!--{{intellect.goal_id}}-->
           <!--</div>-->

           <!--<hr>-->
           <!--<p>sport</p>-->
           <!--<div v-for="sport, index in goal.sports">-->
               <!--{{sport.title}}-->
               <!--{{sport.goal_id}}-->
           <!--</div>-->
           <!--<br>-->
           <!--{{goal.description}}-->
       <!--</div>-->


    <div class="row">

        <div class="col-md-4" v-for="goal, index in goals">
            <div class="card">

                <div class="card-header">
                    <div class="avatar" style="position: absolute;">
                        <img v-if="goal.user.avatar == null" src="/img/default-avatar.png" alt="" class="img-circle img-no-padding img-responsive" />
                        <img v-else="goal.user.avatar !== null"  v-bind:src="goal.user.avatar" class="img-circle img-no-padding img-responsive">
                    </div>

                    <div class="user-name" style="position: relative;: absolute;
                                top: 4px;left: 60px;" >
                        <a href=""><b> {{goal.user.name}} </b></a>
                    </div>


                    <div class="date-created" style="float: right; margin-top: -16px;">
                          {{goal.created_at}}
                    </div>

                </div>

                <div class="card-body">

                    <h4 class="goal-title"> Духовное <div class="check"></div> </h4>
                    <div v-for="soul, index in goal.souls">
                        - {{soul.title}}
                    </div>

                    <br>

                    <h4>Интеллект <div class="check"></div> </h4>
                    <div v-for="intellect, index in goal.intellects">
                        {{intellect.title}}
                    </div>
                    <br>

                    <h4>Спорт <div class="check"></div> </h4>
                    <div v-for="sport, index in goal.sports">
                        {{sport.title}}
                    </div>

                </div>

                <div class="card-footer">
                    <h4>Описание</h4>
                    {{goal.description}}
                    <hr>
                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                        <router-link :to="{name: 'goalEdit', params: {id: goal.id}}" class="btn btn-primary btn-sm">
                            Редактировать
                        </router-link>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
</template>

<script>
    export default {
        data: function () {
            return {
                goals: []
            }
        },

        mounted() {
            var app = this;
            axios.get('/api/v1/goals')
                .then(function (resp) {
                    app.goals = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load goals");
                });
        },

    }
</script>