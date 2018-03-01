
<template>
  <div>
    <div class="form-group">
      <router-link :to="{name: 'sets.create'}" class="btn btn-success">{{ $t('add_new_set') }}</router-link>
    </div>

    <card :title="$t('sets_list')" >
      <div class="panel-body">
        <table class="table table-bordered table-striped">
          <!--<thead>-->
          <!--<tr>-->
            <!--<th></th>-->
            <!--<th width="200">&nbsp;</th>-->
          <!--</tr>-->
          <!--</thead>-->
          <tbody>
          <tr v-for="set, index in sets">
            <td>
              <router-link :to="{name: 'sets.view', params: {id: set.id}}">
                {{ set.title }}
              </router-link>
            </td>
            <td>
              <router-link :to="{name: 'sets.view', params: {id: set.id}}">
                {{ set.date }}
              </router-link>
            </td>
            <td width="200">
              <router-link :to="{name: 'sets.edit', params: {id: set.id}}" class="btn btn-xs btn-default">
                <!-- <fa icon="spinner" todo: fix icons />-->
                {{ $t('edit') }}
              </router-link>
              <a href="#"
                 class="btn btn-xs btn-danger"
                 v-on:click="deleteEntry(set.id, index)">
                {{ $t('delete') }}
              </a>
            </td>
          </tr>
          </tbody>
        </table>
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
        sets: []
      }
    },
    mounted() {
      let app = this;
      axios.get('/api/sets')
        .then(function (resp) {app.sets = resp.data})
        .catch(function (resp) {console.log("Could not load sets")});
    },
    methods: {
      deleteEntry(id, index) {
        if (confirm("Do you really want to delete it?")) {
          let app = this;
          axios.delete('/api/sets/' + id)
            .then(function (resp) {app.sets.splice(index, 1)})
            .catch(function (resp) {alert("Could not delete set")});
        }
      }
    }
  }
</script>