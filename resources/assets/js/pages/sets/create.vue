
<template>
  <div>
    <div class="form-group">
      <router-link :to="sets" class="btn btn-default">Back</router-link>
    </div>

    <card :title="$t('create_set')" >
      <div class="panel-body">

        <div class="col-md-12">
          <form v-on:submit="saveForm()">

            <div class="row">
              <div class="col-xs-12 col-md-10 form-group">
                <label class="control-label">{{ $t('title') }}</label>
                <input type="text" v-model="set.title" class="form-control">
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 col-md-10 form-group">
                <label class="control-label">{{ $t('date') }}</label>
                <input type="date" v-model="set.date" class="form-control">
              </div>
            </div>

            <div class="col-xs-12 form-group">
              <label class="control-label">{{ $t('notes') }}</label>
              <textarea v-model="set.notes" class="form-control" rows="10"></textarea>
            </div>

            <div class="col-xs-12 form-group">
              <button class="btn btn-success">{{ $t('create') }}</button>
            </div>

          </form>
        </div>
      </div>
    </card>
  </div>
</template>

<script>
  import axios from 'axios'

  export default {
    middleware: 'auth',
    
    data: function () {
      return {
        set: {
          title: '',
          date: '',
          notes: '',
        }
      }
    },
    methods: {
      saveForm() {
        event.preventDefault();
        let app = this;
        let newset = app.set;
        axios.post('/api/sets', newset)
          .then(function (resp) {app.$router.push({path: '/sets'})})
          .catch(function (resp) {console.log("Could not create your set")});
      }
    }
  }
</script>
