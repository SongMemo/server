
<template>
  <div>

    <div class="form-group">
      <router-link :to="sets" class="btn btn-default">Back</router-link>
    </div>

    <card :title="set.title">
      <router-link :to="{name: 'sets.edit', params: {id: set.id}}" class="btn btn-xs btn-default">
        {{ $t('edit') }}
      </router-link>
      <div class="col-md-12">
        <textarea class="form-control" rows="40">{{ set.notes }}</textarea>
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
        set: []
      }
    },
    mounted() {
      let app = this;
      let id = app.$route.params.id;
      app.setId = id;
      axios.get('/api/sets/' + id)
        .then(function (resp) {app.set = resp.data})
        .catch(function () {console.log("Could not load your set")});
    },
  }
</script>
